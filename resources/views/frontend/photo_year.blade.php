@extends('frontend.main')

@section('content')

  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
    <div class="banner-title">
        <h2><span>গ্যালারি</span></h2>
        <p><a href="{{route('web-home')}}">হোম</a> <i class="fa fa-angle-right"></i> <span>গ্যালারি</span> <i class="fa fa-angle-right"></i>
          <a href="{{route('web-photo')}}">ছবি</a><i class="fa fa-angle-right"></i><span>{{$album->name}}</span>
        </p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- Gallery Album Year Area Starts -->
  <section class="gallery-year-area">
    <div class="container">
      <div class="section-title">
        <h2>ছবির বছর</h2>
        <p>গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের
          ব্যবস্থা চালু হয়</p>
      </div>
      <div class="row row-cols-2 row-cols-md-4">
        @foreach(App\Models\Year::where('album_id', $album->id)->orderBy('created_at','desc')->get() as $year)
        <div class="col">
          <a href="{{route('web-photo-photo', $year->id)}}">
            <div class="single-year">
              <h4>{{$year->year}}</h4>
            </div>
          </a>
        </div>
        @endforeach
  
     
      </div>
    </div>
  </section>
  <!-- Gallery Album Year Area Ends -->

@endsection
     