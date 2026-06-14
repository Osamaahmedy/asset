<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{


// في AuthController — أضف هذه الدالة الخاصة
private function translatePosition(string $position): string
{
    return match($position) {
        'employee'           => 'موظف',
        'office_manager'     => 'مدير مكتب',
        'purchasing_agent'   => 'أمين المشتريات',
        'maintenance_tech'   => 'فني صيانة',
        // أضف بقية القيم حسب الـ enum الخاص بك
        default              => $position,
    };
}
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
                    'position' => $this->translatePosition($employee->position),
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
                'position' => $this->translatePosition($employee->position),
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
  public function changePassword(Request $request)
{
    $request->validate([
        'new_password' => 'required|string|min:8|confirmed',
    ], [
        'new_password.required'  => 'كلمة المرور الجديدة مطلوبة',
        'new_password.min'       => 'كلمة المرور الجديدة يجب ألا تقل عن 8 أحرف',
        'new_password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
    ]);

    $employee = $request->user();

    if (!$employee) {
        return response()->json([
            'success' => false,
            'message' => 'غير مصرح',
        ], 401);
    }

    $employee->password = $request->new_password;
    $employee->save();

    return response()->json([
        'success' => true,
        'message' => 'تم تغيير كلمة المرور بنجاح',
    ]);
}
}
