@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">Add Version</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('version.index')}}">Version</a></li>
            <li class="breadcrumb-item active">Add Version</li>
         </ol>
      </nav>
   </div>
   <form action="{{route('version.store')}}" method="POST"  enctype="multipart/form-data">
      
      @csrf
      <div class="mb-3">
      <div class="form-group">
       <div class="row">
          <div class="col-sm-6">
             <label class="form-label" for="date">Version Year </label>
             <input class="form-control"  name="year" type="text">
          </div>
          <div class="col-sm-6">
             <label class="form-label" for="date">Version URL </label>
             <input class="form-control"  name="url" type="text">
          </div>
          <div class="col-sm-12">
             <label class="form-label" for="date">Version Title </label>
             <input class="form-control" type="text" name="version_title">
          </div>
          <div class="col-sm-12">
             <label class="form-label" for="date">Version Sub Title </label>
             <input class="form-control" type="text" name="version_subtitle">
          </div>
          <div class="col-sm-6">
             <label class="form-label" for="date">Description  Title Part One </label>
             <input class="form-control" type="text" name="description_title_p1">
          </div>
          <div class="col-sm-6">
             <label class="form-label" for="date">Description Title Part One </label>
             <input class="form-control" type="text" name="description_title_p2">
          </div>
       </div>
      </div>
      </div>
      <div class="mb-0">
      <label class="form-label" for="exampleTextarea">Description Dtails</label> 
      <textarea class="form-control" name="description_details" rows="3"> </textarea>
      </div>
      <div class="mb-3">
      <label class="form-label" for="customFile">Version Screenshot</label>
      
                                  <input type="file" class="form-control dropify" name="image">
                             
      </div>
      <div class="col-auto pt-3">
      <div class="d-flex align-items-right">
       <button type="submit" class="btn btn-primary">
       <span class="fas fa-plus me-2"></span>
       Add Version
       </button>
      </div>
      </div>
      </form>
</div>
</div>
</div>
@endsection