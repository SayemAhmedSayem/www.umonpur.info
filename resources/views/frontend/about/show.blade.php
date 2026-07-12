@extends('frontend.main')

@section('content')
  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2>আমাদের <span>সম্পর্কে</span></h2>
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i> <span>সম্পর্কে_বিস্তারিত</span></p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- Blog Post Area Starts -->
  <section class="blog-post-area">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <img src="{{ asset('uploads/about/'.$about->image) }}" alt="Blog Image">
          <div class="blog-content">
            <div class="blog-title">
            <h3>{{$about->title}}</h3>
              <hr>
            </div>
            <div class="post-content">
              <h4><i class="fa-solid fa-user"></i>{{$about->user->name}}</h4>
             
              <small class="text-muted"><i class="fa-solid fa-clock"></i><span>{{ Carbon\Carbon::parse($about->date)->format('d-M-Y') }}</span></small>
            </div>
            <div class="blog-desc">
            {{-- <p>{{$about->description}}</p> --}}
            <p>{!! $about->description !!}</p>
            </div>
            <div class="blog-share">
              <h5>শেয়ার করুনঃ</h5>
              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#"><i class="fa-brands fa-twitter"></i></a>
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog Post Area Ends -->

@endsection
     