@extends('layouts.header')

@section('content')


<div class="content">
<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">About List</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                  <a href="{{route('about.create')}}" class="btn btn-primary">
                  <span class="fas fa-plus me-2"></span>Add About
                  </a>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">About</a></li>
              <li class="breadcrumb-item active">About List</li>
            </ol>
          </nav>
          </div>
 
          <div class="code-to-copy">
                      <table class="table table-striped" width="100%">
                        <thead>
                          <tr>
                            <th scope="col" width="5%">SL</th>
                            <th scope="col" width="5%">Date</th>
                            <th scope="col" width="5%">Images</th>
                            <th scope="col" width="5%">Author</th>
                            <th scope="col" width="20%">Title</th>
                            <th scope="col" width="15%">Descriptions</th>
                            <th scope="col" width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($abouts as $key => $about)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td class="align-middle white-space-nowrap py-0"><img src="{{ asset('uploads/about/'.$about->image) }}" alt="" width="53"></td>
                         
                            <td>{{$about->date}}</td>
                            <td>{{$about->user->name}}</td>
                            <td>{{$about->title}}</td>
                           
                            <td>{{ Str::limit($about->description, 10) }}</td>
                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('about.destroy',$about->id)}}" method="POST">
                                @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('about.show', $about->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i></a>
                                    <a href="{{route('about.edit', $about->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
                            </td>
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
                      <div class="d-flex">
                {!! $abouts->links() !!}
            </div>
                    </div>
        </div>
    
          </div>
     
        </div>


@endsection
