@extends('frontend.main')

@section('title', 'যোগাযোগ')

@section('content')

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span> <span>যোগাযোগ</span>
    </div>
    <h1 class="um-page-hero__title">যোগাযোগ করুন</h1>
    <p class="um-page-hero__subtitle">আপনার প্রশ্ন, পরামর্শ বা বার্তা আমাদের পাঠান</p>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    <div class="um-list-layout" style="grid-template-columns: 1fr 1.3fr;">
      <!-- Contact info -->
      <div data-reveal>
        <h2 style="font-size: 30px; color: var(--emerald-900); margin: 0 0 14px;">আমাদের সাথে যোগাযোগ করুন</h2>
        <p style="font-size: 16px; color: var(--ink-soft); line-height: 1.8; margin: 0 0 28px;">গ্রাম সম্পর্কিত যেকোনো বিষয়ে আমাদের সাথে যোগাযোগ করুন। আমরা যত দ্রুত সম্ভব আপনার সাথে যোগাযোগ করব।</p>

        <div style="display: flex; flex-direction: column; gap: 18px;">
          <div class="um-link-tile" style="cursor: default;">
            <div class="um-link-tile__icon"><i class="fa-solid fa-location-dot"></i></div>
            <div><h4 class="um-link-tile__title">ঠিকানা</h4><p class="um-link-tile__sub">উমনপুর গ্রাম, চিকনাগুল ইউনিয়ন, জৈন্তাপুর, সিলেট</p></div>
          </div>
          <div class="um-link-tile" style="cursor: default;">
            <div class="um-link-tile__icon"><i class="fa-solid fa-envelope"></i></div>
            <div><h4 class="um-link-tile__title">ইমেইল</h4><p class="um-link-tile__sub">umonpur@gmail.com</p></div>
          </div>
          <div class="um-link-tile" style="cursor: default;">
            <div class="um-link-tile__icon"><i class="fa-solid fa-phone"></i></div>
            <div><h4 class="um-link-tile__title">ফোন</h4><p class="um-link-tile__sub">01687 838 161</p></div>
          </div>
        </div>

        <div style="margin-top: 28px;">
          <h4 style="color: var(--emerald-900); margin: 0 0 12px;">সামাজিক যোগাযোগ</h4>
          <div style="display: flex; gap: 10px;">
            <a href="https://www.facebook.com/Umonpur" target="_blank" class="um-btn um-btn--emerald um-btn--sm"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.youtube.com/@umonpur-2304" target="_blank" class="um-btn um-btn--emerald um-btn--sm"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>
      </div>

      <!-- Form -->
      <div data-reveal data-reveal-delay="2">
        <div class="glass-card" style="background: #fff; border: 1px solid var(--line);">
          <h3 style="font-size: 22px; color: var(--emerald-900); margin: 0 0 24px;"><i class="fa-solid fa-paper-plane" style="color: var(--gold-600);"></i> বার্তা পাঠান</h3>
          <form method="POST" action="{{ route('web-message-store') }}" enctype="multipart/form-data">
            @csrf
            <div class="um-form-row">
              <div class="um-form-group">
                <label class="um-form-label">নাম *</label>
                <input type="text" name="name" class="um-form-control" placeholder="আপনার নাম" required>
              </div>
              <div class="um-form-group">
                <label class="um-form-label">ইমেইল *</label>
                <input type="email" name="email" class="um-form-control" placeholder="ইমেইল ঠিকানা" required>
              </div>
            </div>
            <div class="um-form-row">
              <div class="um-form-group">
                <label class="um-form-label">ফোন</label>
                <input type="text" name="phone" class="um-form-control" placeholder="ফোন নাম্বার">
              </div>
              <div class="um-form-group">
                <label class="um-form-label">বিষয়</label>
                <input type="text" name="subject" class="um-form-control" placeholder="বার্তার বিষয়">
              </div>
            </div>
            <div class="um-form-group">
              <label class="um-form-label">বার্তা *</label>
              <textarea name="message" class="um-form-control" rows="6" placeholder="আপনার বার্তা লিখুন" required></textarea>
            </div>
            <div class="um-form-group">
              <label class="um-form-label">ছবি (ঐচ্ছিক)</label>
              <input type="file" name="image" class="um-form-control">
            </div>
            <button type="submit" class="um-btn um-btn--gold um-btn--lg" style="width:100%"><i class="fa-solid fa-paper-plane"></i> বার্তা পাঠান</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
