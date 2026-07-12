@extends('frontend.main')

@section('title', 'ইভেন্ট')

@section('content')

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span> <span>ইভেন্ট</span>
    </div>
    <h1 class="um-page-hero__title">গ্রামের ইভেন্ট</h1>
    <p class="um-page-hero__subtitle">উমনপুর গ্রামের সকল আয়োজন ও ইভেন্ট</p>
  </div>
</section>

<section class="um-section">
  <div class="um-container" style="max-width: 920px;">
    @if($events->isNotEmpty())
      <div class="um-event-grid" style="grid-template-columns: 1fr;">
        @foreach($events as $event)
          <a href="{{ route('web-event-show', $event->id) }}" class="um-event-card" data-reveal data-reveal-delay="{{ ($loop->index % 3) + 1 }}">
            <div class="um-event-card__date">
              <div class="um-event-card__day">{{ \Carbon\Carbon::parse($event->date ?? $event->created_at)->format('d') }}</div>
              <div class="um-event-card__month">{{ \Carbon\Carbon::parse($event->date ?? $event->created_at)->format('M') }}</div>
            </div>
            <div class="um-event-card__body">
              <div class="um-notice-item__badges" style="margin-bottom: 6px;"><span class="um-badge um-badge--gold">ইভেন্ট</span></div>
              <h4 class="um-event-card__title" style="font-size: 18px;">{{ $event->title }}</h4>
              @if($event->sub_title) <p style="color: var(--ink-soft); font-size: 14px; margin: 0 0 8px;">{{ $event->sub_title }}</p> @endif
              <div class="um-event-card__meta">
                <span><i class="fa-solid fa-location-dot"></i> উমনপুর</span>
                <span><i class="fa-regular fa-clock"></i> {{ \Carbon\Carbon::parse($event->date ?? $event->created_at)->format('d M, Y h:i A') }}</span>
              </div>
            </div>
            <div style="align-self: center; color: var(--gold-600);"><i class="fa-solid fa-arrow-right"></i></div>
          </a>
        @endforeach
      </div>
    @else
      <div class="um-empty">
        <div class="um-empty__icon"><i class="fa-solid fa-calendar-xmark"></i></div>
        <h3 class="um-empty__title">কোন ইভেন্ট নেই</h3>
      </div>
    @endif
  </div>
</section>

@endsection
