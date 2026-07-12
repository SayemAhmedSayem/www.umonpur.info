@extends('frontend.main')

@section('title', 'লগইন')

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
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 60px 56px;
  color: #fff;
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

.um-auth__form-side {
  display: flex; align-items: center; justify-content: center;
  padding: 60px 40px;
  background: var(--cream);
}
.um-auth__card {
  width: 100%; max-width: 420px;
}
.um-auth__title { font-size: 30px; color: var(--emerald-900); margin: 0 0 8px; font-weight: 700; }
.um-auth__sub { font-size: 15px; color: var(--ink-soft); margin: 0 0 32px; }
.um-auth__foot { margin-top: 24px; text-align: center; font-size: 14px; color: var(--ink-soft); }
.um-auth__foot a { color: var(--gold-600); font-weight: 600; }
@media (max-width: 992px) { .um-auth__media { display: none; } }
</style>

<div class="um-auth">
  <!-- Left: brand media -->
  <div class="um-auth__media">
    <div class="um-auth__brand">
      <img src="{{ asset('frontend/logo/logo.png') }}" alt="উমনপুর">
      <div>
        <strong>উমনপুর</strong>
        <small>একটি আদর্শ গ্রামের নাম</small>
      </div>
    </div>
    <div class="um-auth__quote">
      <h2>স্বাগতম ফিরে আসায়</h2>
      <p>আপনার অ্যাকাউন্টে সাইন ইন করে গ্রামের সাথে যুক্ত হোন। দান করুন, পোস্ট করুন, আপনার মতামত শেয়ার করুন।</p>
      <div class="um-auth__quote-by">— উমনপুর আইটি পরিচালনা পরিষদ</div>
    </div>
  </div>

  <!-- Right: form -->
  <div class="um-auth__form-side">
    <div class="um-auth__card">
      <h1 class="um-auth__title">সাইনইন করুন</h1>
      <p class="um-auth__sub">আপনার ইমেইল ও পাসওয়ার্ড দিয়ে লগইন করুন</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="um-form-group">
          <label class="um-form-label">ইমেইল</label>
          <input type="email" name="email" class="um-form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="আপনার ইমেইল" required autofocus>
          @error('email') <span class="um-invalid">{{ $message }}</span> @enderror
        </div>
        <div class="um-form-group">
          <label class="um-form-label">পাসওয়ার্ড</label>
          <input type="password" name="password" class="um-form-control" placeholder="পাসওয়ার্ড" required>
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
          <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; cursor: pointer;">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> মনে রাখুন
          </label>
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" style="font-size: 13px; color: var(--gold-600);">পাসওয়ার্ড ভুলে গেছেন?</a>
          @endif
        </div>
        <button type="submit" class="um-btn um-btn--emerald um-btn--lg" style="width:100%"><i class="fa-solid fa-right-to-bracket"></i> সাইনইন করুন</button>
      </form>

      <div class="um-auth__foot">
        নতুন এখানে? <a href="{{ route('register') }}">রেজিস্ট্রেশন করুন</a>
      </div>
    </div>
  </div>
</div>

@endsection
