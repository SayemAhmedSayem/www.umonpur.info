@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0"> {{$version->version_title}}</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('version.index')}}">ভার্সন সমূহ</a></li>
            <li class="breadcrumb-item active"> {{$version->version_title}}</li>
         </ol>
      </nav>
   </div>
   <form action="{{route('version.update' , $version->id)}}" method="POST"  enctype="multipart/form-data">
      
      @csrf
      @method('PUT')
  <div class="mb-3">
    <div class="form-group">
       <div class="row">
          <div class="col-sm-6">
             <label class="form-label" for="date">ভার্সনের বছর </label>
             <input class="form-control"  name="year" value="{{$version->year}}" type="text">
          </div>
          <div class="col-sm-6">
             <label class="form-label" for="date">Version URL </label>
             <input class="form-control"  name="url" value="{{$version->url}}" type="text">
          </div>

          <div class="col-sm-12">
             <label class="form-label" for="date">ভার্সন শিরোনাম </label>
             <input class="form-control" type="text" value="{{$version->version_title}}" name="version_title">
          </div>
          <div class="col-sm-12">
             <label class="form-label" for="date">ভার্সন শিরোনাম ২ </label>
             <input class="form-control" type="text" value="{{$version->version_subtitle}}" name="version_subtitle">
          </div>
          <div class="col-sm-6">
             <label class="form-label" for="date">ভার্সন শিরোনাম ৩ </label>
             <input class="form-control" type="text" value="{{$version->description_title_p1}}" name="description_title_p1">
          </div>
          <div class="col-sm-6">
             <label class="form-label" for="date">ভার্সন শিরোনাম ৪ </label>
             <input class="form-control" type="text" value="{{$version->description_title_p2}}" name="description_title_p2">
          </div>
       </div>
    </div>
 </div>
 <div class="mb-0">
    <label class="form-label" for="exampleTextarea">বিস্তারিত বর্ণনা</label> 
    <textarea class="form-control" name="description_details" rows="3">{{$version->description_details}} </textarea>
 </div>
 <div class="mb-3">
    <label class="form-label" for="customFile"> ভার্সন স্ক্রিনশর্ট</label>
 
                                  <input type="file" class="form-control dropify" name="image">
                             
 </div>

 <div class="button-group" style="display:flex !important;">
                              
                                    <button type="submit" class="btn btn-primary btn-sm m-3">
       <span class="fas fa-plus me-2"></span>
       আপডেট ভার্সন করুন
       </button>
       </form>
        
                                <form action="{{route('version.destroy',$version->id)}}" method="POST">
                                @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm m-3"><i class="fa fa-trash"></i> Delete </button>
                                   
                                </form>
                               </div>

</div>
</div>
</div>
@endsection