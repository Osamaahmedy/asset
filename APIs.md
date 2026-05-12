# توثيق واجهة برمجة التطبيقات (API)
## نظام إدارة الأصول

**الإصدار:** 1.0.0  
**آخر تحديث:** 2026-05-12  
**Base URL:** `https://yourdomain.com/api`

---

## 📋 جدول المحتويات

1. [المصادقة والأمان](#المصادقة-والأمان)
2. [رموز الاستجابة العامة](#رموز-الاستجابة-العامة)
3. [المصادقة (Auth)](#المصادقة-auth)
   - [تسجيل الدخول](#1-تسجيل-الدخول)
   - [الملف الشخصي](#2-الملف-الشخصي)
   - [تسجيل الخروج](#3-تسجيل-الخروج)
4. [الأصول (Assets)](#الأصول-assets)
   - [قائمة الأصول](#1-قائمة-الأصول)
   - [تفاصيل أصل](#2-تفاصيل-أصل)
5. [طلبات الصيانة (Maintenance Requests)](#طلبات-الصيانة-maintenance-requests)
   - [إرسال طلب صيانة](#1-إرسال-طلب-صيانة)
   - [طلباتي](#2-طلباتي)
   - [تفاصيل طلب](#3-تفاصيل-طلب)
6. [حدود الطلبات (Rate Limiting)](#حدود-الطلبات-rate-limiting)
7. [نماذج البيانات](#نماذج-البيانات)

---

## المصادقة والأمان

### طريقة المصادقة
يستخدم الـ API نظام **Bearer Token** — يُولَّد التوكن عند كل تسجيل دخول ويُخزَّن في قاعدة البيانات.

أضف التوكن في هيدر كل طلب محمي:

```
Authorization: Bearer YOUR_TOKEN_HERE
Content-Type: application/json
```

### طبقات الحماية
| الطبقة | الوصف |
|--------|-------|
| `api.security` | فحص User-Agent، حجم الطلب، Content-Type، SQL Injection |
| `api.throttle` | تحديد عدد الطلبات حسب النوع |
| `api.auth` | التحقق من صحة التوكن |

---

## رموز الاستجابة العامة

| الكود | المعنى |
|-------|--------|
| `200` | نجاح |
| `201` | تم الإنشاء بنجاح |
| `400` | بيانات غير صالحة |
| `401` | غير مصادق — توكن مفقود أو خاطئ |
| `403` | ممنوع — لا تملك الصلاحية |
| `404` | غير موجود |
| `409` | تعارض — يوجد سجل مشابه |
| `413` | حجم الطلب كبير جداً |
| `415` | Content-Type غير مدعوم |
| `422` | فشل التحقق من البيانات |
| `429` | تجاوز حد الطلبات |

### هيكل الاستجابة الموحد

**نجاح:**
```json
{
    "success": true,
    "message": "رسالة اختيارية",
    "data": {}
}
```

**فشل:**
```json
{
    "success": false,
    "message": "وصف الخطأ"
}
```

**فشل التحقق (422):**
```json
{
    "success": false,
    "message": "خطأ في البيانات المدخلة",
    "errors": {
        "field_name": ["رسالة الخطأ"]
    }
}
```

---

## المصادقة (Auth)

### 1. تسجيل الدخول

```
POST /api/auth/login
```

**الحماية:** `api.security` + `api.throttle:login` (5 محاولات/دقيقة)  
**مصادقة مطلوبة:** ❌ لا

#### Body Parameters

| الحقل | النوع | مطلوب | الوصف |
|-------|-------|--------|-------|
| `phone` | string | ✅ | رقم هاتف الموظف |
| `password` | string | ✅ | كلمة المرور |

#### مثال الطلب

```json
{
    "phone": "777123456",
    "password": "secret123"
}
```

#### مثال الاستجابة — نجاح `200`

```json
{
    "success": true,
    "message": "تم تسجيل الدخول بنجاح",
    "data": {
        "token": "xK9mP2qL8nR5vT3wY7uI1oE4aS6dF0gH",
        "employee": {
            "id": 1,
            "name": "أحمد محمد",
            "phone": "777123456",
            "position": "employee",
            "priority": "medium",
            "department": {
                "id": 3,
                "name": "مكتب تقنية المعلومات"
            }
        }
    }
}
```

#### مثال الاستجابة — فشل `401`

```json
{
    "success": false,
    "message": "رقم الهاتف أو كلمة المرور غير صحيحة"
}
```

#### مثال الاستجابة — تجاوز الحد `429`

```json
{
    "success": false,
    "message": "تم تجاوز الحد المسموح به من الطلبات، يرجى الانتظار.",
    "retry_after": "60 ثانية"
}
```

---

### 2. الملف الشخصي

```
GET /api/auth/profile
```

**الحماية:** `api.security` + `api.throttle:read` + `api.auth`  
**مصادقة مطلوبة:** ✅ Bearer Token

#### مثال الاستجابة — نجاح `200`

```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "أحمد محمد",
        "phone": "777123456",
        "position": "employee",
        "priority": "medium",
        "department": {
            "id": 3,
            "name": "مكتب تقنية المعلومات"
        },
        "administration": {
            "id": 2,
            "name": "الإدارة العامة للتقنية"
        },
        "sector": {
            "id": 1,
            "name": "قطاع الخدمات"
        }
    }
}
```

---

### 3. تسجيل الخروج

```
POST /api/auth/logout
```

**الحماية:** `api.security` + `api.throttle:write` + `api.auth`  
**مصادقة مطلوبة:** ✅ Bearer Token

> يُلغى التوكن فوراً ولا يمكن استخدامه بعد هذه العملية.

#### مثال الاستجابة — نجاح `200`

```json
{
    "success": true,
    "message": "تم تسجيل الخروج بنجاح"
}
```

---

## الأصول (Assets)

> جميع النقاط تعرض **أصول مكتب الموظف فقط** — لا يمكن الوصول لأصول مكاتب أخرى.

### 1. قائمة الأصول

```
GET /api/assets
```

**الحماية:** `api.security` + `api.throttle:read` + `api.auth`  
**مصادقة مطلوبة:** ✅ Bearer Token

#### مثال الاستجابة — نجاح `200`

```json
{
    "success": true,
    "total": 2,
    "data": [
        {
            "id": 1,
            "name": "لابتوب Dell",
            "serial_number": "ASSET-6642FC3A1B2E4",
            "price": "1500.00",
            "vendor": "Dell",
            "purchase_date": "2024-01-15",
            "type": {
                "id": 1,
                "name": "حاسوب"
            },
            "department": {
                "id": 3,
                "name": "مكتب تقنية المعلومات"
            },
            "administration": {
                "id": 2,
                "name": "الإدارة العامة للتقنية"
            },
            "sector": {
                "id": 1,
                "name": "قطاع الخدمات"
            },
            "assigned_to": {
                "id": 5,
                "name": "أحمد محمد",
                "phone": "777123456",
                "position": "employee"
            },
            "maintenance": {
                "status": "✅ Good",
                "last_date": "2025-01-10",
                "cycle_months": 6,
                "due_date": "2025-07-10"
            },
            "created_at": "2024/01/15"
        }
    ]
}
```

#### مثال الاستجابة — موظف بدون مكتب `403`

```json
{
    "success": false,
    "message": "الموظف غير مرتبط بأي مكتب"
}
```

---

### 2. تفاصيل أصل

```
GET /api/assets/{id}
```

**الحماية:** `api.security` + `api.throttle:read` + `api.auth`  
**مصادقة مطلوبة:** ✅ Bearer Token

#### Path Parameters

| المعامل | النوع | الوصف |
|---------|-------|-------|
| `id` | integer | معرّف الأصل |

#### مثال الاستجابة — نجاح `200`

```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "لابتوب Dell",
        "serial_number": "ASSET-6642FC3A1B2E4",
        "price": "1500.00",
        "vendor": "Dell",
        "purchase_date": "2024-01-15",
        "type": { "id": 1, "name": "حاسوب" },
        "department": { "id": 3, "name": "مكتب تقنية المعلومات" },
        "administration": { "id": 2, "name": "الإدارة العامة للتقنية" },
        "sector": { "id": 1, "name": "قطاع الخدمات" },
        "assigned_to": {
            "id": 5,
            "name": "أحمد محمد",
            "phone": "777123456",
            "position": "employee"
        },
        "maintenance": {
            "status": "✅ Good",
            "last_date": "2025-01-10",
            "cycle_months": 6,
            "due_date": "2025-07-10"
        },
        ,
        "created_at": "2024/01/15",
       
    }
}
```

#### مثال الاستجابة — غير موجود أو خارج المكتب `404`

```json
{
    "success": false,
    "message": "الأصل غير موجود أو لا تملك صلاحية الوصول إليه"
}
```

---

## طلبات الصيانة (Maintenance Requests)

### 1. إرسال طلب صيانة

```
POST /api/maintenance-requests
```

**الحماية:** `api.security` + `api.throttle:write` + `api.auth`  
**مصادقة مطلوبة:** ✅ Bearer Token

> **ملاحظات مهمة:**
> - الأصل يجب أن ينتمي لمكتب الموظف
> - لا يمكن إرسال طلب لأصل عنده طلب قيد الانتظار أو مؤجل
> - الأولوية تُؤخذ تلقائياً من حساب الموظف

#### Body Parameters

| الحقل | النوع | مطلوب | الوصف | القيود |
|-------|-------|--------|-------|--------|
| `asset_id` | integer | ✅ | معرّف الأصل | يجب أن يكون موجوداً |
| `problem_date` | date | ✅ | تاريخ المشكلة | `Y-m-d` — لا يمكن أن يكون في المستقبل |
| `problem_description` | string | ✅ | وصف المشكلة | 10 — 1000 حرف |

#### مثال الطلب

```json
{
    "asset_id": 1,
    "problem_date": "2026-05-10",
    "problem_description": "الجهاز لا يعمل بشكل صحيح، يتوقف فجأة عند التشغيل"
}
```

#### مثال الاستجابة — نجاح `201`

```json
{
    "success": true,
    "message": "تم إرسال طلب الصيانة بنجاح",
    "data": {
        "id": 10,
        "problem_date": "2026/05/10",
        "problem_description": "الجهاز لا يعمل بشكل صحيح، يتوقف فجأة عند التشغيل",
        "status_label": "🕐 قيد الانتظار",
        "created_at": "2026/05/12 - 10:30 AM",
        "submitted_by": {
            "id": 1,
            "name": "أحمد محمد",
            "phone": "777123456",
            "position": "employee"
        },
        "asset": {
            "id": 1,
            "name": "لابتوب Dell",
            "serial_number": "ASSET-6642FC3A1B2E4",
            "assigned_to": {
                "id": 1,
                "name": "أحمد محمد"
            }
        },
        "department": { "id": 3, "name": "مكتب تقنية المعلومات" },
        "administration": { "id": 2, "name": "الإدارة العامة للتقنية" },
        "sector": { "id": 1, "name": "قطاع الخدمات" }
    }
}
```

#### مثال الاستجابة — طلب موجود مسبقاً `409`

```json
{
    "success": false,
    "message": "يوجد طلب صيانة قيد الانتظار أو مؤجل لهذا الأصل بالفعل"
}
```

#### مثال الاستجابة — أصل خارج المكتب `403`

```json
{
    "success": false,
    "message": "الأصل غير موجود أو لا ينتمي لمكتبك"
}
```

#### مثال الاستجابة — فشل التحقق `422`

```json
{
    "success": false,
    "message": "خطأ في البيانات المدخلة",
    "errors": {
        "asset_id": ["يجب اختيار الأصل"],
        "problem_date": ["لا يمكن أن يكون التاريخ في المستقبل"],
        "problem_description": ["وصف المشكلة يجب أن يكون 10 أحرف على الأقل"]
    }
}
```

---

### 2. طلباتي

```
GET /api/maintenance-requests
```

**الحماية:** `api.security` + `api.throttle:write` + `api.auth`  
**مصادقة مطلوبة:** ✅ Bearer Token

> يعرض طلبات الموظف المسجّل فقط مرتبة من الأحدث للأقدم.

#### مثال الاستجابة — نجاح `200`

```json
{
    "success": true,
    "total": 3,
    "data": [
        {
            "id": 10,
            "problem_date": "2026/05/10",
            "problem_description": "الجهاز لا يعمل بشكل صحيح",
            "status_label": "🕐 قيد الانتظار",
            "created_at": "2026/05/12 - 10:30 AM",
            "submitted_by": {
                "id": 1,
                "name": "أحمد محمد",
                "phone": "777123456",
                "position": "employee"
            },
            "asset": {
                "id": 1,
                "name": "لابتوب Dell",
                "serial_number": "ASSET-6642FC3A1B2E4",
                "assigned_to": { "id": 1, "name": "أحمد محمد" }
            },
            "department": { "id": 3, "name": "مكتب تقنية المعلومات" },
            "administration": { "id": 2, "name": "الإدارة العامة للتقنية" },
            "sector": { "id": 1, "name": "قطاع الخدمات" }
        }
    ]
}
```

---

### 3. تفاصيل طلب

```
GET /api/maintenance-requests/{id}
```

**الحماية:** `api.security` + `api.throttle:write` + `api.auth`  
**مصادقة مطلوبة:** ✅ Bearer Token

#### Path Parameters

| المعامل | النوع | الوصف |
|---------|-------|-------|
| `id` | integer | معرّف الطلب |

#### مثال الاستجابة — نجاح `200`

```json
{
    "success": true,
    "data": {
        "id": 10,
        "problem_date": "2026/05/10",
        "problem_description": "الجهاز لا يعمل بشكل صحيح، يتوقف فجأة عند التشغيل",
        "status_label": "🕐 قيد الانتظار",
        "created_at": "2026/05/12 - 10:30 AM",
        "submitted_by": {
            "id": 1,
            "name": "أحمد محمد",
            "phone": "777123456",
            "position": "employee"
        },
        "asset": {
            "id": 1,
            "name": "لابتوب Dell",
            "serial_number": "ASSET-6642FC3A1B2E4",
            "assigned_to": { "id": 1, "name": "أحمد محمد" }
        },
        "department": { "id": 3, "name": "مكتب تقنية المعلومات" },
        "administration": { "id": 2, "name": "الإدارة العامة للتقنية" },
        "sector": { "id": 1, "name": "قطاع الخدمات" }
    }
}
```

#### مثال الاستجابة — غير موجود `404`

```json
{
    "success": false,
    "message": "الطلب غير موجود"
}
```

---

## حدود الطلبات (Rate Limiting)

| النوع | الحد | نطاق التطبيق |
|-------|------|--------------|
| `login` | 5 طلبات / دقيقة | `POST /auth/login` |
| `read` | 60 طلباً / دقيقة | جميع نقاط GET |
| `write` | 20 طلباً / دقيقة | جميع نقاط POST + logout |

### هيدرات الاستجابة
```
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 45
```

### نظام التصعيد
بعد **10 مخالفات** متراكمة خلال ساعة → **حظر تلقائي لمدة ساعة كاملة**

---

## نماذج البيانات

### حالات الصيانة (Maintenance Status)

| القيمة | المعنى |
|--------|--------|
| `✅ Good` | جيد |
| `🔔 Less than two months` | أقل من شهرين |
| `⚠️ Less than a month` | أقل من شهر |
| `⚠️ Less than a week` | أقل من أسبوع |
| `❌ Overdue` | متأخرة |
| `❓ Unknown` | غير محدد |

### حالات طلب الصيانة (Request Status)

| القيمة | التسمية |
|--------|---------|
| `pending` | 🕐 قيد الانتظار |
| `postponed` | ⏳ مؤجل |
| `completed` | ✅ مكتمل |

### الأولويات (Priority)

| القيمة | التسمية |
|--------|---------|
| `high` | عالي |
| `medium` | متوسط |
| `low` | منخفض |

### المناصب (Position)

| القيمة | التسمية |
|--------|---------|
| `employee` | موظف |
| `office_manager` | مدير مكتب |

---

## ملخص نقاط الـ API

| الطريقة | المسار | الوصف | مصادقة |
|---------|--------|-------|--------|
| `POST` | `/api/auth/login` | تسجيل الدخول | ❌ |
| `GET` | `/api/auth/profile` | الملف الشخصي | ✅ |
| `POST` | `/api/auth/logout` | تسجيل الخروج | ✅ |
| `GET` | `/api/assets` | قائمة الأصول | ✅ |
| `GET` | `/api/assets/{id}` | تفاصيل أصل | ✅ |
| `POST` | `/api/maintenance-requests` | إرسال طلب صيانة | ✅ |
| `GET` | `/api/maintenance-requests` | طلباتي | ✅ |
| `GET` | `/api/maintenance-requests/{id}` | تفاصيل طلب | ✅ |
