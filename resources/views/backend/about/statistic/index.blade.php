@extends('layouts.header')

@section('content')


<div class="content">
<div class="row align-items-center justify-content-between g-3 mb-4">

            <div class="col-auto">
              <h2 class="mb-0">পরিসংখ্যান তালিকা</h2>
            </div>
            <div class="col-auto">
              <div class="d-flex align-items-center">
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  পরিসংখ্যান যুক্ত করুন
</button>
              </div>
            </div>
            <nav class="mb-2" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#!">পরিসংখ্যান</a></li>
              <li class="breadcrumb-item active">পরিসংখ্যান তালিকা</li>
            </ol>
          </nav>
          </div>

          <div class="code-to-copy">
                      <table class="table table-striped" width="100%">
                        <thead>
                          <tr>
                            <th scope="col" width="5%">SL</th>
                            <th scope="col" width="15%">Icon</th>
                            <th scope="col" width="25%">নাম</th>
                            <th scope="col" width="30%">সংখ্যা মান</th>
                            <th scope="col" width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($statistics as $key => $statistic)
                          <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td ><i class="{{$statistic->image}}"></i></td>
                         
                            <td>{{$statistic->name}}</td>
                            <div class="statis-icon"><i class="{{$statistic->value}}"></i></div>
                            <td></td>
                            <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('statistic.destroy',$statistic->id)}}" method="POST">
                                @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('statistic.show', $statistic->id)}}" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i></a>
                                    <a href="{{route('statistic.edit', $statistic->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
                            </td>
                          </tr>
                          @endforeach
                   
                        </tbody>
                      </table>
                      <div class="d-flex">
                {!! $statistics->links() !!}
            </div>
                    
                    </div>
        </div>
    
          </div>
     
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">পরিসংখ্যান যুক্ত করুন</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('statistic.store')}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
        <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">নাম</label>
               <input class="form-control" type="text" name="name" required>
           
            </div>
            <div class="col-sm-12">
               <label class="form-label">সংখ্যা মান</label>
               <input class="form-control" type="text" name="value" required>
           
            </div>
         
            <div class="col-sm-12">
               <label class="form-label">আইকন যুক্ত করুন</label>
          
               <input type="text" class="form-control" name="image">
            </div>
         </div>
      </div>
   </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>

  </div>
</div>
@endsection
