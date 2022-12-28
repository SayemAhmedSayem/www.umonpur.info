@extends('layouts.header')

@section('content')



<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">Photos</h2>
            </div>
      
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{route('album.index')}}">Albums</a></li>
              <li class="breadcrumb-item"><a href="{{route('album.show', $album->id)}}">{{$album->name}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('year.show', $year->id)}}">{{$year->year}}</a></li>
              <li class="breadcrumb-item active">Photos</li>
              <li class="breadcrumb-item active">Editing {{$photo->title}}</li>
            </ol>
          </nav>
          </div>
    
          <div class="row">
          <form action="{{route('photo.update', $photo->id)}}" method="POST"  enctype="multipart/form-data">
          @csrf
        @method('PUT')
  <div class="mb-3">
    <div class="form-group">
       <div class="row">
          <div class="col-sm-12">
             <label class="form-label">title</label>
             <input class="form-control" type="text" value="{{$photo->title}}" name="title" required>
             <input type="hidden" value="{{$year->id}}" name="year_id">
          </div>
          <div class="col-sm-12">
             <label class="form-label">Description</label>
        
         <textarea name="description" id="" class="form-control" cols="30" rows="10">{{$photo->description}}</textarea>
          </div>
          <img src="{{ asset('uploads/album/photos/'.$photo->image) }}" class="card-image-top" height="200" alt="thumbnail">
          <div class="col-sm-12">
        
             <label class="form-label">Change Photo</label>
            
             <input type="file" class="form-control dropify" name="image">
          </div>
       </div>
    </div>
 </div>





    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
  </form>
        </div>
        </div>
    
          </div>
     
  




@endsection
