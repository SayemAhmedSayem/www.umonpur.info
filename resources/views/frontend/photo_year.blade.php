@extends('frontend.main')

@section('title', $album->name ?? 'ছবি গ্যালারি')

@section('content')

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span>
      <a href="{{ route('web-photo') }}">ছবি গ্যালারি</a> <span>/</span>
      <span>{{ $album->name }}</span>
    </div>
    <h1 class="um-page-hero__title">{{ $album->name }}</h1>
    <p class="um-page-hero__subtitle">বছর অনুযায়ী ছবি নির্বাচন করুন</p>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    @if($years->isNotEmpty())
      <div class="um-news-grid">
        @foreach($years as $year)
          @php
            $photoCount = \App\Models\Photo::where('year_id', $year->id)->count();
            $cover = \App\Models\Photo::where('year_id', $year->id)->latest()->first();
          @endphp
          <a href="{{ route('web-photo-photo', $year->id) }}" class="um-news-card" data-reveal data-reveal-delay="{{ ($loop->index % 4) + 1 }}">
            <div class="um-news-card__img">
              @if($cover && $cover->image)
                <img src="{{ umonpur_asset('uploads/album/photos/' . $cover->image, 'photo') }}" alt="{{ $year->name }}">
              @else
                <img src="https://images.unsplash.com/photo-1530088787231-7b99c5f0c0b4?w=600&q=80" alt="">
              @endif
              <span class="um-badge um-badge--gold um-news-card__badge">{{ $photoCount }} ছবি</span>
            </div>
            <div class="um-news-card__body">
              <h3 class="um-news-card__title">{{ $year->name }}</h3>
              <span class="um-news-card__more">ছবি দেখুন <i class="fa-solid fa-arrow-right"></i></span>
            </div>
          </a>
        @endforeach
      </div>
      <div class="um-pagination">{{ $years->links() }}</div>
    @else
      <div class="um-empty">
        <div class="um-empty__icon"><i class="fa-regular fa-calendar"></i></div>
        <h3 class="um-empty__title">এই অ্যালবামে কোন বছর যোগ করা হয়নি</h3>
      </div>
    @endif
  </div>
</section>

@endsection
