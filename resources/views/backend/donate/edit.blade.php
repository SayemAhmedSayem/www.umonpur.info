@extends('layouts.header')

@section('content')

<div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">সাহায্য করুন পোস্ট</h2>
      </div>

      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">ডনেশন</a></li>
            <li class="breadcrumb-item active">সাহায্য করুন পোস্ট করুন</li>
         </ol>
      </nav>
   </div>

   <form action="{{route('donate.update', $donate->id)}}" method="POST"  enctype="multipart/form-data">
      
   @csrf
        @method('PUT')
  <div class="mb-3">
    <div class="form-group">
       <div class="row">
          <div class="col-sm-4">
             <label class="form-label" for="date">Title </label>
             <input class="form-control"  value="{{$donate->name}}"  name="name" type="text" required>
          </div>
          <div class="col-sm-4">
             <label class="form-label" for="date">আমাদের লক্ষ্য </label>
             <input class="form-control"  value="{{$donate->goal}}" name="goal" type="number" required>
       
          </div>
          <div class="col-sm-4">
          <div  class="align-middle white-space-nowrap py-0"><img src="{{ asset('uploads/donate/'.$donate->image) }}" alt="" width="200"></div>
          <label class="form-label" for="customFile">সাহায্য করুন ফটো</label>
 
 <input type="file" class="form-control dropify" name="image">
       
          </div>
          <div class="col-sm-12">
          <label class="form-label" for="exampleTextarea">বিস্তারিত বর্ণনা</label> 
    <textarea class="form-control"  name="description" rows="3"> {{$donate->description}} </textarea required>
       
          </div>

       
 
       </div>
    </div>
 </div>

 <div class="mb-3">
    
                             
 </div>
 <div class="col-auto pt-3">
    <div class="d-flex align-items-right">
       <button type="submit" class="btn btn-primary">
       <span class="fas fa-plus me-2"></span>
       Edit Donation Request
       </button>
    </div>
 </div>
  </form>
         
          
          </div>

@endsection
