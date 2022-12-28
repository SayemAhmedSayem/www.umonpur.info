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
              <li class="breadcrumb-item active">Editing {{$year->year}}</li>
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
             <label class="form-label">Year Name</label>
             <input class="form-control" type="text" value="{{$year->year}}" name="year" required>
             <input type="hidden" value="{{$album->id}}" name="album_id">
          </div>
      
        
      
       </div>
    </div>
 </div>





    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Update {{$year->year}}</button>
    </div>
  </div>
  </form>
        </div>
        </div>
    
          </div>
     
  




@endsection
