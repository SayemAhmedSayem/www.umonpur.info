<!DOCTYPE html>
<html lang="bn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'উমনপুর') - উমনপুর</title>
  <meta name="description" content="@yield('meta_desc', 'উমনপুর গ্রামের অফিসিয়াল ওয়েবসাইট - একটি আদর্শ ডিজিটাল গ্রাম।')">

  {{-- ====== ANTI-FOUC STRATEGY ======
  1. Inline critical CSS so first paint is already styled (no white flash, no raw text)
  2. Preload modern CSS + Bengali font with high priority
  3. Defer non-critical CSS (bootstrap, fontawesome, slick, magnific) to load AFTER first paint
  4. Body stays hidden (opacity:0) until DOM + CSS are ready, then fades in
  5. Set body padding-top inline so fixed header doesn't overlap content during load
  --}}

  {{-- Preconnect to font origins (speeds up font fetch) --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  {{-- Preload the most critical CSS + the Bengali font file itself (not just the @font-face CSS) --}}
  <link rel="preload" href="{{ asset('frontend/assets/css/umonpur-modern.css') }}" as="style" crossorigin>
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" as="style">

  {{-- ============ CRITICAL INLINE CSS (above-the-fold) ============ --}}
  <style id="um-critical">
    /* Design tokens (must match umonpur-modern.css) */
    :root{
      --emerald-900:#064E3B;--emerald-700:#047857;--emerald-600:#0B6E4F;
      --emerald-500:#10B981;--emerald-50:#ECFDF5;
      --gold-600:#C98E2C;--gold-500:#E2A853;--gold-400:#EAB95C;--gold-100:#FBF3E2;
      --cream:#FAF7F2;--cream-2:#F5EFE3;--ink:#1A1A1A;--ink-soft:#4A4A4A;
      --muted:#6B7280;--line:rgba(11,110,79,0.12);
      --r-pill:999px;--r-lg:22px;--r-md:16px;
      --sh-md:0 10px 30px rgba(6,78,59,0.08);--sh-lg:0 20px 50px rgba(6,78,59,0.12);
      --f-bn:'Hind Siliguri',system-ui,sans-serif;
      --f-en:'Inter',system-ui,sans-serif;
    }
    /* Reset + base — apply IMMEDIATELY so no raw styling shows */
    *{box-sizing:border-box}
    html{scroll-behavior:smooth}
    body{
      margin:0;
      font-family:var(--f-bn);
      background:var(--cream);
      color:var(--ink);
      line-height:1.7;
      -webkit-font-smoothing:antialiased;
      padding-top:76px; /* matches fixed header height — set inline to prevent overlap during load */
      overflow-x:hidden;
    }
    img{max-width:100%;display:block}
    a{color:var(--emerald-700);text-decoration:none}

    /* Hide body until CSS is fully loaded — prevents FOUC flash */
    body.um-loading{opacity:0}
    body{opacity:1;transition:opacity .25s ease}

    /* Fixed header baseline (so it doesn't jump on CSS load) */
    .um-header{
      position:fixed;top:0;left:0;right:0;z-index:1000;
      padding:14px 0;background:transparent;
      display:flex;align-items:center;
    }
    .um-container{width:100%;max-width:1280px;margin:0 auto;padding:0 24px}

    /* Hero baseline (prevents layout shift) */
    .um-hero{position:relative;min-height:92vh;display:flex;align-items:center;overflow:hidden;margin-top:-76px}
    .um-hero__overlay{position:absolute;inset:0;background:linear-gradient(180deg,rgba(6,78,59,0.55),rgba(6,30,22,0.85))}

    /* Loading skeleton color for hero before slider image loads */
    .um-hero__slides{position:absolute;inset:0;background:linear-gradient(135deg,var(--emerald-900),var(--emerald-700))}

    /* Inline the brand + nav button colors so header is visible immediately */
    .um-brand__logo{width:46px;height:46px;border-radius:50%;border:2px solid var(--gold-500)}
    .um-btn{
      display:inline-flex;align-items:center;justify-content:center;gap:8px;
      padding:8px 18px;border-radius:var(--r-pill);font-family:var(--f-bn);
      font-weight:600;font-size:13px;border:none;cursor:pointer;text-decoration:none;
    }
    .um-btn--gold{background:linear-gradient(135deg,var(--gold-500),var(--gold-600));color:#fff}
    .um-btn--ghost-dark{background:transparent;color:var(--emerald-700);border:1.5px solid var(--emerald-600)}

    /* Footer baseline color (in case footer renders before CSS) */
    .um-footer{background:linear-gradient(180deg,var(--emerald-900),#03251B);color:rgba(255,255,255,0.85);padding:72px 0 28px}

    /* Page hero baseline */
    .um-page-hero{background:linear-gradient(135deg,var(--emerald-900),var(--emerald-700));color:#fff;padding:88px 0 56px}

    /* Section baseline */
    .um-section{padding:96px 0}

    /* Glass card baseline (so cards have shape before full CSS loads) */
    .glass-card,.glass-card--flat{background:#fff;border:1px solid var(--line);border-radius:var(--r-lg);box-shadow:var(--sh-md)}
  </style>

  {{-- Modern CSS — load synchronously (it's only 31KB, gzip ~7KB, and IS the design) --}}
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/umonpur-modern.css') }}">

  {{-- Bengali + Latin fonts — keep display=swap but preload woff2 directly --}}
  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  {{-- ============ NON-CRITICAL CSS (deferred — loads after first paint) ============ --}}
  {{-- Bootstrap (153KB) — only needed for grid + modal, defer it --}}
  <link rel="preload" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}"></noscript>

  {{-- FontAwesome (88KB) — defer --}}
  <link rel="preload" href="{{ asset('frontend/assets/plugin/fontawesome/css/all.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('frontend/assets/plugin/fontawesome/css/all.min.css') }}"></noscript>

  {{-- Slick + Magnific (small but not needed for first paint) --}}
  <link rel="preload" href="{{ asset('frontend/assets/css/slick.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}"></noscript>
  <link rel="preload" href="{{ asset('frontend/assets/css/magnific_popup.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific_popup.css') }}"></noscript>

  @stack('style')
</head>

<body class="um-loading">
  <!-- ============== MODERN HEADER ============== -->
  <header class="um-header" id="umHeader">
    <div class="um-container um-header__inner">
      <!-- Brand -->
      <a href="{{ route('web-home') }}" class="um-brand">
        <img src="{{ asset('frontend/logo/logo.png') }}" alt="উমনপুর" class="um-brand__logo">
        <span class="um-brand__text">
          <strong>উমনপুর</strong>
          <small>একটি আদর্শ গ্রামের নাম</small>
        </span>
      </a>

      <!-- Desktop nav -->
      <nav class="um-nav" id="umNav">
        <a href="{{ route('web-home') }}" class="um-nav__link">হোম</a>
        <a href="{{ route('web-about') }}" class="um-nav__link">আমাদের সম্পর্কে</a>
        <div class="um-nav__dropdown">
          <button class="um-nav__link">গ্যালারি <i class="fa-solid fa-chevron-down"></i></button>
          <div class="um-nav__menu">
            <a href="{{ route('web-photo') }}"><i class="fa-regular fa-image"></i> ছবি গ্যালারি</a>
            <a href="{{ route('web-video') }}"><i class="fa-solid fa-video"></i> ভিডিও গ্যালারি</a>
          </div>
        </div>
        <a href="{{ route('web-post-list') }}" class="um-nav__link">সংবাদ</a>
        <a href="{{ route('web-notice-list') }}" class="um-nav__link">নোটিশ</a>
        <a href="{{ route('web-event-list') }}" class="um-nav__link">ইভেন্ট</a>
        <div class="um-nav__dropdown">
          <button class="um-nav__link">রিলিজ ভার্সন <i class="fa-solid fa-chevron-down"></i></button>
          <div class="um-nav__menu">
            @foreach(App\Models\Version::all() as $version)
              <a href="{{ route('web-version-show', $version->id) }}"><i class="fa-solid fa-code-branch"></i> {{ $version->year }}</a>
            @endforeach
          </div>
        </div>
        <a href="{{ route('web-message') }}" class="um-nav__link">যোগাযোগ</a>
      </nav>

      <!-- Actions -->
      <div class="um-header__actions">
        @if(Auth::check())
          <a href="{{ route('dashboard.index') }}" class="um-btn um-btn--ghost-dark um-btn--sm"><i class="fa-solid fa-gauge"></i> ড্যাশবোর্ড</a>
          <a href="{{ route('logout') }}" class="um-btn um-btn--emerald um-btn--sm"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             <i class="fa-solid fa-right-from-bracket"></i> লগআউট
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        @else
          <a href="{{ route('login') }}" class="um-btn um-btn--ghost-dark um-btn--sm">লগইন</a>
          <a href="{{ route('register') }}" class="um-btn um-btn--gold um-btn--sm">রেজিস্ট্রেশন</a>
        @endif
        <a href="#" class="um-btn um-btn--gold um-btn--sm um-header__donate" data-bs-toggle="modal" data-bs-target="#donationModal">
          <i class="fa-solid fa-heart"></i> দান করুন
        </a>
        <button class="um-header__toggle" id="umMenuToggle" aria-label="মেনু"><i class="fa-solid fa-bars"></i></button>
      </div>
    </div>

    <!-- Mobile drawer -->
    <div class="um-mobile-drawer" id="umMobileDrawer">
      <div class="um-mobile-drawer__head">
        <img src="{{ asset('frontend/logo/logo.png') }}" alt="উমনপুর">
        <button id="umDrawerClose" aria-label="বন্ধ করুন"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <nav class="um-mobile-drawer__nav">
        <a href="{{ route('web-home') }}">হোম</a>
        <a href="{{ route('web-about') }}">আমাদের সম্পর্কে</a>
        <a href="{{ route('web-photo') }}">ছবি গ্যালারি</a>
        <a href="{{ route('web-video') }}">ভিডিও গ্যালারি</a>
        <a href="{{ route('web-post-list') }}">সংবাদ</a>
        <a href="{{ route('web-notice-list') }}">নোটিশ</a>
        <a href="{{ route('web-event-list') }}">ইভেন্ট</a>
        <a href="{{ route('web-donate') }}">সাহায্য করুন</a>
        <a href="{{ route('web-message') }}">যোগাযোগ</a>
        @foreach(App\Models\Version::all() as $version)
          <a href="{{ route('web-version-show', $version->id) }}">ভার্সন - {{ $version->year }}</a>
        @endforeach
      </nav>
      <div class="um-mobile-drawer__foot">
        @if(Auth::check())
          <a href="{{ route('dashboard.index') }}" class="um-btn um-btn--emerald um-btn--sm">ড্যাশবোর্ড</a>
          <a href="{{ route('logout') }}" class="um-btn um-btn--ghost-dark um-btn--sm"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">লগআউট</a>
        @else
          <a href="{{ route('login') }}" class="um-btn um-btn--ghost-dark um-btn--sm">লগইন</a>
          <a href="{{ route('register') }}" class="um-btn um-btn--gold um-btn--sm">রেজিস্ট্রেশন</a>
        @endif
      </div>
    </div>
    <div class="um-mobile-drawer__backdrop" id="umDrawerBackdrop"></div>
  </header>

  <!-- ============== DONATION MODAL (preserved logic) ============== -->
  @if(Auth::check())
  <div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content um-modal-content">
        <div class="modal-header um-modal-header">
          <h5 class="modal-title"><i class="fa-solid fa-hand-holding-heart"></i> তহবিলে দান করুন</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body um-modal-body">
          <form method="POST" action="{{ route('web-income-store') }}">
            @csrf
            <input type="hidden" name="income_type" value="general">
            <input type="hidden" name="donate_id" value="">

            <label class="um-form-label">টাকার পরিমাণ নির্বাচন করুন</label>
            <div class="um-amount-grid">
              <label class="um-amount-opt"><input type="radio" name="amount" value="500"><span>৫০০ ৳</span></label>
              <label class="um-amount-opt"><input type="radio" name="amount" value="1000" checked><span>১,০০০ ৳</span></label>
              <label class="um-amount-opt"><input type="radio" name="amount" value="2000"><span>২,০০০ ৳</span></label>
              <label class="um-amount-opt"><input type="radio" name="amount" value="5000"><span>৫,০০০ ৳</span></label>
            </div>

            <div class="um-payment-note">
              <i class="fa-solid fa-circle-info"></i>
              <div>
                <strong>বিকাশ/নগদ/রকেট</strong> — খরচ সহ নিচের নাম্বারে টাকা পাঠিয়ে দিন এবং ফরম পূরণ করে সেন্ড করুন।<br>
                <span class="um-payment-note__num">01511 838 161</span><br>
                <strong>ব্যাংক:</strong> অগ্রনী ব্যাংক, হরিপুর গ্যাস ফিল্ড শাখা — A/C No: 0200021507827
              </div>
            </div>

            <div class="um-form-row">
              <div class="um-form-group">
                <label class="um-form-label">টাকা পাঠানোর ধরন</label>
                <select name="payment_type" class="um-form-control" required>
                  <option value="1">বিকাশ</option>
                  <option value="2">নগদ</option>
                  <option value="3">রকেট</option>
                  <option value="4">ব্যাংক</option>
                </select>
              </div>
              <div class="um-form-group">
                <label class="um-form-label">যে নাম্বার থেকে পাঠিয়েছেন</label>
                <input type="text" name="transection_phone" class="um-form-control">
              </div>
            </div>
            <div class="um-form-row">
              <div class="um-form-group">
                <label class="um-form-label">ট্রানজেকশন নাম্বার</label>
                <input type="text" name="transection_no" class="um-form-control">
              </div>
              <div class="um-form-group">
                <label class="um-form-label">আপনার নাম</label>
                <input type="text" value="{{ Auth::user()->name }}" class="um-form-control" readonly>
              </div>
            </div>
            <div class="um-form-row">
              <div class="um-form-group">
                <label class="um-form-label">ইমেইল</label>
                <input type="email" value="{{ Auth::user()->email }}" class="um-form-control" readonly>
              </div>
              <div class="um-form-group">
                <label class="um-form-label">ফোন নাম্বার</label>
                <input type="text" value="{{ Auth::user()->nid->phone }}" class="um-form-control" readonly>
              </div>
            </div>
            <div class="um-form-row">
              <div class="um-form-group">
                <label class="um-form-label">ঠিকানা</label>
                <input type="text" value="{{ Auth::user()->nid->address }}" class="um-form-control" readonly>
              </div>
              <div class="um-form-group">
                <label class="um-form-label">হোল্ডিং নাম্বার</label>
                <input type="text" value="{{ Auth::user()->nid->holding_no }}" class="um-form-control" readonly>
              </div>
            </div>
            <div class="um-form-group">
              <label class="um-form-label">এনআইডি/জন্মনিবন্ধন নাম্বার</label>
              <input type="text" value="{{ Auth::user()->nid->nid }}" class="um-form-control" readonly>
            </div>
            <button type="submit" class="um-btn um-btn--gold um-btn--lg" style="width:100%"><i class="fa-solid fa-paper-plane"></i> তথ্য জমা দিন</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="modal fade" id="donationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content um-modal-content um-modal-login">
        <div class="um-modal-login__head">
          <img src="{{ asset('frontend/logo/logo.png') }}" alt="উমনপুর">
          <h4>দান করতে লগইন করুন</h4>
          <p>আপনার অ্যাকাউন্টে প্রবেশ করুন</p>
        </div>
        <div class="um-modal-login__body">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="um-form-group">
              <label class="um-form-label">ইমেইল</label>
              <input type="email" name="email" class="um-form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="আপনার ইমেইল" required autofocus>
              @error('email') <span class="um-invalid">{{ $message }}</span> @enderror
            </div>
            <div class="um-form-group">
              <label class="um-form-label">পাসওয়ার্ড</label>
              <input type="password" name="password" class="um-form-control" placeholder="পাসওয়ার্ড" required>
            </div>
            <button type="submit" class="um-btn um-btn--emerald um-btn--lg" style="width:100%"><i class="fa-solid fa-right-to-bracket"></i> সাইনইন করুন</button>
          </form>
          <div class="um-modal-login__foot">
            <a href="{{ route('register') }}">নতুন? রেজিস্ট্রেশন করুন</a>
            @if(Route::has('password.request')) <a href="{{ route('password.request') }}">পাসওয়ার্ড ভুলে গেছেন?</a> @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  <!-- ============== SESSION ALERTS ============== -->
  @if (Session::has('success'))
    <div class="um-container" style="margin-top: 90px;">
      <div class="um-alert um-alert--success">
        <i class="fa-solid fa-circle-check"></i> {{ Session::get('success') }}
      </div>
    </div>
  @endif
  @if (Session::has('error'))
    <div class="um-container" style="margin-top: 90px;">
      <div class="um-alert um-alert--error">
        <i class="fa-solid fa-circle-exclamation"></i> {{ Session::get('error') }}
      </div>
    </div>
  @endif

  <!-- ============== PAGE CONTENT ============== -->
  @yield('content')

  <!-- ============== MODERN FOOTER ============== -->
  <footer class="um-footer">
    <div class="um-container">
      <div class="um-footer__top">
        <!-- About col -->
        <div class="um-footer__col um-footer__col--about">
          <a href="{{ route('web-home') }}" class="um-footer__brand">
            <img src="{{ asset('frontend/logo/logo.png') }}" alt="উমনপুর">
            <strong>উমনপুর</strong>
          </a>
          <p>একটি আদর্শ ডিজিটাল গ্রাম। সিলেট জেলার জৈন্তাপুর উপজেলার চিকনাগুল ইউনিয়নে অবস্থিত এই গ্রামটি প্রাকৃতিক সৌন্দর্য্য ও সাংস্কৃতিক ঐতিহ্যে ভরপুর।</p>
          <div class="um-footer__contact">
            <span><i class="fa-solid fa-envelope"></i> umonpur@gmail.com</span>
            <span><i class="fa-solid fa-phone"></i> 01687 838 161</span>
          </div>
        </div>

        <!-- Link columns -->
        @foreach([1, 2, 3, 4] as $type)
        <div class="um-footer__col">
          <h5>গুরুত্বপূর্ণ লিংক</h5>
          <ul>
            @foreach(App\Models\Link::where('type', $type)->get() as $link)
              <li><a href="{{ $link->link }}"><i class="fa-solid fa-angle-right"></i> {{ $link->name }}</a></li>
            @endforeach
          </ul>
        </div>
        @endforeach
      </div>

      <!-- Social -->
      <div class="um-footer__social">
        <a href="https://www.facebook.com/Umonpur" target="_blank"><i class="fa-brands fa-facebook-f"></i> উমনপুর</a>
        <a href="https://www.youtube.com/@umonpur-2304" target="_blank"><i class="fa-brands fa-youtube"></i> উমনপুর</a>
        <a href="https://www.facebook.com/UmonpurGovermentPrimarySchool" target="_blank"><i class="fa-brands fa-facebook-f"></i> স্কুল</a>
        <a href="https://www.facebook.com/JameyaMahmudiyaMazharulUlumUmonpur" target="_blank"><i class="fa-brands fa-facebook-f"></i> মাদ্রসা</a>
        <a href="https://www.facebook.com/UmonpurSportsClub" target="_blank"><i class="fa-brands fa-facebook-f"></i> খেলাধুলা</a>
        <a href="https://www.facebook.com/ChiknagulHealthComplexUmonpur" target="_blank"><i class="fa-brands fa-facebook-f"></i> স্বাস্থ্য কমপ্লেক্স</a>
      </div>

      <!-- Bottom -->
      <div class="um-footer__bottom">
        <p>&copy; {{ date('Y') }} উমনপুর গ্রাম ওয়েবসাইট। সর্বস্বত্ব সংরক্ষিত।</p>
        <p>ডিজাইন ও ডেভেলপমেন্ট <a href="https://sayemahmedsayem.online/" target="_blank">_S@YEM_</a></p>
      </div>
    </div>
  </footer>

  <!-- Back to top -->
  <button class="um-back-to-top" id="umBackToTop" aria-label="উপরে যান"><i class="fa-solid fa-arrow-up"></i></button>

  <!-- ============== SCRIPTS ============== -->
  <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/magnific_popup.min.js') }}"></script>

  <script>
  // ====== ANTI-FOUC: Reveal body as soon as DOM is ready ======
  // The body has class="um-loading" (opacity:0). Remove it ASAP — don't wait for
  // images or deferred CSS. The critical inline CSS + umonpur-modern.css (loaded
  // synchronously) are enough for a correct first paint.
  (function(){
    function reveal(){
      requestAnimationFrame(function(){
        document.body.classList.remove('um-loading');
      });
    }
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', reveal);
    } else {
      reveal();
    }
    // Safety net: if DOMContentLoaded already fired or something blocked it,
    // force-reveal after 800ms no matter what.
    setTimeout(reveal, 800);
  })();

  // Sticky header on scroll
  (function(){
    var h = document.getElementById('umHeader');
    var onScroll = function(){
      if (window.scrollY > 30) h.classList.add('is-scrolled');
      else h.classList.remove('is-scrolled');
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  })();

  // Mobile drawer
  (function(){
    var toggle = document.getElementById('umMenuToggle');
    var drawer = document.getElementById('umMobileDrawer');
    var backdrop = document.getElementById('umDrawerBackdrop');
    var close = document.getElementById('umDrawerClose');
    function open(){ drawer.classList.add('is-open'); backdrop.classList.add('is-open'); document.body.style.overflow='hidden'; }
    function shut(){ drawer.classList.remove('is-open'); backdrop.classList.remove('is-open'); document.body.style.overflow=''; }
    if (toggle) toggle.addEventListener('click', open);
    if (close) close.addEventListener('click', shut);
    if (backdrop) backdrop.addEventListener('click', shut);
  })();

  // Back to top
  (function(){
    var btn = document.getElementById('umBackToTop');
    window.addEventListener('scroll', function(){
      if (window.scrollY > 600) btn.classList.add('is-visible');
      else btn.classList.remove('is-visible');
    }, { passive: true });
    btn.addEventListener('click', function(){ window.scrollTo({ top: 0, behavior: 'smooth' }); });
  })();

  // Reveal on scroll
  (function(){
    var els = document.querySelectorAll('[data-reveal]');
    if (!els.length) return;
    if (!('IntersectionObserver' in window)) {
      els.forEach(function(e){ e.classList.add('is-visible'); });
      return;
    }
    var io = new IntersectionObserver(function(entries){
      entries.forEach(function(entry){
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          io.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -60px', threshold: 0.1 });
    els.forEach(function(e){ io.observe(e); });
  })();

  // Animated counters
  window.addEventListener('load', function(){
    if (!window.jQuery || !jQuery.fn.counterUp) return;
    jQuery('.um-counter').counterUp({ delay: 10, time: 1400 });
  });
  </script>
  @stack('scripts')
</body>
</html>

<style>
/* ---------- Header styles (inline for first load priority) ---------- */
.um-header {
  position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
  padding: 14px 0;
  background: transparent;
  transition: all .35s ease;
}
.um-header.is-scrolled {
  background: rgba(255, 255, 255, 0.78);
  backdrop-filter: blur(20px) saturate(180%);
  -webkit-backdrop-filter: blur(20px) saturate(180%);
  border-bottom: 1px solid rgba(11, 110, 79, 0.10);
  padding: 10px 0;
  box-shadow: 0 4px 20px rgba(6, 78, 59, 0.05);
}
.um-header__inner { display: flex; align-items: center; justify-content: space-between; gap: 24px; }

.um-brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
.um-brand__logo { width: 46px; height: 46px; border-radius: 50%; object-fit: cover; border: 2px solid var(--gold-500); }
.um-header:not(.is-scrolled) .um-brand__logo { border-color: rgba(255,255,255,0.6); }
.um-brand__text { display: flex; flex-direction: column; line-height: 1.1; }
.um-brand__text strong { font-size: 19px; color: var(--emerald-900); }
.um-brand__text small { font-size: 11px; color: var(--muted); }
.um-header:not(.is-scrolled) .um-brand__text strong,
.um-header:not(.is-scrolled) .um-brand__text small { color: #fff; }
.um-header:not(.is-scrolled) .um-brand__text small { color: rgba(255,255,255,0.8); }

.um-nav { display: flex; align-items: center; gap: 4px; flex-wrap: nowrap; }
.um-nav__link {
  background: none; border: none; cursor: pointer;
  padding: 8px 12px;
  font-family: var(--f-bn); font-size: 14px; font-weight: 500;
  color: var(--ink); text-decoration: none !important;
  border-radius: var(--r-pill);
  transition: all .2s;
  display: inline-flex; align-items: center; gap: 6px;
  white-space: nowrap;
}
.um-header:not(.is-scrolled) .um-nav__link { color: #fff; }
.um-nav__link:hover { background: rgba(11, 110, 79, 0.08); color: var(--emerald-700); }
.um-header:not(.is-scrolled) .um-nav__link:hover { background: rgba(255,255,255,0.15); color: #fff; }
.um-nav__dropdown { position: relative; }
.um-nav__menu {
  position: absolute; top: calc(100% + 8px); left: 0;
  min-width: 220px;
  background: #fff;
  border-radius: var(--r-md);
  box-shadow: var(--sh-lg);
  padding: 10px;
  opacity: 0; visibility: hidden; transform: translateY(-6px);
  transition: all .25s;
  border: 1px solid var(--line);
  z-index: 10;
}
.um-nav__dropdown:hover .um-nav__menu,
.um-nav__dropdown:focus-within .um-nav__menu { opacity: 1; visibility: visible; transform: none; }
.um-nav__menu a {
  display: flex; align-items: center; gap: 10px;
  padding: 9px 12px; border-radius: var(--r-sm);
  color: var(--ink); font-size: 14px; text-decoration: none;
  transition: all .2s;
}
.um-nav__menu a:hover { background: var(--emerald-50); color: var(--emerald-700); }
.um-nav__menu a i { color: var(--gold-600); width: 16px; }

.um-header__actions { display: flex; align-items: center; gap: 8px; flex-shrink: 0; }
.um-header__donate { margin-left: 4px; }
.um-header__toggle {
  display: none; background: var(--emerald-600); color: #fff;
  border: none; width: 40px; height: 40px; border-radius: var(--r-sm);
  cursor: pointer; font-size: 18px;
}

/* Hide secondary buttons on smaller desktop widths to prevent overflow */
@media (max-width: 1200px) {
  .um-header__actions .um-btn--ghost-dark.um-btn--sm { display: none; } /* hide "লগইন" text button, keep register + donate */
}
@media (max-width: 992px) {
  .um-nav { display: none; }
  .um-header__toggle { display: flex; align-items: center; justify-content: center; }
  .um-header__donate { display: none; }
  .um-brand__text small { display: none; }
  .um-header__actions .um-btn--ghost-dark.um-btn--sm { display: inline-flex; } /* show login again on mobile */
  .um-header__actions .um-btn--gold.um-btn--sm { display: none; } /* hide "রেজিস্ট্রেশন" on mobile, keep hamburger + login */
}

/* Mobile drawer */
.um-mobile-drawer {
  position: fixed; top: 0; right: -340px; bottom: 0;
  width: 320px; background: #fff;
  z-index: 1001; padding: 24px;
  box-shadow: -10px 0 40px rgba(0,0,0,0.2);
  transition: right .35s ease;
  display: flex; flex-direction: column;
  overflow-y: auto;
}
.um-mobile-drawer.is-open { right: 0; }
.um-mobile-drawer__backdrop {
  position: fixed; inset: 0; background: rgba(6, 30, 22, 0.55);
  backdrop-filter: blur(4px);
  z-index: 1000; opacity: 0; visibility: hidden; transition: all .3s;
}
.um-mobile-drawer__backdrop.is-open { opacity: 1; visibility: visible; }
.um-mobile-drawer__head { display: flex; justify-content: space-between; align-items: center; padding-bottom: 20px; border-bottom: 1px solid var(--line); margin-bottom: 20px; }
.um-mobile-drawer__head img { width: 40px; height: 40px; border-radius: 50%; }
.um-mobile-drawer__head button { background: none; border: none; font-size: 24px; color: var(--ink); cursor: pointer; }
.um-mobile-drawer__nav { display: flex; flex-direction: column; gap: 4px; flex: 1; }
.um-mobile-drawer__nav a { padding: 12px 14px; color: var(--ink); text-decoration: none; border-radius: var(--r-sm); font-size: 15px; transition: all .2s; }
.um-mobile-drawer__nav a:hover { background: var(--emerald-50); color: var(--emerald-700); }
.um-mobile-drawer__foot { display: flex; gap: 8px; padding-top: 20px; border-top: 1px solid var(--line); margin-top: 20px; }
.um-mobile-drawer__foot .um-btn { flex: 1; }

/* Donation modal styling */
.um-modal-content { border: none; border-radius: var(--r-xl); overflow: hidden; }
.um-modal-header {
  background: linear-gradient(135deg, var(--emerald-700), var(--emerald-900));
  color: #fff; padding: 22px 28px;
  display: flex; justify-content: space-between; align-items: center;
}
.um-modal-header .modal-title { font-size: 20px; font-weight: 600; display: flex; align-items: center; gap: 10px; }
.um-modal-body { padding: 28px; background: var(--cream); }
.um-amount-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin: 12px 0 20px; }
.um-amount-opt { cursor: pointer; }
.um-amount-opt input { display: none; }
.um-amount-opt span {
  display: block; text-align: center; padding: 14px 8px;
  background: #fff; border: 1.5px solid var(--line); border-radius: var(--r-md);
  font-weight: 600; color: var(--emerald-900); transition: all .2s;
}
.um-amount-opt input:checked + span {
  background: linear-gradient(135deg, var(--gold-500), var(--gold-600));
  color: #fff; border-color: var(--gold-600);
  box-shadow: var(--sh-gold);
}
.um-payment-note {
  background: var(--gold-100); border-left: 4px solid var(--gold-500);
  padding: 16px 18px; border-radius: var(--r-md); margin-bottom: 20px;
  display: flex; gap: 14px; font-size: 14px; color: var(--ink); line-height: 1.7;
}
.um-payment-note i { color: var(--gold-600); font-size: 18px; margin-top: 3px; }
.um-payment-note__num { font-family: var(--f-en); font-weight: 700; color: var(--emerald-700); font-size: 16px; }

/* Login modal (guest donation) */
.um-modal-login { padding: 0; background: var(--cream); }
.um-modal-login__head { background: linear-gradient(135deg, var(--emerald-700), var(--emerald-900)); color: #fff; padding: 36px 28px 28px; text-align: center; }
.um-modal-login__head img { width: 64px; height: 64px; border-radius: 50%; border: 3px solid var(--gold-400); margin: 0 auto 14px; }
.um-modal-login__head h4 { margin: 0 0 6px; font-size: 20px; }
.um-modal-login__head p { margin: 0; opacity: 0.85; font-size: 14px; }
.um-modal-login__body { padding: 24px 28px 28px; }
.um-modal-login__foot { display: flex; justify-content: space-between; margin-top: 18px; font-size: 13px; }
.um-invalid { color: #B91C1C; font-size: 13px; margin-top: 4px; display: block; }

/* Footer */
.um-footer {
  background: linear-gradient(180deg, var(--emerald-900) 0%, #03251B 100%);
  color: rgba(255,255,255,0.85);
  padding: 72px 0 28px;
  position: relative;
}
.um-footer__top {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
  gap: 36px;
  margin-bottom: 40px;
}
.um-footer__col--about p { font-size: 14px; line-height: 1.8; margin: 16px 0; color: rgba(255,255,255,0.75); }
.um-footer__brand { display: flex; align-items: center; gap: 10px; text-decoration: none; }
.um-footer__brand img { width: 38px; height: 38px; border-radius: 50%; border: 2px solid var(--gold-500); }
.um-footer__brand strong { color: #fff; font-size: 20px; }
.um-footer__contact { display: flex; flex-direction: column; gap: 8px; font-size: 14px; }
.um-footer__contact span { display: flex; align-items: center; gap: 10px; }
.um-footer__contact i { color: var(--gold-400); width: 16px; }
.um-footer__col h5 { color: #fff; font-size: 16px; margin: 0 0 18px; font-weight: 600; position: relative; padding-bottom: 10px; }
.um-footer__col h5::after { content: ""; position: absolute; bottom: 0; left: 0; width: 32px; height: 2px; background: var(--gold-500); }
.um-footer__col ul { list-style: none; padding: 0; margin: 0; }
.um-footer__col ul li { margin-bottom: 10px; }
.um-footer__col ul li a { color: rgba(255,255,255,0.75); font-size: 14px; text-decoration: none; transition: all .2s; display: inline-flex; align-items: center; gap: 6px; }
.um-footer__col ul li a:hover { color: var(--gold-400); padding-left: 4px; }
.um-footer__col ul li a i { color: var(--gold-500); font-size: 11px; }

.um-footer__social {
  display: flex; flex-wrap: wrap; gap: 14px;
  padding: 28px 0; border-top: 1px solid rgba(255,255,255,0.10);
  border-bottom: 1px solid rgba(255,255,255,0.10);
  margin-bottom: 24px;
}
.um-footer__social a {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 8px 16px; border-radius: var(--r-pill);
  background: rgba(255,255,255,0.06); color: rgba(255,255,255,0.85);
  font-size: 13px; text-decoration: none; transition: all .25s;
  border: 1px solid rgba(255,255,255,0.08);
}
.um-footer__social a:hover { background: var(--gold-500); color: #fff; border-color: var(--gold-500); transform: translateY(-2px); }
.um-footer__bottom { display: flex; justify-content: space-between; align-items: center; font-size: 13px; color: rgba(255,255,255,0.6); flex-wrap: wrap; gap: 8px; }
.um-footer__bottom a { color: var(--gold-400); border: 1px solid var(--gold-500); padding: 2px 10px; border-radius: var(--r-sm); text-decoration: none; }
.um-footer__bottom a:hover { background: var(--gold-500); color: #fff; }

@media (max-width: 992px) {
  .um-footer__top { grid-template-columns: 1fr 1fr; gap: 28px; }
  .um-footer__col--about { grid-column: span 2; }
}
@media (max-width: 576px) {
  .um-footer__top { grid-template-columns: 1fr; }
  .um-footer__col--about { grid-column: span 1; }
  .um-footer__bottom { flex-direction: column; text-align: center; }
}

/* Back to top */
.um-back-to-top {
  position: fixed; bottom: 24px; right: 24px; z-index: 999;
  width: 48px; height: 48px; border-radius: 50%;
  background: linear-gradient(135deg, var(--emerald-600), var(--emerald-800));
  color: #fff; border: none; cursor: pointer; font-size: 18px;
  box-shadow: var(--sh-lg);
  opacity: 0; visibility: hidden; transform: translateY(20px);
  transition: all .3s;
}
.um-back-to-top.is-visible { opacity: 1; visibility: visible; transform: none; }
.um-back-to-top:hover { background: linear-gradient(135deg, var(--gold-500), var(--gold-600)); transform: translateY(-3px); }

/* Push body content below fixed header */
body { padding-top: 76px; }
/* Hero pulls itself up under the fixed header. The first section after hero
   (stats) uses negative margin-top to overlap the hero bottom — see .um-stats
   margin-top: -80px in umonpur-modern.css. No global sibling reset needed. */
.um-hero { margin-top: -76px; }
</style>
