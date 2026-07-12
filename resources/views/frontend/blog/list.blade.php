@extends('frontend.main')

@section('title', 'সংবাদ')

@section('content')

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span> <span>সংবাদ</span>
    </div>
    <h1 class="um-page-hero__title">সর্বশেষ সংবাদ</h1>
    <p class="um-page-hero__subtitle">গ্রামের সর্বশেষ খবর ও ঘটনাবলি</p>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    <div class="um-list-layout">
      <div data-reveal>
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
                  <span class="um-badge um-badge--gold um-news-card__badge">সংবাদ</span>
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
            <div class="um-empty__icon"><i class="fa-solid fa-newspaper"></i></div>
            <h3 class="um-empty__title">কোন সংবাদ পাওয়া যায়নি</h3>
          </div>
        @endif
      </div>

      <aside class="um-sidebar">
        <div class="um-sidebar-block">
          <h4>বিভাগ সমূহ</h4>
          @php $cats = \App\Models\Category::all(); @endphp
          @foreach($cats as $cat)
            <a href="{{ route('web-post-category', $cat->id) }}" class="um-cat-chip">{{ $cat->name }}</a>
          @endforeach
        </div>
        <div class="um-sidebar-block" style="background: linear-gradient(135deg, var(--emerald-700), var(--emerald-900)); color: #fff; border: none;">
          <h4 style="color: #fff; border-bottom-color: var(--gold-400);">দান করুন</h4>
          <p style="font-size: 14px; opacity: 0.9; margin: 0 0 14px;">গ্রামের উন্নয়নে অবদান রাখুন</p>
          <a href="{{ route('web-donate') }}" class="um-btn um-btn--gold um-btn--sm" style="width:100%"><i class="fa-solid fa-heart"></i> দান করুন</a>
        </div>
      </aside>
    </div>
  </div>
</section>

@endsection
