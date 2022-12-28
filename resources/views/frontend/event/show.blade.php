@extends('frontend.main')

@section('content')

  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2>সকল <span>ইভেন্ট</span></h2>
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i> <a href="top_second_content.html">সকল নোটিশ</a>
          <i class="fa fa-angle-right"></i><span>{{$event->title}}</span></p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- Top First Content Area Starts -->
  <div class="top_first_content_area third_content_area">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="news">
            <div class="single-news-post">
              <div class="single-news-content">
                <div class="title-post">
                  <div class="date">
                  <h5>  {{ Carbon\Carbon::parse($event->date)->format('d') }}</h5><span>{{ Carbon\Carbon::parse($event->date)->format('M , Y') }}</span>
                  </div>
                  <div class="post-content">
                    <h4><a href="#">{{$event->title}}</a></h4>
                    <p>{{$event->description}}</p>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Top First Content Area Ends-->

@endsection
     