<!DOCTYPE html>
<html lang="ar" dir="rtl" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <title>حول نظام إدارة الأصول</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary:       #01696f;
      --primary-light: rgba(1, 105, 111, 0.09);
      --primary-mid:   rgba(1, 105, 111, 0.18);
      --radius:        1.1rem;
      --transition:    0.28s ease;
    }

    * { box-sizing: border-box; }

    body {
      font-family: 'Cairo', sans-serif;
      transition: background-color 0.3s, color 0.3s;
      padding-top: 40px;
      padding-bottom: 80px;
    }

    /* ── Dark mode ───────────────────────────────────── */
    [data-bs-theme="dark"] { background-color: #0f0f0f; color: #e8e8e8; }
    [data-bs-theme="dark"] .card-feat     { background: #181818; border-color: rgba(255,255,255,.07); }
    [data-bs-theme="dark"] .hero-box      { background: #161616; border-color: rgba(255,255,255,.07); }
    [data-bs-theme="dark"] .stat-box      { background: #181818; border-color: rgba(255,255,255,.07); }
    [data-bs-theme="dark"] .text-muted    { color: #999 !important; }
    [data-bs-theme="dark"] .divider-line  { border-color: rgba(255,255,255,.08); }
    [data-bs-theme="dark"] .btn-outline-secondary { color:#bbb; border-color:#444; }
    [data-bs-theme="dark"] .btn-outline-secondary:hover { background:#222; color:#fff; }

    /* ── Hero box ────────────────────────────────────── */
    .hero-box {
      background: #fff;
      border: 1px solid rgba(0,0,0,.07);
      border-radius: var(--radius);
      padding: 2.4rem 2.6rem;
      position: relative;
      overflow: hidden;
      box-shadow: 0 6px 28px rgba(0,0,0,.06);
      margin-bottom: 1.8rem;
    }
    .hero-box::before {
      content: "";
      position: absolute;
      top: -60px; left: -60px;
      width: 220px; height: 220px;
      background: radial-gradient(circle, var(--primary-light), transparent 70%);
      pointer-events: none;
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: var(--primary-light);
      color: var(--primary);
      border: 1px solid var(--primary-mid);
      padding: 5px 14px;
      border-radius: 999px;
      font-size: .85rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }
    .hero-title {
      font-size: clamp(1.7rem, 2.5vw + 1rem, 2.6rem);
      font-weight: 800;
      line-height: 1.3;
      margin-bottom: .8rem;
    }
    .hero-desc {
      font-size: 1rem;
      color: #666;
      max-width: 640px;
      margin-bottom: 1.6rem;
      line-height: 1.8;
    }

    /* ── Stats row ───────────────────────────────────── */
    .stat-box {
      background: #fff;
      border: 1px solid rgba(0,0,0,.07);
      border-radius: var(--radius);
      padding: 1.2rem 1.4rem;
      box-shadow: 0 3px 14px rgba(0,0,0,.04);
      display: flex;
      align-items: center;
      gap: 14px;
    }
    .stat-icon {
      width: 48px; height: 48px;
      border-radius: .75rem;
      background: var(--primary-light);
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3rem;
      flex-shrink: 0;
    }
    .stat-val {
      font-size: 1.5rem;
      font-weight: 800;
      line-height: 1;
      color: var(--primary);
    }
    .stat-lbl {
      font-size: .82rem;
      color: #888;
      margin-top: 3px;
    }

    /* ── Section head ────────────────────────────────── */
    .section-head { margin-bottom: 1.4rem; }
    .section-head h2 {
      font-size: 1.45rem;
      font-weight: 800;
      margin-bottom: .3rem;
    }
    .section-head p { color: #888; font-size: .93rem; margin: 0; }

    .divider-line {
      border-top: 1px solid rgba(0,0,0,.08);
      margin: 2.2rem 0;
    }

    /* ── Feature cards ───────────────────────────────── */
    .card-feat {
      background: #fff;
      border: 1px solid rgba(0,0,0,.07);
      border-radius: var(--radius);
      padding: 1.5rem 1.6rem;
      height: 100%;
      box-shadow: 0 3px 14px rgba(0,0,0,.04);
      transition: transform var(--transition), box-shadow var(--transition), border-color var(--transition);
    }
    .card-feat:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 30px rgba(0,0,0,.09);
      border-color: var(--primary-mid);
    }
    .feat-icon {
      width: 46px; height: 46px;
      background: var(--primary-light);
      color: var(--primary);
      border-radius: .75rem;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.25rem;
      margin-bottom: 1rem;
    }
    .card-feat h5 { font-size: 1rem; font-weight: 800; margin-bottom: .5rem; }
    .card-feat p  { font-size: .9rem; color: #777; margin: 0; line-height: 1.7; }

    [data-bs-theme="dark"] .card-feat p,
    [data-bs-theme="dark"] .hero-desc,
    [data-bs-theme="dark"] .stat-lbl { color: #999; }

    /* ── Buttons ─────────────────────────────────────── */
    .btn-primary-custom {
      background: var(--primary);
      color: #fff;
      border: none;
      border-radius: 999px;
      padding: 10px 24px;
      font-family: 'Cairo', sans-serif;
      font-weight: 700;
      font-size: .95rem;
      transition: background var(--transition), transform var(--transition);
      display: inline-flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
    }
    .btn-primary-custom:hover { background: #0c4e54; color: #fff; transform: translateY(-1px); }

    .btn-outline-secondary {
      border-radius: 999px;
      font-family: 'Cairo', sans-serif;
      font-weight: 700;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .topbar { margin-bottom: 1.8rem; }
    .switch-icon { font-size: 1.1rem; }
    .hover-primary:hover {
      color: var(--primary) !important;
      transition: color var(--transition);
    }
  </style>
</head>
<body>
<div class="container">

  {{-- ── Top bar ─────────────────────────────────────── --}}
  <div class="topbar d-flex justify-content-between align-items-center" data-aos="fade-down">
    <a href="{{ route('filament.admin.pages.dashboard') }}" class="btn btn-outline-secondary btn-sm">
      <i class="bi bi-grid-1x2-fill"></i> لوحة التحكم
    </a>
    <button id="themeToggle" class="btn btn-outline-secondary btn-sm" aria-label="تبديل الوضع">
      <i class="bi bi-moon-stars-fill switch-icon"></i>
    </button>
  </div>

  {{-- ── Hero ────────────────────────────────────────── --}}
  <div class="hero-box" data-aos="fade-up">
    <span class="hero-badge">
      <i class="bi bi-shield-check-fill"></i> إدارة مركزية وآمنة
    </span>
    <h1 class="hero-title">نظام إدارة الأصول</h1>
    <p class="hero-desc">
      منصة متكاملة لتسجيل الأصول، ربطها بالهيكل الإداري، متابعة الصيانة الدورية،
      أرشفة الوثائق، وإدارة طلبات الموظفين — كل ذلك بصلاحيات واضحة ورؤية شاملة.
    </p>
    <a href="{{ route('filament.admin.pages.dashboard') }}" class="btn-primary-custom">
      <i class="bi bi-box-arrow-in-left"></i> الدخول إلى النظام
    </a>
  </div>

  {{-- ── Stats ───────────────────────────────────────── --}}
  <div class="row g-3 mb-4" data-aos="fade-up" data-aos-delay="60">
    <div class="col-6 col-md-3">
      <div class="stat-box">
        <div class="stat-icon"><i class="bi bi-hdd-stack-fill"></i></div>
        <div>
          <div class="stat-val">12</div>
          <div class="stat-lbl">ميزة رئيسية</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-box">
        <div class="stat-icon"><i class="bi bi-diagram-3-fill"></i></div>
        <div>
          <div class="stat-val">3</div>
          <div class="stat-lbl">مستويات إدارية</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-box">
        <div class="stat-icon"><i class="bi bi-phone-fill"></i></div>
        <div>
          <div class="stat-val">API</div>
          <div class="stat-lbl">تكامل مع التطبيقات</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="stat-box">
        <div class="stat-icon"><i class="bi bi-person-lock"></i></div>
        <div>
          <div class="stat-val">RBAC</div>
          <div class="stat-lbl">صلاحيات متعددة</div>
        </div>
      </div>
    </div>
  </div>

  <hr class="divider-line">

  {{-- ── Features ────────────────────────────────────── --}}
  <div class="section-head" data-aos="fade-up">
    <h2>المزايا الرئيسية</h2>
    <p>نظرة تفصيلية على الوظائف الفعلية المتوفرة في النظام.</p>
  </div>

  <div class="row g-4">
    @php
    $features = [
      ['icon' => 'bi-hdd-network-fill',             'title' => 'سجل شامل لكل أصل',          'desc' => 'حفظ الاسم، الرقم التسلسلي، النوع، السعر، المورد، تاريخ الشراء، الصور والمستندات ضمن بطاقة واحدة.'],
      ['icon' => 'bi-building',                      'title' => 'ربط الأصل بالمكتب',         'desc' => 'كل أصل مرتبط بمكتب ضمن هيكل إداري: قطاع ← إدارة ← مكتب، مما يُسهّل الفهرسة والاستعلام.'],
      ['icon' => 'bi-person-badge-fill',             'title' => 'الموظف المسؤول عن الأصل',   'desc' => 'إسناد الأصل لموظف معين لتوضيح المسؤولية وسرعة الوصول لبيانات التواصل.'],
      ['icon' => 'bi-wrench-adjustable-circle-fill', 'title' => 'جدولة الصيانة الدورية',     'desc' => 'إدارة حالة الصيانة، آخر تاريخ، دورة التكرار بالأشهر، وموعد الاستحقاق القادم.'],
      ['icon' => 'bi-send-check-fill',               'title' => 'طلبات صيانة إلكترونية',     'desc' => 'إرسال طلب من الموظف مع وصف المشكلة والتاريخ، مع منع تكرار الطلبات المعلقة لنفس الأصل.'],
      ['icon' => 'bi-clock-history',                 'title' => 'سجل تاريخي للصيانة',        'desc' => 'عرض سجل كامل لعمليات الصيانة السابقة داخل صفحة الأصل للتقييم وصنع القرار.'],
      ['icon' => 'bi-person-lock',                   'title' => 'صلاحيات مبنية على الأدوار', 'desc' => 'عرض البيانات حسب الصلاحيات المسندة لكل مستخدم مع تحكم كامل في العمليات الحساسة.'],
      ['icon' => 'bi-file-earmark-text-fill',        'title' => 'أرشفة الوثائق والمرفقات',   'desc' => 'رفع الفواتير، العقود، وأدلة الاستخدام وربطها مباشرة ببطاقة الأصل للرجوع إليها.'],
      ['icon' => 'bi-diagram-3-fill',                'title' => 'الهيكل الإداري الكامل',      'desc' => 'ربط الأصل بالمكتب ثم الإدارة ثم القطاع يُتيح تقارير وفلترة دقيقة على جميع المستويات.'],
      ['icon' => 'bi-plug-fill',                     'title' => 'واجهات API للتطبيقات',      'desc' => 'الأصول، طلبات الصيانة، والمصادقة متاحة عبر API لتسهيل الربط مع تطبيق الموظفين.'],
      ['icon' => 'bi-images',                        'title' => 'صور وملفات موثّقة',          'desc' => 'رفع صور واضحة للأصل مع ملفات الضمان والعقود للرجوع إليها عند الصيانة أو النزاعات.'],
      ['icon' => 'bi-bar-chart-steps',               'title' => 'رؤية تشغيلية أفضل',         'desc' => 'تتبع حالات الأصول والطلبات يُساعد الإدارة على تحديد الأعطال المتكررة ونقاط التحسين.'],
    ];
    @endphp

    @foreach($features as $index => $feature)
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ 60 + ($index * 45) }}">
        <div class="card-feat">
          <div class="feat-icon">
            <i class="bi {{ $feature['icon'] }}"></i>
          </div>
          <h5>{{ $feature['title'] }}</h5>
          <p>{{ $feature['desc'] }}</p>
        </div>
      </div>
    @endforeach
  </div>

  {{-- ── Footer ──────────────────────────────────────── --}}
  <footer class="mt-5 pt-4 border-top text-center text-muted" data-aos="fade-up">
    <p class="mb-2">© {{ date('Y') }} نظام إدارة الأصول. جميع الحقوق محفوظة.</p>
    <div class="d-flex justify-content-center gap-3">
      <a href="{{ route('privacy-policy') }}" class="text-decoration-none text-muted hover-primary">سياسة الخصوصية والسياسات</a>
      <span>•</span>
      <a href="{{ route('filament.admin.pages.dashboard') }}" class="text-decoration-none text-muted hover-primary">لوحة التحكم</a>
    </div>
  </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ once: true, duration: 720, offset: 30 });

  const toggle = document.getElementById('themeToggle');
  const icon   = toggle.querySelector('i');
  const html   = document.documentElement;

  const applyTheme = (dark) => {
    html.setAttribute('data-bs-theme', dark ? 'dark' : 'light');
    icon.className = dark ? 'bi bi-sun-fill switch-icon' : 'bi bi-moon-stars-fill switch-icon';
  };

  let isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
  applyTheme(isDark);
  toggle.addEventListener('click', () => { isDark = !isDark; applyTheme(isDark); });
</script>
</body>
</html>
