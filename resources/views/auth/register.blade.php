@extends('frontend.main')

@section('title', 'রেজিস্ট্রেশন')

@section('content')

<style>
.um-auth {
  min-height: calc(100vh - 76px);
  display: grid;
  grid-template-columns: 1fr 1fr;
  margin-top: -76px;
}
@media (max-width: 992px) { .um-auth { grid-template-columns: 1fr; } }
.um-auth__media {
  background: linear-gradient(135deg, var(--emerald-900), var(--emerald-700));
  position: relative; overflow: hidden;
  display: flex; flex-direction: column; justify-content: center;
  padding: 60px 56px; color: #fff;
}
.um-auth__media::before {
  content: ""; position: absolute; top: -100px; right: -100px;
  width: 400px; height: 400px; border-radius: 50%;
  background: radial-gradient(circle, rgba(226,168,83,0.3) 0%, transparent 70%);
}
.um-auth__media::after {
  content: ""; position: absolute; bottom: -150px; left: -100px;
  width: 350px; height: 350px; border-radius: 50%;
  background: radial-gradient(circle, rgba(16,185,129,0.25) 0%, transparent 70%);
}
.um-auth__brand { display: flex; align-items: center; gap: 14px; margin-bottom: 60px; position: relative; z-index: 2; }
.um-auth__brand img { width: 56px; height: 56px; border-radius: 50%; border: 2px solid var(--gold-500); }
.um-auth__brand strong { font-size: 24px; color: #fff; }
.um-auth__brand small { display: block; font-size: 12px; color: rgba(255,255,255,0.8); }
.um-auth__quote { position: relative; z-index: 2; }
.um-auth__quote h2 { font-size: 36px; line-height: 1.3; margin: 0 0 18px; }
.um-auth__quote p { font-size: 16px; opacity: 0.9; line-height: 1.8; margin: 0; }
.um-auth__quote-by { margin-top: 24px; font-size: 13px; color: var(--gold-400); }
.um-auth__form-side { display: flex; align-items: center; justify-content: center; padding: 60px 40px; background: var(--cream); }
.um-auth__card { width: 100%; max-width: 460px; }
.um-auth__title { font-size: 30px; color: var(--emerald-900); margin: 0 0 8px; font-weight: 700; }
.um-auth__sub { font-size: 15px; color: var(--ink-soft); margin: 0 0 32px; }
.um-auth__foot { margin-top: 24px; text-align: center; font-size: 14px; color: var(--ink-soft); }
.um-auth__foot a { color: var(--gold-600); font-weight: 600; }
@media (max-width: 992px) { .um-auth__media { display: none; } }
</style>

<div class="um-auth">
  <div class="um-auth__media">
    <div class="um-auth__brand">
      <img src="{{ asset('frontend/logo/logo.png') }}" alt="উমনপুর">
      <div><strong>উমনপুর</strong><small>একটি আদর্শ গ্রামের নাম</small></div>
    </div>
    <div class="um-auth__quote">
      <h2>উমনপুর পরিবারে যুক্ত হোন</h2>
      <p>অ্যাকাউন্ট তৈরি করে গ্রামের সাথে সংযুক্ত হোন। দান করুন, মতামত শেয়ার করুন, গ্রামের উন্নয়নে অবদান রাখুন।</p>
      <div class="um-auth__quote-by">— উমনপুর আইটি পরিচালনা পরিষদ</div>
    </div>
  </div>

  <div class="um-auth__form-side">
    <div class="um-auth__card">
      <h1 class="um-auth__title">রেজিস্ট্রেশন করুন</h1>
      <p class="um-auth__sub">নতুন অ্যাকাউন্ট তৈরি করতে নিচের তথ্য পূরণ করুন</p>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="um-form-group">
          <label class="um-form-label">নাম</label>
          <input type="text" name="name" class="um-form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="আপনার পূর্ণ নাম" required autofocus>
          @error('name') <span class="um-invalid">{{ $message }}</span> @enderror
        </div>
        <div class="um-form-group">
          <label class="um-form-label">ইমেইল</label>
          <input type="email" name="email" class="um-form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="ইমেইল ঠিকানা" required>
          @error('email') <span class="um-invalid">{{ $message }}</span> @enderror
        </div>
        <div class="um-form-group">
          <label class="um-form-label">পাসওয়ার্ড</label>
          <input type="password" name="password" class="um-form-control @error('password') is-invalid @enderror" placeholder="কমপক্ষে ৮ অক্ষর" required>
          @error('password') <span class="um-invalid">{{ $message }}</span> @enderror
        </div>
        <div class="um-form-group">
          <label class="um-form-label">পাসওয়ার্ড নিশ্চিত করুন</label>
          <input type="password" name="password_confirmation" class="um-form-control" placeholder="পাসওয়ার্ড পুনরায় লিখুন" required>
        </div>
        <button type="submit" class="um-btn um-btn--gold um-btn--lg" style="width:100%; margin-top: 8px;"><i class="fa-solid fa-user-plus"></i> অ্যাকাউন্ট তৈরি করুন</button>
      </form>

      <div class="um-auth__foot">
        ইতিমধ্যে অ্যাকাউন্ট আছে? <a href="{{ route('login') }}">সাইনইন করুন</a>
      </div>
    </div>
  </div>
</div>

@endsection
