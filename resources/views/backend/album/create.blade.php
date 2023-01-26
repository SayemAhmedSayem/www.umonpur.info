@extends('layouts.header')
@section('content')

   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0"> এ্যালবাম যুক্ত করুন</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('album.index')}}">এ্যালবাম</a></li>
            <li class="breadcrumb-item active">এ্যালবাম যুক্ত করুন</li>
         </ol>
      </nav>
   </div>
   <form action="{{route('album.store')}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">এ্যালবাম নাম</label>
               <input class="form-control" type="text" name="name" required>
            </div>
        
         </div>
      </div>
   </div>
   <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">এ্যালবাম টাইপ</label>
               <select class="form-control" name="type" id="" required>
                  <option value="Photo">Photo</option>
                  <option value="Video">Video</option>

               </select>
            </div>
        
         </div>
      </div>
   </div>
   <div class="mb-0">
      <label class="form-label">সংকিপ্ত বর্ণনা</label> 
      <textarea class="form-control" name="description" rows="3"> </textarea>
   </div>

   <div class="mb-3">
      <label class="form-label" for="customFile">Album Thumbnail</label>
   
                                    <input type="file" class="form-control dropify" name="thumbnail" required>
                               
   </div>

   <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
         <button type="submit" class="btn btn-primary">
         <span class="fas fa-plus me-2"></span>
         এ্যালবাম যুক্ত করুন
         </button>
      </div>
   </div>
    </form>
</div>
</div>

@endsection