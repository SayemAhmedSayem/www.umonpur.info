@extends('layouts.header')

@section('content')



<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">ভিডিও</h2>
            </div>
      
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{route('album.index')}}">এ্যালবাম সমূহ</a></li>
              <li class="breadcrumb-item"><a href="{{route('album.show', $album->id)}}">{{$album->name}}</a></li>
              <li class="breadcrumb-item active">ভিডিও</li>
              <li class="breadcrumb-item active">Editing {{$video->title}}</li>
            </ol>
          </nav>
          </div>
    
          <div class="row">
          <form action="{{route('video.update', $video->id)}}" method="POST"  enctype="multipart/form-data">
          @csrf
        @method('PUT')
  <div class="mb-3">
    <div class="form-group">
       <div class="row">
          <div class="col-sm-12">
             <label class="form-label">শিরোনাম</label>
             <input class="form-control" type="text" value="{{$video->title}}" name="title" required>
             <input type="hidden" value="{{$album->id}}" name="album_id">
          </div>
          <div class="col-sm-12">
             <label class="form-label">Video URL</label>
             <input class="form-control" type="text" value="{{$video->url}}" name="url" required>
          </div>
          <div class="col-sm-12">
             <label class="form-label">সংকিপ্ত বর্ণনা</label>
        
         <textarea name="description" id="" class="form-control" cols="30" rows="10">{{$video->description}}</textarea>
          </div>
          <img src="{{ asset('uploads/album/videos/'.$video->image) }}" class="card-image-top" height="200" alt="thumbnail">
          <div class="col-sm-12">
        
             <label class="form-label">Change Thumbnail</label>
            
             <input type="file" class="form-control dropify" name="image">
          </div>
       </div>
    </div>
 </div>





    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বন্ধ করুন</button>
      <button type="submit" class="btn btn-primary">আপডেট করুন</button>
    </div>
  </div>
  </form>
        </div>
        </div>
    
          </div>
     
  




@endsection
