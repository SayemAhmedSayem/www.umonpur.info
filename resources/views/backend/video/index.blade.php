@extends('layouts.header')

@section('content')



<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">Videos</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">

                  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Videos
</button>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{route('album.index')}}">Albums</a></li>
              <li class="breadcrumb-item"><a href="{{route('album.show', $album->id)}}">{{$album->name}}</a></li>
              <li class="breadcrumb-item active">Videos</li>
            </ol>
          </nav>
          </div>
    
          <div class="row">
         
@forelse($videos as $video)
            <div class="col-md-6 col-lg-4">
                <div class="card my-3">

                    <img src="{{ asset('uploads/album/videos/'.$video->image) }}" class="card-image-top" alt="thumbnail">

                    <div class="card-body">
                        <h3 class="card-title"><a href="#" class="text-secondary">{{$video->title}}</a></h3>
                        <p class="card-text">{{$video->description}}</p>
                        <div class="button-group" style="display:flex !important;">
                               <form action="{{route('video.destroy',$video->id)}}" method="POST">
                                @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('video.edit', $video->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="card-body">
              <div class="text-center pt-5">
                <h4>You Don't have any video</h4>
              </div>
            </div>
@endforelse
{!! $videos->links() !!}
 
        </div>
        </div>
    
          </div>
     
  


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Video</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('video.store')}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">title</label>
               <input class="form-control" type="text" name="title" required>
               <input type="hidden" value="{{$album->id}}" name="album_id">
            </div>
       
            <div class="col-sm-12">
               <label class="form-label">Video URL</label>
          
               <input class="form-control" type="text" name="url" required>
            </div>
            <div class="col-sm-12">
               <label class="form-label">Description</label>
          
           <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="col-sm-12">
               <label class="form-label">Thumbnail</label>
          
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
