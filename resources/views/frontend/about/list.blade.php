@extends('frontend.main')

@section('content')
  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2><span> সম্পর্কে</span></h2>
        <!-- <p class="banner-title-desc">গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ </p> -->
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i><a href="about.html">সম্পর্কে</a>
          <i class="fa fa-angle-right"></i> <span>সম্পর্কে_আরো</span></p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- About Area Starts  -->
  <section class="">
    <div class="container">
      <div class="section-title">
        <h2>আমাদের সম্পর্কে</h2>
        <p>এই পোর্শনে গ্রামের নির্দিষ্ট বিষয়ের তথ্য লিস্টের সর্বশেষ হগালনাগাদ</p>
        
      </div>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 about-post">
      @foreach($abouts as $about)
        <div class="col">
          <div class="about-single shadow-sm">
            <div class="about-post-img">
              <img src="{{ asset('uploads/about/'.$about->image) }}" alt="About Image">
            </div>
            <div class="about-post-desc">
            <h3>{{$about->title}}</h3>
            {{-- <p>{{ Str::limit($about->description, 130) }}</p> --}}
            <p>{!! Str::limit($about->description, 100) !!}</p>
              <a href="{{route('web-about-show', $about->id)}}" class="btn btn-box">বিস্তারিত</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <hr>
      <!-- Pagination -->
      <div class="row">
        <div class="table-pagination py-4">
        {!! $abouts->links() !!}
        </div>
      </div>
    </div>
  </section>
  <!-- About Area Ends  -->

@endsection
     