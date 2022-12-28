@extends('frontend.main')

@section('content')
   <!-- Post Banner Area Starts -->
   <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2><span> সম্পর্কে</span></h2>
        <!-- <p class="banner-title-desc">গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের
          ব্যবস্থা চালু হয়। বালাসীঘাটে
          তিনটি লঞ্চ রয়েছে</p> -->
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i> <span>সম্পর্কে</span></p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->


  <!-- Testimonials Area Starts -->
  <section class="testimonial-area pt-5">
    <div class="container">
      <div class="row">

        <div class="test-details col-md-10 col-sm-10">
          <div class="single-test-details shadow">
            <img src="{{ asset('uploads/testimonial/'.$test->image) }}" alt="Testimonial Image">
            <div class="test-content">
              <h4>{{$test->name}}</h4>
              <small>{{$test->designation}}</small>
              <p><i class="fa-solid fa-quote-left"></i>{{$test->message}}<i class="fa-solid fa-quote-right"></i></p>
            </div>
          </div>
        </div>
 

        </div>
      </div>
      <!-- Pagination -->
 

    </div>
  </section>
  <!-- Testimonial Area Ends -->

@endsection
     