@extends('frontend.main')

@section('content')

  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2>{{$latests[0]->category->name}}</h2>
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i><span>{{$latests[0]->category->name}}</span></p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- Post Area Starts -->
  <section class="post-area">
    <div class="container-sm">
      <div class="section-title">
        <h2>আমাদের সকল পোস্ট</h2>
        <p>উমনপুর গ্রামের সকল আপডেট নিউজ তালিকা।</p>
      </div>
      <!-- First Category Content Post -->
      <div class="row">
      @foreach($latests as $post)
        <div class="col-lg-4 col-md-12">
          <div class="card h-100">
            <img src="{{ asset('uploads/posts/'.$post->image) }}" class="card-img-top" alt="Post 1">
            <div class="card-body">
              <div class="title-post">
                <div class="date">
                <h5>  {{ Carbon\Carbon::parse($post->date)->format('d') }}</h5><span>{{ Carbon\Carbon::parse($post->date)->format('M , Y') }}</span>
                </div>
                <div class="post-content">
                  <h4><i class="fa-solid fa-user"></i>{{$post->user->name ?? ''}}</h4>
                  <small class="text-muted"><i class="fa-solid fa-tag"></i>{{$post->user->role->name ?? 'এডমিন'}}</small>
                </div>
              </div>
              <h5 class="card-title">{{$post->title}}</h5>
              <p>{!! Str::limit($post->description, 200) !!}</p>
            </div>
            <div class="post-btn">
              <a class="btn-post" href="{{route('web-post-show', $post->id)}}">আরও পড়ুন...</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- Pagination -->
      <div class="d-flex">
                {!! $latests->links() !!}
            </div>
    </div>
  </section>


@endsection
     