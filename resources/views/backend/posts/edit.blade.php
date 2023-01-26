@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">এডিট পোস্ট</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">পোস্ট সমূহ</a></li>
            <li class="breadcrumb-item active">এডিট পোস্ট</li>
         </ol>
      </nav>
   </div>
    <form action="{{route('posts.update' , $post->id)}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
        @method('PUT')
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-6">
               <label class="form-label" for="date">তারিখ</label>
               <input class="form-control" value="{{$post->date}}"  name="date" type="date">
            </div>
            <div class="col-sm-6">
               <label class="form-label" for="date">ক্যাটাগরি </label>
               <select name="cat_id" id="" class="form-control">
                  @foreach($categories as $cat)
                  <option value="{{$cat->id}}" {{$post->cat_id==$cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-sm-12">
               <label class="form-label" for="date">পোস্ট শিরোনাম </label>
               <input class="form-control" type="text" value="{{$post->title}}" name="title">
            </div>
            <!-- <div class="col-sm-12">
               <label class="form-label" for="date">Post Sub Title </label>
               <input class="form-control" type="text" name="sub_title">
            </div> -->
         </div>
      </div>
   </div>
   <div class="mb-0">
      <label class="form-label" for="exampleTextarea">বিস্তারিত</label> 
      <textarea class="form-control" name="description" rows="3">{{$post->description}} </textarea>
   </div>
   <div class="mb-3">
      <label class="form-label" for="customFile">পোস্ট ফটো</label>
      <div class="align-middle white-space-nowrap py-0"><img src="{{ asset('uploads/posts/'.$post->image) }}" alt="" width="100"></div>
   
                                    <input type="file" class="form-control dropify" name="image">
                               
   </div>
   <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
         <button type="submit" class="btn btn-primary">
         <span class="fas fa-plus me-2"></span>
         আপডেট করুন
         </button>
      </div>
   </div>
    </form>
</div>
</div>
</div>
@endsection