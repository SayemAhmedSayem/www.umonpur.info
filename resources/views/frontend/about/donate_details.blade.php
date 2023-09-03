@extends('frontend.main')

@section('content')

  
  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('assets/img/blog1.jpg');">
    <div class="container">
      <div class="banner-title">
        <h2>আমাদের <span>দাতাকারীদের  তালিকা</span></h2>
        <!-- <p class="banner-title-desc">গাইবান্ধার বালাসী থেকে জামালপুরের বাহাদুরাবাদ নৌরুটে এক মাস আগে লঞ্চ পারাপারের
          ব্যবস্থা চালু হয়। বালাসীঘাটে
          তিনটি লঞ্চ রয়েছে</p> -->
        <p><a href="index.html">হোম</a> <i class="fa fa-angle-right"></i> <a href="{{route('web-about')}}">সম্পর্কে</a> <i
            class="fa fa-angle-right"></i>
          <span>{{$title}}</span>
        </p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->

  <!-- Donar List Area Starts -->
  <section class="donarlist-area">
    <div class="container">
      <div class="section-title">
        <h2>{{$title}}</h2>
        {{-- <p>উদ্বোধনের পর একটি লঞ্চ বিকল হয়, বাকি দুটি নিয়মিত চলছে না। এ অবস্থায় শ্যালো ইঞ্জিনচালিত নৌকায়
          ঝুঁকি নিয়ে পারাপার করানো হচ্ছে যাত্রীদের</p> --}}
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="table-success">
                <tr>
                  <th scope="col">ক্রমিক নং</th>
                  <th scope="col">ছবি</th>
                  <th scope="col">নাম</th>
                  <th scope="col">মোবাইল নং</th>
                  <th scope="col">দানের পরিমান</th>
                  <th scope="col">দানের সংখ্যা</th>
                </tr>
              </thead>
              <tbody>
              @foreach($incomes as $key => $d)
                <?php 
                $user = App\Models\User::find($d->user_id);
                
                ?>
                <tr>
                  <th scope="row">{{$key + 1}}</th>
                  <td><img src="{{ asset('uploads/members/'.$user->nid->image) }}" alt="Donar Img" height="100"></td>
                  <td>{{  $user->name ?? ''}}</td>
                  <td>{{  $user->nid->phone ?? ''}}</td>
                  <td>৳{{  $d->amount ?? ''}}</td>
                  <td>{{  $d->count ?? ''}}</td>
                </tr>
           @endforeach
         
              </tbody>
            </table>
            <div class="d-flex">
                {!! $incomes->links() !!}
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- Donar List Area Ends -->




@endsection
     