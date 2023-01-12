@extends('frontend.main')

@section('content')


  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2><span>গ্যালারি</span></h2>
        <p><a href="{{route('web-home')}}">হোম</a> <i class="fa fa-angle-right"></i> গ্যালারি <i class="fa fa-angle-right"></i>
          <span>ছবি</span>
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
        <p>উমনপুর গ্রামের প্রতি বছরের রেকর্ড।<</p>
      </div>
      <div class="albums">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach(App\Models\Album::where('type', 'Photo')->get() as $album)
          <div class="col">
            <a href="{{route('web-year', $album->id)}}">
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
     