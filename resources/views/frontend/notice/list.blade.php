@extends('frontend.main')

@section('content')

  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2>সকল <span>নোটিশ</span></h2>
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i> <span>সকল নোটিশ</span></p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- Top First Content Area Starts -->
  <div class="top_first_content_area">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="content">
          @foreach($notices as $notice)
            <div class="single-post">
              <div class="post-content-announce">
                <h4><a href="{{route('web-notice-show', $notice->id)}}">{{$notice->title}}</a> <i class="fa-solid fa-bullhorn"></i></h4>
                {{-- <p>{{ Str::limit($notice->description, 100) }}</p> --}}
                <p>{!! Str::limit($notice->description, 100) !!}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Top First Content Area Ends-->

@endsection
     