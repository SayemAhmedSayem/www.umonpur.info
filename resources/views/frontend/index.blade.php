@extends('frontend.main')

@section('content')


  <!-- Banner Area Starts -->
  <section class="banner-area">
    <div class="container-fluid">
      <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
        @foreach(App\Models\Slider::all() as $key =>  $slide)
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key++}}" class="{{$slide->id==1 ? 'active' : ''}}"
            aria-current="true" aria-label="Slide {{$key+1}}"></button>
            

@endforeach()
   
          
        
        </div>
        <div class="carousel-inner">
        @foreach(App\Models\Slider::all() as $key =>  $slide)
          <div class="carousel-item {{$slide->id==1 ? 'active' : ''}}">
            <img src="{{ asset('uploads/sliders/'.$slide->image) }}" alt="Slider Image" class="d-block w-100">
            <div class="carousel-caption">
              <h5 class="animate__animated animate__fadeInUp">{{$slide->title}} </h5>
              <p class="d-none d-md-block animate__animated animate__fadeInUp">
              {{$slide->desscriptions}}</p>
            </div>
          </div>
          @endforeach()
  
      
  
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>
  <!-- Banner Area Ends -->

  <!-- Content Area Starts -->
  <section class="top-content">
    <div class="container">
      <div class="section-title">
        <h2>নোটিশ বোর্ড</h2>
        <p>নোটিশ বোর্ড তিনটি আংশে বিভক্ত যেমন সর্বশেষ হালনাগাদ এইমাত্র পাওয়া খবর, সকল নোটিশ ও সকল ইভেন্ট।</p>
      </div>
      <div class="row">
        <!-- First Content -->
        <div class="col-md-4 .first-content">
          <div class="sm-title">
            <h3><i class="fa-solid fa-calendar-days"></i>এইমাত্র পাওয়া খবর</h3>
          </div>
          <div class="content">
            @foreach($latests as $post)
            <div class="single-post">
              <img src="{{ asset('uploads/posts/'.$post->image) }}" alt="Blog Image">
              <div class="post-content-news">
                <h4><a href="{{route('web-post-show', $post->id)}}">{{$post->title}}</a></h4>
                {{-- <p>{{ Str::limit($post->description, 80) }}</p> --}}
                <p>{!! Str::limit($post->description, 80) !!}</p>
              </div>
            </div>
        @endforeach
          </div>
          <div class="post-btn">
            <a href="{{route('web-post-list')}}" class="btn-post">সকল খবর দেখুন</a>
          </div>
        </div>
        <!-- Second Content -->
        <div class="col-md-4 .second-content">
          <div class="sm-title">
            <h3><i class="fa-solid fa-bullhorn"></i>সকল নোটিশ</h3>
          </div>
          <div class="content">
          @foreach($notices as $notice)
            <div class="single-post">

              <div class="post-content-announce">
                <h4><a href="{{route('web-notice-show', $notice->id)}}">{{$notice->title}}</a></h4>
                {{-- <p>{{ Str::limit($notice->description, 200) }}</p> --}}
                <p>{!! Str::limit($notice->description, 100) !!}</p>
              </div>
            </div>
            @endforeach
          </div>
          <div class="post-btn">
            <a href="{{route('web-notice-list')}}" class="btn-post">সকল নোটিশ দেখুন</a>
          </div>
        </div>
        <!-- Third Content -->
        <div class="col-md-4 .third-content">
          <div class="sm-title">
            <h3><i class="fa-solid fa-flag"></i>সকল ইভেন্ট</h3>
          </div>
          <div class="third_content">
          @foreach($events as $event)
            <div class="single-post">
              <div class="title-post">
                <div class="date">
            
                <h5>  {{ Carbon\Carbon::parse($event->date)->format('d') }}</h5><span>{{ Carbon\Carbon::parse($event->date)->format('M , Y') }}</span>
                </div>
                <div class="post-content">
                  <h4><a href="{{route('web-event-show', $event->id)}}">{{$event->title}}</a></h4>
                  {{-- <p>{{ Str::limit($event->description, 80) }}</p> --}}
                  <p>{!! Str::limit($event->description, 80) !!}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="post-btn">
            <a href="{{route('web-event-list')}}" class="btn-post">সকল ইভেন্ট দেখুন</a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Content Area Ends -->

  <!-- Post Area Starts -->
  <section class="post-area">
    <div class="container-sm">
      <div class="section-title">
        <h2>আমাদের সর্বশেষ পোস্ট</h2>
        <p> ক্যাটাগরি অনুসারে সকল পোস্টের সর্বশেষ হালনাগাদ </p>
      </div>
      <!-- First Category Content Post -->
      <?php 
     $gm =  $villages[0]->cat_id;
      ?>

      <div class="post_category_title">
        <h2><a href="{{route('web-post-category', $gm)}}">আমাদের <span>গ্রাম</span></a></h2>
      </div>
      <div class="row  post-slide">
      @foreach($villages as $village)
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('uploads/posts/'.$village->image) }}" class="card-img-top" alt="Post 1">
            <div class="card-body">
              <div class="title-post">
                <div class="date">
                <h5>  {{ Carbon\Carbon::parse($village->date)->format('d') }}</h5><span>{{ Carbon\Carbon::parse($village->date)->format('M , Y') }}</span>
                </div>
                <div class="post-content">
                  <h4><i class="fa-solid fa-user"></i>{{$village->user->name}}</h4>
                  <small class="text-muted"><i class="fa-solid fa-tag"></i>{{$village->user->role->name ?? 'এডমিন'}}</small>
                </div>
              </div>
              <h5 class="card-title">{{$village->title}}</h5>
              <!-- <p class="card-text">{{ Str::limit($village->description, 110) }}</p> -->
              <p class="card-text">{!! Str::limit($village->description, 90) !!}</p>
            </div>
            <div class="post-btn">
              <a class="btn-post" href="{{route('web-post-show', $village->id)}}">আরও পড়ুন...</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>


      <!-- Second Category Content Post -->
      <?php 
     $sc =  $schools[0]->cat_id;
      ?>
      <div class="post_category_title">
        <h2><a href="{{route('web-post-category', $sc)}}">আমাদের <span>স্কুল</span></a></h2>
      </div>
      <div class="row  post-slide">
      @foreach($schools as $village)
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('uploads/posts/'.$village->image) }}" class="card-img-top" alt="Post 1">
            <div class="card-body">
              <div class="title-post">
                <div class="date">
                <h5>  {{ Carbon\Carbon::parse($village->date)->format('d') }}</h5><span>{{ Carbon\Carbon::parse($village->date)->format('M , Y') }}</span>
                </div>
                <div class="post-content">
                  <h4><i class="fa-solid fa-user"></i>{{$village->user->name}}</h4>
                  <small class="text-muted"><i class="fa-solid fa-tag"></i>{{$village->user->role->name ?? 'এডমিন'}}</small>
                </div>
              </div>
              <h5 class="card-title">{{$village->title}}</h5>
              <!-- <h5 class="card-title">{{ Str::limit($village->title, 40) }}</h5> -->
              <!-- <p class="card-text">{{ Str::limit($village->description, 110) }}</p> -->
              <p class="card-text">{!! Str::limit($village->description, 90) !!}</p>
            </div>
            <div class="post-btn">
              <a class="btn-post" href="{{route('web-post-show', $village->id)}}">আরও পড়ুন...</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- Third Content Post -->
      <?php 
     $md =  $madrasas[0]->cat_id;
      ?>
      <div class="post_category_title">
        <h2><a href="{{route('web-post-category', $md)}}">আমাদের <span>মাদ্রাসা</span></a></h2>
      </div>
      <div class="row post-slide">
      @foreach($madrasas as $village)
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('uploads/posts/'.$village->image) }}" class="card-img-top" alt="Post 1">
            <div class="card-body">
              <div class="title-post">
                <div class="date">
                <h5>  {{ Carbon\Carbon::parse($village->date)->format('d') }}</h5><span>{{ Carbon\Carbon::parse($village->date)->format('M , Y') }}</span>
                </div>
                <div class="post-content">
                  <h4><i class="fa-solid fa-user"></i>{{$village->user->name}}</h4>
                  <small class="text-muted"><i class="fa-solid fa-tag"></i>{{$village->user->role->name ?? 'এডমিন'}}</small>
                </div>
              </div>
              <h5 class="card-title">{{$village->title}}</h5>
              <!-- <p class="card-text">{{ Str::limit($village->description, 110) }}</p> -->
              <p class="card-text">{!! Str::limit($village->description, 90) !!}</p>
            </div>
            <div class="post-btn">
              <a class="btn-post" href="{{route('web-post-show', $village->id)}}">আরও পড়ুন...</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- Fourth Category Content Post -->
      <?php 
     $sp =  $sports[0]->cat_id;
      ?>
      <div class="post_category_title">
        <h2><a href="{{route('web-post-category', $sp)}}">আমাদের <span>খেলাধুলা</span></a></h2>
      </div>
      <div class="row  post-slide">
      @foreach($sports as $village)
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('uploads/posts/'.$village->image) }}" class="card-img-top" alt="Post 1">
            <div class="card-body">
              <div class="title-post">
                <div class="date">
                <h5>  {{ Carbon\Carbon::parse($village->date)->format('d') }}</h5><span>{{ Carbon\Carbon::parse($village->date)->format('M , Y') }}</span>
                </div>
                <div class="post-content">
                  <h4><i class="fa-solid fa-user"></i>{{$village->user->name}}</h4>
                  <small class="text-muted"><i class="fa-solid fa-tag"></i>{{$post->user->role->name ?? 'এডমিন'}}</small>
                </div>
              </div>
              <h5 class="card-title">{{$village->title}}</h5>
              <!-- <p class="card-text">{{ Str::limit($village->description, 110) }}</p> -->
              <p class="card-text">{!! Str::limit($village->description, 90) !!}</p>
            </div>
            <div class="post-btn">
              <a class="btn-post" href="{{route('web-post-show', $village->id)}}">আরও পড়ুন...</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!-- Fifth Category Content Post -->
      <?php 
     $ht =  $healths[0]->cat_id;
      ?>
      <div class="post_category_title">
        <h2><a href="{{route('web-post-category', $ht)}}">আমাদের <span>স্বাস্থ্য কমপ্লেক্স</span></a></h2>
      </div>
      <div class="row  post-slide">
      @foreach($healths as $village)
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('uploads/posts/'.$village->image) }}" class="card-img-top" alt="Post 1">
            <div class="card-body">
              <div class="title-post">
                <div class="date">
                <h5>  {{ Carbon\Carbon::parse($village->date)->format('d') }}</h5><span>{{ Carbon\Carbon::parse($village->date)->format('M , Y') }}</span>
                </div>
                <div class="post-content">
                  <h4><i class="fa-solid fa-user"></i>{{$village->user->name}}</h4>
                  <small class="text-muted"><i class="fa-solid fa-tag"></i>{{$post->user->role->name ?? 'এডমিন'}}</small>
                </div>
              </div>
              <h5 class="card-title">{{$village->title}}</h5>
              <p class="card-text">{!! Str::limit($village->description, 90) !!}</p>
              
            </div>
            <div class="post-btn">
              <a class="btn-post" href="{{route('web-post-show', $village->id)}}">আরও পড়ুন...</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>


    </div>
  </section>
  <!-- Post Area Ends -->

  <!-- Testimonials Area Starts -->
  <section class="testimonial-area">
    <div class="container">
      <div class="section-title">
        <a href="{{route('web-testimonial')}}"><h2>প্রশংসা পত্র</h2></a>
        <p>সর্বশেষ হালনাগাদ প্রশংসা পত্রের রেকর্ড</p>
      </div>
      <div class="test-slide">
       @foreach($testimonials as $testimonial)
        <div class="single-slide shadow">
         <img src="{{ asset('uploads/testimonial/'.$testimonial->image) }}" alt="" height="80" width="80">
          <div class="test-content">
            <h4>{{$testimonial->name}}</h4>
            <small>{{$testimonial->designation}}</small>
            <!-- <p><i class="fa-solid fa-quote-left"></i>{{$testimonial->message}} <i class="fa-solid fa-quote-right"></i></p> -->
            <p><i class="fa-solid fa-quote-left"></i>{{ Str::limit($testimonial->message, 100) }} <i class="fa-solid fa-quote-right"></i></p>

          </div>
        </div>
     @endforeach
      </div>
    </div>
  </section>
  <!-- Testimonial Area Ends -->

@endsection
     