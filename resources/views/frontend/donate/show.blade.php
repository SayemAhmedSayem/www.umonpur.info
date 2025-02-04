@extends('frontend.main')

@section('content')

  <style>
   
    .btn-sayem{
      margin-bottom: 20px;
                  margin-top: 20px;    background: #fc7437;    font-size: 11px !important;
    padding: 8px 15px !important;
    border-radius: 30px;
    display: inline-block;
    color: #fff;
    font-size: 12px;
    font-family: 'Raleway', sans-serif;
    text-transform: uppercase;
    font-weight: bold;
    padding: 12px 35px;
    border: 2px solid transparent;
    }
    .pull-left {
    float: left!important;
}
.pull-right {
    float: right!important;
}
.progress {

    height: 1.8rem !important;
    font-size: 1rem !important;


}

.statis-sayem {
    font-size: 18px;
    font-weight: 500;
    width: 100%;
    text-align: left;
}

  </style>
  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2><span> {{$donate->name}}</span></h2>
        <!-- <h2><span> {!! Str::limit($donate->name, 20) !!}</span></h2> -->
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i> <span>সাহায্য করুন</span></p>
      </div>
    </div>
  </section>
  <?php
  $sum =  App\Models\Income::where('donate_id', $donate->id)->where('status',1)->select(DB::raw('count(user_id) as count'))
      ->groupBy('user_id')->get();

    
      ?>
      <?php $number = 0; ?>
@foreach ($sum as $Rating)
<?php $number++ ?>   
@endforeach

  <!-- About Area Starts  -->
  <section class="about-area">
    <div class="container">
     
             <div class="row">
                <div class="col-sm-8">
                <div class="about-single shadow-sm">
            <div class="about-post-img">
            <img src="{{ asset('uploads/donate/'.$donate->image) }}">
            </div>
            <div class="about-post-desc">
              <h4>{{$donate->name}}</h4>
              <p>{{$donate->description }}</p>
              <div class="mb-3">
                <div class="progress">
                <div class="progress-bar" role="progressbar" style="width:{{intval($percent)}}%;" aria-valuenow="{{intval($percent)}}" aria-valuemin="0" aria-valuemax="100">{{intval($percent)}}%</div>
                </div>
              </div>
              <ul class="" style="padding-left: 0px !important;">
                <li class="clearfix border-bottom"><span class="pull-left">দাতাগণ -</span> <strong class="pull-right">{{ $number }}</strong></li>
                <li class="clearfix border-bottom"><span class="pull-left">আমাদের লক্ষ্য -</span> <strong class="pull-right">৳{{$donate->goal}}</strong></li>
                <li class="clearfix border-bottom"><span class="pull-left">সংগৃহীত -</span> <strong class="pull-right">৳{{$income}}</strong></li>
              <div class="row">
                
              <div class="col-sm-12">
                @if($donate->goal <= $income)
                  <a href="#" class="btn btn-success pull-right disabled mt-5">লক্ষ্য অর্জন</a>
                @else
                <a href="#" class="btn btn-box btn-sayem pull-right" data-bs-toggle="modal" data-bs-target="#donationModal2">দান করুন</a>
                @endif

                </div>
              </div>
            </div>

          </div>
                </div>

                <div class="col-sm-4 p-3" >
                <div class="p-3" style="font-family:lato;background-color:#eff5f5;height:100%">
                <h4 class="">সাম্প্রতিক দান</h4>
                @foreach($incomes as $income)
              <?php 
              
              $user = App\Models\User::find($income->user_id);
              $time = App\Models\Income::where('donate_id', $donate->id)->where('user_id', $user->id)->first();
              ?>
                
                  <div class="col">
                      <div class=""style="display: flex;">
                        <div class="" style="padding-right:15px;"><img style="border-radius:5px; height:70px; width:100px;padding-right:2px;" src="{{ asset('uploads/members/'.$user->nid->image) }}" alt=""></div>
                        <div class="statis-sayem">
                          <span class="" style="color:green;font-weight:900;">৳{{$income->amount}}</span> </br><span class="" style="font-size:14x"> {{$user->nid->name}}</span>
                          <br><div style="font-size:12px;color:#ff7720;font-weigt:500;"> {{$time->created_at->format('Y-m-d - H:i A')}}</div>
                      </div>
                        
                  </div>
                  <br>
                    @endforeach
                    </div>
                  </div>
                  
                </div>
             </div>
   
    </div>
  </section>

  @if(Auth::check())
  <div class="modal fade" id="donationModal2" tabindex="-1" aria-labelledby="donationModal2Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="donationModal2Label">{{$donate->name}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('web-income-store')}}">
            @csrf

            <input type="hidden" name="income_type" value="{{$donate->name}}">
            <input type="hidden" name="donate_id" value="{{$donate->id}}">
            <div class="sm-title">
              <h2>টাকার পরিমাণ নির্বাচন করুন</h2>
            </div>
            <div class="money-amount">
              <div class="row">
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="amount" value="500" id="amount1">
                    <label class="form-check-label" for="amount1">
                      ৫০০ টাকা
                    </label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="amount"  value="1000" id="amount2" checked>
                    <label class="form-check-label" for="amount2">
                      ১০০০ টাকা 
                    </label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="amount"  value="2000" id="amount3" >
                    <label class="form-check-label" for="amount3">
                      ২০০০ টাকা
                    </label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="amount"   value="5000" id="amount4" >
                    <label class="form-check-label" for="amount4">
                      ৫০০০ টাকা
                    </label>
                  </div>
                </div>
              </div>
              <!-- <div class="custom-amount">
                <label for="customAmount" class="form-label">নির্দিষ্ট পরিমাণ</label>
                <input type="text"  class="form-control" id="customAmount">
              </div> -->
            </div>
            <div class="billing-address">
              <div class="sm-title" style="border:1px sold; background-color:#ff7720; padding:5px;">
                <h2 style="font-size: 21px;font-weight: bold; margin:10px">বিকাশ/নগদ/রকেট - হলে খরচ সহ নিচে দেওয়া নাম্বারে টাকা পাঠিয়ে দিন এবং ফরম পূরণ করে সেন্ড করুন।
                  <br>01511 838 161<br>--------------------<br>ব্যাংকে পাঠাতে হলে অগ্রনী ব্যাংক হরিপুর গ্যাস ফিল্ড শাখা। <br> A/C No - 0200021507827</h2>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="CitySelect" class="form-label">টাকা পাঠানোর ধরন নির্বাচন করুন</label>
                    <select name="payment_type" class="form-select" id="CitySelect" required>
                    
                      {{-- <option selected="selected">নির্বাচন করুন</option> --}}
                      
                      <option value="1">বিকাশ</option>
                      <option value="2">নগদ</option>
                      <option value="3">রকেট</option>
                      <option value="4">ব্যাংক</option>
                    </select>
                  </div>
                </div>

                <div class="col">
                  <div class="mb-3">
                    <label for="cardNo" class="form-label">যেই নাম্বার থেকে টাকা পাঠিয়েছেন</label>
                    <input type="text" class="form-control" name="transection_phone" id="cardNo" >
                  </div>
                </div>

                

              </div>

              <div class="row">
              <div class="col">
                  <div class="mb-3">
                    <label for="securityCode" class="form-label">ট্রানজেকশন নাম্বার</label>
                    <input type="text" class="form-control" name="transection_no" >
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="userZipCode" class="form-label">আপনার নাম</label>
                    <input type="text" value="{{Auth::user()->name ?? ''}}" class="form-control" id="userZipCode"  readonly>
                  </div>
                </div>
              </div>
              
              

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="userName" class="form-label">ইমেইল</label>
                    <input type="email" value="{{Auth::user()->email}}" class="form-control" id="userName"  readonly>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="userEmail" class="form-label">ফোন নাম্বার</label>
                    <input type="number" value="{{Auth::user()->nid->phone}}" class="form-control" id="userEmail"  readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="userPhoneNo" class="form-label">ঠিকানা</label>
                    <input type="text" value="{{Auth::user()->nid->address}}" class="form-control" id="userPhoneNo"  readonly>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="userAddress" class="form-label">হোল্ডিং নাম্বার</label>
                    <input type="text"  value="{{Auth::user()->nid->holding_no}}" class="form-control" id="userAddress"  readonly>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="userZipCode" class="form-label">এনআইডি/জন্মনিবন্ধন নাম্বার </label>
                    <input type="text" value="{{Auth::user()->nid->nid}}"  class="form-control" id="userZipCode" readonly>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">পাঠান</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @else
  <style>
          	.user_card {
			height: 400px;
			margin-top: auto;
			margin-bottom: auto;
			background: #f39c12;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;


		}
    .modal-content {

    padding-top: 51px !important;
    background-color: transparent !important;

    border: 0px solid rgba(0,0,0,.2) !important;
}


		.brand_logo_container {
			position: absolute;
			height: 170px;
			width: 170px;
			top: -75px;
			border-radius: 50%;
			background: #60a3bc;
			padding: 10px;
			text-align: center;
		}
		.brand_logo {
			height: 150px;
			width: 150px;
			border-radius: 50%;
			border: 2px solid white;
		}
		.form_container {
			margin-top: 100px;
		}
		.login_btn {
			width: 100%;
			background: #c0392b !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #c0392b !important;
			color: white !important;
			border: 0 !important;
    padding: 1rem !important;

			border-radius: 0.25rem 0 0 0.25rem !important;
		}

		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
			background-color: #c0392b !important;
		}
         </style>
  <div class="modal fade" id="donationModal2" tabindex="-1" aria-labelledby="donationModal2Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      
      <div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="{{asset('frontend/logo/logo-1.png')}}" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
        <form method="POST" action="{{ route('login') }}">
                        @csrf
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
              <input id="email" type="email" class="form-control input_user form-icon-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="আপনার ইমেইল লিখুন" required autocomplete="email" autofocus>
                    
                      @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
              <input id="password" type="password" class="form-control input_pass form-icon-input @error('password') is-invalid @enderror" name="password" placeholder=" আপনার পাসওয়ার্ড লিখুন" required autocomplete="current-password">
                    
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">সাইনইন মনে রাখুন</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">সাইনইন করুন</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">যদি আপনার কোন একাউন্ট না থাকে<br>
            <a href="{{route('register')}}" class="ml-2" style="font-weight:bold; color:green; margin-left: 5px"> রেজিস্ট্রেশন করুন</a>
					</div>
					<div class="d-flex justify-content-center links">পাসওয়ার্ড ভুলে গিয়েছেন?
						@if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" style="font-weight:bold; color: red; margin-left: 5px">এইখানে দেখুন </a>
            @endif
					</div>
				</div>
			</div>
      </div>
    </div>
  </div>
@endif
@endsection
     