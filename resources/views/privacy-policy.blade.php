<!DOCTYPE html>
<html lang="ar" dir="rtl" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <title>سياسة الخصوصية والسياسات - نظام إدارة الأصول</title>
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
    [data-bs-theme="dark"] .policy-box    { background: #161616; border-color: rgba(255,255,255,.07); }
    [data-bs-theme="dark"] .section-card   { background: #181818; border-color: rgba(255,255,255,.07); }
    [data-bs-theme="dark"] .text-muted    { color: #999 !important; }
    [data-bs-theme="dark"] .divider-line  { border-color: rgba(255,255,255,.08); }
    [data-bs-theme="dark"] .btn-outline-secondary { color:#bbb; border-color:#444; }
    [data-bs-theme="dark"] .btn-outline-secondary:hover { background:#222; color:#fff; }

    /* ── Policy box ────────────────────────────────────── */
    .policy-box {
      background: #fff;
      border: 1px solid rgba(0,0,0,.07);
      border-radius: var(--radius);
      padding: 2.4rem 2.6rem;
      position: relative;
      overflow: hidden;
      box-shadow: 0 6px 28px rgba(0,0,0,.06);
      margin-bottom: 1.8rem;
    }
    .policy-box::before {
      content: "";
      position: absolute;
      top: -60px; left: -60px;
      width: 220px; height: 220px;
      background: radial-gradient(circle, var(--primary-light), transparent 70%);
      pointer-events: none;
    }
    .policy-badge {
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
    .policy-title {
      font-size: clamp(1.7rem, 2.5vw + 1rem, 2.6rem);
      font-weight: 800;
      line-height: 1.3;
      margin-bottom: .8rem;
    }
    .policy-desc {
      font-size: 1rem;
      color: #666;
      max-width: 740px;
      line-height: 1.8;
    }

    [data-bs-theme="dark"] .policy-desc { color: #999; }

    /* ── Sections ────────────────────────────────────── */
    .section-card {
      background: #fff;
      border: 1px solid rgba(0,0,0,.07);
      border-radius: var(--radius);
      padding: 1.8rem;
      height: 100%;
      box-shadow: 0 3px 14px rgba(0,0,0,.04);
      margin-bottom: 1.5rem;
      transition: border-color var(--transition);
    }
    .section-card:hover {
      border-color: var(--primary-mid);
    }
    .section-icon {
      width: 48px; height: 48px;
      background: var(--primary-light);
      color: var(--primary);
      border-radius: .75rem;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3rem;
      margin-bottom: 1.2rem;
    }
    .section-card h3 {
      font-size: 1.2rem;
      font-weight: 800;
      margin-bottom: 0.8rem;
    }
    .section-card p, .section-card ul {
      font-size: 0.95rem;
      color: #555;
      line-height: 1.8;
      margin-bottom: 0;
    }
    [data-bs-theme="dark"] .section-card p, 
    [data-bs-theme="dark"] .section-card ul { color: #aaa; }

    .divider-line {
      border-top: 1px solid rgba(0,0,0,.08);
      margin: 2.2rem 0;
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
    <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm">
      <i class="bi bi-arrow-right"></i> العودة للرئيسية
    </a>
    <button id="themeToggle" class="btn btn-outline-secondary btn-sm" aria-label="تبديل الوضع">
      <i class="bi bi-moon-stars-fill switch-icon"></i>
    </button>
  </div>

  {{-- ── Hero / Header ────────────────────────────────── --}}
  <div class="policy-box" data-aos="fade-up">
    <span class="policy-badge">
      <i class="bi bi-shield-lock-fill"></i> وثيقة رسمية
    </span>
    <h1 class="policy-title">سياسة الخصوصية والاستخدام</h1>
    <p class="policy-desc">
      توضح هذه الوثيقة سياسة الخصوصية والشروط العامة المتبعة في "نظام إدارة الأصول" لحماية بيانات المستخدمين، كيفية التعامل مع البيانات المرفوعة، والحدود التشغيلية والقانونية لاستخدام المنصة.
    </p>
  </div>

  <div class="divider-line" data-aos="fade-up"></div>

  {{-- ── Policy Sections ───────────────────────────────── --}}
  <div class="row g-4" data-aos="fade-up" data-aos-delay="50">
    
    <div class="col-md-6">
      <div class="section-card">
        <div class="section-icon"><i class="bi bi-folder-fill"></i></div>
        <h3>1. جمع البيانات واستخدامها</h3>
        <p>
          يقوم نظام إدارة الأصول بجمع بعض البيانات اللازمة لتسيير العمل وربط العهد بالموظفين، وتشمل:
        </p>
        <ul class="mt-2 pe-3">
          <li>بيانات الحساب الشخصي (الاسم، البريد الإلكتروني، الدور الإداري).</li>
          <li>بيانات العهد والأصول المسندة (الرقم التسلسلي، الموقع، وتفاصيل الأصل).</li>
          <li>سجلات طلبات الصيانة والتقارير المرفوعة من قبل المستخدمين.</li>
        </ul>
      </div>
    </div>

    <div class="col-md-6">
      <div class="section-card">
        <div class="section-icon"><i class="bi bi-shield-fill-check"></i></div>
        <h3>2. أمن وحماية المعلومات</h3>
        <p>
          نلتزم بتطبيق أعلى معايير الأمان المتاحة لحماية بيانات النظام من الوصول غير المصرح به أو التعديل أو الإفشاء. يتم تخزين البيانات بشكل آمن وتشفير الاتصالات والتوكنات الخاصة بجلسات المستخدمين لضمان سرية المعاملات التشغيلية.
        </p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="section-card">
        <div class="section-icon"><i class="bi bi-database-fill-lock"></i></div>
        <h3>3. مشاركة البيانات مع أطراف خارجية</h3>
        <p>
          تُعامل جميع البيانات المسجلة في هذا النظام بسرية تامة وتستخدم حصرياً داخل المؤسسة لتنظيم وحصر العهد وتتبع عمليات الصيانة. لا يتم بيع أو مشاركة أو إفشاء أي جزء من هذه البيانات مع أي جهة خارجية لأغراض تجارية أو دعائية.
        </p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="section-card">
        <div class="section-icon"><i class="bi bi-gear-fill"></i></div>
        <h3>4. صلاحيات المستخدمين (RBAC)</h3>
        <p>
          يعتمد النظام على نموذج التحكم بالوصول المستند إلى الأدوار (RBAC). يتم تحديد الصلاحيات بدقة من قبل المسؤولين، ويُحظر على أي مستخدم محاولة تجاوز هذه الصلاحيات أو محاولة الوصول إلى لوحات تحكم غير مصرح بها.
        </p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="section-card">
        <div class="section-icon"><i class="bi bi-info-circle-fill"></i></div>
        <h3>5. التغييرات على هذه السياسة</h3>
        <p>
          قد نقوم بتحديث سياسة الخصوصية والاستخدام من وقت لآخر لمواكبة التحديثات البرمجية أو المتطلبات الإدارية للمؤسسة. سيتم إخطار المستخدمين بأي تغييرات جوهرية عبر لوحة التحكم أو قنوات الاتصال الرسمية.
        </p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="section-card">
        <div class="section-icon"><i class="bi bi-envelope-fill"></i></div>
        <h3>6. التواصل والدعم الفني</h3>
        <p>
          إذا كان لديك أي استفسار أو واجهت مشكلة تتعلق بالخصوصية أو أمن البيانات أو استخدام النظام، يرجى التواصل مع إدارة تقنية المعلومات في المؤسسة عبر البريد الداخلي المعتمد.
        </p>
      </div>
    </div>

  </div>

  {{-- ── Footer ──────────────────────────────────────── --}}
  <footer class="mt-5 pt-4 border-top text-center text-muted" data-aos="fade-up">
    <p class="mb-2">© {{ date('Y') }} نظام إدارة الأصول. جميع الحقوق محفوظة.</p>
    <div class="d-flex justify-content-center gap-3">
      <a href="{{ url('/') }}" class="text-decoration-none text-muted hover-primary">الصفحة الرئيسية</a>
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
