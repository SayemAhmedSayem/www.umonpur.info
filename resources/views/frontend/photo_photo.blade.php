@extends('frontend.main')

@section('title', $year->name ?? 'ছবি')

@section('content')

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span>
      <a href="{{ route('web-photo') }}">ছবি গ্যালারি</a> <span>/</span>
      <a href="{{ route('web-year', $album->id) }}">{{ $album->name }}</a> <span>/</span>
      <span>{{ $year->name }}</span>
    </div>
    <h1 class="um-page-hero__title">{{ $year->name }} — ছবি সংগ্রহ</h1>
    <p class="um-page-hero__subtitle">{{ $photos->total() }} টি ছবি পাওয়া গেছে</p>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    @if($photos->isNotEmpty())
      <div class="um-photo-masonry" data-reveal>
        @foreach($photos as $photo)
          <div class="um-photo-tile">
            @if($photo->image)
              <img src="{{ umonpur_asset('uploads/album/photos/' . $photo->image, 'photo') }}" alt="" loading="lazy">
            @endif
            <div class="um-photo-tile__zoom"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
          </div>
        @endforeach
      </div>
      <div class="um-pagination">{{ $photos->links() }}</div>
    @else
      <div class="um-empty">
        <div class="um-empty__icon"><i class="fa-regular fa-image"></i></div>
        <h3 class="um-empty__title">এই বছরে কোন ছবি নেই</h3>
      </div>
    @endif
  </div>
</section>

@endsection
