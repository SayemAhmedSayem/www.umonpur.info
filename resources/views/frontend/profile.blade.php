@extends('frontend.main')

@section('content')

  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('{{asset('frontend/assets/img/blog1.jpg')}}');">
    <div class="container">
      <div class="banner-title">
        <h2><span>সদস্যগণ</span></h2>
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i> <a href="about.html">সম্পর্কে</a> <i
            class="fa fa-angle-right"></i> <span>সদস্যগণ</span></p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- Profile Area Starts -->
  <section class="profile-area">
    <div class="container">
      <div class="section-title">
        <h2>আমাদের সদস্যগণ</h2>
        <p>উমনপুর গ্রামের ওয়েবসাইট বর্তমান পরিচালনা কমিটিগণের  প্রোফাইল রেকর্ড।</p>  
      </div>
      <div class="row">
        @foreach($profiles as $profile)
        <div class="col-md-3">
          <div class="single-profile">
            <img src="{{ asset('uploads/members/'.$profile->user->nid->image) }}" alt="Profile Image">
            <div class="profile-caption">
              <h2 class="name">{{$profile->user->name}}</h2>
              <p class="designation">{{$profile->user->designation ?? ''}}</p>
              <!-- <div class="profile-social-icons">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
              </div> -->
              <p class="phone"><i class="fa-solid fa-phone-flip"></i>{{$profile->user->nid->phone}}</p>
            </div>
          </div>
        </div>
  @endforeach
      </div>
    </div>
  </section>
  <!-- Profile Area Ends -->

@endsection
     