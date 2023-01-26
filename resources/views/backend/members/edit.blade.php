@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">Manage {{$member->name}}</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Member</a></li>
            <li class="breadcrumb-item active">{{$member->name}}</li>
      
         </ol>
   
      </nav>
      
   </div>
   <form action="{{route('members.update' , $member->id)}}" method="POST"  enctype="multipart/form-data">
      
      @csrf
      @method('PUT')
   <div class="row">
   <div class="col-sm-2">
  <div class="mb-3">
    <img  style="border-radius:50%" src="{{ asset('uploads/members/'.$member->nid->image) }}" alt="" height="80px" width="80px"></div>
  </div>

  <div class="col-sm-4">
  <div class="mb-3"><label class="form-label">Change Your Photo</label> <input class="form-control" name="image" type="file"></div>
  </div>
@if($member->user_type=='staff')
<div class="col-sm-4">
  <div class="mb-3">
  <label class="form-label">Member Role</label>
  <select class="form-control select2" id="role_id" name="role_id" required>
                                          <option value="">{{ _lang('Select One') }}</option>
                                          {{ create_option("roles", "id", "name", $member->role_id) }}
                                       </select>
   </div>
  </div>
@endif
@if($member->user_type=='staff')
<div class="col-sm-4">
  <div class="mb-3">
  <label class="form-label">Status</label>
  <select class="form-control select2" id="role_id" name="status" required>
                                          <option value="">{{ _lang('Select Status') }}</option>
                                          <option value="1" {{$member->status==1 ? 'selected' : '' }}>Active</option>
                                          <option value="0" {{$member->status==0 ? 'selected' : ''}}>InActive</option>
                                        
                                       </select>
   </div>
  </div>
@endif
   <div class="col-sm-4">
   <div class="mb-3"><label class="form-label" for="basic-form-name">সিরিয়াল নং</label> <input class="form-control" id="basic-form-name" value="{{$member->nid->serial ?? ''}}" name="serial" required></div>
   </div>
   <div class="col-sm-4">
   <div class="mb-3"><label class="form-label" for="basic-form-name">নাম (ইংরেজী)</label> <input class="form-control" id="basic-form-name" value="{{$member->name}}" name="name" required></div>
   </div>
   <div class="col-sm-4">
   <div class="mb-3"><label class="form-label" for="basic-form-name">নাম (বাংলা)</label> <input class="form-control" id="basic-form-name" value="{{$member->nid->name_bn ?? ''}}" name="name_bn" required></div>
   </div>
   <div class="col-sm-4">
   <div class="mb-3"><label class="form-label" for="basic-form-nid">এনআইডি/ জন্মনিব্ধন নাম্বার</label> <input class="form-control" id="basic-form-nid" type="number" value="{{$member->nid->nid}}" name="nid" required></div>
   </div>
   <div class="col-sm-4">
        
   <div class="mb-3"><label class="form-label" for="basic-form-gender">লিঙ্গ</label> <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="gender" required>
                          
                          <option value="male" {{$member->nid->gender=='male' ? 'selected' : ''}}> পুরুষ</option>
                          <option value="female" {{$member->nid->gender=='female' ? 'selected' : ''}}> নারী</option>
                          <option value="other"> অন্যান্য</option>
                        </select></div>
   </div>
   <div class="col-sm-4">
   <div class="mb-3"><label class="form-label" for="basic-form-dob">জন্ম তারিখ</label> <input class="form-control" id="basic-form-dob" type="date" value="{{$member->nid->dob}}" name="dob" required></div>
  </div>
  <div class="col-sm-4">
  <div class="mb-3"><label class="form-label" for="basic-form-father">পিতার নাম</label> <input class="form-control" id="basic-form-father" value="{{$member->nid->father}}" name="father" required></div>
  </div>
  <div class="col-sm-4">
  <div class="mb-3"><label class="form-label" for="basic-form-mother">মাতার নাম</label> <input class="form-control" id="basic-form-mother" value="{{$member->nid->mother}}" name="mother"required></div>
                
  </div>
  <div class="col-sm-4">
  <div class="mb-3"><label class="form-label" for="basic-form-name">ফোন নাম্বার</label> <input class="form-control" id="basic-form-name" name="phone" value="{{$member->nid->phone ?? ''}}" required></div>
  </div>
  <div class="col-sm-4">
  <div class="mb-3"><label class="form-label" for="basic-form-address">ঠিকানা</label> <textarea class="form-control" id="basic-form-address" rows="3" value="" name="address" required>{{$member->nid->address}}</textarea></div>
  </div>
  <div class="col-sm-4">
  <div class="mb-3"><label class="form-label" for="basic-form-holding_no">হোল্ডিং নং</label> <input class="form-control" id="basic-form-holding_no" type="text" value="{{$member->nid->holding_no}}" name="holding_no" required></div>
  </div>


  <div class="col-sm-4">
  <div class="mb-3 text-start"><label class="form-label" for="email"> ইমেইল ঠিকানা</label><input class="form-control" name="email" id="email" type="email" value="{{$member->email}}" required></div>
  </div>
  <div class="col-sm-4">
  <div class="mb-3 text-start"><label class="form-label" for="email">পেশা</label><input class="form-control" name="designation"  type="text" value="{{$member->designation ?? ''}}"></div>
  </div>



  

        <!-- End Coll -->
        <div class="col-sm-4 pt-5">
    <div class=""> <button type="submit" class="btn btn-primary w-100 mb-3">আপডেট করুন</button></div>
       
       
            
        </div>
        </div>
</form>

<form action="{{route('update-password')}}" method="POST">
   @csrf

   <input type="hidden" name="user_id" value="{{$member->id}}">
<div class="col-sm-6">

            
<div class="pt-5">
       
       <h4 class="text-center pt-5">
      Change Password
   </h4>
       <div class="row g-3 mb-3">
         <div class="col-md-4">

             <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
         
         
         </div>
         <div class="col-md-4">
         <label for="confirmNewPasswordInput" class="form-label">Confirm Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
         
         </div>
         <div class="col-md-4">
        <div class="mt-5">
        <button type="submit" class="btn btn-primary btn-sm">Change Password</button>
        </div>
      </div>
       </div>

     
       </div>
                     
            
<!-- end input -->
</div>
</form>


        <div class="pt-5">
         <h1>
            Payment History
         </h1>
         <?php 
         $payments = App\Models\Income::where('user_id', $member->id)->get();
         ?>
          <div class="table-responsive scrollbar mx-n1 px-1">
              <table class="table table-striped">
                  <thead>
                    <tr>
                     <th>SL</th>
                     <th>Date</th>
                     <th>Payer Name</th>
                     <th>Transection No</th>
                     <th>Transection phone</th>
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
                    @foreach($payments as $key =>  $income)
                    <tr>
                     <td>{{$key +1}}</td>
                     <td>{{$income->date}}</td>
                     <td>{{$income->user->name}}</td>
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
                   {{  $user->name ?? '' ;}}
                       
                      </td>
                     <td>
                      @if($income->status===0)
                      <a href="{{route('income-approve', $income->id)}}" class="btn btn-info btn-sm">Approve Now</a>
                      @else
                      <a href="#" class="btn btn-secondary disabled">Approved</a>
                      @endif
                     </td>
                
                    </tr>
                    @endforeach
                  </tbody>
                </table>
           
              </div>
        </div>
        <div class="col-sm-6">
          
        <div class="button-group" style="display:flex !important;">
                               <form action="{{route('members.destroy',$member->id)}}" method="POST">
                                @csrf
                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </button>
                                    <a href="{{route('members.show', $member->id)}}" class="btn btn-success btn-sm"> Approved<i class="fa fa-eye"></i></a>
                                    <a href="{{route('members.edit', $member->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pen"></i></a>
                                </form>
                               </div>
        </div>
</div>
</div>
</div>
@endsection