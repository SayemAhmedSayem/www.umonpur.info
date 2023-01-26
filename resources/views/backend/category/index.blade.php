@extends('layouts.header')

@section('content')

<div class="row align-items-center justify-content-between g-3 mb-4">
<div class="col-auto">
              <h2 class="mb-0">ক্যাটাগরি তালিকা</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                  <a href="{{route('category.create')}}" class="btn btn-primary">
                  <span class="fas fa-plus me-2"></span>ক্যাটাগরি যুক্ত করুন
                  </a>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">ক্যাটাগরি সমূহ</a></li>
              <li class="breadcrumb-item active">ক্যাটাগরি তালিকা</li>
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
                            <th scope="col">SL</th>
                            <th scope="col">ক্যাটাগরি নাম</th>
                            <th scope="col" width="30%">ক্যাটাগরি বর্ণনা</th>
                            <th scope="col">Total Post</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($cats as $key => $cat)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
            
                            <td>{{$cat->name}}</td>
                            <td>{{ Str::limit($cat->descriptions, 10) }}</td>
                            <td> {{App\Models\Post::where('cat_id', $cat->id)->count()}}</td>

                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('category.destroy',$cat->id)}}" method="POST">
                               @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('category.show', $cat->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i></a>
                                    <a href="{{route('category.edit', $cat->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
                            </td>
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
                <div class="d-flex">
                {!! $cats->links() !!}
            </div>
              </div>
        
            </div>
          </div>

@endsection
