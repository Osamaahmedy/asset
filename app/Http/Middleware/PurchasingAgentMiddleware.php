<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PurchasingAgentMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()?->position !== 'purchasing_agent') {
            return response()->json([
                'success' => false,
                'message' => 'ليس لديك صلاحية الوصول — أمين مشتريات فقط',
            ], 403);
        }

        return $next($request);
    }
}
