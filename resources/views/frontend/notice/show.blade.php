@extends('frontend.main')

@section('title', $notice->title ?? 'নোটিশ')

@section('content')

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span>
      <a href="{{ route('web-notice-list') }}">নোটিশ</a> <span>/</span>
      <span>{{ \Illuminate\Support\Str::limit($notice->title, 50) }}</span>
    </div>
    <h1 class="um-page-hero__title">{{ $notice->title }}</h1>
    <div style="display: flex; gap: 18px; align-items: center; margin-top: 16px; color: rgba(255,255,255,0.85); font-size: 14px; flex-wrap: wrap;">
      <span><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($notice->date ?? $notice->created_at)->format('d M, Y') }}</span>
      <span><i class="fa-regular fa-user"></i> {{ $notice->user->name ?? 'অজানা' }}</span>
    </div>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    <article class="um-article" data-reveal>
      @if($notice->image)
        <div class="um-article__hero"><img src="{{ umonpur_asset('uploads/posts/' . $notice->image, 'post') }}" alt="{{ $notice->title }}"></div>
      @endif
      <div class="um-article__body">{!! $notice->description !!}</div>
      <div class="um-article__share">
        <span style="font-weight: 600; color: var(--emerald-900);">শেয়ার করুন:</span>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://wa.me/?text={{ urlencode($notice->title . ' ' . request()->fullUrl()) }}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="mailto:?subject={{ urlencode($notice->title) }}&body={{ urlencode(request()->fullUrl()) }}"><i class="fa-solid fa-envelope"></i></a>
      </div>
    </article>
    <div style="max-width: 760px; margin: 40px auto 0;">
      <a href="{{ route('web-notice-list') }}" class="um-btn um-btn--ghost-dark"><i class="fa-solid fa-arrow-left"></i> সকল নোটিশ</a>
    </div>
  </div>
</section>

@endsection
