@extends('layouts.header')

@section('content')

<div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">আয়ের তালিকা</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">আয়</a></li>
            <li class="breadcrumb-item active"> আয়ের তালিকা</li>
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
                     <th>Payer Name</th>
                     <th>Transection No</th>
                     <th>Transection phone</th>
                     <th>Payment Mode</th>
                     <th>
                      Amount
                     </th>
                     <th>Type</th>
                     <th>Status</th>
                     <th>Approved By</th>
                     <th>
                      Action
                     </th>
                    </tr>
                  </thead>
                  <tbody >
                    @foreach($incomes as $key =>  $income)
                    <tr>
                     <td>{{$key +1}}</td>
                     <td>{{$income->date}}</td>
                     <td>{{$income->user->name}}</td>
                     <td>{{$income->transection_no}}</td>
                     <td>{{$income->transection_phone}}</td>
                     <td>
                      @if($income->payment_type==1)
                      বিকাশ
                      @elseif($income->payment_type==2)
                      নগদ
                      @elseif($income->payment_type==3)
                      রকেট
                      @elseif($income->payment_type==4)
                      অন্যান্য
                      @endif</td>
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
                      @if($income->status===0)
                      <a href="{{route('income-approve', $income->id)}}" class="btn btn-info btn-sm">Approve Now</a>
                      @else
                      <a href="#" class="btn btn-secondary disabled">Approved</a>
                      @endif
                     </td>
                    @if(Auth::user()->user_type=='user')
                    <td>
                  <span>
                   <a href="{{route('my-payment-recipt',$income->id)}}" target="_blank" rel="noopener noreferrer"> <i style="font-size:20px; color:green;"class="far fa-file-pdf"></i></a>
                  </span>
                </td>
                @endif
        
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex">
                {!! $incomes->links() !!}
            </div>
              </div>
        
            </div>
          </div>

@endsection
