@extends('layouts.header')

@section('content')

<div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">Donate Request List</h2>
      </div>
      <div class="col-auto">
              <div class="d-flex align-items-center">
                  <a href="{{route('donate.create')}}" class="btn btn-primary">
                  <span class="fas fa-plus me-2"></span>Add Donate Request
                  </a>
              </div>
            </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Donate</a></li>
            <li class="breadcrumb-item active">Donate Request List</li>
         </ol>
      </nav>
   </div>

          <div id="members" data-list='{"valueNames":["customer","email","mobile_number","city","last_active","joined"],"page":10,"pagination":true}'>
            <div class="row align-items-center justify-content-between g-3 mb-3">
          
         
            </div>
            <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 bg-white border-y border-300 mt-2 position-relative top-1">
              <div class="table-responsive scrollbar mx-n1 px-1">
              <table class="table table-striped">
                  <thead>
                    <tr>
                     <th>SL</th>
                     <th>Image</th>
                     <th>Title</th>
                     <th>Goal</th>
                     <th>Description</th>
                     <th>
                      Action
                     </th>
                    </tr>
                  </thead>
                  <tbody >
                    @foreach($donates as $key =>  $donate)
                    <tr>
                     <td>{{$key +1}}</td>
                     <td class="align-middle white-space-nowrap py-0"><img src="{{ asset('uploads/donate/'.$donate->image) }}" alt="" width="53"></td>
                     <td>{{$donate->name}}</td>
                     <td>৳{{$donate->goal}}</td>
                     <td>{{ Str::limit($donate->description, 30) }}</td>

        
                
                     <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('donate.destroy',$donate->id)}}" method="POST">
                               @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('donate.edit', $donate->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
                            </td>
                          </tr>
                          @endforeach
                  </tbody>
                </table>
                <div class="d-flex">
                {!! $donates->links() !!}
            </div>
              </div>
        
            </div>
          </div>

@endsection
