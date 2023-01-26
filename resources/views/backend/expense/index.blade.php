@extends('layouts.header')

@section('content')

<div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0"> ব্যয় তালিকা</h2>
      </div>
      <div class="col-auto">
              <div class="d-flex align-items-center">

                  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  ব্যয় যুক্ত করুন
</button>
              </div>
            </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">ব্যয় সমূহ</a></li>
            <li class="breadcrumb-item active">ব্যয় তালিকা</li>
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
                     <th>SL</th>
                     <th>Date</th>

                     <th>
                      Amount
                     </th>
                     <th>
                      Description
                     </th>
                     <th>Created By</th>
                     <th>
                      Action
                     </th>
                    </tr>
                  </thead>
                  <tbody >
                    @foreach($expenses as $key =>  $expense)
                    <tr>
                     <td>{{$key +1}}</td>
                     <td>{{$expense->date}}</td>
    
                     <td>৳{{$expense->amount}}</td>
                     <td>{{$expense->description}}</td>
                     <td>{{$expense->user->name}}</td>


                     <td>
                               <div class="button-group" style="display:flex !important;">
                               <form action="{{route('expense.destroy',$expense->id)}}" method="POST">
                               @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    <a href="{{route('expense.edit', $expense->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
                            </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex">
                {!! $expenses->links() !!}
            </div>
              </div>
        
            </div>
          </div>

          <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ব্যয় যুক্ত করুন</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('expense.store')}}" method="POST"  enctype="multipart/form-data">
      
        @csrf
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">তারিখ</label>
               <input class="form-control" type="date" name="date" required>
             
            </div>
            <div class="col-sm-12">
               <label class="form-label">টাকার পরিমাণ</label>
               <input class="form-control" type="number" name="amount" required>
             
            </div>

            <div class="col-sm-12">
               <label class="form-label">বিস্তারিত বর্ণনা</label>
               <textarea   class="form-control" id="" cols="30"   name="description"  rows="10"></textarea>       
            </div>

     
         </div>
      </div>
   </div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বন্ধ করুন</button>
        <button type="submit" class="btn btn-primary"> যুক্ত করুন</button>
      </div>
    </div>
    </form>

  </div>
</div>

@endsection
