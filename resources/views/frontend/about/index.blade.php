@extends('frontend.main')

@section('title', 'আমাদের সম্পর্কে')

@section('content')

@php
  $abouts = \App\Models\About::where('status', 0)->latest()->paginate(6);
  $profiles = \App\Models\Profile::all();
  $statistics = \App\Models\Statistic::all();
  $testimonials = \App\Models\Testimonial::orderBy('created_at', 'desc')->get();
  $dbypayer = DB::table('incomes')->where('income_type', '!=', 'general')
    ->select(DB::raw('sum(amount) as amount, user_id'))
    ->groupBy('user_id')->orderBy('amount','desc')->limit(4)->get();
  $gbypayer = DB::table('incomes')->where('income_type', 'general')
    ->select(DB::raw('sum(amount) as amount, user_id'))
    ->groupBy('user_id')->orderBy('amount','desc')->limit(4)->get();
@endphp

<!-- Page hero -->
<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span> <span>আমাদের সম্পর্কে</span>
    </div>
    <h1 class="um-page-hero__title">আমাদের সম্পর্কে</h1>
    <p class="um-page-hero__subtitle">উমনপুর গ্রামের ইতিহাস, সংস্কৃতি, জনগোষ্ঠী ও প্রতিষ্ঠান সম্পর্কে বিস্তারিত জানুন।</p>
  </div>
</section>

<!-- About content -->
<section class="um-section">
  <div class="um-container">
    <div class="um-list-layout" style="grid-template-columns: 1fr 280px;">
      <!-- Main -->
      <div data-reveal>
        @foreach($abouts as $about)
          <article class="glass-card--flat" style="background:#fff; border:1px solid var(--line); border-radius: var(--r-lg); padding: 32px; margin-bottom: 28px;">
            @if($about->image)
              <img src="{{ umonpur_asset('uploads/about/' . $about->image, 'about') }}" alt="{{ $about->title }}" style="width: 100%; border-radius: var(--r-md); margin-bottom: 20px; max-height: 380px; object-fit: cover;">
            @endif
            <div class="um-badge um-badge--gold" style="margin-bottom: 12px;">{{ $about->date ? \Carbon\Carbon::parse($about->date)->format('d M, Y') : 'প্রকাশিত' }}</div>
            <h2 style="font-size: 26px; color: var(--emerald-900); margin: 0 0 16px;">{{ $about->title }}</h2>
            <div style="font-size: 16px; line-height: 1.9; color: var(--ink);">
              {!! $about->description !!}
            </div>
            <div style="margin-top: 18px;">
              <a href="{{ route('web-about-show', $about->id) }}" class="um-btn um-btn--ghost-dark um-btn--sm">বিস্তারিত পড়ুন <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </article>
        @endforeach
        @if($abouts->isEmpty())
          <div class="um-empty">
            <div class="um-empty__icon"><i class="fa-solid fa-newspaper"></i></div>
            <h3 class="um-empty__title">শীঘ্রই আসছে</h3>
            <p>বিস্তারিত তথ্য যোগ করা হবে।</p>
          </div>
        @endif
        <div style="margin-top: 24px;">{{ $abouts->links() }}</div>
      </div>

      <!-- Sidebar -->
      <aside class="um-sidebar">
        <div class="um-sidebar-block" data-reveal data-reveal-delay="1">
          <h4>পরিসংখ্যান</h4>
          @foreach($statistics->take(4) as $stat)
            <div style="display:flex; justify-content:space-between; padding: 10px 0; border-bottom: 1px dashed var(--line);">
              <span style="color: var(--ink-soft); font-size: 14px;">{{ $stat->name }}</span>
              <strong style="color: var(--emerald-700); font-family: var(--f-en);">{{ $stat->value }}</strong>
            </div>
          @endforeach
        </div>

        <div class="um-sidebar-block" data-reveal data-reveal-delay="2">
          <h4>দ্রুত লিংক</h4>
          <a href="{{ route('web-post-list') }}" class="um-cat-chip">সংবাদ</a>
          <a href="{{ route('web-notice-list') }}" class="um-cat-chip">নোটিশ</a>
          <a href="{{ route('web-event-list') }}" class="um-cat-chip">ইভেন্ট</a>
          <a href="{{ route('web-photo') }}" class="um-cat-chip">ছবি গ্যালারি</a>
          <a href="{{ route('web-video') }}" class="um-cat-chip">ভিডিও</a>
          <a href="{{ route('web-donate') }}" class="um-cat-chip">দান করুন</a>
        </div>

        <div class="um-sidebar-block" data-reveal data-reveal-delay="3" style="background: linear-gradient(135deg, var(--emerald-700), var(--emerald-900)); color: #fff; border: none;">
          <h4 style="color: #fff; border-bottom-color: var(--gold-400);">যোগাযোগ করুন</h4>
          <p style="font-size: 14px; opacity: 0.9; margin: 0 0 14px;">আপনার যেকোনো প্রশ্ন বা পরামর্শ আমাদের জানান।</p>
          <a href="{{ route('web-message') }}" class="um-btn um-btn--gold um-btn--sm" style="width:100%"><i class="fa-solid fa-envelope"></i> বার্তা পাঠান</a>
        </div>
      </aside>
    </div>
  </div>
</section>

<!-- Stats band -->
@if($statistics->count() > 0)
<section class="um-section um-section--emerald-gradient" style="padding: 60px 0;">
  <div class="um-container">
    <div class="um-stats" style="margin-top: 0;">
      @foreach($statistics->take(4) as $stat)
        <div class="glass-card--emerald um-stat" data-reveal data-reveal-delay="{{ $loop->index + 1 }}">
          <div class="um-stat__icon"><i class="fa-solid fa-chart-line"></i></div>
          <div class="um-stat__value um-counter" style="color: var(--gold-400);">{{ $stat->value }}</div>
          <p class="um-stat__label" style="color: rgba(255,255,255,0.85);">{{ $stat->name }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Top donors -->
@if($gbypayer->count() > 0 || $dbypayer->count() > 0)
<section class="um-section um-section--cream">
  <div class="um-container">
    <div class="um-section-head" data-reveal>
      <span class="um-section-head__eyebrow">সম্মাননা</span>
      <h2 class="um-section-head__title">শীর্ষ দাতাগণ</h2>
      <p class="um-section-head__subtitle">গ্রামের উন্নয়নে অবদান রাখা ব্যক্তিবর্গ</p>
    </div>

    <div class="um-list-layout" style="grid-template-columns: 1fr 1fr;">
      @if($gbypayer->count() > 0)
      <div data-reveal>
        <h3 style="font-size: 22px; color: var(--emerald-900); margin: 0 0 20px;"><i class="fa-solid fa-medal" style="color: var(--gold-600);"></i> তহবিলে দাতাকারী</h3>
        <div class="glass-card--flat" style="background: #fff;">
          @foreach($gbypayer as $i => $row)
            @php $u = \App\Models\User::find($row->user_id); @endphp
            <div style="display: flex; align-items: center; gap: 16px; padding: 14px 18px; border-bottom: 1px solid var(--line);">
              <div style="width: 38px; height: 38px; border-radius: 50%; background: {{ $i === 0 ? 'var(--gold-500)' : ($i === 1 ? '#C0C0C0' : ($i === 2 ? '#CD7F32' : 'var(--cream-2)')) }}; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-family: var(--f-en);">{{ $i + 1 }}</div>
              <div style="flex:1;">
                <div style="font-weight: 600; color: var(--emerald-900);">{{ $u ? $u->name : 'অজানা' }}</div>
              </div>
              <strong style="color: var(--emerald-700); font-family: var(--f-en);">৳ {{ number_format($row->amount) }}</strong>
            </div>
          @endforeach
        </div>
        <div style="margin-top: 14px; text-align: right;">
          <a href="{{ route('web-about-donate-g') }}" class="um-btn um-btn--ghost-dark um-btn--sm">সম্পূর্ণ তালিকা <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      @endif

      @if($dbypayer->count() > 0)
      <div data-reveal data-reveal-delay="2">
        <h3 style="font-size: 22px; color: var(--emerald-900); margin: 0 0 20px;"><i class="fa-solid fa-hand-holding-heart" style="color: var(--gold-600);"></i> আর্থিক সহায়তা দাতা</h3>
        <div class="glass-card--flat" style="background: #fff;">
          @foreach($dbypayer as $i => $row)
            @php $u = \App\Models\User::find($row->user_id); @endphp
            <div style="display: flex; align-items: center; gap: 16px; padding: 14px 18px; border-bottom: 1px solid var(--line);">
              <div style="width: 38px; height: 38px; border-radius: 50%; background: {{ $i === 0 ? 'var(--gold-500)' : ($i === 1 ? '#C0C0C0' : ($i === 2 ? '#CD7F32' : 'var(--cream-2)')) }}; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-family: var(--f-en);">{{ $i + 1 }}</div>
              <div style="flex:1;">
                <div style="font-weight: 600; color: var(--emerald-900);">{{ $u ? $u->name : 'অজানা' }}</div>
              </div>
              <strong style="color: var(--emerald-700); font-family: var(--f-en);">৳ {{ number_format($row->amount) }}</strong>
            </div>
          @endforeach
        </div>
        <div style="margin-top: 14px; text-align: right;">
          <a href="{{ route('web-about-donate-d') }}" class="um-btn um-btn--ghost-dark um-btn--sm">সম্পূর্ণ তালিকা <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      @endif
    </div>
  </div>
</section>
@endif

<!-- Committee -->
@if($profiles->isNotEmpty())
<section class="um-section">
  <div class="um-container">
    <div class="um-section-head" data-reveal>
      <span class="um-section-head__eyebrow">পরিচালনা পরিষদ</span>
      <h2 class="um-section-head__title">উমনপুর আইটি কমিটি</h2>
      <p class="um-section-head__subtitle">গ্রামের ডিজিটাল রূপান্তরে নিয়োজিত ব্যক্তিবর্গ</p>
    </div>

    <div class="um-profile-grid">
      @foreach($profiles as $profile)
        <div class="um-profile-card" data-reveal data-reveal-delay="{{ ($loop->index % 4) + 1 }}">
          @if($profile->image)
            <img src="{{ umonpur_asset('uploads/profile/' . $profile->image, 'profile') }}" alt="{{ $profile->name }}" class="um-profile-card__avatar">
          @else
            <div class="um-profile-card__avatar" style="background: var(--emerald-600); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:32px;">{{ strtoupper(substr($profile->name, 0, 1)) }}</div>
          @endif
          <h4 class="um-profile-card__name">{{ $profile->name }}</h4>
          <p class="um-profile-card__role">{{ \Illuminate\Support\Str::limit(strip_tags($profile->description), 50) }}</p>
          <div class="um-profile-card__social">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-solid fa-envelope"></i></a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection
