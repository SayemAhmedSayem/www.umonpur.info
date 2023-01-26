@extends('layouts.header')

@section('content')



<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">এ্যালবাম তালিকা</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                  <a href="{{route('album.create')}}" class="btn btn-primary">
                  <span class="fas fa-plus me-2"></span>এ্যালবাম যুক্ত করুন
                  </a>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">এ্যালবাম</a></li>
              <li class="breadcrumb-item active">এ্যালবাম তালিকা</li>
            </ol>
          </nav>
          </div>
    
          <div class="code-to-copy">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">এ্যালবাম নাম</th>
                            <th scope="col" width="30%">Album Type</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($albums as $key => $album)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
            <td><img src="{{ asset('uploads/album/thumbnail/'.$album->thumbnail) }}" alt="" height="80" width="80"></td>
                            <td>{{$album->name}}</td>
                            <td>{{$album->type}}</td>
                          

                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('album.destroy',$album->id)}}" method="POST">
                               @csrf
                    @method('DELETE')
                                 
                                    <a href="{{route('album.show', $album->id)}}" class="btn btn-success btn-sm"> Manage</a>
                                    <a href="{{route('album.edit', $album->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                </form>
                               </div>
                            </td>
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
                      <div class="d-flex">
                {!! $albums->links() !!}
            </div>
                    </div>
        </div>
    
          </div>
     
  


@endsection
