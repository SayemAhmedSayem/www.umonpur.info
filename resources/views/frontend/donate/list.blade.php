@extends('frontend.main')

@section('title', 'সাহায্য করুন')

@section('content')

@php $donates = \App\Models\Donate::orderBy('created_at', 'desc')->paginate(6); @endphp

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span> <span>সাহায্য করুন</span>
    </div>
    <h1 class="um-page-hero__title">তহবিলে সাহায্য করুন</h1>
    <p class="um-page-hero__subtitle">গ্রামের উন্নয়ন ও জনকল্যাণে আপনিও অবদান রাখুন</p>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    @if($donates->isNotEmpty())
      <div class="um-donate-grid">
        @foreach($donates as $donate)
          @php
            $raised = \App\Models\Income::where('donate_id', $donate->id)->where('status', 1)->sum('amount');
            $goal = $donate->goal ?: 1;
            $percent = min(100, round(($raised / $goal) * 100));
            $donorCount = \App\Models\Income::where('donate_id', $donate->id)->where('status', 1)->distinct('user_id')->count('user_id');
          @endphp
          <div class="um-donate-card" data-reveal data-reveal-delay="{{ ($loop->index % 3) + 1 }}">
            <div class="um-donate-card__img">
              @if($donate->image)
                <img src="{{ umonpur_asset('uploads/donate/' . $donate->image, 'donate') }}" alt="{{ $donate->name }}">
              @else
                <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?w=600&q=80" alt="">
              @endif
            </div>
            <div class="um-donate-card__body">
              <h3 class="um-donate-card__title">{{ $donate->name }}</h3>
              <p class="um-donate-card__excerpt">{{ strip_tags($donate->description) }}</p>
              <div class="um-progress">
                <div class="um-progress__top">
                  <span class="raised">৳ {{ number_format($raised) }}</span>
                  <span class="goal">৳ {{ number_format($goal) }}</span>
                </div>
                <div class="um-progress__bar"><div class="um-progress__fill" style="width: {{ $percent }}%"></div></div>
              </div>
              <div class="um-donate-card__meta">
                <span><i class="fa-solid fa-users"></i> {{ $donorCount }} জন দাতা</span>
                <span><i class="fa-solid fa-percent"></i> {{ $percent }}%</span>
              </div>
              <a href="{{ route('web-donate-show', $donate->id) }}" class="um-btn um-btn--gold" style="width:100%"><i class="fa-solid fa-heart"></i> দান করুন</a>
            </div>
          </div>
        @endforeach
      </div>
      <div class="um-pagination">{{ $donates->links() }}</div>
    @else
      <div class="um-empty">
        <div class="um-empty__icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
        <h3 class="um-empty__title">বর্তমানে কোন তহবিল সংগ্রহ চলছে না</h3>
      </div>
    @endif
  </div>
</section>

@endsection
