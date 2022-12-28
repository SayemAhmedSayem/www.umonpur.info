@extends('layouts.header')

@section('content')

<div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">Expense Edit</h2>
      </div>

      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Expenses</a></li>
            <li class="breadcrumb-item active">Expense Edit</li>
         </ol>
      </nav>
   </div>

          <div id="members" data-list='{"valueNames":["customer","email","mobile_number","city","last_active","joined"],"page":10,"pagination":true}'>
            <div class="row align-items-center justify-content-between g-3 mb-3">
          
         
            </div>
         


            <form action="{{route('expense.update', $expense->id)}}" method="POST"  enctype="multipart/form-data">
      
      @csrf
           @method('PUT')
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
            <div class="col-sm-12">
               <label class="form-label">Date</label>
               <input class="form-control" type="date" value="{{$expense->date}}" name="date" required>
             
            </div>
            <div class="col-sm-12">
               <label class="form-label">Amount</label>
               <input class="form-control" type="number" value="{{$expense->amount}}" name="amount" required>
             
            </div>
            <div class="col-sm-12">
               <label class="form-label">Amount</label>
               <textarea  class="form-control" id="" cols="30"   name="description"  rows="10"> {{$expense->description}} </textarea>       
            </div>

     
         </div>
      </div>
   </div>





      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-primary">Update Expense</button>
      </div>
    </div>
    </form>


@endsection
