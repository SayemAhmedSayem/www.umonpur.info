@extends('frontend.main')

@section('content')

  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2><span>ভোটার</span> তালিকা</h2>
        <p><a href="index.html">হোম</a><i class="fa fa-angle-right"></i><span>ভোটার তালিকা</span></p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->


  <!-- Voter List Area Starts  -->
  <section class="voter_list_area">
    <div class="container-md">
      <div class="section-title">
        <h2>ভোটার তালিকা</h2>
        <p>গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের ব্যবস্থা চালু হয়। বালাসীঘাটে
          তিনটি লঞ্চ রয়েছে। উদ্বোধনের পর একটি লঞ্চ বিকল হয়</p>
      </div>
      <!-- Voter Search  -->
      <div class="row">
        <div class="search-area my-4 col-md-6">
          <form class="d-flex" method="POST" action="{{route('voter.search')}}">
            @csrf
            <input class="form-control me-2" type="search" name="voter_id" placeholder="এখানে ভোটার নাম্বার খুজুন..."
              aria-label="Search">
            <button class="btn btn-outline-success" type="submit">খুজুন</button>
          </form>
        </div>
      </div>
      <div class="voter-card" id="mak">
        <div class="row">
          <div class="col-2">
            <p class="voter-card-token">সিরিয়াল নং - <span class="token">{{$voter->serial}}</span></p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <!-- Voter Card Layout -->
            <div class="single-voter-card">
              <div class="voter-card-header">
                <div class="voter-card-header-img">
                  <img src="{{asset('frontend/assets/img/nid-header-logo.jpg')}}" alt="NID Header">
                </div>
                <div class="header-content">
                  <h4>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h4>
                  <p>Government of the People's Republic of Bangladesh</p>
                  <p><span>National ID Card</span> / জাতীয় পরিচয় পত্র</p>
                </div>
              </div>
              <div class="main-voter-info">
                <div class="voter-img">
                  <img src="{{asset('frontend/assets/img/1.jpg')}}" alt="Voter Image">
                </div>
                <div class="voter-info">
                  <div class="water-mark-img">
                    <img src="{{asset('frontend/assets/img/water-mark.png')}}" alt="Water Mark">
                  </div>
                  
                  <p><span class="name-title">নাম:</span> <span class="name">{{$voter->name}}</span></p>
                  <p><span class="name-title-en">Name:</span> <span class="name-en">{{$voter->name}}</span></p>
                  <p><span class="name-title-father">পিতা:</span> <span class="name-father">{{$voter->father}}</span></p>
                  <p><span class="name-title-mother">মাতা:</span> <span class="name-mother">{{$voter->mother}}</span></p>
                  <p><span class="birth-date-title">Date of Birth</span> <span class="date-birth">{{$voter->dob}}</span></p>
                  <p><span class="id-title">ID NO:</span> <span class="voter-id">{{$voter->nid}}</span></p>
                  <p><span class="name-title">সিরিয়াল নং:</span> <span class="name">{{$voter->serial}}</span></p>
                </div>
              </div>
            </div>
            <!-- Voter Card Print -->
            <div class="row">
              <div class="voter-card-print">
                <a href="#" class="btn btn-box">প্রিন্টের জন্য এইখানে ক্লিক করুন</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Voter List -->
      <!-- <div class="voter-lists">
        <div class="single-voter-info shadow-sm">
          <div class="row">
            <div class="col-1">
              <div class="voter-serial">০১</div>
            </div>
            <div class="col-md-3">
              <div class="voter-img">
                <img src="assets/img/1.jpg" alt="Voter Image">
              </div>
            </div>
            <div class="col-md-6">
              <div class="voter-name">
                <span>নামঃ</span> কামরুল হাসান
              </div>
              <div class="voter-fathers-name">
                <span>পিতার নামঃ</span> রহিম মোল্লা
              </div>
              <div class="voter-mothers-name">
                <span>মাতার নামঃ</span> সালমা খাতুন
              </div>
              <div class="voter-birth">
                <span>জন্ম তারিখঃ</span> ১২ মে, ১৯৮০
              </div>
              <div class="voter-number">
                <span>ভোটার আইডিঃ</span> ১৯৯৬০ ৭৮৯৫৫৪৪৩৩ ৪০৪৫০
              </div>
              <div class="voter-card-download">
                <a href="#" class="btn btn-box">প্রিন্টের জন্য এইখানে ক্লিক করুন</a>
              </div>
            </div>
          </div>
        </div>
        <div class="single-voter-info shadow-sm">
          <div class="row">
            <div class="col-1">
              <div class="voter-serial">০২</div>
            </div>
            <div class="col-md-3">
              <div class="voter-img">
                <img src="assets/img/1.jpg" alt="Voter Image">
              </div>
            </div>
            <div class="col-md-6">
              <div class="voter-name">
                <span>নামঃ</span> কামরুল হাসান
              </div>
              <div class="voter-fathers-name">
                <span>পিতার নামঃ</span> রহিম মোল্লা
              </div>
              <div class="voter-mothers-name">
                <span>মাতার নামঃ</span> সালমা খাতুন
              </div>
              <div class="voter-birth">
                <span>জন্ম তারিখঃ</span> ১২ মে, ১৯৮০
              </div>
              <div class="voter-number">
                <span>ভোটার আইডিঃ</span> ১৯৯৬০ ৭৮৯৫৫৪৪৩৩ ৪০৪৫০
              </div>
              <div class="voter-card-download">
                <a href="#" class="btn btn-box">প্রিন্টের জন্য এইখানে ক্লিক করুন</a>
              </div>
            </div>
          </div>
        </div>
        <div class="single-voter-info shadow-sm">
          <div class="row">
            <div class="col-1">
              <div class="voter-serial">০৩</div>
            </div>
            <div class="col-md-3">
              <div class="voter-img">
                <img src="assets/img/1.jpg" alt="Voter Image">
              </div>
            </div>
            <div class="col-md-6">
              <div class="voter-name">
                <span>নামঃ</span> কামরুল হাসান
              </div>
              <div class="voter-fathers-name">
                <span>পিতার নামঃ</span> রহিম মোল্লা
              </div>
              <div class="voter-mothers-name">
                <span>মাতার নামঃ</span> সালমা খাতুন
              </div>
              <div class="voter-birth">
                <span>জন্ম তারিখঃ</span> ১২ মে, ১৯৮০
              </div>
              <div class="voter-number">
                <span>ভোটার আইডিঃ</span> ১৯৯৬০ ৭৮৯৫৫৪৪৩৩ ৪০৪৫০
              </div>
              <div class="voter-card-download">
                <a href="#" class="btn btn-box">প্রিন্টের জন্য এইখানে ক্লিক করুন</a>
              </div>
            </div>
          </div>
        </div>
        <div class="single-voter-info shadow-sm">
          <div class="row">
            <div class="col-1">
              <div class="voter-serial">০৪</div>
            </div>
            <div class="col-md-3">
              <div class="voter-img">
                <img src="assets/img/1.jpg" alt="Voter Image">
              </div>
            </div>
            <div class="col-md-8">
              <div class="voter-name">
                <span>নামঃ</span> কামরুল হাসান
              </div>
              <div class="voter-fathers-name">
                <span>পিতার নামঃ</span> রহিম মোল্লা
              </div>
              <div class="voter-mothers-name">
                <span>মাতার নামঃ</span> সালমা খাতুন
              </div>
              <div class="voter-birth">
                <span>জন্ম তারিখঃ</span> ১২ মে, ১৯৮০
              </div>
              <div class="voter-number">
                <span>ভোটার আইডিঃ</span> ১৯৯৬০ ৭৮৯৫৫৪৪৩৩ ৪০৪৫০
              </div>
              <div class="voter-card-download">
                <a href="#" class="btn btn-box">প্রিন্টের জন্য এইখানে ক্লিক করুন</a>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <!-- Pagination -->
      <!-- <div class="row">
        <div class="table-pagination py-4">
          <nav aria-label="voter list">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="#" tabindex="-1">আগের পেইজ</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">১</a></li>
              <li class="page-item" aria-current="page">
                <a class="page-link" href="#">২</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">৩</a></li>
              <li class="page-item"><a class="page-link" href="#">৪</a></li>
              <li class="page-item">
                <a class="page-link" href="#">পরের পেইজ</a>
              </li>
            </ul>
          </nav>
        </div>
      </div> -->

    </div>
  </section>
  <!-- Voter List Area Ends  -->

@endsection
     