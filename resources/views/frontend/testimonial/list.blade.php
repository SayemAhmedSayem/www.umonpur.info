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
  <section class="testimonial-area">
    <div class="container">

      <div class="section-title">
        <h2>প্রশংসা পত্র</h2>
        <!-- <p>গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের ব্যবস্থা চালু হয়। বালাসীঘাটে
          তিনটি লঞ্চ রয়েছে। উদ্বোধনের পর একটি লঞ্চ বিকল হয়, বাকি দুটি নিয়মিত চলছে না। এ অবস্থায় শ্যালো ইঞ্জিনচালিত নৌকায়
          ঝুঁকি নিয়ে পারাপার করানো হচ্ছে যাত্রীদের</p> -->
      </div>

      <div class="row">
@foreach($testimonials as $test)
        <div class="test-details col-md-6 col-sm-6">
        <a href="{{route('web-testimonial-single', $test->id)}}">  <div class="single-test-details shadow">
            <img src="{{ asset('uploads/testimonial/'.$test->image) }}" alt="Testimonial Image">
            <div class="test-content">
              <h4>{{$test->name}}</h4>
              <small>{{$test->designation}}</small>
              <p><i class="fa-solid fa-quote-left"></i>{{ Str::limit($test->message, 100) }}<i class="fa-solid fa-quote-right"></i></p>
            </div>
          </div></a>
        </div>
     @endforeach

        </div>
      </div>
      <!-- Pagination -->
      <div class="row p-5">
        <div class="table-pagination py-4 p-5">
        {!! $testimonials->links() !!}
        </div>
      </div>

    </div>
  </section>
  <!-- Testimonial Area Ends -->

@endsection
     