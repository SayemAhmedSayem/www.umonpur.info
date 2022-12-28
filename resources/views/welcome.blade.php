@extends('frontend.main')

@section('content')


      <section class="banner-area">
         <div class="container-fluid">
            <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
               <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                     aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                     aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                     aria-label="Slide 3"></button>
               </div>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img src="{{asset('frontend/assets/img/slide1.png')}}" alt="Slider Image" class="d-block w-100">
                     <div class="carousel-caption">
                        <h5 class="animate__animated animate__fadeInUp">সব জায়গার সব খবর </h5>
                        <p class="d-none d-md-block animate__animated animate__fadeInUp">
                           উঁচু একটি টিলার ওপর স্থাপিত বাংলাদেশের সর্ব দক্ষিণ-পূর্বের সীমান্তচৌকিতে এসেছি সামনে যাওয়ার অনুমতি
                           চাইতে। কিন্তু দায়িত্বে থাকা অফিসার জানালেন বেসামরিক বাঙালিদের সামনে যাওয়ার অনুমতি
                        </p>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <img src="{{asset('frontend/assets/img/slide2.png')}}" alt="Slider Image" class="d-block w-100">
                     <div class="carousel-caption">
                        <h5 class="animate__animated animate__fadeInUp">দেশের সর্বোচ্চ শিখরের খোঁজে</h5>
                        <p class="d-none d-md-block animate__animated animate__fadeInUp">সিলেটের দক্ষিণ সুরমার মুক্তিযোদ্ধা চত্বরের পাশেই ফলের আড়ত। আড়তের এক পাশে কলার
                           বিশাল আড়ত। এখান থেকেই সিলেট নগরের বিভিন্ন এলাকায় কলার ছড়ি পাইকারি দামে কিনে নিয়ে যান ব্যবসায়ীরা
                        </p>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <img src="{{asset('frontend/assets/img/slide3.png')}}" alt="Slider Image" class="d-block w-100">
                     <div class="carousel-caption">
                        <h5 class="animate__animated animate__fadeInUp">জ্বালানির মূল্যবৃদ্ধি, বন্ধ হয়ে গেল উড়োজাহাজ চলাচল</h5>
                        <p class="d-none d-md-block animate__animated animate__fadeInUp">জেট ফুয়েলের দাম আকাশ ছুঁয়েছে। এর জেরে বেড়ে গেছে উড়োজাহাজ চলাচলের খরচ। বাড়তি
                           দামে জ্বালানি কিনে তা দিয়ে উড়োজাহাজ চালানো আর লাভজনক হয়ে উঠছে না।
                        </p>
                     </div>
                  </div>
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
               <h2>নোটিশ</h2>
               <p>গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের ব্যবস্থা চালু হয়। বালাসীঘাটে
                  তিনটি লঞ্চ রয়েছে। উদ্বোধনের পর একটি লঞ্চ বিকল হয়, বাকি দুটি নিয়মিত চলছে না। এ অবস্থায় শ্যালো ইঞ্জিনচালিত নৌকায়
                  ঝুঁকি নিয়ে পারাপার করানো হচ্ছে যাত্রীদের
               </p>
            </div>
            <div class="row">
               <!-- First Content -->
               <div class="col-md-4 .first-content">
                  <div class="sm-title">
                     <h3><i class="fa-solid fa-calendar-days"></i>এইমাত্র পাওয়া খাবর</h3>
                  </div>
                  <div class="content">
                     <div class="single-post">
                        <img src="frontend/assets/img/blog1.jpg" alt="Blog Image">
                        <div class="post-content-news">
                           <h4><a href="top_content.html">খবরের শিরোনাম ১</a></h4>
                           <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                              নেই নিরাপত্তামূলক ব্যবস্থা
                           </p>
                        </div>
                     </div>
                     <div class="single-post">
                        <img src="frontend/assets/img/blog1.jpg" alt="Blog Image">
                        <div class="post-content-news">
                           <h4><a href="top_content.html">খবরের শিরোনাম ২</a></h4>
                           <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                              নেই নিরাপত্তামূলক ব্যবস্থা
                           </p>
                        </div>
                     </div>
                     <div class="single-post">
                        <img src="frontend/assets/img/blog1.jpg" alt="Blog Image">
                        <div class="post-content-news">
                           <h4><a href="top_content.html">খবরের শিরোনাম ৩</a></h4>
                           <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                              নেই নিরাপত্তামূলক ব্যবস্থা
                           </p>
                        </div>
                     </div>
                     <div class="single-post">
                        <img src="frontend/assets/img/blog2.jpg" alt="Blog Image">
                        <div class="post-content-news">
                           <h4><a href="top_content.html">খবরের শিরোনাম ৪</a></h4>
                           <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                              নেই নিরাপত্তামূলক ব্যবস্থা
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="post-btn">
                     <a href="top_first_content.html" class="btn-post">সকল খাবর দেখুন</a>
                  </div>
               </div>
               <!-- Second Content -->
               <div class="col-md-4 .second-content">
                  <div class="sm-title">
                     <h3><i class="fa-solid fa-bullhorn"></i>সকল নোটিশ</h3>
                  </div>
                  <div class="content">
                     <div class="single-post">
                        <div class="post-content-announce">
                           <h4>ঘোষণা শিরোনাম ১</h4>
                           <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                              নেই নিরাপত্তামূলক ব্যবস্থা। ধারণক্ষমতার অতিরিক্ত যাত্রী বহন হচ্ছে। ঈদের কয়েক দিন আগে থেকে এ অবস্থা
                              চলছে।
                           </p>
                        </div>
                     </div>
                     <div class="single-post">
                        <div class="post-content-announce">
                           <h4>ঘোষণা শিরোনাম ২</h4>
                           <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                              নেই নিরাপত্তামূলক ব্যবস্থা। ধারণক্ষমতার অতিরিক্ত যাত্রী বহন হচ্ছে। ঈদের কয়েক দিন আগে থেকে এ অবস্থা
                              চলছে।
                           </p>
                        </div>
                     </div>
                     <div class="single-post">
                        <div class="post-content-announce">
                           <h4>ঘোষণা শিরোনাম ৩</h4>
                           <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                              নেই নিরাপত্তামূলক ব্যবস্থা। ধারণক্ষমতার অতিরিক্ত যাত্রী বহন হচ্ছে। ঈদের কয়েক দিন আগে থেকে এ অবস্থা
                              চলছে।
                           </p>
                        </div>
                     </div>
                     <div class="single-post">
                        <div class="post-content-announce">
                           <h4>ঘোষণা শিরোনাম ৪</h4>
                           <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                              নেই নিরাপত্তামূলক ব্যবস্থা। ধারণক্ষমতার অতিরিক্ত যাত্রী বহন হচ্ছে। ঈদের কয়েক দিন আগে থেকে এ অবস্থা
                              চলছে।
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="post-btn">
                     <a href="top_second_content.html" class="btn-post">সকল নোটিশ দেখুন</a>
                  </div>
               </div>
               <!-- Third Content -->
               <div class="col-md-4 .third-content">
                  <div class="sm-title">
                     <h3><i class="fa-solid fa-flag"></i>সকল ইভেন্ট</h3>
                  </div>
                  <div class="third_content">
                     <div class="single-post">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><a href="Event_Details.html">নোটিশ শিরোনাম ১</a></h4>
                              <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                                 নেই নিরাপত্তামূলক ব্যবস্থা। ধারণক্ষমতার অতিরিক্ত যাত্রী বহন হচ্ছে। ঈদের কয়েক দিন আগে থেকে এ অবস্থা
                                 চলছে।
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="single-post">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><a href="Event_Details.html">নোটিশ শিরোনাম ১</a></h4>
                              <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                                 নেই নিরাপত্তামূলক ব্যবস্থা। ধারণক্ষমতার অতিরিক্ত যাত্রী বহন হচ্ছে। ঈদের কয়েক দিন আগে থেকে এ অবস্থা
                                 চলছে।
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="single-post">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><a href="Event_Details.html">নোটিশ শিরোনাম ১</a></h4>
                              <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                                 নেই নিরাপত্তামূলক ব্যবস্থা। ধারণক্ষমতার অতিরিক্ত যাত্রী বহন হচ্ছে। ঈদের কয়েক দিন আগে থেকে এ অবস্থা
                                 চলছে।
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="single-post">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><a href="Event_Details.html">নোটিশ শিরোনাম ১</a></h4>
                              <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                                 নেই নিরাপত্তামূলক ব্যবস্থা। ধারণক্ষমতার অতিরিক্ত যাত্রী বহন হচ্ছে। ঈদের কয়েক দিন আগে থেকে এ অবস্থা
                                 চলছে।
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="single-post">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><a href="Event_Details.html">নোটিশ শিরোনাম ১</a></h4>
                              <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                                 নেই নিরাপত্তামূলক ব্যবস্থা। ধারণক্ষমতার অতিরিক্ত যাত্রী বহন হচ্ছে। ঈদের কয়েক দিন আগে থেকে এ অবস্থা
                                 চলছে।
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="single-post">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><a href="Event_Details.html">নোটিশ শিরোনাম ১</a></h4>
                              <p>গত শনিবার দুপুরে সরেজমিনে দেখা গেছে, নৌকায় গাদাগাদি করে যাত্রীরা পার হচ্ছেন। নৌকার ওপরে ছাউনি নেই।
                                 নেই নিরাপত্তামূলক ব্যবস্থা। ধারণক্ষমতার অতিরিক্ত যাত্রী বহন হচ্ছে। ঈদের কয়েক দিন আগে থেকে এ অবস্থা
                                 চলছে।
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="post-btn">
                     <a href="top_third_content.html" class="btn-post">সকল ইভেন্ট দেখুন</a>
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
               <p>গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের ব্যবস্থা চালু হয়। বালাসীঘাটে
                  তিনটি লঞ্চ রয়েছে। উদ্বোধনের পর একটি লঞ্চ বিকল হয়, বাকি দুটি নিয়মিত চলছে না। এ অবস্থায় শ্যালো ইঞ্জিনচালিত নৌকায়
                  ঝুঁকি নিয়ে পারাপার করানো হচ্ছে যাত্রীদের
               </p>
            </div>
            <!-- First Category Content Post -->
            <div class="post_category_title">
               <h2><a href="Amader_gram.html">আমাদের <span>গ্রাম</span></a></h2>
            </div>
            <div class="row  post-slide">
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">গাইবান্ধার বালাসী থেকে জামালপুরের</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">বৃষ্টি হতে পারে রাজধানীতে</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">ঘূর্ণিঝড় অশনির প্রভাবে </h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">গাইবান্ধার বালাসী থেকে জামালপুরের</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Second Category Content Post -->
            <div class="post_category_title">
               <h2><a href="Amader_school.html">আমাদের <span>স্কুল</span></a></h2>
            </div>
            <div class="row  post-slide">
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">আজ সোমবার দেশের তিন বিভাগে</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">বৃষ্টি হতে পারে </h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">কথা বলেছে আবহাওয়া অধিদপ্তর</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">সোমবার দেশের তিন বিভাগে</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Third Content Post -->
            <div class="post_category_title">
               <h2><a href="Amader_madrasa.html">আমাদের <span>মাদ্রাসা</span></a></h2>
            </div>
            <div class="row post-slide">
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">গাইবান্ধার বালাসী থেকে জামালপুরের</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">আবহাওয়া অধিদপ্তর</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">আজ সোমবার</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">ঘূর্ণিঝড় অশনির প্রভাবে আজ</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Fourth Category Content Post -->
            <div class="post_category_title">
               <h2><a href="Amader_sports.html">আমাদের <span>খেলাধুলা</span></a></h2>
            </div>
            <div class="row  post-slide">
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">বৃষ্টি হতে পারে রাজধানী</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">কথা বলেছে আবহাওয়া</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">গাইবান্ধার বালাসী থেকে</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
               <div class="col">
                  <div class="card h-100">
                     <img src="frontend/assets/img/blog2.jpg" class="card-img-top" alt="Post 1">
                     <div class="card-body">
                        <div class="title-post">
                           <div class="date">
                              <h5>১৪</h5>
                              <span>এপ্রিল , ২০২০</span>
                           </div>
                           <div class="post-content">
                              <h4><i class="fa-solid fa-user"></i>কামাল উদ্দিন</h4>
                              <small class="text-muted"><i class="fa-solid fa-tag"></i>সিইও</small>
                           </div>
                        </div>
                        <h5 class="card-title">গাইবান্ধার বালাসী থেকে</h5>
                        <p class="card-text">ঘূর্ণিঝড় অশনির প্রভাবে আজ সোমবার দেশের তিন বিভাগে মাঝারি থেকে প্রবল বৃষ্টির সম্ভাবনার
                           কথা বলেছে আবহাওয়া অধিদপ্তর। বৃষ্টি হতে পারে রাজধানী ও এর পার্শ্ববর্তী এলাকাগুলোতেও।
                        </p>
                     </div>
                     <div class="post-btn">
                        <a class="btn-post" href="post_cate_1_page.html">আরও পড়ুন...</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Post Area Ends -->
      <!-- Testimonials Area Starts -->
      <section class="testimonial-area">
         <div class="container">
            <div class="section-title">
               <h2>প্রশংসা পত্র</h2>
               <p>গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের ব্যবস্থা চালু হয়। বালাসীঘাটে
                  তিনটি লঞ্চ রয়েছে। উদ্বোধনের পর একটি লঞ্চ বিকল হয়, বাকি দুটি নিয়মিত চলছে না। এ অবস্থায় শ্যালো ইঞ্জিনচালিত নৌকায়
                  ঝুঁকি নিয়ে পারাপার করানো হচ্ছে যাত্রীদের
               </p>
            </div>
            <div class="test-slide">
               <div class="single-slide shadow">
                  <img src="frontend/assets/img/01.png" alt="Testimonial Image">
                  <div class="test-content">
                     <h4>কামাল উদ্দিন</h4>
                     <small>সিনিয়র ইঞ্জিনিয়ার</small>
                     <p><i class="fa-solid fa-quote-left"></i>আমার প্রয়োজনের সকল খবর আমি এখানে পেয়ে যাই । আমার বিশ্বাস নতুন আলো
                        নামের এই প্রতিষ্ঠানটি আমাদের জন্য আরো ভাল ভাল কাজ করে যাবে <i class="fa-solid fa-quote-right"></i>
                     </p>
                  </div>
               </div>
               <div class="single-slide shadow">
                  <img src="frontend/assets/img/02.png" alt="Testimonial Image">
                  <div class="test-content">
                     <h4>জনাব রহিম খান</h4>
                     <small>ব্যবসায়ী</small>
                     <p><i class="fa-solid fa-quote-left"></i>আমার প্রয়োজনের সকল খবর আমি এখানে পেয়ে যাই । আমার বিশ্বাস নতুন আলো
                        নামের এই প্রতিষ্ঠানটি আমাদের জন্য আরো ভাল ভাল কাজ করে যাবে <i class="fa-solid fa-quote-right"></i>
                     </p>
                  </div>
               </div>
               <div class="single-slide shadow">
                  <img src="frontend/assets/img/03.png" alt="Testimonial Image">
                  <div class="test-content">
                     <h4>সালমা খাতুন</h4>
                     <small>শিক্ষিকা</small>
                     <p><i class="fa-solid fa-quote-left"></i>আমার প্রয়োজনের সকল খবর আমি এখানে পেয়ে যাই । আমার বিশ্বাস নতুন আলো
                        নামের এই প্রতিষ্ঠানটি আমাদের জন্য আরো ভাল ভাল কাজ করে যাবে <i class="fa-solid fa-quote-right"></i>
                     </p>
                  </div>
               </div>
               <div class="single-slide shadow">
                  <img src="frontend/assets/img/04.png" alt="Testimonial Image">
                  <div class="test-content">
                     <h4>জামাল হাওলাদার</h4>
                     <small>সাংবাদিক</small>
                     <p><i class="fa-solid fa-quote-left"></i>আমার প্রয়োজনের সকল খবর আমি এখানে পেয়ে যাই । আমার বিশ্বাস নতুন আলো
                        নামের এই প্রতিষ্ঠানটি আমাদের জন্য আরো ভাল ভাল কাজ করে যাবে <i class="fa-solid fa-quote-right"></i>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Testimonial Area Ends -->
@endsection
     