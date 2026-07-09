@extends('frontend.main')

@section('title', 'নোটিশ')

@section('content')

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span> <span>নোটিশ</span>
    </div>
    <h1 class="um-page-hero__title">নোটিশ বোর্ড</h1>
    <p class="um-page-hero__subtitle">গ্রামের সকল গুরুত্বপূর্ণ ঘোষণা ও নোটিশ</p>
  </div>
</section>

<section class="um-section">
  <div class="um-container" style="max-width: 880px;">
    @if($notices->isNotEmpty())
      <div class="um-notice-list" data-reveal>
        @foreach($notices as $notice)
          <a href="{{ route('web-notice-show', $notice->id) }}" class="um-notice-item">
            <div class="um-notice-item__date">
              <div class="um-notice-item__day">{{ \Carbon\Carbon::parse($notice->date ?? $notice->created_at)->format('d') }}</div>
              <div class="um-notice-item__month">{{ \Carbon\Carbon::parse($notice->date ?? $notice->created_at)->format('M Y') }}</div>
            </div>
            <div class="um-notice-item__body">
              <div class="um-notice-item__badges">
                <span class="um-badge um-badge--emerald">নোটিশ</span>
                @if($loop->index < 3) <span class="um-badge um-badge--danger"><i class="fa-solid fa-bell"></i> নতুন</span> @endif
              </div>
              <h4 class="um-notice-item__title">{{ $notice->title }}</h4>
              <div class="um-notice-item__meta">
                <span><i class="fa-regular fa-clock"></i> {{ \Carbon\Carbon::parse($notice->date ?? $notice->created_at)->diffForHumans() }}</span>
                <span><i class="fa-regular fa-user"></i> {{ $notice->user->name ?? 'অজানা' }}</span>
              </div>
            </div>
          </a>
        @endforeach
      </div>
    @else
      <div class="um-empty">
        <div class="um-empty__icon"><i class="fa-solid fa-bullhorn"></i></div>
        <h3 class="um-empty__title">কোন নোটিশ নেই</h3>
      </div>
    @endif
  </div>
</section>

@endsection
