<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طباعة باركود الأصول</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            min-height: 100vh;
            padding: 30px 20px;
        }

        /* تحسين زر الطباعة */
        .print-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 240px;
            margin: 0 auto 30px auto;
            padding: 16px 32px;
            background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%);
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 14px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            border: none;
            box-shadow: 0 4px 18px rgba(79, 70, 229, 0.35);
            transition: all 0.25s ease-in-out;
        }

        .print-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.45);
            background: linear-gradient(135deg, #4338ca 0%, #2e2685 100%);
        }

        /* ترويسة الصفحة لشكل أكثر احترافية */
        .page-header {
            text-align: center;
            margin-bottom: 25px;
            color: #1f2937;
        }
        .page-header h2 { font-weight: 800; font-size: 22px; }

        /* تنسيق صفحة الـ A4 والمعاينة */
        .page {
            background: white;
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            padding: 10mm;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.06);
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8mm;
            justify-content: center;
        }

        /* ستايل الملصق المطور */
        .label {
            height: 52mm;
            background: #ffffff;
            border: 2px solid #e5e7eb;
            border-radius: 14px;
            padding: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            page-break-inside: avoid;
            position: relative;
            overflow: hidden;
            transition: all 0.2s ease;
        }

        /* خط ملون جانبي جمالي يختفي تلقائياً عند الطباعة للمحافظة على الحبر */
        .label::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 5px;
            height: 100%;
            background: #4f46e5;
        }

        .label:hover {
            border-color: #4f46e5;
            box-shadow: 0 4px 20px rgba(79, 70, 229, 0.08);
        }

        .info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            padding-left: 10px;
        }

        .info-top strong {
            font-size: 15px;
            font-weight: 700;
            display: block;
            margin-bottom: 8px;
            color: #111827;
            line-height: 1.4;
        }

        .meta-item {
            margin-bottom: 4px;
            font-size: 12px;
        }

        .label-text {
            color: #6b7280;
            font-weight: 600;
            margin-left: 4px;
        }

        .value {
            color: #1f2937;
            font-weight: 700;
        }

        /* تمييز السيريال في الاستيكر */
        .serial-box {
            background-color: #f3f4f6;
            padding: 2px 6px;
            border-radius: 6px;
            font-family: monospace;
            font-size: 13px;
        }

        .footer-text {
            font-size: 10px;
            color: #9ca3af;
            font-weight: 600;
            border-top: 1px dashed #e5e7eb;
            padding-top: 6px;
            margin-top: auto;
        }

        /* صندوق الكيو آر */
        .qr-code {
            width: 100px;
            height: 100px;
            background: white;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .qr-code svg {
            width: 100%;
            height: 100%;
        }

        /* إعدادات الطباعة الاحترافية */
        @media print {
            @page {
                size: A4;
                margin: 0;
            }
            body {
                background: white;
                padding: 0;
                margin: 0;
            }
            .page {
                box-shadow: none;
                padding: 10mm;
                margin: 0;
                width: 210mm;
                min-height: 297mm;
                border-radius: 0;
                grid-template-columns: repeat(2, 1fr);
            }
            .no-print {
                display: none !important;
            }
            .label {
                border: 1px dashed #9ca3af; /* حد خفيف جداً يسهل القص مقصات الاستيكرات */
                border-radius: 8px;
                box-shadow: none;
                page-break-inside: avoid;
            }
            .label::before {
                display: none; /* إخفاء الشريط الملون لتوفير الحبر وضمان جودة الفرز */
            }
        }
    </style>
</head>
<body>

    <div class="no-print page-header">
        <button class="print-btn" onclick="window.print()">
            <span>🖨️</span> طباعة ملصقات الجرد
        </button>
    </div>

    <div class="page">
        @foreach($assets as $asset)
        <div class="label">
            <div class="info">
                <div class="info-top">
                    <strong>{{ $asset->name }}</strong>
                    <div class="meta-item">
                        <span class="label-text">الرقم التسلسلي:</span>
                        <span class="value serial-box">{{ $asset->serial_number }}</span>
                    </div>
                    <div class="meta-item">
                        <span class="label-text">المكتب:</span>
                        <span class="value">{{ $asset->department?->name ?? 'غير محدد' }}</span>
                    </div>
                </div>
                <div class="footer-text">نظام إدارة الأصول المتكامل</div>
            </div>
            <div class="qr-code">
                {{-- هنا تم تعديل التوليد ليصبح السيريال نمبر فقط --}}
                {!! QrCode::size(100)->margin(1)->generate($asset->serial_number) !!}
            </div>
        </div>
        @endforeach
    </div>

</body>
</html>
