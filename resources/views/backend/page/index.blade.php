@extends('layouts.header')

@section('content')


<div class="content">
<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">Pages</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                  <a href="{{route('pages.create')}}" class="btn btn-primary">
                  <span class="fas fa-plus me-2"></span>Add Page
                  </a>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">Pages</a></li>
              <li class="breadcrumb-item active">Pages List</li>
            </ol>
          </nav>
          </div>
    
          <div class="code-to-copy">
                      <table class="table table-striped" width="100%">
                        <thead>
                          <tr>
                            <th scope="col" width="5%">SL</th>
                            <th scope="col" width="20%">Title</th>
                            <th scope="col" width="15%">Layout</th>
                            <th scope="col" width="15%">Author</th>
                            <th scope="col" width="15%">Date</th>
                            <th scope="col" width="25%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $key => $page)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td>{{$page->title}}</td>
                            <td>{{$page->layout_type}}</td>
                            <td>{{$page->user->name}}</td>
                            <td>{{$page->created_at}}</td>
                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('page.layout')}}" method="POST">
                                @csrf
                                <input type="hidden" name="page_id" value="{{$page->id}}">
                                <input type="hidden" name="layout" value="{{$page->layout_type}}">
                                    <button  type="submit" class="btn btn-success btn-sm"><i class="fa fa-cog"></i> Configure </button>
                                    <a href="{{route('pages.edit', $page->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                    <a href="{{route('pages.show', $page->id)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
                                   
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


@endsection
