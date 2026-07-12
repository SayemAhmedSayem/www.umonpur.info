@extends('frontend.main')

@section('title', 'বিভাগ - ' . ($latests->first()->category->name ?? ''))

@section('content')

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span>
      <a href="{{ route('web-post-list') }}">সংবাদ</a> <span>/</span>
      <span>বিভাগ</span>
    </div>
    <h1 class="um-page-hero__title">{{ $latests->first()->category->name ?? 'বিভাগ' }}</h1>
    <p class="um-page-hero__subtitle">এই বিভাগের সকল পোস্ট</p>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    @if($latests->isNotEmpty())
      <div class="um-news-grid" style="grid-template-columns: repeat(3, 1fr);">
        @foreach($latests as $latest)
          <a href="{{ route('web-post-show', $latest->id) }}" class="um-news-card" data-reveal data-reveal-delay="{{ ($loop->index % 3) + 1 }}">
            <div class="um-news-card__img">
              @if($latest->image)
                <img src="{{ umonpur_asset('uploads/posts/' . $latest->image, 'post') }}" alt="{{ $latest->title }}">
              @else
                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600&q=80" alt="">
              @endif
              <span class="um-badge um-badge--gold um-news-card__badge">{{ $latest->category->name ?? 'সংবাদ' }}</span>
            </div>
            <div class="um-news-card__body">
              <div class="um-news-card__date"><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($latest->date ?? $latest->created_at)->format('d M, Y') }}</div>
              <h3 class="um-news-card__title">{{ $latest->title }}</h3>
              <p class="um-news-card__excerpt">{{ strip_tags($latest->description) }}</p>
              <span class="um-news-card__more">বিস্তারিত <i class="fa-solid fa-arrow-right"></i></span>
            </div>
          </a>
        @endforeach
      </div>
      <div class="um-pagination">{{ $latests->links() }}</div>
    @else
      <div class="um-empty">
        <div class="um-empty__icon"><i class="fa-solid fa-folder-open"></i></div>
        <h3 class="um-empty__title">এই বিভাগে কোন পোস্ট নেই</h3>
      </div>
    @endif
  </div>
</section>

@endsection
