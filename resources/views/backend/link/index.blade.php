@extends('layouts.header')

@section('content')

<div class="row align-items-center justify-content-between g-3 mb-4">
<div class="col-auto">
              <h2 class="mb-0">লিংক তালিকা</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                  <a href="{{route('link.create')}}" class="btn btn-primary">
                  <span class="fas fa-plus me-2"></span>লিংক যুক্ত করুন
                  </a>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">লিংক</a></li>
              <li class="breadcrumb-item active">লিংক তালিকা</li>
            </ol>
          </nav>
   </div>

          <div id="members" data-list='{"valueNames":["customer","email","mobile_number","city","last_active","joined"],"page":10,"pagination":true}'>
            <div class="row align-items-center justify-content-between g-3 mb-3">
          
         
            </div>
            <div class="">
              <div class="table-responsive ">
              <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">URL</th>
                            <th scope="col">Type</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($links as $key => $link)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
            
                            <td>{{$link->name}}</td>
                            <td>{{ Str::limit($link->link, 10) }}</td>
                            <td>
                            @if($link->type==1)
                            Footer One
                            @elseif($link->type==2)
                              Footer Two
                              @elseif($link->type==3)
                              Footer Three

                              @elseif($link->type==4)
                              Footer Four
@endif

                            </td>
                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('link.destroy',$link->id)}}" method="POST">
                               @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('link.show', $link->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i></a>
                                    <a href="{{route('link.edit', $link->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
                            </td>
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
                <div class="d-flex">
                {!! $links->links() !!}
            </div>
              </div>
        
            </div>
          </div>

@endsection
