@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">আপডেট স্লাইডার</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">স্লাইডার</a></li>
            <li class="breadcrumb-item active">আপডেট স্লাইডার</li>
         </ol>
      </nav>
   </div>
   <form action="{{route('sliders.update', $slider->id)}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
        @method('PUT')
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">শিরোনাম</label>
               <input class="form-control" value="{{$slider->title}}" type="text" name="title">
            </div>
        
         </div>
      </div>

   </div>
   <div class="mb-0">
      <label class="form-label">সংকিপ্ত বর্ণনা</label> 
      <textarea class="form-control" name="desscriptions" rows="3">{{$slider->desscriptions}} </textarea>
   </div>
   <div class="mb-0">
      
      <img src="{{ asset('uploads/sliders/'.$slider->image) }}" alt="" width="300">
      <label class="form-label">স্লাইড ফটো</label> 
      <input type="file" class="form-control dropify" name="image">
   </div>
   <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
         <button type="submit" class="btn btn-primary">
         <span class="fas fa-plus me-2"></span>
         আপডেট স্লাইড
         </button>
      </div>
   </div>
    </form>
</div>
</div>
</div>
@endsection