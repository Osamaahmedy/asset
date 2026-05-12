<?php
// app/Http/Requests/Api/MaintenanceRequestStoreRequest.php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MaintenanceRequestStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'asset_id'            => 'required|exists:assets,id',
            'problem_date'        => 'required|date|before_or_equal:today',
            'problem_description' => 'required|string|min:10|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'asset_id.required'            => 'يجب اختيار الأصل',
            'asset_id.exists'              => 'الأصل المحدد غير موجود',
            'problem_date.required'        => 'تاريخ المشكلة مطلوب',
            'problem_date.before_or_equal' => 'لا يمكن أن يكون التاريخ في المستقبل',
            'problem_description.required' => 'وصف المشكلة مطلوب',
            'problem_description.min'      => 'وصف المشكلة يجب أن يكون 10 أحرف على الأقل',
        ];
    }

    // إرجاع JSON عند فشل التحقق
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'خطأ في البيانات المدخلة',
            'errors'  => $validator->errors(),
        ], 422));
    }
}
