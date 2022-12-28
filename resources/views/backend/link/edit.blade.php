@extends('layouts.header')
@section('content')

   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">Add Link</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Links</a></li>
            <li class="breadcrumb-item active">Add Link</li>
         </ol>
      </nav>
   </div>
   <form action="{{route('link.update', $link->id)}}" method="POST"  enctype="multipart/form-data">
          @csrf
        @method('PUT')
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">Link Name</label>
               <input class="form-control" type="text" value="{{$link->name}}" name="name">
            </div>
            <div class="col-sm-12">
               <label class="form-label">URL</label>
               <input class="form-control" type="text" value="{{$link->link}}" name="link">
            </div>
            <div class="col-sm-12">
               <label class="form-label">Link Name</label>
               <select name="type" class="form-control" id="">
                  <option value="1" {{$link->type==1 ? 'selected' : ''}}>Footer One</option>
                  <option value="2" {{$link->type==2 ? 'selected' : ''}}>Footer Two</option>
                  <option value="3" {{$link->type==3 ? 'selected' : ''}}>Footer Three</option>
                  <option value="4" {{$link->type==4 ? 'selected' : ''}}>Footer Four</option>
               </select>
            </div>
        
         </div>
      </div>
   </div>

   <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
         <button type="submit" class="btn btn-primary">
         <span class="fas fa-plus me-2"></span>
         Add Link
         </button>
      </div>
   </div>
    </form>
</div>
</div>

@endsection