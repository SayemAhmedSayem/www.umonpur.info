@extends('layouts.header')
@section('content')
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">সম্পর্কে যুক্ত করুন</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">সম্পর্কে</a></li>
            <li class="breadcrumb-item active">সম্পর্কে যুক্ত করুন</li>
         </ol>
      </nav>
   </div>
    <form action="{{route('about.store')}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-6">
               <label class="form-label" for="date">তারিখ </label>
               <input class="form-control"  name="date" type="date">
            </div>
            <div class="col-sm-6">
               <label class="form-label" for="date">Default </label>
               <div class="form-check">
  <input class="form-check-input" name="status" id="flexCheckDefault" type="checkbox" value="1">
  <label class="form-check-label" for="flexCheckDefault">Make this Default</label>
</div>
            </div>
            <div class="col-sm-12">
               <label class="form-label" for="date"> শিরোনাম </label>
               <input class="form-control" type="text" name="title">
            </div>
         </div>
      </div>
   </div>
   <div class="mb-0">
      <label class="form-label" for="exampleTextarea">বিস্তারিত</label> 
      <textarea name="description"></textarea>
         <script>
                 CKEDITOR.replace( 'description' );
         </script>
   </div>
   <div class="mb-3">
      <label class="form-label" for="customFile">সম্পর্কিত ফটো</label>
   
                                    <input type="file" class="form-control dropify" name="image">
                               
   </div>
   <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
         <button type="submit" class="btn btn-primary">
         <span class="fas fa-plus me-2"></span>
         সম্পর্কে যুক্ত করুন
         </button>
      </div>
   </div>
    </form>
</div>
</div>
</div>
@endsection