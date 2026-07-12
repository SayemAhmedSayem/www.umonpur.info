@extends('frontend.main')

@section('content')

  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
    <div class="banner-title">
        <h2><span>গ্যালারি</span></h2>
        <p><a href="{{route('web-home')}}">হোম</a> <i class="fa fa-angle-right"></i> <span>গ্যালারি</span> <i class="fa fa-angle-right"></i>
          <a href="{{route('web-video')}}">ভিডিও</a><i class="fa fa-angle-right"></i><span>{{$album->name}}</span>
        </p>
      </div>
    </div>
    </div>
  </section>


  <!-- Photo Area Starts -->
  <section class="photo-area">
    <div class="container">
      <div class="section-title">
        <h2>ভিডিও</h2>
        <p>সকল ভিডিও এর সর্বশেষ হালনাগাদ।</p>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        @foreach(App\Models\Video::where('album_id', $album->id)->orderBy('created_at','desc')->paginate(9) as $video)
        <div class="col">
          <div class="single-photo">
            <a href="{{$video->url}}" class="video"><img src="{{ asset('uploads/album/videos/'.$video->image) }}" alt="Photo"></a>
            <div class="photo-desc">
              <h4>{{$video->title}}</h4>
              <p>{{$video->description}}</p>
              <div class="video-post-info">
                <p><i class="fa-solid fa-calendar-days"></i><span class="video-post-date">{{ Carbon\Carbon::parse($video->date)->format('d-M-Y') }}</span></p>
                <p><i class="fa-solid fa-user"></i><span class="video-posted-by">{{$video->user->name}}</span></p>
              </div>
            </div>
          </div>
        </div>
    @endforeach
      </div>
    </div>
  </section>
  <!-- Photo Area Ends -->
  <!-- Photo Area Ends -->
@push('scripts')

<script src="{{asset('template/assets/js/magnific_popup.min.js')}}"></script>
@endpush
@endsection
     