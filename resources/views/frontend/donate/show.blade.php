@extends('frontend.main')

@section('title', $donate->name ?? 'দান করুন')

@section('content')

@php
  $raised = \App\Models\Income::where('donate_id', $donate->id)->where('status', 1)->sum('amount');
  $goal = $donate->goal ?: 1;
  $percent = min(100, round(($raised / $goal) * 100));
  $donorCount = \App\Models\Income::where('donate_id', $donate->id)->where('status', 1)->distinct('user_id')->count('user_id');
  $donors = DB::table('incomes')->where('donate_id', $donate->id)->where('status', 1)
    ->select(DB::raw('sum(amount) as amount, user_id, count(amount) as count'))
    ->groupBy('user_id')->orderBy('amount','desc')->get();
@endphp

<section class="um-page-hero">
  <div class="um-container">
    <div class="um-page-hero__breadcrumb">
      <a href="{{ route('web-home') }}">হোম</a> <span>/</span>
      <a href="{{ route('web-donate') }}">সাহায্য করুন</a> <span>/</span>
      <span>{{ \Illuminate\Support\Str::limit($donate->name, 50) }}</span>
    </div>
    <h1 class="um-page-hero__title">{{ $donate->name }}</h1>
  </div>
</section>

<section class="um-section">
  <div class="um-container">
    <div class="um-list-layout" style="grid-template-columns: 1.4fr 1fr;">
      <!-- Main -->
      <div data-reveal>
        @if($donate->image)
          <img src="{{ umonpur_asset('uploads/donate/' . $donate->image, 'donate') }}" alt="{{ $donate->name }}" style="width: 100%; border-radius: var(--r-lg); margin-bottom: 28px; max-height: 420px; object-fit: cover; box-shadow: var(--sh-md);">
        @endif

        <div class="glass-card--flat" style="padding: 28px; margin-bottom: 28px;">
          <h3 style="font-size: 22px; color: var(--emerald-900); margin: 0 0 16px;">বিস্তারিত</h3>
          <div style="font-size: 16px; line-height: 1.9; color: var(--ink);">{!! $donate->description !!}</div>
        </div>

        <!-- Donor leaderboard -->
        @if($donors->count() > 0)
          <div class="glass-card--flat" style="padding: 28px;">
            <h3 style="font-size: 22px; color: var(--emerald-900); margin: 0 0 18px;"><i class="fa-solid fa-medal" style="color: var(--gold-600);"></i> দাতাগণের তালিকা</h3>
            @foreach($donors as $i => $row)
              @php $u = \App\Models\User::find($row->user_id); @endphp
              <div style="display: flex; align-items: center; gap: 14px; padding: 12px 0; border-bottom: 1px solid var(--line);">
                <div style="width: 36px; height: 36px; border-radius: 50%; background: {{ $i === 0 ? 'var(--gold-500)' : ($i === 1 ? '#C0C0C0' : ($i === 2 ? '#CD7F32' : 'var(--cream-2)')) }}; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-family: var(--f-en);">{{ $i + 1 }}</div>
                <div style="flex:1;">
                  <div style="font-weight: 600; color: var(--emerald-900);">{{ $u ? $u->name : 'অজানা' }}</div>
                  <div style="font-size: 12px; color: var(--muted);">{{ $row->count }} বার দান করেছেন</div>
                </div>
                <strong style="color: var(--emerald-700); font-family: var(--f-en);">৳ {{ number_format($row->amount) }}</strong>
              </div>
            @endforeach
          </div>
        @endif
      </div>

      <!-- Sidebar - donate box -->
      <aside class="um-sidebar">
        <div class="glass-card--flat" style="padding: 28px; position: sticky; top: 100px;" data-reveal data-reveal-delay="1">
          <div style="text-align: center; margin-bottom: 24px;">
            <div style="font-size: 14px; color: var(--muted);">সংগৃহীত</div>
            <div style="font-size: 36px; font-weight: 700; color: var(--emerald-700); font-family: var(--f-en); line-height: 1;">৳ {{ number_format($raised) }}</div>
            <div style="font-size: 13px; color: var(--muted); margin-top: 4px;">লক্ষ্য ৳ {{ number_format($goal) }}</div>
          </div>

          <div class="um-progress" style="margin-bottom: 20px;">
            <div class="um-progress__bar" style="height: 12px;"><div class="um-progress__fill" style="width: {{ $percent }}%; height: 100%;"></div></div>
            <div style="text-align: center; margin-top: 8px; font-size: 13px; color: var(--gold-600); font-weight: 600;">{{ $percent }}% সম্পন্ন</div>
          </div>

          <div style="display: flex; justify-content: space-around; padding: 16px 0; border-top: 1px solid var(--line); border-bottom: 1px solid var(--line); margin-bottom: 20px;">
            <div style="text-align: center;">
              <div style="font-size: 22px; font-weight: 700; color: var(--emerald-700); font-family: var(--f-en);">{{ $donorCount }}</div>
              <div style="font-size: 12px; color: var(--muted);">দাতা</div>
            </div>
            <div style="text-align: center;">
              <div style="font-size: 22px; font-weight: 700; color: var(--emerald-700); font-family: var(--f-en);">{{ $percent }}%</div>
              <div style="font-size: 12px; color: var(--muted);">সম্পন্ন</div>
            </div>
          </div>

          @if(Auth::check())
            <a href="#" class="um-btn um-btn--gold um-btn--lg" style="width:100%" data-bs-toggle="modal" data-bs-target="#donationModal"
               onclick="document.querySelector('#donationModal input[name=donate_id]').value='{{ $donate->id }}'">
               <i class="fa-solid fa-heart"></i> এখনই দান করুন
            </a>
          @else
            <a href="{{ route('login') }}" class="um-btn um-btn--gold um-btn--lg" style="width:100%"><i class="fa-solid fa-right-to-bracket"></i> লগইন করে দান করুন</a>
          @endif

          <div style="margin-top: 16px; font-size: 12px; color: var(--muted); text-align: center;">
            <i class="fa-solid fa-shield-halved"></i> আপনার লেনদেন সুরক্ষিত
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>

@endsection
