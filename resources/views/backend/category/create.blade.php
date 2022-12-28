@extends('layouts.header')
@section('content')

   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">Add Category</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Categories</a></li>
            <li class="breadcrumb-item active">Add Category</li>
         </ol>
      </nav>
   </div>
   <form action="{{route('category.store')}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">Category Name</label>
               <input class="form-control" type="text" name="name">
            </div>
        
         </div>
      </div>
   </div>
   <div class="mb-0">
      <label class="form-label">Description</label> 
      <textarea class="form-control" name="description" rows="3"> </textarea>
   </div>

   <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
         <button type="submit" class="btn btn-primary">
         <span class="fas fa-plus me-2"></span>
         Add Category
         </button>
      </div>
   </div>
    </form>
</div>
</div>

@endsection