@extends('layouts.header')

@section('content')


<div class="content">
<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">পোস্ট তালিকা</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                  <a href="{{route('posts.create')}}" class="btn btn-primary">
                  <span class="fas fa-plus me-2"></span>পোস্ট যুক্ত করুন
                  </a>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">পোস্ট</a></li>
              <li class="breadcrumb-item active">পোস্ট তালিকা</li>
            </ol>
          </nav>
          </div>
          <ul class="nav nav-links mb-2 mx-n2">
   <?php 
   $all = App\Models\Post::All()->count();
   
   ?>
              <li class="nav-item"><a class="nav-link " aria-current="page" href="{{route('posts.index')}}">All <span class="text-700 fw-semi-bold">({{$all}})</span></a></li>
              @foreach(App\Models\Category::All() as $role)
          <li class="nav-item"><a class="nav-link"  href="{{route('post-sort', $role->id)}}">{{$role->name ?? ''}} <span class="text-700 fw-semi-bold">
            
         <?php
         $count = App\Models\Post::where('cat_id', $role->id)->count();
         
         ?>
        ({{$count}})
        </span></a></li>
          @endforeach

            </ul>
          <div class="code-to-copy">
                      <table class="table table-striped" width="100%">
                        <thead>
                          <tr>
                            <th scope="col" width="5%">SL</th>
                            <th scope="col" width="5%">Images</th>
                            <th scope="col"width="10%">Date</th>
                            <th scope="col" width="10%">Author</th>
                            <th scope="col" width="20%">পোস্ট শিরোনাম</th>
                            <th scope="col"  width="15%">ক্যাটাগরি সমূহ</th>
                            <th scope="col" width="15%">বিস্তারিত</th>
                            <th scope="col" width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $key => $post)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td class="align-middle white-space-nowrap py-0"><img src="{{ asset('uploads/posts/'.$post->image) }}" alt="" width="53"></td>
                         
                            <td>{{$post->date}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->category->name ?? ''}}</td>
                           
                            <td>{{ Str::limit($post->description, 10) }}</td>
                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i></a>
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
                            </td>
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
                      <div class="d-flex">
                {!! $posts->links() !!}
            </div>
                    
                    </div>
        </div>
    
          </div>
     
        </div>


@endsection
