@extends('frontend.main')

@section('content')


  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2><span>গ্যালারি</span></h2>
        <p><a href="{{route('web-home')}}">হোম</a> <i class="fa fa-angle-right"></i> গ্যালারি <i class="fa fa-angle-right"></i>
          <span>ভিডিও</span>
        </p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- Gallery Album Area Starts -->
  <section class="gallery-album-area">
    <div class="container">
      <div class="section-title">
        <h2>গ্যালারি এ্যালবাম</h2>
        <p>গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের
          ব্যবস্থা চালু হয়</p>
      </div>
      <div class="albums">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach(App\Models\Album::where('type', 'Video')->orderBy('created_at','desc')->get() as $album)
          <div class="col">
            <a href="{{route('web-video-video', $album->id)}}">
              <div class="single-album">
                <img src="{{ asset('uploads/album/thumbnail/'.$album->thumbnail) }}" alt="Photo Album">
                <div class="album-title">
                  <h2>{{$album->name}}</h2>
                </div>
              </div>
            </a>
          </div>
          @endforeach
    
          
        </div>
      </div>
    </div>
  </section>
  <!-- Gallery Album Area Ends -->

@endsection
     