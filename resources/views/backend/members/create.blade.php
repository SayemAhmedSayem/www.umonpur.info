@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">সদস্য যুক্ত করুন</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">সদস্য</a></li>
            <li class="breadcrumb-item active">সদস্য যুক্ত করুন</li>
         </ol>
      </nav>
   </div>
   <form action="{{route('members.store')}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">Name</label>
               <input class="form-control" type="text" name="name">
            </div>
        
         </div>
      </div>
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">Phone</label>
               <input class="form-control" type="text" name="phone">
            </div>
        
         </div>
      </div>
   </div>
   <div class="mb-0">
      <label class="form-label">Image</label> 
      <input type="file" class="form-control dropify" name="image">
   </div>
   <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
         <button type="submit" class="btn btn-primary">
         <span class="fas fa-plus me-2"></span>
         Add Member
         </button>
      </div>
   </div>
    </form>
</div>
</div>
</div>
@endsection