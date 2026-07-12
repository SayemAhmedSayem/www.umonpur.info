@extends('frontend.main')

@section('content')
  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2>রিলিজ <span>ভার্সন</span></h2>
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i><span>রিলিজ ভার্সন</span></p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- Release Version Area Starts -->
  <section class="release_version_area">
    <div class="container">
      <div class="section-title">
        <h2>{{$version->version_title}}</h2>

        <p>{{$version->version_subtitle}}</p>
      </div>
      <div class="row">
        <div class="website-screenshot shadow">
          <img src="{{ asset('uploads/version/'.$version->image) }}" alt="Website Version 1.0">
        </div>
      </div>
      <div class="row">
        <div class="website-btn">
            <a href="{{$version->url}}" target="_blank" class="btn-post">ওয়েবসাইটে প্রবেশ করুন</a>
        
        </div>
      </div>
      <div class="row">
        <div class="release-notes">
          <div class="sm-title">
            <h2>{{$version->description_title_p1}} <span>{{$version->description_title_p2}}</span></h2>
          </div>
          <p>{!! $version->description_details !!}</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Release Version Area Ends -->
@push('scripts')

<script src="{{asset('template/assets/js/magnific_popup.min.js')}}"></script>
@endpush
@endsection
     