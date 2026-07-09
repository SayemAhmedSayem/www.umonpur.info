@extends('frontend.main')

@section('title', 'মতামত')

@section('content')

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span> <span>মতামত</span>
    </div>
    <h1 class="um-page-hero__title">গ্রামবাসীর মতামত</h1>
    <p class="um-page-hero__subtitle">আমাদের গ্রামের মানুষের অভিজ্ঞতা ও অনুভূতি</p>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    @if($testimonials->isNotEmpty())
      <div class="um-testimonial-grid">
        @foreach($testimonials as $test)
          <div class="um-testimonial-card" data-reveal data-reveal-delay="{{ ($loop->index % 3) + 1 }}">
            <div class="um-testimonial-card__quote-mark">"</div>
            <div class="um-testimonial-card__stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p class="um-testimonial-card__text">{{ \Illuminate\Support\Str::limit(strip_tags($test->message), 220) }}</p>
            <div class="um-testimonial-card__author">
              @if($test->image)
                <img src="{{ umonpur_asset('uploads/testimonial/' . $test->image, 'testimonial') }}" alt="{{ $test->name }}" class="um-testimonial-card__avatar">
              @else
                <div class="um-testimonial-card__avatar" style="background: var(--emerald-600); color: #fff; display:flex; align-items:center; justify-content:center; font-weight:700;">{{ strtoupper(substr($test->name, 0, 1)) }}</div>
              @endif
              <div>
                <div class="um-testimonial-card__name">{{ $test->name }}</div>
                <div class="um-testimonial-card__role">{{ $test->designation }}</div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="um-pagination">{{ $testimonials->links() }}</div>
    @else
      <div class="um-empty">
        <div class="um-empty__icon"><i class="fa-solid fa-quote-right"></i></div>
        <h3 class="um-empty__title">কোন মতামত নেই</h3>
      </div>
    @endif
  </div>
</section>

@endsection
