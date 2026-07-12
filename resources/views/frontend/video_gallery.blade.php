@extends('frontend.main')

@section('title', 'ভিডিও গ্যালারি')

@section('content')

@php $albums = \App\Models\Album::where('type', 'Video')->latest()->get(); @endphp

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span> <span>ভিডিও গ্যালারি</span>
    </div>
    <h1 class="um-page-hero__title">ভিডিও গ্যালারি</h1>
    <p class="um-page-hero__subtitle">গ্রামের নানা অনুষ্ঠান ও মুহূর্তের ভিডিও</p>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    @if($albums->isNotEmpty())
      <div class="um-news-grid">
        @foreach($albums as $album)
          @php $vidCount = \App\Models\Video::where('album_id', $album->id)->count(); @endphp
          <a href="{{ route('web-video-video', $album->id) }}" class="um-news-card" data-reveal data-reveal-delay="{{ ($loop->index % 4) + 1 }}">
            <div class="um-news-card__img">
              <img src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=600&q=80" alt="{{ $album->name }}">
              <span class="um-badge um-badge--gold um-news-card__badge"><i class="fa-solid fa-video"></i> {{ $vidCount }} ভিডিও</span>
              <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:60px; height:60px; background:rgba(11,110,79,0.85); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#fff; font-size:22px;"><i class="fa-solid fa-play"></i></div>
            </div>
            <div class="um-news-card__body">
              <h3 class="um-news-card__title">{{ $album->name }}</h3>
              <span class="um-news-card__more">ভিডিও দেখুন <i class="fa-solid fa-arrow-right"></i></span>
            </div>
          </a>
        @endforeach
      </div>
    @else
      <div class="um-empty">
        <div class="um-empty__icon"><i class="fa-solid fa-video"></i></div>
        <h3 class="um-empty__title">কোন ভিডিও অ্যালবাম নেই</h3>
      </div>
    @endif
  </div>
</section>

@endsection
