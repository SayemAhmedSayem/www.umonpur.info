@extends('frontend.main')

@section('title', $test->name ?? 'মতামত')

@section('content')

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span>
      <a href="{{ route('web-testimonial') }}">মতামত</a> <span>/</span>
      <span>{{ $test->name }}</span>
    </div>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    <div class="glass-card" style="background: #fff; max-width: 880px; margin: 0 auto;" data-reveal>
      <div style="text-align: center; margin-bottom: 28px;">
        @if($test->image)
          <img src="{{ umonpur_asset('uploads/testimonial/' . $test->image, 'testimonial') }}" alt="{{ $test->name }}" style="width: 110px; height: 110px; border-radius: 50%; object-fit: cover; border: 4px solid var(--gold-500); margin: 0 auto 16px;">
        @endif
        <h2 style="font-size: 26px; color: var(--emerald-900); margin: 0 0 4px;">{{ $test->name }}</h2>
        <p style="color: var(--gold-600); margin: 0;">{{ $test->designation }}</p>
        <div class="um-testimonial-card__stars" style="margin-top: 10px;">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
        </div>
      </div>
      <div style="font-size: 18px; line-height: 1.9; color: var(--ink); text-align: center; font-style: italic;">
        <i class="fa-solid fa-quote-left" style="color: var(--gold-500); font-size: 28px; margin-right: 8px;"></i>
        {{ strip_tags($test->message) }}
      </div>
    </div>
    <div style="text-align: center; margin-top: 32px;">
      <a href="{{ route('web-testimonial') }}" class="um-btn um-btn--ghost-dark"><i class="fa-solid fa-arrow-left"></i> সকল মতামত</a>
    </div>
  </div>
</section>

@endsection
