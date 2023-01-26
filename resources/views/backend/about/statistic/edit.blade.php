@extends('layouts.header')

@section('content')


<div class="content">
<div class="row align-items-center justify-content-between g-3 mb-4">
<!-- <ul class="nav nav-links mb-2 mx-n2">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#">সম্পর্কে <span class="text-700 fw-semi-bold">(5)</span></a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('statistic.index')}}">পরিসংখ্যান <span class="text-700 fw-semi-bold">(6)</span></a></li>
              <li class="nav-item"><a class="nav-link" href="#">পরিসংখ্যান সমূহ <span class="text-700 fw-semi-bold">(17)</span></a></li>
            </ul> -->
            <div class="col-auto">
              <h2 class="mb-0">পরিসংখ্যান তালিকা</h2>
            </div>

            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">পরিসংখ্যান</a></li>
              <li class="breadcrumb-item active">পরিসংখ্যান তালিকা</li>
            </ol>
          </nav>
          </div>

          <div class="code-to-copy">
          <form action="{{route('statistic.update', $statistic->id)}}" method="POST"  enctype="multipart/form-data">
          @csrf
        @method('PUT')
        <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">নাম</label>
               <input class="form-control" type="text" value="{{$statistic->name}}" name="name" required>
           
            </div>
            <div class="col-sm-12">
               <label class="form-label">সংখ্যা মান</label>
               <input class="form-control" type="text" value="{{$statistic->value}}" name="value" required>
           
            </div>
         
            <div class="col-sm-12">
               <label class="form-label">আইকন যুক্ত করুন</label>
                <i class="C"></i>
               <input type="text" class="form-control" value="{{$statistic->image}}" name="image">
            </div>
         </div>
      </div>
   </div>




      </div>
        <button type="submit" class="btn btn-primary">আপডেট করুন</button>

    </div>
    </form>
                    
                    </div>
        </div>
    
          </div>
     
        </div>

@endsection
