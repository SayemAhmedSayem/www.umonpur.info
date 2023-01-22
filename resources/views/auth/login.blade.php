
@extends('layouts.login.header')
@section('content')
<main class="main" id="top">
   <div class="container-fluid px-0">
      <div class="container">
         <div class="row flex-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
               <a class="d-flex flex-center text-decoration-none mb-4" href="../../../index.php">
                  <div class="d-flex align-items-center"><img src="{{asset('frontend/logo/logo-1.png')}}" alt="phoenix" width="58"></div>
               </a>
               <div class="text-center mb-7">
                  <h3>Sign In</h3>
                  <p class="text-700">Please Enter Your Email and Password <br> to log into Umonpur - উমনপুর।</p>
               </div>
               <!-- <button class="btn btn-phoenix-secondary w-100 mb-3"><span class="fab fa-google text-danger me-2 fs--1"></span>Sign in with google</button><button class="btn btn-phoenix-secondary w-100"><span class="fab fa-facebook text-primary me-2 fs--1"></span>Sign in with facebook</button>
               <div class="position-relative mt-4">
                  <hr class="bg-200">
                  <div class="divider-content-center">or use email</div>
               </div> -->
               <form method="POST" action="{{ route('login') }}">
                        @csrf

               <div class="mb-3 text-start">
                  <label class="form-label" for="email">আপনার ইমেইল দিন</label>
                  <div class="form-icon-container">
                  <input id="email" type="email" class="form-control form-icon-input @error('email') is-invalid @enderror" name="email" placeholder="আপনার ইমেইল লিখুন" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      <span class="fas fa-user text-900 fs--1 form-icon"></span>
                      @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                   </div>
               </div>
               <div class="mb-3 text-start">
                  <label class="form-label" for="password">পাসওয়ার্ড</label>
                  <div class="form-icon-container">
                  <input id="password" type="password" class="form-control form-icon-input @error('password') is-invalid @enderror" name="password" placeholder="আপনার পাসওয়ার্ড লিখুন" required autocomplete="current-password">
                      <span class="fas fa-user text-900 fs--1 form-icon"></span>
                    </div>
               </div>
               <div class="row flex-between-center mb-7">
                  <div class="col-auto">
                     <div class="form-check mb-0">
                      
                         <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                         <label class="form-check-label mb-0" for="basic-checkbox">সাইন ইন মনে রাখুন</label></div>
                  </div>
                  @if (Route::has('password.request'))
                  <div class="col-auto"><a class="fs--1 fw-semi-bold" href="{{ route('password.request') }}">পাসওয়ার্ড ভুলে গিয়েছেন?</a></div>
                                    
                                @endif
             
               </div>
               <button class="btn btn-primary w-100 mb-3" type="submit">সাইন ইন</button>
               <div class="text-center">যদি আপনার কোন একাউন্ট না থাকে<a class="fs--1 fw-bold" href="{{route('register')}}"> <span style="font-size:20px;"><br>এইখানে দেখুন </span></a> <br>একজন সদস্য হতে চাইলে.</div>
            </div>
            </form>
         </div>
      </div>
   </div>
</main>
@endsection
