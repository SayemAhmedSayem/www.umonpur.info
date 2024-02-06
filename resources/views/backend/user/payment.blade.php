@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0"> My  Payment History</h2>
      </div>
    
      
   </div>
   <div class="pt-5">
       
         <?php 
         $payments = App\Models\Income::where('user_id', $member->id)->latest()->paginate(10);
         ?>
          <div class="table-responsive scrollbar mx-n1 px-1">
              <table class="table table-striped">
                  <thead>
                    <tr>
                     <th>SL</th>
                     <th>Date</th>
                     <th>Transection ID</th>
                     <th>Transection By</th>
                     <th>
                      Amount
                     </th>
                     <th>Type</th>
                     <th>Status</th>
                     <th>Approved By</th>
                     <th>Action</th>
              
                    </tr>
                  </thead>
                  <tbody >
                    @foreach($payments as $key =>  $income)
                    <tr>
                     <td>{{$key +1}}</td>
                     <td>{{$income->date}}</td>
                     <td>{{$income->transection_no}}</td>
                     <td>{{$income->transection_phone}}</td>
                     <td>৳{{$income->amount}}</td>
                     <td>{{$income->income_type}}</td>
                     <td>
                      @if($income->status===0)
                      <div class="badge bg-danger">Pending</div>
                      @else
                      <div class="badge bg-success">Approved</div>
                      @endif
                      </td>
                      <td>
                        <?php
                        $user =   App\Models\User::find($income->approved_by) ;
                
                        ?>
                   {{  $user->name ?? '' }}
                       
                      </td>
                   
                <td>
                  <span>
                   <a href="{{route('my-payment-recipt',$income->id)}}" target="_blank" rel="noopener noreferrer"> <i style="font-size:20px; color:green;"class="far fa-file-pdf"></i></a>
                  </span>
                </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex">
                {!! $payments->links() !!}
            </div>
           
              </div>
        </div>
   
</div>
</div>
</div>     
@endsection