@extends('layouts.header')
@section('content')

   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">লিংক যুক্ত করুন</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">লিঙ্ক সমূহ</a></li>
            <li class="breadcrumb-item active">লিঙ্ক যুক্ত করুন</li>
         </ol>
      </nav>
   </div>
   <form action="{{route('link.store')}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">লিংক নাম</label>
               <input class="form-control" type="text" name="name" required>
            </div>
            <div class="col-sm-12">
               <label class="form-label">URL</label>
               <input class="form-control" type="text" name="link" required>
            </div>
            <div class="col-sm-12">
               <label class="form-label">লিংক নাম</label>
               <select name="type" class="form-control" id="">
                  <option value="1">Footer one</option>
                  <option value="2">Footer two</option>
                  <option value="3">Footer three</option>
                  <option value="4">Footer four</option>
               </select>
            </div>
        
         </div>
      </div>
   </div>

   <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
         <button type="submit" class="btn btn-primary">
         <span class="fas fa-plus me-2"></span>
         লিংক যুক্ত করুন
         </button>
      </div>
   </div>
    </form>
</div>
</div>

@endsection