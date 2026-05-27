<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // ─── Login ───────────────────────────────────────────────────────────────

    public function login(Request $request)
    {
        $request->validate([
            'phone'    => 'required|string',
            'password' => 'required|string',
        ]);

        $employee = Employee::where('phone', $request->phone)->first();

        if (!$employee || !Hash::check($request->password, $employee->password)) {
            return response()->json([
                'success' => false,
                'message' => 'رقم الهاتف أو كلمة المرور غير صحيحة',
            ], 401);
        }

        // توليد توكن جديد في كل تسجيل دخول
        $plainToken = Str::random(60);

        // تخزين التوكن مُشفّراً في قاعدة البيانات
        $employee->forceFill([
            'api_token' => hash('sha256', $plainToken),
        ])->save();

        return response()->json([
            'success' => true,
            'message' => 'تم تسجيل الدخول بنجاح',
            'data'    => [
                'token'    => $plainToken,
                'employee' => [
                    'id'         => $employee->id,
                    'name'       => $employee->name,
                    'phone'      => $employee->phone,
                    'position'   => $employee->position,
                ],
            ],
        ]);
    }

    // ─── Profile ─────────────────────────────────────────────────────────────

    public function profile(Request $request)
    {
        $employee = $request->user();

        $employee->load('department.administration.sector');

        return response()->json([
            'success' => true,
            'data'    => [
                'id'       => $employee->id,
                'name'     => $employee->name,
                'phone'    => $employee->phone,
                'position' => $employee->position,
                'department' => [
                    'id'   => $employee->department?->id,
                    'name' => $employee->department?->name,
                ],
                'administration' => [
                    'id'   => $employee->department?->administration?->id,
                    'name' => $employee->department?->administration?->name,
                ],
                'sector' => [
                    'id'   => $employee->department?->administration?->sector?->id,
                    'name' => $employee->department?->administration?->sector?->name,
                ],
            ],
        ]);
    }

    // ─── Logout ──────────────────────────────────────────────────────────────

    public function logout(Request $request)
    {
        $request->user()->forceFill(['api_token' => null])->save();

        return response()->json([
            'success' => true,
            'message' => 'تم تسجيل الخروج بنجاح',
        ]);
    }
}
