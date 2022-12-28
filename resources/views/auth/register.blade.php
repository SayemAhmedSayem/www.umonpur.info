@extends('layouts.login.header')
@section('content')
<main class="main" id="top">
   <div class="container-fluid px-0">
      <div class="container">
         <div class="row flex-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
               <a class="d-flex flex-center text-decoration-none mb-4" href="../../../index.php">
                  <div class="d-flex align-items-center"><img src="{{asset('frontend/logo/logo-1.png')}}" alt="phoenix" width="110"></div>
               </a>
               <div class="text-center mb-7 pb-5">
                  <h3>Membership Registration Form</h3>
                  <p class="text-700">Get access to your account</p>
               </div>
              
         
   
         </div>
         <div class="row">
        <div class="col-sm-6 pb-5">
            <h4 class="">
                Personal Information
            </h4>
            
        <form class="pt-5" method="post" action="{{ route('member-register') }}" enctype="multipart/form-data" autocomplete="off">
            @csrf
                        <div class="mb-3"><label class="form-label" for="basic-form-name">Name</label> <input autocomplete="false" class="form-control" id="basic-form-name" placeholder="Name" name="name" required></div>
                        <div class="mb-3"><label class="form-label" for="basic-form-name">Name Bangla</label> <input autocomplete="false" class="form-control" id="basic-form-name" placeholder="Name Bangla" name="name_bn" required></div>
                        <div class="mb-3"><label class="form-label" for="basic-form-nid">NID / Birth Certificate No.</label> <input autocomplete="false" class="form-control" id="basic-form-nid" type="number" placeholder="NID / Birth ID" name="nid" required></div>
                        <div class="mb-3"><label class="form-label" for="basic-form-gender">Gender</label> <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="gender" required>
                            <option selected="selected">Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                          </select></div>
                          <div class="mb-3"><label class="form-label" for="basic-form-dob">Date of Birth</label> <input autocomplete="false" class="form-control" id="basic-form-dob" type="date" name="dob" required></div>
                        <div class="mb-3"><label class="form-label" for="basic-form-father">Father's Name</label> <input autocomplete="false" class="form-control" id="basic-form-father" placeholder="Enter your father's name" name="father" required></div>
                        <div class="mb-3"><label class="form-label" for="basic-form-mother">Mother's Name</label> <input autocomplete="false" class="form-control" id="basic-form-mother" placeholder="Enter your mother's name" name="mother"required></div>
                
                        <div class="mb-3"><label class="form-label" for="basic-form-name">Phone No.</label> <input autocomplete="false" class="form-control" id="basic-form-name" name="phone" placeholder="Name" required></div>

                        <div class="mb-3"><label class="form-label" for="basic-form-address">Address</label> <textarea class="form-control" id="basic-form-address" rows="3" placeholder="Enter your address" name="address" required></textarea></div>

                        <div class="mb-3"><label class="form-label" for="basic-form-holding_no">Holding No.</label> <input autocomplete="false" class="form-control" id="basic-form-holding_no" type="text" placeholder="123123" name="holding_no" required></div>
                       
                        <div class="mb-3"><label class="form-label">Upload Your Photo</label> <input autocomplete="false" class="form-control" name="image" type="file" required></div>
                      
                  
                  
                  
                   
                    
   <!-- end input -->
        </div>
        <!-- End Coll -->
        <div class="col-sm-6">
        <h4 class="">
                Account Information
            </h4>
           
            <div class="pt-5">
                <div class="mb-3 text-start"><label class="form-label" for="email">Email address</label><input autocomplete="false" class="form-control" name="email" id="email" type="email" placeholder="Enter your email" required></div>
                <div class="row g-3 mb-3">
                  <div class="col-md-6"><label class="form-label" for="password">Password</label><input autocomplete="false" class="form-control form-icon-input" type="password" name="password" placeholder=" Enter your Password" required></div>
                  <div class="col-md-6"><label class="form-label" for="confirm_password">Confirm Password</label><input autocomplete="false" class="form-control form-icon-input" name="password_confirmation" type="password" placeholder="Confirm Password" required></div>
                </div>
                <div class="form-check mb-3"><input autocomplete="false" class="form-check-input" id="termsService" type="checkbox"><label class="form-label" for="termsService">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label></div><button type="submit" class="btn btn-primary w-100 mb-3">Complete Registration</button>
                <div class="text-center"><a class="fs--1 fw-bold" href="{{route('login')}}">Sign in to an existing account</a></div>
                </div>
             </form>
        </div>
        </div>
      </div>
   </div>
</main>
@endsection