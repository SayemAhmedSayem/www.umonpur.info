@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">Edit Page</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Pages</a></li>
            <li class="breadcrumb-item active">Edit Page</li>
         </ol>
      </nav>
   </div>
   <form action="{{route('pages.update', $page->id)}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
        @method('PUT')

    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">Title</label>
               <input class="form-control" type="text" value="{{$page->title}}" name="title">
            </div>
        
         </div>
      </div>
   </div>
   <div class="mb-0">
      <label class="form-label">Page Type</label> 
  
      <select class="form-control" name="layout_type" id="">
  <option value="about" {{$page->layout_type=='about' ? 'selected' : ''}}>About</option>
  <option value="home" {{$page->layout_type=='home' ? 'selected' : ''}}>Home</option>
  <option value="contact" {{$page->layout_type=='contact' ? 'selected' : ''}}>Contact</option>
      </select>
   </div>

   <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
         <button type="submit" class="btn btn-primary">
         <span class="fas fa-plus me-2"></span>
         Update Page
         </button>
      </div>
   </div>
    </form>
</div>
</div>
</div>
@endsection