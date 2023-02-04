@extends('frontend.main')

@section('content')

  <style>
   
    .btn-sayem{
      margin-bottom: 20px;
                  margin-top: 20px;    background: #fc7437;    font-size: 11px !important;
    padding: 8px 15px !important;
    border-radius: 30px;
    display: inline-block;
    color: #fff;
    font-size: 12px;
    font-family: 'Raleway', sans-serif;
    text-transform: uppercase;
    font-weight: bold;
    padding: 12px 35px;
    border: 2px solid transparent;
    }
    .pull-left {
    float: left!important;
}
.pull-right {
    float: right!important;
}
.progress {

    height: 1.8rem !important;
    font-size: 1rem !important;


}

  </style>
  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2><span> সাহায্য করুন</span></h2>
        <!-- <p class="banner-title-desc">গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের
          ব্যবস্থা চালু হয়। বালাসীঘাটে
          তিনটি লঞ্চ রয়েছে</p> -->
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i> <span>সাহায্য করুন</span></p>
      </div>
    </div>
  </section>

  

  <!-- About Area Starts  -->
  <section class="about-area">
    <div class="container">
     
<h1>অনুদান প্রয়োজন</h1>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 about-post" style="font-family: lato;">
      @foreach($donates as $donate)
    

      <?php
      $income = App\Models\Income::where('donate_id', $donate->id)->where('status',1)->sum('amount');
      $percent = $income/$donate->goal * 100;
      $sum =  App\Models\Income::where('donate_id', $donate->id)->where('status', 1)->select(DB::raw('count(user_id) as count'))
      ->groupBy('user_id')->get();

    
      ?>
      <?php $number = 0; ?>
@foreach ($sum as $Rating)
<?php $number++ ?>   
@endforeach
@if($donate->goal > $income)
        <div class="col">
          <div class="about-single shadow-sm">
            <div class="about-post-img">
            <img src="{{ asset('uploads/donate/'.$donate->image) }}">
            </div>
            <div class="about-post-desc">
              <h4>{{$donate->name}}</h4>
              <p>{{ Str::limit($donate->description, 80) }}</p>
              <div class="mb-3">
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width:{{intval($percent)}}%;" aria-valuenow="{{intval($percent)}}" aria-valuemin="0" aria-valuemax="100">{{intval($percent)}}%</div>
                </div>
              </div>
              <ul class="" style="padding-left: 0px !important;">
                <li class="clearfix border-bottom"><span class="pull-left">দাতাগণ -</span> <strong class="pull-right">{{ $number }}</strong></li>
                <li class="clearfix border-bottom"><span class="pull-left">আমাদের লক্ষ্য -</span> <strong class="pull-right">৳{{$donate->goal}}</strong></li>
                <li class="clearfix border-bottom"><span class="pull-left">সংগৃহীত -</span> <strong class="pull-right">৳{{$income}}</strong></li>
              <div class="row">
       
                <div class="col-sm-12">
                  <a href="{{route('web-donate-show', $donate->id)}}" class="btn btn-box btn-sayem pull-right" >বিস্তারিত দেখুন</a>
                </div>
              </div>
            </div>

          </div>
        </div>
        @endif
        @endforeach
    
      </div>
      <div class="row">
      <div class="post-content">
        {!! $donates->links() !!}
        </div>
      </div>
    </div>
  </section>

  <!-- Completed Donation List  -->
  <!-- About Area Starts  -->
  <section class="about-area">
    <div class="container">
  <h1>অনুদান  সংগ্রহীত </h1>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 about-post" style="font-family: lato;">
      @foreach($donatesc as $donate)
    

      <?php
      $income = App\Models\Income::where('donate_id', $donate->id)->where('status',1)->sum('amount');
      $percent = $income/$donate->goal * 100;
      $sum =  App\Models\Income::where('donate_id', $donate->id)->where('status', 1)->select(DB::raw('count(user_id) as count'))
      ->groupBy('user_id')->get();

    
      ?>
      <?php $number = 0; ?>
@foreach ($sum as $Rating)
<?php $number++ ?>   
@endforeach
@if($donate->goal <= $income)
        <div class="col">
          <div class="about-single shadow-sm">
            <div class="about-post-img">
            <img src="{{ asset('uploads/donate/'.$donate->image) }}">
            </div>
            <div class="about-post-desc">
              <h4>{{$donate->name}}</h4>
              <p>{{ Str::limit($donate->description, 80) }}</p>
              <div class="mb-3">
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width:{{intval($percent)}}%;" aria-valuenow="{{intval($percent)}}" aria-valuemin="0" aria-valuemax="100">{{intval($percent)}}%</div>
                </div>
              </div>
              <ul class="" style="padding-left: 0px !important;">
                <li class="clearfix border-bottom"><span class="pull-left">দাতাগণ -</span> <strong class="pull-right">{{ $number }}</strong></li>
                <li class="clearfix border-bottom"><span class="pull-left">লক্ষ্য -</span> <strong class="pull-right">৳{{$donate->goal}}</strong></li>
                <li class="clearfix border-bottom"><span class="pull-left">সংগৃহীত -</span> <strong class="pull-right">৳{{$income}}</strong></li>
              <div class="row">
       
                <div class="col-sm-12">
                  <a href="{{route('web-donate-show', $donate->id)}}" class="btn btn-box btn-sayem pull-right" >বিস্তারিত দেখুন</a>
                </div>
              </div>
            </div>

          </div>
        </div>
        @endif
        @endforeach
    
      </div>
      <div class="row">
      <div class="post-content">
      
        </div>
      </div>
    </div>
  </section>

  <!-- Completed Donation List  -->


@endsection
     