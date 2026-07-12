@extends('frontend.main')

@section('title', $album->name ?? 'ভিডিও')

@section('content')

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span>
      <a href="{{ route('web-video') }}">ভিডিও গ্যালারি</a> <span>/</span>
      <span>{{ $album->name }}</span>
    </div>
    <h1 class="um-page-hero__title">{{ $album->name }}</h1>
    <p class="um-page-hero__subtitle">{{ $videos->total() }} টি ভিডিও</p>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    @if($videos->isNotEmpty())
      <div class="um-news-grid">
        @foreach($videos as $video)
          <div class="um-news-card" data-reveal data-reveal-delay="{{ ($loop->index % 4) + 1 }}">
            <div class="um-news-card__img" style="position:relative;">
              @if($video->image)
                <img src="{{ umonpur_asset('uploads/album/videos/' . $video->image, 'video') }}" alt="{{ $video->title }}">
              @else
                <img src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=600&q=80" alt="">
              @endif
              @if($video->url)
                <a href="{{ $video->url }}" target="_blank" style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:64px; height:64px; background:rgba(11,110,79,0.85); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#fff; font-size:24px;"><i class="fa-solid fa-play"></i></a>
              @endif
              <span class="um-badge um-badge--gold um-news-card__badge"><i class="fa-solid fa-video"></i> ভিডিও</span>
            </div>
            <div class="um-news-card__body">
              <div class="um-news-card__date"><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($video->date ?? $video->created_at)->format('d M, Y') }}</div>
              <h3 class="um-news-card__title">{{ $video->title }}</h3>
              <p class="um-news-card__excerpt">{{ strip_tags($video->description) }}</p>
              @if($video->url)
                <a href="{{ $video->url }}" target="_blank" class="um-news-card__more">ভিডিও দেখুন <i class="fa-solid fa-play"></i></a>
              @endif
            </div>
          </div>
        @endforeach
      </div>
      <div class="um-pagination">{{ $videos->links() }}</div>
    @else
      <div class="um-empty">
        <div class="um-empty__icon"><i class="fa-solid fa-video"></i></div>
        <h3 class="um-empty__title">এই অ্যালবামে কোন ভিডিও নেই</h3>
      </div>
    @endif
  </div>
</section>

@endsection
