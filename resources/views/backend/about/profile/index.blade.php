@extends('layouts.header')

@section('content')


<div class="content">
<div class="row align-items-center justify-content-between g-3 mb-4">

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
                      <table class="table table-striped" width="100%">
                        <thead>
                          <tr>
                            <th scope="col" width="5%">SL</th>
                            <th scope="col" width="15%">Images</th>
                            <th scope="col" width="25%">Name</th>
                            <th scope="col" width="30%">Descriptions</th>
                            <th scope="col" width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($profiles as $key => $profile)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td class="align-middle white-space-nowrap py-0"><img src="{{ asset('uploads/profile/'.$profile->image) }}" alt="" width="53"></td>
                         
                            <td>{{$profile->name}}</td>
                            <td>{{$profile->description}}</td>
                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('profile.destroy',$profile->id)}}" method="POST">
                                @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('profile.show', $profile->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i></a>
                                    <a href="{{route('profile.edit', $profile->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
                            </td>
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
                    
                    </div>
        </div>
    
          </div>
     
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('profile.store')}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
        <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">Name</label>
               <input class="form-control" type="text" name="name" required>
           
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
