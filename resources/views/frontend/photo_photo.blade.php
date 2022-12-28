@extends('frontend.main')

@section('content')

  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
    <div class="banner-title">
        <h2><span>গ্যালারি</span></h2>
        <p><a href="{{route('web-home')}}">হোম</a> <i class="fa fa-angle-right"></i> <span>গ্যালারি</span> <i class="fa fa-angle-right"></i>
          <a href="{{route('web-photo')}}">ছবি</a><i class="fa fa-angle-right"></i> <a href="{{route('web-year', $album->id)}}">{{$album->name}}</a> <i class="fa fa-angle-right"></i> <span>{{$year->year}}</span>
        </p>
      </div>
    </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- Photo Area Starts -->
  <section class="photo-area">
    <div class="container">
      <div class="section-title">
        <h2>{{$year->year}}</h2>
        <p>গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের ব্যবস্থা চালু হয়।
          বালাসীঘাটে
          তিনটি লঞ্চ রয়েছে</p>
      </div>
      <div class="row row-cols-1 row-cols-2 row-cols-sm-3 row-cols-md-4">
        @foreach(App\Models\Photo::where('year_id', $year->id)->orderBy('created_at','desc')->get() as $photo)
        <div class="col">
          <div class="single-photo">
            <a href="{{ asset('uploads/album/photos/'.$photo->image) }}" class="image"><img src="{{ asset('uploads/album/photos/'.$photo->image) }}" style="width:320px !important; height:200px !important;" alt="Photo"></a>
            <div class="photo-desc">
              <h4>{{$photo->title}}</h4>
              <p>{{$photo->description}}</p>
              <div class="video-post-info">
                <p><i class="fa-solid fa-calendar-days"></i><span class="video-post-date">{{ Carbon\Carbon::parse($photo->date)->format('d-M-Y') }}</span></p>
                <p><i class="fa-solid fa-user"></i><span class="video-posted-by">{{$photo->user->name ?? ''}}</span></p>
              </div>
            </div>
          </div>
        </div>
   @endforeach
      </div>
    </div>
  </section>
  <!-- Photo Area Ends -->
@push('scripts')

<script src="{{asset('template/assets/js/magnific_popup.min.js')}}"></script>
@endpush
@endsection
     