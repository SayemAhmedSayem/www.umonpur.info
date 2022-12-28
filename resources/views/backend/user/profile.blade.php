@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0"> {{$member->name}}</h2>
      </div>
    
      
   </div>
   <form action="{{route('my-profile-update' , $member->id)}}" method="POST"  enctype="multipart/form-data">
      
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
   <div class="col-sm-4">
   <div class="mb-3"><label class="form-label" for="basic-form-name">Name</label> <input class="form-control" id="basic-form-name" value="{{$member->name}}" name="name" required></div>
  
   </div>
   <div class="col-sm-4">
  
   <div class="mb-3"><label class="form-label" for="basic-form-name">Name Bangla</label> <input class="form-control"  value="{{$member->nid->name_bn}}" name="name_bn" required></div>
   </div>
   <div class="col-sm-4">
   <div class="mb-3"><label class="form-label" for="basic-form-nid">NID / Birth Certificate No.</label> <input class="form-control" id="basic-form-nid" type="number" value="{{$member->nid->nid}}" name="nid" required></div>
   </div>
   <div class="col-sm-4">
        
   <div class="mb-3"><label class="form-label" for="basic-form-gender">Gender</label> <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="gender" required>
                          
                          <option value="male" {{$member->nid->gender=='male' ? 'selected' : ''}}>Male</option>
                          <option value="female" {{$member->nid->gender=='female' ? 'selected' : ''}}>Female</option>
                          <option value="other">Other</option>
                        </select></div>
   </div>
   <div class="col-sm-4">
   <div class="mb-3"><label class="form-label" for="basic-form-dob">Date of Birth</label> <input class="form-control" id="basic-form-dob" type="date" value="{{$member->nid->dob}}" name="dob" required></div>
  </div>
  <div class="col-sm-4">
  <div class="mb-3"><label class="form-label" for="basic-form-father">Father's Name</label> <input class="form-control" id="basic-form-father" value="{{$member->nid->father}}" name="father" required></div>
  </div>
  <div class="col-sm-4">
  <div class="mb-3"><label class="form-label" for="basic-form-mother">Mother's Name</label> <input class="form-control" id="basic-form-mother" value="{{$member->nid->mother}}" name="mother"required></div>
                
  </div>
  <div class="col-sm-4">
  <div class="mb-3"><label class="form-label" for="basic-form-name">Phone No.</label> <input class="form-control" id="basic-form-name" name="phone" value="{{$member->nid->phone ?? ''}}" required></div>
  </div>
  <div class="col-sm-4">
  <div class="mb-3"><label class="form-label" for="basic-form-address">Address</label> <textarea class="form-control" id="basic-form-address" rows="3" value="" name="address" required>{{$member->nid->address}}</textarea></div>
  </div>
  <div class="col-sm-4">
  <div class="mb-3"><label class="form-label" for="basic-form-holding_no">Holding No.</label> <input class="form-control" id="basic-form-holding_no" type="text" value="{{$member->nid->holding_no}}" name="holding_no" required></div>
  </div>


  <div class="col-sm-4">
  <div class="mb-3 text-start"><label class="form-label" for="email">Email address</label><input class="form-control" name="email" id="email" type="email" value="{{$member->email}}" required></div>
  </div>
                             
                    
   <!-- end input -->
        </div>
        <!-- End Coll -->
        <div class="col-sm-6 pt-1">
    <div class="pt-5" style="margin-top:48px;"> <button type="submit" class="btn btn-primary w-100 mb-3">Update Profile</button></div>
       
       
            
        </div>
        </div>
</form>
</div>     
@endsection