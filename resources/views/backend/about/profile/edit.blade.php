@extends('layouts.header')

@section('content')


<div class="content">
<div class="row align-items-center justify-content-between g-3 mb-4">
<ul class="nav nav-links mb-2 mx-n2">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#">About <span class="text-700 fw-semi-bold">(5)</span></a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('profile.index')}}">Profile <span class="text-700 fw-semi-bold">(6)</span></a></li>
              <li class="nav-item"><a class="nav-link" href="#">Statistics <span class="text-700 fw-semi-bold">(17)</span></a></li>
            </ul>
            <div class="col-auto">
              <h2 class="mb-0">Profile List</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Profile
</button>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">Profile</a></li>
              <li class="breadcrumb-item active">Profile List</li>
            </ol>
          </nav>
          </div>

          <div class="code-to-copy">
          <form action="{{route('profile.update', $profile->id)}}" method="POST"  enctype="multipart/form-data">
      
   @csrf
        @method('PUT')
      <div class="mb-3">
    <div class="form-group">
       <div class="row">
          <div class="col-sm-12">
             <label class="form-label">Name</label>
             <input class="form-control" type="text" value="{{$profile->name}}" name="name" required>
         
          </div>
          <div class="col-sm-12">
             <label class="form-label">Description</label>
        
         <textarea name="description" id="" class="form-control" cols="30" rows="10">{{$profile->description}}</textarea>
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
    
          </div>
     
        </div>


@endsection
