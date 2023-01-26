@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">পোস্ট দেখুন</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('posts.index')}}">পোস্ট সমূহ</a></li>
            <li class="breadcrumb-item active">পোস্ট দেখুন</li>
         </ol>
      </nav>
   </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="ps-lg-1-6 ps-xl-5">
    
                <div class="mb-5 wow fadeIn">
                    <div class="row mt-n4">
                        <div class="col-sm-6 col-xl-3 mt-3">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    <i class="ti-bookmark-alt icon-box medium rounded-3 mb-4"></i>
                                    <h3 class="h5 mb-3">Post Author</h3>
                                    <p class="mb-0">{{$post->user->name;}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 mt-3">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    <i class="ti-pencil-alt icon-box medium rounded-3 mb-4"></i>
                                    <h3 class="h5 mb-3">Post Date</h3>
                                    <p class="mb-0">{{$post->date}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 mt-3">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    <i class="ti-medall-alt icon-box medium rounded-3 mb-4"></i>
                                    <h3 class="h5 mb-3">পোস্ট ক্যাটাগরি</h3>
                                    <p class="mb-0">{{$post->category->name}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 mt-3">
                            <div class="card text-center border-0 rounded-3">
                                <div class="card-body">
                                    <i class="ti-medall-alt icon-box medium rounded-3 mb-4"></i>
                                    <h3 class="h5 mb-3">Total Viewed</h3>
                                    <p class="mb-0">600</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wow fadeIn">
                 <div class="row">
                     <div class="col-sm-8">
                     <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="mb-0 text-primary">{{$post->title}}</h2>
                    </div>
                    <p class="mb-4 pt-3">
                        {{$post->description}}
                    </p>
                     </div>
                     <div class="col-sm-4">
                     <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="mb-0 text-primary">পোস্ট ফটো</h2>
                        <div class="align-middle white-space-nowrap py-0 pt-3">
                       <img src="{{ asset('uploads/posts/'.$post->image) }}" alt="" width="200">
                        </div>
                    </div>
                     </div>
                 </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection