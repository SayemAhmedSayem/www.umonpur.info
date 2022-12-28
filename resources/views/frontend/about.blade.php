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
   $abouts = App\Models\About::where('status', 0)->get();
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
            <p>{{$ab->description}}</p>
            <a href="about_details.html" class="btn btn-box">আরও পড়ুন...</a>
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
              <p>{{$about->description}}</p>
              <a href="#" class="btn btn-box">বিস্তারিত</a>
            </div>

          </div>
        </div>
 @endforeach
      </div>
      <div class="row">
        <div class="post-content">
          <a href="about_more.html" class="btn-post">আরও দেখতে এইখানে ক্লিক করুন</a>
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
        @foreach(App\Models\Profile::All() as $profile)
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
        <p>ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
          কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
        </p>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 statics">
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-flag"></i></div>
            <div class="statis-desc">
              <p>বিদেশি</p>
              <h2 class="statis-number"><span class="counter">14000</span></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-graduation-cap"></i></div>
            <div class="statis-desc">
              <p>শিক্ষিত</p>
              <h2 class="statis-number"><span class="counter">4800</span></h2>
            </div>

          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-graduation-cap"></i></div>
            <div class="statis-desc">
              <p>নিরক্ষর</p>
              <h2 class="statis-number"><span class="counter">200</span></h2>
            </div>

          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-user"></i></div>
            <div class="statis-desc">
              <p>এক বছরে জন্মের হার</p>
              <h2 class="statis-number"><span class="counter">60</span></h2>
            </div>

          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-user"></i></div>
            <div class="statis-desc">
              <p>এক বছরে মৃতের হার</p>
              <h2 class="statis-number"><span class="counter">54</span></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-user"></i></div>
            <div class="statis-desc">
              <p>আমাদের পরিবার সংখ্যা</p>
              <h2 class="statis-number"><span class="counter">481</span></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
            <div class="statis-desc">
              <p>ভোটার</p>
              <h2 class="statis-number"><span class="counter">1500</span></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
            <div class="statis-desc">
              <p>মোট জনসংখ্যা</p>
              <h2 class="statis-number"><span class="counter">5000</span></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-mars"></i></div>
            <div class="statis-desc">
              <p>পুরুষ</p>
              <h2 class="statis-number"><span class="counter">2700</span></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-venus"></i></div>
            <div class="statis-desc">
              <p>নারী</p>
              <h2 class="statis-number"><span class="counter">1300</span></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-user"></i></div>
            <div class="statis-desc">
              <p>তহবিলে দাতা</p>
              <h2 class="statis-number"><span class="counter">59</span></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-user"></i></div>
            <div class="statis-desc">
              <p>অসহায় মানুষের পাশে দাতা</p>
              <h2 class="statis-number"><span class="counter">13</span></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-user"></i></div>
            <div class="statis-desc">
              <p>ক্রিকেট খেলোয়াড়</p>
              <h2 class="statis-number"><span class="counter">200</span></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-user"></i></div>
            <div class="statis-desc">
              <p>ফুটবল খেলোয়াড়</p>
              <h2 class="statis-number"><span class="counter">400</span></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="single-statis">
            <div class="statis-icon"><i class="fa-solid fa-user"></i></div>
            <div class="statis-desc">
              <p>ব্যাডমিন্টন খেলোয়াড়</p>
              <h2 class="statis-number"><span class="counter">160</span></h2>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="first-statistic">






          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Statistics Area Ends -->

  <!-- Testimonials Area Starts -->
  <section class="testimonial-area">
    <div class="container">
      <div class="section-title">
        <h2>প্রশংসা পত্র</h2>
        <p>গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের ব্যবস্থা চালু হয়। বালাসীঘাটে
          তিনটি লঞ্চ রয়েছে। উদ্বোধনের পর একটি লঞ্চ বিকল হয়, বাকি দুটি নিয়মিত চলছে না। এ অবস্থায় শ্যালো ইঞ্জিনচালিত নৌকায়
          ঝুঁকি নিয়ে পারাপার করানো হচ্ছে যাত্রীদের</p>
      </div>
      <div class="test-slide">
        <div class="single-slide shadow">
          <img src="assets/img/01.png" alt="Testimonial Image">
          <div class="test-content">
            <h4>কামাল উদ্দিন</h4>
            <small>সিনিয়র ইঞ্জিনিয়ার</small>
            <p><i class="fa-solid fa-quote-left"></i>আমার প্রয়োজনের সকল খবর আমি এখানে পেয়ে যাই । আমার বিশ্বাস নতুন আলো
              নামের এই প্রতিষ্ঠানটি আমাদের জন্য আরো ভাল ভাল কাজ করে যাবে <i class="fa-solid fa-quote-right"></i></p>

          </div>
        </div>
        <div class="single-slide shadow">
          <img src="assets/img/02.png" alt="Testimonial Image">
          <div class="test-content">
            <h4>জনাব রহিম খান</h4>
            <small>ব্যবসায়ী</small>
            <p><i class="fa-solid fa-quote-left"></i>আমার প্রয়োজনের সকল খবর আমি এখানে পেয়ে যাই । আমার বিশ্বাস নতুন আলো
              নামের এই প্রতিষ্ঠানটি আমাদের জন্য আরো ভাল ভাল কাজ করে যাবে <i class="fa-solid fa-quote-right"></i></p>

          </div>
        </div>
        <div class="single-slide shadow">
          <img src="assets/img/03.png" alt="Testimonial Image">
          <div class="test-content">
            <h4>সালমা খাতুন</h4>
            <small>শিক্ষিকা</small>
            <p><i class="fa-solid fa-quote-left"></i>আমার প্রয়োজনের সকল খবর আমি এখানে পেয়ে যাই । আমার বিশ্বাস নতুন আলো
              নামের এই প্রতিষ্ঠানটি আমাদের জন্য আরো ভাল ভাল কাজ করে যাবে <i class="fa-solid fa-quote-right"></i></p>

          </div>
        </div>
        <div class="single-slide shadow">
          <img src="assets/img/04.png" alt="Testimonial Image">
          <div class="test-content">
            <h4>জামাল হাওলাদার</h4>
            <small>সাংবাদিক</small>
            <p><i class="fa-solid fa-quote-left"></i>আমার প্রয়োজনের সকল খবর আমি এখানে পেয়ে যাই । আমার বিশ্বাস নতুন আলো
              নামের এই প্রতিষ্ঠানটি আমাদের জন্য আরো ভাল ভাল কাজ করে যাবে <i class="fa-solid fa-quote-right"></i></p>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Testimonial Area Ends -->

  <!-- Donar List Area Starts -->
  <section class="donarlist-area">
    <div class="container">
      <div class="section-title">
        <h2>আমাদের দাতাগণের তালিকা</h2>
        <p>উদ্বোধনের পর একটি লঞ্চ বিকল হয়, বাকি দুটি নিয়মিত চলছে না। এ অবস্থায় শ্যালো ইঞ্জিনচালিত নৌকায়
          ঝুঁকি নিয়ে পারাপার করানো হচ্ছে যাত্রীদের</p>
      </div>
      <div class="row">
        <div class="col">
          <div class="sm-title">
            <h2>তহবিলে দাতাগণের তালিকা</h2>
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
                <tr>
                  <th scope="row">০১</th>
                  <td><img src="assets/img/01.png" alt="Donar Img"></td>
                  <td>কামাল উদ্দিন</td>
                  <td>+৮৮০ ১২৩৪ ৪৫৬৭৮৯</td>
                  <td>১২০০ টাকা</td>
                </tr>
                <tr>
                  <th scope="row">০২</th>
                  <td><img src="assets/img/02.png" alt="Donar Img"></td>
                  <td>জনাব রহিম খান</td>
                  <td>+৮৮০ ১২৩৪ ৪৫৬৭৮৯</td>
                  <td>২৪০০ টাকা</td>
                </tr>
                <tr>
                  <th scope="row">০৩</th>
                  <td><img src="assets/img/03.png" alt="Donar Img"></td>
                  <td>সালমা খাতুন</td>
                  <td>+৮৮০ ১২৩৪ ৪৫৬৭৮৯</td>
                  <td>৮০০ টাকা</td>
                </tr>
                <tr>
                  <th scope="row">০৪</th>
                  <td><img src="assets/img/04.png" alt="Donar Img"></td>
                  <td>জামাল হাওলাদার</td>
                  <td>+৮৮০ ১২৩৪ ৪৫৬৭৮৯</td>
                  <td>১০০০ টাকা</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="post-btn">
            <a class="btn-post" href="donar_list.html">সম্পূর্ণ তালিকা</a>
          </div>
        </div>
        <div class="col">
          <div class="sm-title">
            <h2>অসহায়দের সহায়তা দাতাগণের তালিকা</h2>
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
                <tr>
                  <th scope="row">০১</th>
                  <td><img src="assets/img/01.png" alt="Donar Img"></td>
                  <td>কামাল উদ্দিন</td>
                  <td>+৮৮০ ১২৩৪ ৪৫৬৭৮৯</td>
                  <td>১২০০ টাকা</td>
                </tr>
                <tr>
                  <th scope="row">০২</th>
                  <td><img src="assets/img/02.png" alt="Donar Img"></td>
                  <td>জনাব রহিম খান</td>
                  <td>+৮৮০ ১২৩৪ ৪৫৬৭৮৯</td>
                  <td>২৪০০ টাকা</td>
                </tr>
                <tr>
                  <th scope="row">০৩</th>
                  <td><img src="assets/img/03.png" alt="Donar Img"></td>
                  <td>সালমা খাতুন</td>
                  <td>+৮৮০ ১২৩৪ ৪৫৬৭৮৯</td>
                  <td>৮০০ টাকা</td>
                </tr>
                <tr>
                  <th scope="row">০৪</th>
                  <td><img src="assets/img/04.png" alt="Donar Img"></td>
                  <td>জামাল হাওলাদার</td>
                  <td>+৮৮০ ১২৩৪ ৪৫৬৭৮৯</td>
                  <td>১০০০ টাকা</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="post-btn">
            <a class="btn-post" href="Donar_list_2.html">সম্পূর্ণ তালিকা</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Donar List Area Ends -->

@endsection
     