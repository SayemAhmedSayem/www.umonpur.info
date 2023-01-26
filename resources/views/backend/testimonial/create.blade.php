@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">প্রশংসাপত্র যুক্ত করুন</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">প্রশংসাপত্র সমূহ</a></li>
            <li class="breadcrumb-item active">প্রশংসাপত্র যুক্ত করুন</li>
         </ol>
      </nav>
   </div>
   <form action="{{route('testimonial.store')}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">সদস্যদের নাম</label>
               <input class="form-control" type="text" name="name">
            </div>
        
         </div>
      </div>
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">পেশা</label>
               <input class="form-control" type="text" name="designation">
            </div>
        
         </div>
      </div>
   </div>
   <div class="mb-0">
      <label class="form-label">বার্তা</label> 
      <textarea class="form-control" name="message" rows="3"> </textarea>
   </div>
   <div class="mb-0">
      <label class="form-label">প্রোফাইল ফটো</label> 
      <input type="file" class="form-control dropify" name="image">
   </div>
   <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
         <button type="submit" class="btn btn-primary">
         <span class="fas fa-plus me-2"></span>
         প্রশংসাপত্র যুক্ত করুন
         </button>
      </div>
   </div>
    </form>
</div>
</div>
</div>
@endsection