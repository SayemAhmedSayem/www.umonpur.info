<!DOCTYPE html>
<html lang="bn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Umonpur - উমনপুর</title>

      <!-- Bengali Fonts CDN -->
      <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
      <!-- FontAwesome CSS -->
      <link rel="stylesheet" href="{{asset('frontend/assets/plugin/fontawesome/css/all.min.css')}}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
      <!-- Slick Slider CSS -->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}">
      <!-- Main CSS  -->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific_popup.css')}}">
      <link
         rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
         />
         @stack('style')
  
</head>

<body>
  <!-- Header Area Starts -->
  <header>
    <!-- Header Top -->
    <section class="header_top bg-dark text-light py-2">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <a href="javascript:void(0)"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="javascript:void(0)"><i class="fa-brands fa-youtube"></i></a>
            <a href="javascript:void(0)"><i class="fa-brands fa-instagram"></i></a>
          </div>
          <div class="col-md-4 search">
            <div class="search-box">
              <form>
                <input type="text" name="search-area" id="search" placeholder="এখানে খুজুন...">
                <i class="fa-solid fa-magnifying-glass"></i>
              </form>
            </div>
          </div>
          @if(Auth::check())
          <div class="col-md-4 status">
          <a class="btn btn-box" href="{{ route('logout') }}"
onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                              <span ></span>
                              লগআউট
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
 @csrf
</form>
            <a href="{{route('dashboard.index')}}" class="btn btn-primary">ড্যাশবোর্ড 
            </a>
          </div>
         
          @else
          <div class="col-md-4 status">
            <a href="{{route('login')}}" class="btn btn-box">লগইন</a>
            <a href="{{route('register')}}" class="btn btn-primary">রেজিস্ট্রেশন
            </a>
          </div>
          @endif
        </div>
      </div>
    </section>
    <!-- Header Middle -->
    <section class="header_middle py-2">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <a href="/" class="logo"><i class=""><img src="{{asset('frontend/logo/logo.png')}}" style="max-width:100px;" alt="Photo"></i>
              <h3>Umonpur - উমনপুর 
                <span>একটি আদর্শ গ্রামের নাম।</span>
              </h3>
            </a>
          </div>
          <div class="col-md-8">
            <div class="email-box">
              <i class="fa-solid fa-envelope"></i>
              <h4>ইমেইল<a href="mailto:umonpur@gmail.com">umonpur@gmail.com</a></h4>

            </div>
            <div class="call-box">
              <i class="fa-solid fa-phone"></i>

              <h4>কল করুন<a href="tel:+8801687838161">01687 838 161</a></h4>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Header Bottom -->
    <section class="header_bottom shadow-sm p-3 bg-body py-2 d-flex justify-content-between">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-md-8">
            <nav class="navbar navbar-expand-lg navbar-light">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link" aria-current="page" href="{{route('web-home')}}">হোম
                  </a>
                  <a class="nav-link" href="{{route('web-about')}}">আমাদের সম্পর্কে
                  </a>
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      গ্যালারি

                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="{{route('web-photo')}}">ছবি</a></li>
                      <li><a class="dropdown-item" href="{{route('web-video')}}">
                          ভিডিও

                        </a></li>

                    </ul>
                  </div>
                  <a class="nav-link" href="{{route('web-message')}}">যোগাযোগ</a>
                  <a class="nav-link" href="{{route('web-voter-list')}}">ভোটার তালিকা
                  </a>
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink2"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      রিলিজ ভার্সন
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                      @foreach(App\Models\Version::All() as $version)
                      <li><a class="dropdown-item" href="{{route('web-version-show', $version->id)}}">{{$version->year}}
                        </a></li>
                        @endforeach
   

                    </ul>

                  </div>
                  <a class="nav-link" aria-current="page" href="{{route('web-donate')}}">সাহায্য করুন
                  </a>
                  <a href="#" class="btn donation-link d-none btn-box" data-bs-toggle="modal"
                    data-bs-target="#donationModal">দান করুন</a>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-md-4">
            <a href="#" class="btn donation btn-box" data-bs-toggle="modal" data-bs-target="#donationModal">দান করুন</a>
          </div>
        </div>
      </div>
    </section>
  </header>
  <!-- Header Area Ends -->

  <!--  Modal For Donation -->
@if(Auth::check())
<div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="donationModalLabel">এখনি দান করুন</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('web-income-store')}}">
            @csrf

            <input type="hidden" name="income_type" value="general">
            <input type="hidden" name="donate_id" value="">
            <div class="sm-title">
              <h2>টাকার পরিমাণ</h2>
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
                <h2 style="font-size: 21px;font-weight: bold; margin:10px">বিকাশ/নগদ/রকেট - হলে খরচ সহ নিচে দেওয়া নাম্বারে টাকা পাঠিয়ে দিন এবং ফরম পূরণ করে পাঠান চাপুন। <br>--------------------<br>01511 838 161</h2>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="cardNo" class="form-label">যেই নাম্বার থেকে টাকা পাঠিয়েছেন</label>
                    <input type="text" class="form-control" name="transection_phone" id="cardNo" required>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="securityCode" class="form-label">ট্রানজেকশন নাম্বার</label>
                    <input type="text" class="form-control" name="transection_no" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="CitySelect" class="form-label">ধরন নির্বাচন করুন</label>
                    <select name="payment_type" class="form-select" id="CitySelect" required>
                    
                      {{-- <option selected="selected">নির্বাচন করুন</option> --}}
                      
                      <option value="1">বিকাশ</option>
                      <option value="2">নগদ</option>
                      <option value="3">রকেট</option>
                      <option value="4">অন্যান্য</option>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="userZipCode" class="form-label">আপনার নাম</label>
                    <input type="text" value="{{Auth::user()->name}}" class="form-control" id="userZipCode"  readonly>
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
                    <label for="userEmail" class="form-label">ফোন নম্বর</label>
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
  <div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="user_card">
          <div class="d-flex justify-content-center">
            <div class="brand_logo_container">
              <img src="{{asset('frontend/logo/logo.png')}}" class="brand_logo" alt="Logo">
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
@if (Session::has('success'))

<div class="alert alert-success d-flex align-items-center" role="alert" style="padding:30px !important;">
  <span class="fas fa-check-circle text-success fs-3 me-3"></span>
  <h2 class="mb-0 flex-1" style="color:green;">{{ Session::get('success') }}</h2>
  <button style="margin-left:20px;" class="btn btn-warning" type="button" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
</div>


@endif
@if (Session::has('error'))

<div class="alert alert-danger d-flex align-items-center" role="alert" style="padding:30px !important;">
  <span class="fas fa-check-circle text-danger fs-3 me-3"></span>
  <h2 class="mb-0 flex-1" style="color:green;">{{ Session::get('error') }}</h2>
  <button style="margin-left:20px;" class="btn btn-warning" type="button" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
</div>


@endif
  @yield('content')
  <!-- Footer Area Starts -->
  <footer class="footer-area bg-dark py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="sm-title">
            <h5>গুরুত্বপূর্ণ লিংক সমূহ</h5>
            <nav class="nav flex-column">
              @foreach(App\Models\Link::where('type',1)->get() as $f1)
              <a class="nav-link" href="{{$f1->link}}"><i class="fa-solid fa-angle-right"></i>{{$f1->name}}</a>
              @endforeach
     
            </nav>
          </div>
        </div>
        <div class="col-md-3">
          <div class="sm-title">
            <h5>গুরুত্বপূর্ণ লিংক সমূহ</h5>
            <nav class="nav flex-column">
            @foreach(App\Models\Link::where('type',2)->get() as $f2)
              <a class="nav-link" href="{{$f2->link}}"><i class="fa-solid fa-angle-right"></i>{{$f2->name}}</a>
              @endforeach
            </nav>
          </div>
        </div>
        <div class="col-md-3">
          <div class="sm-title">
            <h5>গুরুত্বপূর্ণ লিংক সমূহ</h5>
            <nav class="nav flex-column">
            @foreach(App\Models\Link::where('type',3)->get() as $f3)
              <a class="nav-link" href="{{$f3->link}}"><i class="fa-solid fa-angle-right"></i>{{$f3->name}}</a>
              @endforeach
            </nav>
          </div>
        </div>
        <div class="col-md-3">
          <div class="sm-title">
            <h5>গুরুত্বপূর্ণ লিংক সমূহ</h5>
            <nav class="nav flex-column">
            @foreach(App\Models\Link::where('type',4)->get() as $f4)
              <a class="nav-link" href="{{$f4->link}}"><i class="fa-solid fa-angle-right"></i>{{$f4->name}}</a>
              @endforeach
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="social-links">
            <nav class="nav">
              <a href="https://www.facebook.com/Umonpur" class="nav-link"><i class="fa-brands fa-facebook-square"></i><span>উমনপুর</span></a>
              <a href="https://www.youtube.com/@umonpur-2304" class="nav-link"><i class="fa-brands fa-youtube-square"></i><span>উমনপুর</span></a>
              <a href="https://www.facebook.com/UmonpurGovermentPrimarySchool" class="nav-link"><i class="fa-brands fa-facebook-square"></i><span>স্কুল</span></a>
              <a href="https://www.facebook.com/JameyaMahmudiyaMajharulUlumUmonpur" class="nav-link"><i class="fa-brands fa-facebook-square"></i><span>মাদ্রসা</span></a>
              <a href="https://www.facebook.com/UmonpurSportsClub" class="nav-link"><i class="fa-brands fa-facebook-square"></i><span>খেলাধুলা</span></a>
              <a href="https://www.facebook.com/ChiknagulHealthComplexUmonpur" class="nav-link"><i class="fa-brands fa-facebook-square"></i><span>স্বাস্থ্য কমপ্লেক্স</span></a>
              
            </nav>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="footer-description">
            <p>&copy; 2020 - 2024 || Design and Developed by <a href="https://sayemahmedsayem.online/" class="credit" style="border: 1px solid;padding: 3px;">_S@YEM_</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Area Ends -->


  <!-- Jquery File Link -->
  <script src="{{asset('frontend/assets/js/jquery.js')}}"></script>
  <!-- Slick Slider JS Link -->
  <script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
  <!-- Counter Up Js File Link  -->
  <script src="{{asset('frontend/assets/js/waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/jquery.counterup.min.js')}}"></script>
  <!-- Magnific Popup Js Link -->
  <script src="{{asset('frontend/assets/js/magnific_popup.min.js')}}"></script>
  <!-- Bootstrap Js File Link -->
  <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Main Js -->
  <script src="{{asset('frontend/assets/js/script.js')}}"></script>
  @stack('scripts')

</body>

</html>