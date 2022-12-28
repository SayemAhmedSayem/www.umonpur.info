@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">Add About</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">About</a></li>
            <li class="breadcrumb-item active">Add About</li>
         </ol>
      </nav>
   </div>
   <form action="{{route('about.update' , $about->id)}}" method="POST"  enctype="multipart/form-data">
      
      @csrf
      @method('PUT')
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-6">
               <label class="form-label" for="date">Date </label>
               <input class="form-control"  name="date" value="{{$about->date}}" type="date">
            </div>
            <div class="col-sm-6">
               <label class="form-label" for="date">Default </label>
               <div class="form-check">
  <input class="form-check-input" name="status" id="flexCheckDefault" type="checkbox" value="1" {{$about->status==1 ? 'checked' : ''}}>
  <label class="form-check-label" for="flexCheckDefault">Make this Default</label>
</div>
            </div>
            <div class="col-sm-12">
               <label class="form-label" for="date"> Title </label>
               <input class="form-control" type="text" value="{{$about->title}}" name="title">
            </div>
         </div>
      </div>
   </div>
   <div class="mb-0">
      <label class="form-label" for="exampleTextarea">Description</label> 
      <textarea class="form-control" name="description" rows="3"> {{$about->description}}</textarea>
   </div>
   <div class="mb-3">
      <label class="form-label" for="customFile">About Image</label>
   
                                    <input type="file" class="form-control dropify" name="image">
                               
   </div>
   <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
         <button type="submit" class="btn btn-primary">
         <span class="fas fa-plus me-2"></span>
         Add About
         </button>
      </div>
   </div>
    </form>
</div>
</div>
</div>
@endsection