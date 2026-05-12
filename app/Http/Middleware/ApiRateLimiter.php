<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ApiRateLimiter
{
    // ─── الحدود لكل نوع مسار ─────────────────────────────────────────────────

    private array $limits = [
        'login'        => ['max' => 5,   'decay' => 60],   // 5 محاولات / دقيقة
        'write'        => ['max' => 20,  'decay' => 60],   // 20 طلب كتابة / دقيقة
        'read'         => ['max' => 60,  'decay' => 60],   // 60 طلب قراءة / دقيقة
        'global'       => ['max' => 100, 'decay' => 60],   // 100 طلب كلي / دقيقة
    ];

    public function handle(Request $request, Closure $next, string $type = 'read')
    {
        $identifier = $this->getIdentifier($request);
        $limit      = $this->limits[$type] ?? $this->limits['read'];

        // ─── فحص الحظر الكلي أولاً ───────────────────────────────────────────
        if ($this->isGloballyBlocked($identifier)) {
            return $this->blockedResponse($identifier);
        }

        // ─── فحص حد النوع المحدد ─────────────────────────────────────────────
        $key     = "rate_limit:{$type}:{$identifier}";
        $current = Cache::get($key, 0);

        if ($current >= $limit['max']) {
            $this->logSuspicious($request, $type, $current);
            $this->incrementViolation($identifier);

            return response()->json([
                'success'     => false,
                'message'     => 'تم تجاوز الحد المسموح به من الطلبات، يرجى الانتظار.',
                'retry_after' => $limit['decay'] . ' ثانية',
            ], 429)->withHeaders([
                'X-RateLimit-Limit'     => $limit['max'],
                'X-RateLimit-Remaining' => 0,
                'Retry-After'           => $limit['decay'],
            ]);
        }

        // ─── زيادة العداد ─────────────────────────────────────────────────────
        if ($current === 0) {
            Cache::put($key, 1, $limit['decay']);
        } else {
            Cache::increment($key);
        }

        $remaining = $limit['max'] - ($current + 1);

        $response = $next($request);

        return $response->withHeaders([
            'X-RateLimit-Limit'     => $limit['max'],
            'X-RateLimit-Remaining' => max(0, $remaining),
        ]);
    }

    // ─── توليد معرف فريد للطالب ──────────────────────────────────────────────

    private function getIdentifier(Request $request): string
    {
        // استخدم التوكن إن وُجد، وإلا الـ IP
        $token = $request->bearerToken();
        $ip    = $request->ip();

        return $token ? "token:{$token}" : "ip:{$ip}";
    }

    // ─── فحص الحظر الدائم ────────────────────────────────────────────────────

    private function isGloballyBlocked(string $identifier): bool
    {
        return Cache::has("blocked:{$identifier}");
    }

    // ─── تسجيل المخالفات وحظر عند التكرار ───────────────────────────────────

    private function incrementViolation(string $identifier): void
    {
        $violationKey = "violations:{$identifier}";
        $violations   = Cache::get($violationKey, 0) + 1;

        Cache::put($violationKey, $violations, 3600); // تتراكم لساعة

        // بعد 10 مخالفات → حظر لمدة ساعة
        if ($violations >= 10) {
            Cache::put("blocked:{$identifier}", true, 3600);
            Log::warning("API: تم حظر {$identifier} بسبب تجاوز الحد المتكرر ({$violations} مخالفة)");
        }
    }

    private function blockedResponse(string $identifier): \Illuminate\Http\JsonResponse
    {
        Log::warning("API: محاولة وصول من محظور: {$identifier}");

        return response()->json([
            'success' => false,
            'message' => 'تم حظر هذا الحساب مؤقتاً بسبب النشاط المشبوه. حاول بعد ساعة.',
        ], 403);
    }

    // ─── تسجيل الأنشطة المشبوهة ──────────────────────────────────────────────

    private function logSuspicious(Request $request, string $type, int $count): void
    {
        Log::warning('API Rate Limit تجاوز', [
            'ip'      => $request->ip(),
            'token'   => $request->bearerToken() ? substr($request->bearerToken(), 0, 10) . '...' : 'لا يوجد',
            'url'     => $request->fullUrl(),
            'method'  => $request->method(),
            'type'    => $type,
            'count'   => $count,
            'time'    => now()->toDateTimeString(),
        ]);
    }
}
