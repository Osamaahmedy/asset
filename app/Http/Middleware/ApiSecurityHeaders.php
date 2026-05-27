<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiSecurityHeaders
{
    // حجم الـ Body الأقصى بالبايت (10KB)
    private int $maxBodySize = 10240;

    // User-Agents المشبوهة
    private array $blockedAgents = [
        'sqlmap', 'nikto', 'nmap', 'masscan',
        'zgrab', 'python-requests', 'go-http-client',
        'curl', 'wget', 'libwww',
    ];

    public function handle(Request $request, Closure $next)
    {
        // ─── 1. فحص User-Agent ───────────────────────────────────────────────
        if ($this->isSuspiciousAgent($request)) {
            Log::warning('API: User-Agent مشبوه', [
                'ip'    => $request->ip(),
                'agent' => $request->userAgent(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'طلب غير مسموح',
            ], 403);
        }

        // ─── 2. فحص حجم الـ Body ────────────────────────────────────────────
        $contentLength = $request->header('Content-Length', 0);
        if ($contentLength > $this->maxBodySize) {
            return response()->json([
                'success' => false,
                'message' => 'حجم الطلب كبير جداً',
            ], 413);
        }

        // ─── 3. فحص Content-Type للطلبات POST/PUT ───────────────────────────
        if (in_array($request->method(), ['POST', 'PUT', 'PATCH'])) {
            $contentType = $request->header('Content-Type', '');
            if (!str_contains($contentType, 'application/json')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Content-Type يجب أن يكون application/json',
                ], 415);
            }
        }

        // ─── 4. فحص SQL Injection — أنماط فعلية فقط ──────────────────────────
        if ($this->hasSqlInjection($request)) {
            Log::warning('API: محاولة SQL Injection', [
                'ip'     => $request->ip(),
                'input'  => $request->all(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'مدخلات غير صالحة',
            ], 400);
        }

        $response = $next($request);

        // ─── 5. إضافة هيدرات الأمان للرد ─────────────────────────────────────
        return $response->withHeaders([
            'X-Content-Type-Options'  => 'nosniff',
            'X-Frame-Options'         => 'DENY',
            'X-XSS-Protection'        => '1; mode=block',
            'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains',
            'Referrer-Policy'         => 'no-referrer',
            'Cache-Control'           => 'no-store, no-cache, must-revalidate',
            'Pragma'                  => 'no-cache',
        ]);
    }

    private function isSuspiciousAgent(Request $request): bool
    {
        $agent = strtolower($request->userAgent() ?? '');

        foreach ($this->blockedAgents as $blocked) {
            if (str_contains($agent, $blocked)) {
                return true;
            }
        }

        return false;
    }

    private function hasSqlInjection(Request $request): bool
    {
        // أنماط SQL Injection الفعلية فقط — لا نحظر كلمات عادية مثل UPDATE/SELECT في وصف المشكلة
        $patterns = [
            '/\bUNION\b\s+(ALL\s+)?\bSELECT\b/i',       // UNION SELECT injection
            '/[\'\"]\s*(OR|AND)\s*[\'\"0-9]\s*[=<>]/i',   // Tautology: ' OR '1'='1
            '/(-{2}|\/\*)\s*$/im',                         // Comment injection at end of line
            '/;\s*(DROP|ALTER|TRUNCATE|CREATE)\b/i',       // Stacked destructive queries
            '/\bxp_\w+/i',                                 // SQL Server stored procedures
        ];

        $inputs = array_values(array_filter($request->all(), 'is_string'));

        foreach ($inputs as $value) {
            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $value)) {
                    return true;
                }
            }
        }

        return false;
    }
}
