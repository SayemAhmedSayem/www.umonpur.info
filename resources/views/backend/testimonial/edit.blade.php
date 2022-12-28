@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">Update Testimonial</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Testimonials</a></li>
            <li class="breadcrumb-item active">Update Testimonial</li>
         </ol>
      </nav>
   </div>
   <form action="{{route('testimonial.update', $testimonial->id)}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
        @method('PUT')
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">Member Name</label>
               <input class="form-control" value="{{$testimonial->name}}"  type="text" name="name">
            </div>
        
         </div>
      </div>
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">Designation</label>
               <input class="form-control" value="{{$testimonial->designation}}" type="text" name="designation">
            </div>
        
         </div>
      </div>
   </div>
   <div class="mb-0">
      <label class="form-label">Message</label> 
      <textarea class="form-control" name="message" rows="3">{{$testimonial->message}} </textarea>
   </div>
   <div class="mb-0">
   <img src="{{ asset('uploads/testimonial/'.$testimonial->image) }}" alt="" width="53">
      <label class="form-label">Profile Photo</label> 
      <input type="file" class="form-control dropify" name="image">
   </div>
   <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
         <button type="submit" class="btn btn-primary">
         <span class="fas fa-plus me-2"></span>
         Update Testimonial
         </button>
      </div>
   </div>
    </form>
</div>
</div>
</div>
@endsection