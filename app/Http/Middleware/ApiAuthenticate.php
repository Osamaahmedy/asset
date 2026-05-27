<?php
// app/Http/Middleware/ApiAuthenticate.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Employee;

class ApiAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'الجلسة مفقودة',
            ], 401);
        }

        // مقارنة التوكن المُشفّر (SHA-256)
        $hashedToken = hash('sha256', $token);
        $employee = Employee::where('api_token', $hashedToken)->first();

        if (!$employee) {
            return response()->json([
                'success' => false,
                'message' => 'الجلسة غير صالحة',
            ], 401);
        }

        // نضع الموظف في الـ request لاستخدامه في Controllers
        $request->merge(['auth_employee' => $employee]);
        $request->setUserResolver(fn() => $employee);

        return $next($request);
    }
}
