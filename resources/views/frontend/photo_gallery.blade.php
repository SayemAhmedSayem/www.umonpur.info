@extends('frontend.main')

@section('title', 'ছবি গ্যালারি')

@section('content')

@php $albums = \App\Models\Album::where('type', 'Photo')->latest()->get(); @endphp

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span> <span>ছবি গ্যালারি</span>
    </div>
    <h1 class="um-page-hero__title">ছবি গ্যালারি</h1>
    <p class="um-page-hero__subtitle">গ্রামের নানা মুহূর্তের স্থিরচিত্র সংগ্রহ</p>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    @if($albums->isNotEmpty())
      <div class="um-news-grid">
        @foreach($albums as $album)
          @php
            $yearCount = \App\Models\Year::where('album_id', $album->id)->count();
            $yearIds = \App\Models\Year::where('album_id', $album->id)->pluck('id');
            $coverPhoto = \App\Models\Photo::whereIn('year_id', $yearIds)->latest()->first();
          @endphp
          <a href="{{ route('web-year', $album->id) }}" class="um-news-card" data-reveal data-reveal-delay="{{ ($loop->index % 4) + 1 }}">
            <div class="um-news-card__img">
              @if($coverPhoto && $coverPhoto->image)
                <img src="{{ umonpur_asset('uploads/album/photos/' . $coverPhoto->image, 'photo') }}" alt="{{ $album->name }}">
              @else
                <img src="https://images.unsplash.com/photo-1530088787231-7b99c5f0c0b4?w=600&q=80" alt="">
              @endif
              <span class="um-badge um-badge--gold um-news-card__badge"><i class="fa-regular fa-image"></i> {{ $yearCount }} বছর</span>
            </div>
            <div class="um-news-card__body">
              <h3 class="um-news-card__title">{{ $album->name }}</h3>
              <span class="um-news-card__more">বিস্তারিত দেখুন <i class="fa-solid fa-arrow-right"></i></span>
            </div>
          </a>
        @endforeach
      </div>
    @else
      <div class="um-empty">
        <div class="um-empty__icon"><i class="fa-regular fa-image"></i></div>
        <h3 class="um-empty__title">কোন অ্যালবাম নেই</h3>
      </div>
    @endif
  </div>
</section>

@endsection
