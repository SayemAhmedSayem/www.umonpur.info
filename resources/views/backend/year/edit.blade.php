@extends('layouts.header')

@section('content')



<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">ফটো</h2>
            </div>
      
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{route('album.index')}}">এ্যালবাম সমূহ</a></li>
              <li class="breadcrumb-item"><a href="{{route('album.show', $album->id)}}">{{$album->name}}</a></li>
              <li class="breadcrumb-item active">এডিট {{$year->year}}</li>
            </ol>
          </nav>
          </div>
    
          <div class="row">
          <form action="{{route('year.update', $year->id)}}" method="POST"  enctype="multipart/form-data">
          @csrf
        @method('PUT')
  <div class="mb-3">
    <div class="form-group">
       <div class="row">
          <div class="col-sm-12">
             <label class="form-label">বছরের নাম</label>
             <input class="form-control" type="text" value="{{$year->year}}" name="year" required>
             <input type="hidden" value="{{$album->id}}" name="album_id">
          </div>
      
        
      
       </div>
    </div>
 </div>





    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বন্ধ করুন</button>
      <button type="submit" class="btn btn-primary">আপডেট করুন {{$year->year}}</button>
    </div>
  </div>
  </form>
        </div>
        </div>
    
          </div>
     
  




@endsection
