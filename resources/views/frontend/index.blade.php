@extends('frontend.main')

@section('title', 'হোম')

@section('content')

@php
  // Pull additional data that index() in FrontendController doesn't provide
  // Use umonpur_sliders() to filter out sliders whose image files are missing
  $sliders    = umonpur_sliders();
  $statistics = \App\Models\Statistic::all();
  $donates    = \App\Models\Donate::orderBy('created_at', 'desc')->take(3)->get();
  $links      = \App\Models\Link::orderBy('id', 'asc')->take(6)->get();
  $recent_photos = \App\Models\Photo::latest()->take(8)->get();
  $profiles   = \App\Models\Profile::all();
@endphp

<!-- ============ HERO ============ -->
<section class="um-hero">
  <div class="um-hero__slides">
    @foreach($sliders as $i => $slide)
      <div class="um-hero__slide {{ $i === 0 ? 'is-active' : '' }}"
           style="background-image: url('{{ umonpur_asset('uploads/sliders/' . $slide->image, 'slider') }}');"></div>
    @endforeach
    @if($sliders->isEmpty())
      <div class="um-hero__slide is-active" style="background: linear-gradient(135deg, var(--emerald-900), var(--emerald-600));"></div>
    @endif
  </div>
  <div class="um-hero__overlay"></div>

  <div class="um-container">
    <div class="um-hero__content" data-reveal>
      <span class="um-hero__eyebrow"><span class="dot"></span> সিলেট, বাংলাদেশ — একটি আদর্শ ডিজিটাল গ্রাম</span>
      <h1 class="um-hero__title">সবুজের লীলাভূমি <span class="accent">উমনপুর</span> গ্রামে স্বাগতম</h1>
      <p class="um-hero__subtitle">প্রাকৃতিক সৌন্দর্য্য, সাংস্কৃতিক ঐতিহ্য আর ডিজিটাল রূপান্তরের মেলবন্ধন — উমনপুর গ্রামের অফিসিয়াল ওয়েবসাইটে আপনাকে স্বাগতম।</p>
      <div class="um-hero__actions">
        <a href="#donate-section" class="um-btn um-btn--gold um-btn--lg"><i class="fa-solid fa-hand-holding-heart"></i> তহবিলে দান করুন</a>
        <a href="{{ route('web-about') }}" class="um-btn um-btn--ghost um-btn--lg">আমাদের সম্পর্কে জানুন <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </div>

  <div class="um-hero__dots">
    @foreach($sliders as $i => $slide)
      <button class="um-hero__dot {{ $i === 0 ? 'is-active' : '' }}" data-slide="{{ $i }}"></button>
    @endforeach
  </div>

  <div class="um-hero__scroll">স্ক্রোল করুন</div>
</section>

<!-- ============ STATS ============ -->
<section class="um-section um-section--tight" style="padding-top: 0;">
  <div class="um-container">
    <div class="um-stats">
      @foreach($statistics->take(4) as $stat)
        <div class="glass-card um-stat" data-reveal data-reveal-delay="{{ $loop->index + 1 }}">
          <div class="um-stat__icon">
            @php
              $iconMap = ['জনসংখ্যা' => 'fa-users', 'শিক্ষা' => 'fa-graduation-cap', 'পরিবার' => 'fa-house', 'আয়তন' => 'fa-map-location-dot', 'মসজিদ' => 'fa-mosque', 'ব্যাংক' => 'fa-building-columns'];
              $icon = 'fa-chart-line';
              foreach($iconMap as $k => $v) { if(strpos($stat->name ?? '', $k) !== false) { $icon = $v; break; } }
            @endphp
            <i class="fa-solid {{ $icon }}"></i>
          </div>
          <div class="um-stat__value um-counter">{{ $stat->value ?? '0' }}</div>
          <p class="um-stat__label">{{ $stat->name }}</p>
        </div>
      @endforeach
      @if($statistics->isEmpty())
        @for($i = 1; $i <= 4; $i++)
          <div class="glass-card um-stat">
            <div class="um-stat__icon"><i class="fa-solid fa-chart-line"></i></div>
            <div class="um-stat__value um-counter">{{ [3000, 85, 500, 5][$i-1] }}</div>
            <p class="um-stat__label">{{ ['জনসংখ্যা', 'শিক্ষার হার %', 'পরিবার', 'আয়তন (বর্গ কি.মি.)'][$i-1] }}</p>
          </div>
        @endfor
      @endif
    </div>
  </div>
</section>

<!-- ============ ABOUT PREVIEW ============ -->
<section class="um-section um-section--cream">
  <div class="um-container">
    <div class="um-about-preview">
      <div data-reveal>
        <span class="um-about-preview__eyebrow">আমাদের গ্রামের পরিচিতি</span>
        <h2 class="um-about-preview__title">উমনপুর — সবুজে ঘেরা একটি আদর্শ ডিজিটাল গ্রাম</h2>
        <p class="um-about-preview__lead">উমনপুর গ্রাম সিলেট জেলার জৈন্তাপুর উপজেলার চিকনাগুল ইউনিয়নের ১নং ওয়ার্ডে অবস্থিত। গ্রামের বুক চিরে দক্ষিণ-উত্তরে সিলেট-তামাবিল হাইওয়ে চলে গেছে। মুসলিম-হিন্দু উভয় সম্প্রদায়ের মানুষ পারস্পরিক সৌহার্দ্য ও সম্প্রীতির মধ্যে বসবাস করে।</p>
        <div class="um-about-preview__stats">
          <div class="um-about-preview__stat">
            <div class="um-about-preview__stat-val">৮৫%</div>
            <div class="um-about-preview__stat-lbl">শিক্ষার হার</div>
          </div>
          <div class="um-about-preview__stat">
            <div class="um-about-preview__stat-val">৩০০০+</div>
            <div class="um-about-preview__stat-lbl">জনসংখ্যা</div>
          </div>
          <div class="um-about-preview__stat">
            <div class="um-about-preview__stat-val">২০২১</div>
            <div class="um-about-preview__stat-lbl">ওয়েবসাইট চালু</div>
          </div>
          <div class="um-about-preview__stat">
            <div class="um-about-preview__stat-val">৫০০+</div>
            <div class="um-about-preview__stat-lbl">পরিবার</div>
          </div>
        </div>
        <a href="{{ route('web-about') }}" class="um-btn um-btn--emerald um-btn--lg">বিস্তারিত পড়ুন <i class="fa-solid fa-arrow-right"></i></a>
      </div>
      <div class="um-about-preview__media" data-reveal data-reveal-delay="2">
        @php $firstPostImg = umonpur_asset('uploads/posts/' . ($latests->first()->image ?? ''), 'post'); @endphp
        <img src="{{ $firstPostImg }}" alt="উমনপুর গ্রাম">
        <div class="um-about-preview__badge">
          <div class="um-about-preview__badge-icon"><i class="fa-solid fa-award"></i></div>
          <div class="um-about-preview__badge-text">
            <strong>ডিজিটাল গ্রাম</strong>
            <span>২০২১ সাল থেকে</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ LATEST NEWS ============ -->
<section class="um-section" style="background: linear-gradient(180deg, #fff 0%, var(--cream) 100%);">
  <div class="um-container">
    <div class="um-section-head" data-reveal>
      <span class="um-section-head__eyebrow">সর্বশেষ সংবাদ</span>
      <h2 class="um-section-head__title">গ্রামের সর্বশেষ খবর</h2>
      <p class="um-section-head__subtitle">উমনপুর গ্রামের দৈনন্দিন ঘটনাবলি ও সংবাদে আপনাকে অবগত রাখি</p>
    </div>

    <div class="um-news-grid">
      @foreach($latests as $latest)
        <a href="{{ route('web-post-show', $latest->id) }}" class="um-news-card" data-reveal data-reveal-delay="{{ $loop->index + 1 }}">
          <div class="um-news-card__img">
            <img src="{{ umonpur_asset('uploads/posts/' . $latest->image, 'post') }}" alt="{{ $latest->title }}">
            <span class="um-badge um-badge--gold um-news-card__badge">সংবাদ</span>
          </div>
          <div class="um-news-card__body">
            <div class="um-news-card__date"><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($latest->date ?? $latest->created_at)->format('d M, Y') }}</div>
            <h3 class="um-news-card__title">{{ $latest->title }}</h3>
            <p class="um-news-card__excerpt">{{ strip_tags($latest->description) }}</p>
            <span class="um-news-card__more">বিস্তারিত পড়ুন <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </a>
      @endforeach
    </div>

    <div class="um-section-action" data-reveal>
      <a href="{{ route('web-post-list') }}" class="um-btn um-btn--ghost-dark um-btn--lg">সকল সংবাদ দেখুন <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>
</section>

<!-- ============ NOTICES + EVENTS (split) ============ -->
<section class="um-section um-section--cream">
  <div class="um-container">
    <div class="um-list-layout" style="grid-template-columns: 1.2fr 1fr;">
      <!-- Notices -->
      <div data-reveal>
        <div class="um-section-head um-section-head--left" style="text-align:left; margin-bottom: 32px;">
          <span class="um-section-head__eyebrow">গুরুত্বপূর্ণ ঘোষণা</span>
          <h2 class="um-section-head__title" style="font-size: 30px;">নোটিশ বোর্ড</h2>
        </div>
        <div class="um-notice-list">
          @foreach($notices->take(5) as $notice)
            <a href="{{ route('web-notice-show', $notice->id) }}" class="um-notice-item">
              <div class="um-notice-item__date">
                <div class="um-notice-item__day">{{ \Carbon\Carbon::parse($notice->date ?? $notice->created_at)->format('d') }}</div>
                <div class="um-notice-item__month">{{ \Carbon\Carbon::parse($notice->date ?? $notice->created_at)->format('M') }}</div>
              </div>
              <div class="um-notice-item__body">
                <div class="um-notice-item__badges">
                  <span class="um-badge um-badge--emerald">নোটিশ</span>
                  @if($loop->index < 2) <span class="um-badge um-badge--danger"><i class="fa-solid fa-bell"></i> নতুন</span> @endif
                </div>
                <h4 class="um-notice-item__title">{{ $notice->title }}</h4>
                <div class="um-notice-item__meta"><span><i class="fa-regular fa-clock"></i> {{ \Carbon\Carbon::parse($notice->date ?? $notice->created_at)->diffForHumans() }}</span></div>
              </div>
            </a>
          @endforeach
        </div>
        <div style="margin-top: 24px;">
          <a href="{{ route('web-notice-list') }}" class="um-btn um-btn--ghost-dark">সকল নোটিশ <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- Events -->
      <div data-reveal data-reveal-delay="2">
        <div class="um-section-head um-section-head--left" style="text-align:left; margin-bottom: 32px;">
          <span class="um-section-head__eyebrow">আসন্ন ইভেন্ট</span>
          <h2 class="um-section-head__title" style="font-size: 30px;">গ্রামের ইভেন্ট</h2>
        </div>
        <div style="display: flex; flex-direction: column; gap: 16px;">
          @foreach($events->take(4) as $event)
            <a href="{{ route('web-event-show', $event->id) }}" class="um-event-card">
              <div class="um-event-card__date">
                <div class="um-event-card__day">{{ \Carbon\Carbon::parse($event->date ?? $event->created_at)->format('d') }}</div>
                <div class="um-event-card__month">{{ \Carbon\Carbon::parse($event->date ?? $event->created_at)->format('M') }}</div>
              </div>
              <div class="um-event-card__body">
                <h4 class="um-event-card__title">{{ $event->title }}</h4>
                <div class="um-event-card__meta">
                  <span><i class="fa-solid fa-location-dot"></i> উমনপুর</span>
                  <span><i class="fa-regular fa-clock"></i> {{ \Carbon\Carbon::parse($event->date ?? $event->created_at)->format('h:i A') }}</span>
                </div>
              </div>
            </a>
          @endforeach
        </div>
        <div style="margin-top: 24px;">
          <a href="{{ route('web-event-list') }}" class="um-btn um-btn--ghost-dark">সকল ইভেন্ট <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ DONATE ============ -->
<section class="um-section" id="donate-section" style="background: linear-gradient(180deg, var(--cream) 0%, #fff 100%);">
  <div class="um-container">
    <div class="um-section-head" data-reveal>
      <span class="um-section-head__eyebrow">অংশগ্রহণ করুন</span>
      <h2 class="um-section-head__title">চলমান তহবিল সংগ্রহ</h2>
      <p class="um-section-head__subtitle">গ্রামের উন্নয়ন ও জনকল্যাণে আপনিও অবদান রাখুন</p>
    </div>

    <div class="um-donate-grid">
      @foreach($donates as $donate)
        @php
          $raised = \App\Models\Income::where('donate_id', $donate->id)->where('status', 1)->sum('amount');
          $goal = $donate->goal ?: 1;
          $percent = min(100, round(($raised / $goal) * 100));
          $donorCount = \App\Models\Income::where('donate_id', $donate->id)->where('status', 1)->distinct('user_id')->count('user_id');
        @endphp
        <div class="um-donate-card" data-reveal data-reveal-delay="{{ $loop->index + 1 }}">
          <div class="um-donate-card__img">
            <img src="{{ umonpur_asset('uploads/donate/' . $donate->image, 'donate') }}" alt="{{ $donate->name }}">
          </div>
          <div class="um-donate-card__body">
            <h3 class="um-donate-card__title">{{ $donate->name }}</h3>
            <p class="um-donate-card__excerpt">{{ strip_tags($donate->description) }}</p>
            <div class="um-progress">
              <div class="um-progress__top">
                <span class="raised">৳ {{ number_format($raised) }} সংগৃহীত</span>
                <span class="goal">লক্ষ্য ৳ {{ number_format($goal) }}</span>
              </div>
              <div class="um-progress__bar"><div class="um-progress__fill" style="width: {{ $percent }}%"></div></div>
            </div>
            <div class="um-donate-card__meta">
              <span><i class="fa-solid fa-users"></i> {{ $donorCount }} জন দাতা</span>
              <span><i class="fa-solid fa-percent"></i> {{ $percent }}% সম্পন্ন</span>
            </div>
            <a href="{{ route('web-donate-show', $donate->id) }}" class="um-btn um-btn--gold" style="width:100%"><i class="fa-solid fa-heart"></i> দান করুন</a>
          </div>
        </div>
      @endforeach
      @if($donates->isEmpty())
        <div class="um-empty" style="grid-column: 1 / -1;">
          <div class="um-empty__icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
          <h3 class="um-empty__title">বর্তমানে কোন তহবিল সংগ্রহ চলছে না</h3>
          <p>শীঘ্রই নতুন ক্যাম্পেইন আসছে</p>
        </div>
      @endif
    </div>
  </div>
</section>

<!-- ============ PHOTO GALLERY ============ -->
@if($recent_photos->isNotEmpty())
<section class="um-section um-section--emerald-gradient">
  <div class="um-container">
    <div class="um-section-head" data-reveal>
      <span class="um-section-head__eyebrow">স্মৃতিচারণা</span>
      <h2 class="um-section-head__title">ছবি গ্যালারি</h2>
      <p class="um-section-head__subtitle">গ্রামের নানা মুহূর্তের স্থিরচিত্র</p>
    </div>

    <div class="um-photo-masonry" data-reveal data-reveal-delay="1">
      @foreach($recent_photos as $photo)
        <div class="um-photo-tile">
          <img src="{{ umonpur_asset('uploads/album/photos/' . $photo->image, 'photo') }}" alt="" loading="lazy">
          <div class="um-photo-tile__zoom"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
        </div>
      @endforeach
    </div>

    <div class="um-section-action" data-reveal>
      <a href="{{ route('web-photo') }}" class="um-btn um-btn--gold um-btn--lg">সম্পূর্ণ গ্যালারি <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>
</section>
@endif

<!-- ============ TESTIMONIALS ============ -->
@if($testimonials->isNotEmpty())
<section class="um-section um-section--cream">
  <div class="um-container">
    <div class="um-section-head" data-reveal>
      <span class="um-section-head__eyebrow">গ্রামবাসীর অভিজ্ঞতা</span>
      <h2 class="um-section-head__title">তারা যা বলছেন</h2>
      <p class="um-section-head__subtitle">আমাদের গ্রামের মানুষের কথা ও অনুভূতি</p>
    </div>

    <div class="um-testimonial-grid">
      @foreach($testimonials->take(3) as $test)
        <div class="um-testimonial-card" data-reveal data-reveal-delay="{{ $loop->index + 1 }}">
          <div class="um-testimonial-card__quote-mark">"</div>
          <div class="um-testimonial-card__stars">
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
          </div>
          <p class="um-testimonial-card__text">{{ \Illuminate\Support\Str::limit(strip_tags($test->message), 180) }}</p>
          <div class="um-testimonial-card__author">
            @php $tImgMissing = !empty($test->image) && !file_exists(public_path('uploads/testimonial/' . $test->image)); @endphp
            @if($tImgMissing)
              <div class="um-testimonial-card__avatar" style="background: var(--emerald-600); color: #fff; display:flex; align-items:center; justify-content:center; font-weight:700;">{{ strtoupper(mb_substr($test->name, 0, 1)) }}</div>
            @else
              <img src="{{ umonpur_asset('uploads/testimonial/' . $test->image, 'testimonial') }}" alt="{{ $test->name }}" class="um-testimonial-card__avatar">
            @endif
            <div>
              <div class="um-testimonial-card__name">{{ $test->name }}</div>
              <div class="um-testimonial-card__role">{{ $test->designation }}</div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- ============ COMMITTEE ============ -->
@if($profiles->isNotEmpty())
<section class="um-section" style="background: linear-gradient(180deg, #fff 0%, var(--cream) 100%);">
  <div class="um-container">
    <div class="um-section-head" data-reveal>
      <span class="um-section-head__eyebrow">উমনপুর আইটি</span>
      <h2 class="um-section-head__title">পরিচালনা পরিষদ</h2>
      <p class="um-section-head__subtitle">গ্রামের ডিজিটাল রূপান্তরে নিয়োজিত ব্যক্তিবর্গ</p>
    </div>

    <div class="um-profile-grid">
      @foreach($profiles->take(4) as $profile)
        <div class="um-profile-card" data-reveal data-reveal-delay="{{ ($loop->index % 4) + 1 }}">
          @php $pImgMissing = !empty($profile->image) && !file_exists(public_path('uploads/profile/' . $profile->image)); @endphp
          @if($pImgMissing)
            <div class="um-profile-card__avatar" style="background: var(--emerald-600); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:32px;">{{ strtoupper(mb_substr($profile->name, 0, 1)) }}</div>
          @else
            <img src="{{ umonpur_asset('uploads/profile/' . $profile->image, 'profile') }}" alt="{{ $profile->name }}" class="um-profile-card__avatar">
          @endif
          <h4 class="um-profile-card__name">{{ $profile->name }}</h4>
          <p class="um-profile-card__role">{{ \Illuminate\Support\Str::limit(strip_tags($profile->description), 40) }}</p>
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

<!-- ============ QUICK LINKS ============ -->
@if($links->isNotEmpty())
<section class="um-section um-section--cream">
  <div class="um-container">
    <div class="um-section-head" data-reveal>
      <span class="um-section-head__eyebrow">দ্রুত অ্যাক্সেস</span>
      <h2 class="um-section-head__title">গুরুত্বপূর্ণ লিংক</h2>
      <p class="um-section-head__subtitle">গ্রাম সম্পর্কিত প্রয়োজনীয় সেবা ও তথ্য</p>
    </div>

    <div class="um-links-grid" data-reveal data-reveal-delay="1">
      @foreach($links as $link)
        <a href="{{ $link->link }}" target="_blank" class="um-link-tile">
          <div class="um-link-tile__icon"><i class="fa-solid fa-up-right-from-square"></i></div>
          <div>
            <h4 class="um-link-tile__title">{{ $link->name }}</h4>
            <p class="um-link-tile__sub">বাহ্যিক লিংক</p>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- ============ CTA BAND ============ -->
<section class="um-section" style="padding-top: 0;">
  <div class="um-container">
    <div class="um-cta-band" data-reveal>
      <div class="um-cta-band__text">
        <h3 class="um-cta-band__title">গ্রামের উন্নয়নে যুক্ত হোন</h3>
        <p class="um-cta-band__sub">আপনার সহযোগিতা ও পরামর্শ আমাদের এগিয়ে যেতে সাহায্য করবে। আজই যুক্ত হোন উমনপুর পরিবারে।</p>
      </div>
      <div class="um-cta-band__actions">
        <a href="#" class="um-btn um-btn--gold um-btn--lg" data-bs-toggle="modal" data-bs-target="#donationModal"><i class="fa-solid fa-heart"></i> দান করুন</a>
        <a href="{{ route('web-message') }}" class="um-btn um-btn--ghost um-btn--lg">যোগাযোগ করুন</a>
      </div>
    </div>
  </div>
</section>

<!-- Hero slider script -->
@push('scripts')
<script>
(function(){
  var slides = document.querySelectorAll('.um-hero__slide');
  var dots = document.querySelectorAll('.um-hero__dot');
  if (slides.length <= 1) return;
  var current = 0;
  function go(n){
    slides[current].classList.remove('is-active');
    if (dots[current]) dots[current].classList.remove('is-active');
    current = (n + slides.length) % slides.length;
    slides[current].classList.add('is-active');
    if (dots[current]) dots[current].classList.add('is-active');
  }
  dots.forEach(function(dot, i){
    dot.addEventListener('click', function(){ go(i); });
  });
  setInterval(function(){ go(current + 1); }, 5500);
})();
</script>
@endpush

@endsection
