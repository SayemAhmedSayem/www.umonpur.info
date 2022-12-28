@extends('layouts.header')
@section('content')

   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">Chnage My Password</h2>
      </div>

   </div>
   <form action="{{route('my-profile-pass-store' , $member->id)}}" method="POST"  enctype="multipart/form-data">
      
      @csrf
      @method('PUT')
    <div class="mb-3">
      <div class="form-group">
         <div class="row">
         <div class="col-md-6">
         <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
        </div>
        </div>
        <div class="row">
        <div class="col-md-6 pt-3">
        <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
        </div>
        </div>
   
        
         </div>
         <div class="row">
         <div class="col-md-6 pt-5">
            <button type="submit" class="btn btn-primary w-100 mb-3">Change Password</button>
        </div>
         </div>
    
         </div>
      </div>
   </div>



    </form>
</div>
</div>

@endsection