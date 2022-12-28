@extends('layouts.header')

@section('content')



<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">Photos</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">

                  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Photo
</button>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{route('album.index')}}">Albums</a></li>
              <li class="breadcrumb-item"><a href="{{route('album.show', $album->id)}}">{{$album->name}}</a></li>
              <li class="breadcrumb-item active">{{$year->year}}</li>
              <li class="breadcrumb-item active">Photos</li>
            </ol>
          </nav>
          </div>
    
          <div class="row">
         
@foreach($photos as $photo)
            <div class="col-md-6 col-lg-4">
                <div class="card my-3">
                  <div class="card img">
                  <img  src="{{ asset('uploads/album/photos/'.$photo->image) }}" class="card-image-top" alt="thumbnail">

                  </div>
                    

                    <div class="card-body">
                        <h3 class="card-title"><a href="#" class="text-secondary">{{$photo->title}}</a></h3>
                        <p class="card-text">{{$photo->description}}</p>
                        <div class="button-group" style="display:flex !important;">
                               <form action="{{route('photo.destroy',$photo->id)}}" method="POST">
                                @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('photo.edit', $photo->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
                    </div>
                </div>
            </div>
     
   
@endforeach
{!! $photos->links() !!}
        </div>
        </div>

      
          </div>
     
  

      
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('photo.store')}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">title</label>
               <input class="form-control" type="text" name="title" required>
               <input type="hidden" value="{{$year->id}}" name="year_id">
            </div>
            <div class="col-sm-12">
               <label class="form-label">Description</label>
          
           <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="col-sm-12">
               <label class="form-label">Photo</label>
          
               <input type="file" class="form-control dropify" name="image">
            </div>
         </div>
      </div>
   </div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>

  </div>
</div>

@endsection
