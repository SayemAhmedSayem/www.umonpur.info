@extends('frontend.main')

@section('content')

  
  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2><span> সম্পর্কে</span></h2>
        <!-- <p class="banner-title-desc">গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের
          ব্যবস্থা চালু হয়। বালাসীঘাটে
          তিনটি লঞ্চ রয়েছে</p> -->
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i> <span>সম্পর্কে</span></p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- About Area Starts  -->
  <section class="about-area">
    <div class="container">
   <?php 
   $ab = App\Models\About::where('status', 1)->first();
   ?>
      <div class="row about-section">
        <div class="col-md-6">
          <div class="about-img">
            <img src="{{ asset('uploads/about/'.$ab->image) }}" alt="About Image">
          </div>
        </div>
        <div class="col-md-6">
          <div class="section-title-aside">
            <h2>{{$ab->title}}</h2>
          </div>
          <div class="about-content">
          <p>{{ Str::limit($ab->description, 530) }}</p>
            <a href="{{route('web-about-show', $ab->id)}}" class="btn btn-box">আরও পড়ুন...</a>
          </div>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 about-post">
        @foreach($abouts as $about)
        <div class="col">
          <div class="about-single shadow-sm">
            <div class="about-post-img">
              <img src="{{ asset('uploads/about/'.$about->image) }}" alt="About Image">
            </div>
            <div class="about-post-desc">
              <h3>{{$about->title}}</h3>
              <p>{{ Str::limit($about->description, 130) }}</p>
              <a href="{{route('web-about-show', $about->id)}}" class="btn btn-box">বিস্তারিত</a>
            </div>

          </div>
        </div>
 @endforeach
      </div>
      <div class="row">
        <div class="post-content">
          <a href="{{route('web-about-list')}}" class="btn-post">আরও দেখতে এইখানে ক্লিক করুন</a>
        </div>
      </div>
    </div>
  </section>
  <hr>
  <!-- About Area Ends  -->

  <!-- Profile Category Area Starts -->
  <section class="profile-category">
    <div class="container">
      <div class="section-title">
        <h2>আমাদের প্রোফাইল</h2>
        <p>আমাদের সদস্যরা সবসময় তাদের কাজের প্রতি খুবই নিষ্ঠাবান এবং তারা খুবই পরিশ্রমী </p>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach($profiles as $profile)
        <div class="col">
          <a href="{{route('profile-webshow', $profile->id)}}">
            <div class="prof-cate">
              <img src="{{ asset('uploads/profile/'.$profile->image) }}" alt="Logo Image">
              <p>{{$profile->name}}</p>
            </div>
          </a>
        </div>
     @endforeach


      </div>
    </div>
  </section>
  <!-- Profile Category Area Ends -->

  <!-- Statistics Area Starts -->
  <section class="statis-area banner-section" style="background-image: url('assets/img/slide1.png')">
    <div class="container">
      <div class="section-title">
        <h2>আমাদের পরিসংখ্যান</h2>
        <p>উমনপুর গ্রামের পরিসংখ্যান তালিকা অত্যন্ত সুন্দরভাবে সাজিয়ে তুলা হয়েছে।
        </p>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 statics">

      @foreach($statistics as $sta)
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="{{$sta->image}}"></i></div>
            <div class="statis-desc">
              <p>{{$sta->name}}</p>
              <h2 class="statis-number"><span class="counter">{{$sta->value}}</span></h2>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Statistics Area Ends -->

  <!-- Testimonials Area Starts -->
  <section class="testimonial-area">
    <div class="container">
      <div class="section-title">
      <a href="{{route('web-testimonial')}}"><h2>প্রশংসা পত্র</h2></a>
        <p>উমনপুর গ্রাম নিয়ে বক্তার প্রশংসনীয় বক্তব্য। উমনপুর একটি ডিজিটাল/নেটিজেন গ্রাম।</p>
      </div>
      <div class="test-slide">
      @foreach($testimonials as $testimonial)
      <a href="{{route('web-testimonial-single', $testimonial->id)}}">
        <div class="single-slide shadow">
         <img src="{{ asset('uploads/testimonial/'.$testimonial->image) }}" alt="" height="80" width="80">
          <div class="test-content">
            <h4>{{$testimonial->name}}</h4>
            <small>{{$testimonial->designation}}</small>
            <p><i class="fa-solid fa-quote-left"></i>{{ Str::limit($testimonial->message, 100) }} <i class="fa-solid fa-quote-right"></i></p>

          </div>
        </div>
        </a>
     @endforeach
     
      </div>
    </div>
  </section>
  <!-- Testimonial Area Ends -->

  <!-- Donar List Area Starts -->
  <section class="donarlist-area">
    <div class="container">
      <div class="section-title">
        <h2>আমাদের দাতাগণের তালিকা</h2>
        <p>ওয়েবসাইট উদ্বোধনের পর থেকে গ্রামে আর্থ দিয়ে সাহায্য করেছেন তাদের তালিকা</p>
      </div>
      <div class="row">
        <div class="col">
          <div class="sm-title">
            <h2>দানকরুন তালিকা</h2>
          </div>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="table-success">
                <tr>
                  <th scope="col">ক্রমিক নং</th>
                  <th scope="col">ছবি</th>
                  <th scope="col">নাম</th>
                  <th scope="col">মোবাইল নং</th>
                  <th scope="col">দানের পরিমান</th>
                </tr>
              </thead>
              <tbody>
              @foreach($gbypayer as $key => $d)
                <?php 
                $user = App\Models\User::find($d->user_id);
                
                ?>
                <tr>
                  <th scope="row">{{$key + 1}}</th>
                  <td><img src="{{ asset('uploads/members/'.$user->nid->image) }}" alt="Donar Img" height="100" width="100"></td>
                  <td>{{  $user->name ?? ''}}</td>
                  <td>{{  $user->nid->phone ?? ''}}</td>
                  <td>৳{{  $d->amount ?? ''}}</td>
                </tr>
           @endforeach
          
              </tbody>
            </table>
          </div>
          <div class="post-btn">
            <a class="btn-post" href="{{route('web-about-donate-g')}}">সম্পূর্ণ তালিকা</a>
          </div>
        </div>
      
        <div class="col">
          <div class="sm-title">
            <h2>সাহায্য করুন তালিকা</h2>
          </div>
          <div class="table-responsive">
        
            <table class="table table-hover">
              <thead class="table-success">
                <tr>
                  <th scope="col">ক্রমিক নং</th>
                  <th scope="col">ছবি</th>
                  <th scope="col">নাম</th>
                  <th scope="col">মোবাইল নং</th>
                  <th scope="col">দানের পরিমান</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dbypayer as $key => $d)
                <?php 
                $user = App\Models\User::find($d->user_id);
                
                ?>
                <tr>
                  <th scope="row">{{$key + 1}}</th>
                  <td><img src="{{ asset('uploads/members/'.$user->nid->image) }}" alt="Donar Img" height="100" width="100"></td>
                  <td>{{  $user->name ?? ''}}</td>
                  <td>{{  $user->nid->phone ?? ''}}</td>
                  <td>৳{{  $d->amount ?? ''}}</td>
                </tr>
           @endforeach
              </tbody>
            </table>
         
          </div>
          <div class="post-btn">
            <a class="btn-post" href="{{route('web-about-donate-d')}}">সম্পূর্ণ তালিকা</a>
          </div>
        </div>
       
      </div>
    </div>
  </section>
  <!-- Donar List Area Ends -->

@endsection
     