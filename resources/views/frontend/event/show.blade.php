@extends('frontend.main')

@section('title', $event->title ?? 'ইভেন্ট')

@section('content')

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span>
      <a href="{{ route('web-event-list') }}">ইভেন্ট</a> <span>/</span>
      <span>{{ \Illuminate\Support\Str::limit($event->title, 50) }}</span>
    </div>
    <h1 class="um-page-hero__title">{{ $event->title }}</h1>
    <div style="display: flex; gap: 18px; align-items: center; margin-top: 16px; color: rgba(255,255,255,0.85); font-size: 14px; flex-wrap: wrap;">
      <span><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($event->date ?? $event->created_at)->format('d M, Y') }}</span>
      <span><i class="fa-solid fa-location-dot"></i> উমনপুর</span>
      <span><i class="fa-regular fa-user"></i> {{ $event->user->name ?? 'অজানা' }}</span>
    </div>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    <article class="um-article" data-reveal>
      @if($event->image)
        <div class="um-article__hero"><img src="{{ umonpur_asset('uploads/posts/' . $event->image, 'post') }}" alt="{{ $event->title }}"></div>
      @endif
      @if($event->sub_title)
        <p style="font-size: 19px; color: var(--ink-soft); line-height: 1.7; margin: 0 0 24px; font-style: italic;">{{ $event->sub_title }}</p>
      @endif
      <div class="um-article__body">{!! $event->description !!}</div>
      <div class="um-article__share">
        <span style="font-weight: 600; color: var(--emerald-900);">শেয়ার করুন:</span>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://wa.me/?text={{ urlencode($event->title . ' ' . request()->fullUrl()) }}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
      </div>
    </article>
    <div style="max-width: 760px; margin: 40px auto 0;">
      <a href="{{ route('web-event-list') }}" class="um-btn um-btn--ghost-dark"><i class="fa-solid fa-arrow-left"></i> সকল ইভেন্ট</a>
    </div>
  </div>
</section>

@endsection
