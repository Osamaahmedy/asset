# API Documentation — Support System
**Base URL:** `https://support.moheye.net/api`

---

## Authentication

جميع الـ endpoints (عدا Login) تتطلب:

```
Authorization: Bearer {token}
Content-Type: application/json
Accept: application/json
```

---

## 1. Login

**`POST /auth/login`**

لا يتطلب توثيقاً مسبقاً. مقيّد بـ **5 محاولات / دقيقة** لكل IP.

### Request Body

```json
{
  "phone": "7xxxxxxxx",
  "password": "pxxxxxxxx"
}
```

| الحقل | النوع | مطلوب | الوصف |
|-------|-------|-------|-------|
| `phone` | string | ✅ | رقم هاتف الموظف |
| `password` | string | ✅ | كلمة المرور |

### Success Response `200`

```json
{
  "success": true,
  "message": "تم تسجيل الدخول بنجاح",
  "data": {
    "token": "kyPhxWAW1yyz3Tv9J0IrXCpGin8H3FqTBRqhNoLme5j3acuXMbPvcD5BrdaA",
    "employee": {
      "id": 3,
      "name": "مجد معاذ",
      "phone": "782532962",
      "position": "office_manager"
    }
  }
}
```

### Error Responses

| الكود | الحالة | الرسالة |
|-------|--------|---------|
| `401` | بيانات خاطئة | `"رقم الهاتف أو كلمة المرور غير صحيحة"` |
| `429` | تجاوز الحد | `"تم تجاوز الحد المسموح به من الطلبات"` |

---

## 2. Profile

**`GET /auth/profile`**

جلب بيانات الموظف الحالي مع المكتب والإدارة والقطاع.

### Request

لا يحتاج Body.

### Success Response `200`

```json
{
  "success": true,
  "data": {
    "id": 3,
    "name": "مجد معاذ",
    "phone": "782532962",
    "position": "office_manager",
    "department": {
      "id": 6,
      "name": "الموارد البشرية"
    },
    "administration": {
      "id": 2,
      "name": "إدارة الشؤون الإدارية"
    },
    "sector": {
      "id": 1,
      "name": "القطاع الإداري"
    }
  }
}
```

---

## 3. Logout

**`POST /auth/logout`**

إلغاء الجلسة الحالية وحذف التوكن.

### Request

لا يحتاج Body، لكن **يجب** إرسال الهيدر:
```
Content-Type: application/json
```

### Success Response `200`

```json
{
  "success": true,
  "message": "تم تسجيل الخروج بنجاح"
}
```

---

## 4. Assets — قائمة الأصول

**`GET /assets`**

جلب جميع أصول مكتب الموظف الحالي.

### Request

لا يحتاج Body.

### Success Response `200`

```json
{
    "success": true,
    "total": 1,
    "data": [
        {
            "id": 27,
            "name": "phone",
            "serial_number": "ASSET-6A044F4460C12",
            "price": "5000.00",
            "vendor": "ali",
            "purchase_date": "2026-05-13",
            "type": {
                "id": 2,
                "name": "Tv"
            },
            "department": {
                "id": 6,
                "name": "الموارد "
            },
            "administration": {
                "id": 2,
                "name": "التصديق"
            },
            "sector": {
                "id": 2,
                "name": "قطاع البعثات"
            },
            "assigned_to": {
                "id": 3,
                "name": "مجد معاذ",
                "phone": "782532962",
                "position": "office_manager"
            },
            "maintenance": {
                "status": "✅ Good",
                "last_date": "2026-05-13",
                "cycle_months": 3,
                "due_date": "2026-08-13"
            },
            "created_at": "2026/05/13"
        }
    ]
}
```

### Error Responses

| الكود | الحالة | الرسالة |
|-------|--------|---------|
| `403` | لا يوجد مكتب | `"الموظف غير مرتبط بأي مكتب"` |

---

## 5. Assets — تفاصيل أصل واحد

**`GET /assets/{id}`**

جلب تفاصيل أصل محدد يخص مكتب الموظف.

### Path Parameters

| المعامل | النوع | الوصف |
|---------|-------|-------|
| `id` | integer | معرّف الأصل |

### Success Response `200`

نفس بنية الأصل أعلاه داخل `data` مباشرةً.

```json
{
  "success": true,
  "data": { ... }
}
```

### Error Responses

| الكود | الحالة | الرسالة |
|-------|--------|---------|
| `404` | غير موجود أو لا صلاحية | `"الأصل غير موجود أو لا تملك صلاحية الوصول إليه"` |

---

## 6. Maintenance Requests — إرسال طلب صيانة

**`POST /maintenance-requests`**

إنشاء طلب صيانة جديد لأصل تابع لمكتب الموظف.

### Request Body

```json
{
  "asset_id": 5,
  "problem_date": "2024/07/01",
  "problem_description": "الشاشة تعرض خطوطاً رأسية عند التشغيل"
}
```

| الحقل | النوع | مطلوب | القيود |
|-------|-------|-------|--------|
| `asset_id` | integer | ✅ | يجب أن يكون موجوداً في `assets` |
| `problem_date` | date | ✅ | `Y-m-d` — لا يجوز أن يكون في المستقبل |
| `problem_description` | string | ✅ | بين 10 و 1000 حرف |

### Success Response `201`

```json
{
  "success": true,
  "message": "تم إرسال طلب الصيانة بنجاح",
  "data": {
    "id": 18,
    "problem_date": "2024/07/01",
    "problem_description": "الشاشة تعرض خطوطاً رأسية عند التشغيل",
    "status_label": "قيد الانتظار",
    "created_at": "2024/07/02 - 10:30 AM",
    "submitted_by": {
      "id": 3,
      "name": "مجد معاذ",
      "phone": "782532962",
      "position": "office_manager"
    },
    "asset": {
      "id": 5,
      "name": "حاسوب محمول Dell",
      "serial_number": "SN-2024-00123",
      "assigned_to": {
        "id": 3,
        "name": "مجد معاذ"
      }
    },
    "department": {
      "id": 6,
      "name": "الموارد البشرية"
    },
    "administration": {
      "id": 2,
      "name": "إدارة الشؤون الإدارية"
    },
    "sector": {
      "id": 1,
      "name": "القطاع الإداري"
    }
  }
}
```

### Error Responses

| الكود | الحالة | الرسالة |
|-------|--------|---------|
| `403` | الأصل ليس من مكتبك | `"الأصل غير موجود أو لا ينتمي لمكتبك"` |
| `409` | يوجد طلب معلق | `"يوجد طلب صيانة قيد الانتظار أو مؤجل لهذا الأصل بالفعل"` |
| `422` | خطأ في البيانات | انظر جدول أخطاء الـ Validation أدناه |

#### أخطاء Validation `422`

```json
{
  "success": false,
  "message": "خطأ في البيانات المدخلة",
  "errors": {
    "asset_id": ["يجب اختيار الأصل"],
    "problem_date": ["تاريخ المشكلة مطلوب"],
    "problem_description": ["وصف المشكلة يجب أن يكون 10 أحرف على الأقل"]
  }
}
```

---

## 7. Maintenance Requests — طلباتي

**`GET /maintenance-requests`**

جلب جميع طلبات الصيانة المرسَلة من الموظف الحالي.

### Request

لا يحتاج Body.

### Success Response `200`

```json
{
  "success": true,
  "total": 3,
  "data": [
    {
      "id": 18,
      "problem_date": "2024/07/01",
      "problem_description": "الشاشة تعرض خطوطاً رأسية عند التشغيل",
      "status_label": "قيد الانتظار",
      "created_at": "2024/07/02 - 10:30 AM",
      "submitted_by": { ... },
      "asset": { ... },
      "department": { ... },
      "administration": { ... },
      "sector": { ... }
    }
  ]
}
```

---

## 8. Maintenance Requests — تفاصيل طلب واحد

**`GET /maintenance-requests/{id}`**

جلب تفاصيل طلب صيانة محدد يخص الموظف الحالي.

### Path Parameters

| المعامل | النوع | الوصف |
|---------|-------|-------|
| `id` | integer | معرّف الطلب |

### Success Response `200`

نفس بنية الطلب أعلاه داخل `data` مباشرةً.

### Error Responses

| الكود | الحالة | الرسالة |
|-------|--------|---------|
| `404` | غير موجود | `"الطلب غير موجود"` |

---

## قيم ثابتة (Enums)

### حالة طلب الصيانة — `status_label`

| القيمة الداخلية | التسمية المعروضة |
|----------------|-----------------|
| `pending` | قيد الانتظار |
| `postponed` | مؤجل |
| *(قيم أخرى حسب النظام)* | - |

### منصب الموظف — `position`

| القيمة |
|--------|
| `office_manager` |
| *(قيم أخرى حسب النظام)* |

---

## أخطاء عامة

| الكود | السبب | الرسالة |
|-------|-------|---------|
| `401` | لا يوجد توكن | `"الجلسة مفقودة"` |
| `401` | توكن غير صالح | `"الجلسة غير صالحة"` |
| `403` | User-Agent مشبوه | `"طلب غير مسموح"` |
| `403` | حظر بسبب نشاط مشبوه | `"تم حظر هذا الحساب مؤقتاً"` |
| `413` | Body أكبر من 10KB | `"حجم الطلب كبير جداً"` |
| `415` | Content-Type خاطئ | `"Content-Type يجب أن يكون application/json"` |
| `429` | تجاوز حد الطلبات | `"تم تجاوز الحد المسموح به من الطلبات"` |

---

## حدود Rate Limiting

| النوع | الحد | النافذة الزمنية | يُطبَّق على |
|-------|------|----------------|------------|
| `login` | 5 طلبات | دقيقة واحدة | `POST /auth/login` |
| `read` | 60 طلباً | دقيقة واحدة | جميع GET endpoints |
| `write` | 20 طلباً | دقيقة واحدة | POST /auth/logout, POST /maintenance-requests |
| `global` | 100 طلب | دقيقة واحدة | جميع الطلبات |

> بعد 10 مخالفات متراكمة → حظر تلقائي لمدة ساعة كاملة.
