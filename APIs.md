# Address API Documentation

## Base URL

```
https://support.moheye.net/api
```

## Authentication

جميع الـ endpoints تتطلب توثيق:

```
Authorization: Bearer {token}
```

***

# 1) login

جلب جميع عناوين العميل مرتبة بحيث يظهر العنوان الافتراضي أولاً.

## Endpoint

```
Post /auth/login
```
## Request Body
---
```json
{
    "phone":"7xxxxxxx",
    "password":"pxxxxxx"
}
```
---
***

## Success Response (200)

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
            "position": "office_manager",
            "priority": "low",
            "department": {
                "id": 6,
                "name": "الموارد "
            }
        }
    }
}
```

***

# 2) Create Address

إنشاء عنوان جديد. إذا كان أول عنوان للعميل يتم تعيينه تلقائياً كعنوان افتراضي.

## Endpoint

```
POST /addresses
```

## Request Body

| الحقل | النوع | مطلوب | الوصف |
|---|---|---|---|
| `title` | string | ✅ | عنوان مختصر للموقع |
| `description` | string | ❌ | وصف تفصيلي للعنوان |
| `latitude` | numeric | ✅ | خط العرض |
| `longitude` | numeric | ✅ | خط الطول |

### مثال

```json
{
    "title": "البيت",
    "description": "عدن المنصوره - شارع 90 بجانب مطعم الطويل",
    "latitude": 84.187524,
    "longitude": 44.548
}
```

***

## Success Response (201)

```json
{
    "status": true,
    "message": "تم إضافة العنوان بنجاح",
    "address": {
        "id": 8,
        "customer_id": 3,
        "title": "البيت",
        "description": "عدن المنصوره - شارع 90 بجانب مطعم الطويل",
        "latitude": 84.187524,
        "longitude": 44.548,
        "status": "active",
        "is_default": false,
        "created_at": "2026-04-19T22:00:00.000000Z",
        "updated_at": "2026-04-19T22:00:00.000000Z"
    }
}
```

> **ملاحظة:** إذا كان هذا أول عنوان للعميل سيكون `is_default: true` تلقائياً.

***

## Error Response (422)

```json
{
    "status": false,
    "errors": {
        "title": ["The title field is required."],
        "latitude": ["The latitude field is required."],
        "longitude": ["The longitude field is required."]
    }
}
```

***

# 3) Toggle Address Status

تبديل حالة العنوان بين `active` و `inactive`.

## Endpoint

```
PATCH /addresses/{address}/status
```

## Path Parameters

| المعامل | النوع | الوصف |
|---|---|---|
| `address` | integer | معرّف العنوان |

***

## Success Response (200)

```json
{
    "status": true,
    "message": "تم تحديث الحالة",
    "address": {
        "id": 7,
        "customer_id": 3,
        "title": "البيت",
        "description": "عدن المنصوره - شارع 90 بجانب مطعم الطويل",
        "latitude": 84.187524,
        "longitude": 44.548,
        "status": "inactive",
        "is_default": true,
        "created_at": "2026-04-18T23:45:00.000000Z",
        "updated_at": "2026-04-19T22:05:00.000000Z"
    }
}
```

***

## Error Response (403)

```json
{
    "status": false,
    "message": "غير مصرح"
}
```

***

# 4) Set Default Address

تعيين عنوان معين كعنوان افتراضي. يتم إلغاء الافتراضي من جميع العناوين الأخرى تلقائياً.

## Endpoint

```
PATCH /addresses/{address}/default
```

## Path Parameters

| المعامل | النوع | الوصف |
|---|---|---|
| `address` | integer | معرّف العنوان المراد تعيينه كافتراضي |

***

## Success Response (200)

```json
{
    "status": true,
    "message": "تم تعيين العنوان الافتراضي",
    "address": {
        "id": 6,
        "customer_id": 3,
        "title": "العمل",
        "description": "صنعاء - شارع الستين",
        "latitude": 15.369445,
        "longitude": 44.191007,
        "status": "inactive",
        "is_default": true,
        "created_at": "2026-04-17T10:00:00.000000Z",
        "updated_at": "2026-04-19T22:10:00.000000Z"
    }
}
```

> **ملاحظة:** يتم تعيين `is_default: false` على جميع العناوين الأخرى تلقائياً قبل تعيين الجديد.

***

## Error Response (403)

```json
{
    "status": false,
    "message": "غير مصرح"
}
```

***

# ملخص الـ Endpoints

| Method | Endpoint | الوصف |
|---|---|---|
| `GET` | `/addresses` | جلب جميع العناوين |
| `POST` | `/addresses` | إضافة عنوان جديد |
| `PATCH` | `/addresses/{address}/status` | تبديل حالة العنوان |
| `PATCH` | `/addresses/{address}/default` | تعيين عنوان افتراضي |

***

# Address Object

| الحقل | النوع | الوصف |
|---|---|---|
| `id` | integer | معرّف العنوان |
| `customer_id` | integer | معرّف العميل |
| `title` | string | عنوان مختصر |
| `description` | string\|null | وصف تفصيلي |
| `latitude` | numeric | خط العرض |
| `longitude` | numeric | خط الطول |
| `status` | string | `active` أو `inactive` |
| `is_default` | boolean | هل هو العنوان الافتراضي |
| `created_at` | datetime | تاريخ الإنشاء |
| `updated_at` | datetime | تاريخ آخر تعديل |
