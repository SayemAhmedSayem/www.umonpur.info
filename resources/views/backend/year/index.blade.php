@extends('layouts.header')

@section('content')



<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">Year List</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">

                  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Year
</button>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{route('album.index')}}">Albums</a></li>
              <li class="breadcrumb-item active">{{$album->name}}</li>
              <li class="breadcrumb-item active">Years List</li>
            </ol>
          </nav>
          </div>
    
          <div class="code-to-copy">
                      <table class="table table-striped" width="100%">
                        <thead>
                          <tr>
                            <th scope="col" width="10%">SL</th>
                            <th scope="col" width="70%">Year Name</th>
                            <th scope="col" width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($years as $key => $year)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td>
                              <a href="{{route('year.show', $year->id)}}" class="btn btn-link"> {{$year->year}}</a>
                            </td>
                          

                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('year.destroy',$year->id)}}" method="POST">
                               @csrf
                    @method('DELETE')
                                 
                                    <a href="{{route('year.show', $year->id)}}" class="btn btn-success btn-sm"> Manage</a>
                                    <a href="{{route('year.edit', $year->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                </form>
                               </div>
                            </td>
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
                      <div class="d-flex">
                {!! $years->links() !!}
            </div>
                    </div>
        </div>
    
          </div>
     
  


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Year</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('year.store')}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">Year Name</label>
               <input class="form-control" type="text" name="year" required>
               <input type="hidden" value="{{$album->id}}" name="album_id">
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
