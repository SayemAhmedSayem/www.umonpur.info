@extends('layouts.login.header')
@section('content')
<main class="main" id="top">
   <div class="container-fluid px-0">
      <div class="container">
         <div class="row flex-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
               <a class="d-flex flex-center text-decoration-none mb-4" href="../../../index.php">
                  <div class="d-flex align-items-center"><img src="{{asset('frontend/logo/logo.png')}}" alt="Logo" width="110"></div>
               </a>
               <div class="text-center mb-7 pb-5">
                  <h3>Membership Registration Form</h3>
                  <p class="text-700">Get access to your account</p>
               </div>
         </div>
         <div class="row">
        <div class="col-sm-6 pb-5">
            <h4 class="">
                ব্যাক্তিগত তথ্য
            </h4>
            
        <form class="pt-5" method="post" action="{{ route('member-register') }}" enctype="multipart/form-data" autocomplete="off">
            @csrf
                        <div class="mb-3"><label class="form-label" for="basic-form-name">নাম (ইংরেজী) * </label> <input autocomplete="false" class="form-control" id="basic-form-name" placeholder="Enter your name" name="name" required></div>
                        <div class="mb-3"><label class="form-label" for="basic-form-name">নাম (বাংলা) *</label> <input autocomplete="false" class="form-control" id="basic-form-name" placeholder="আপনার বাংলা নাম" name="name_bn" required></div>
                        <div class="mb-3"><label class="form-label" for="basic-form-nid"> এনআইডি / জন্মনিবন্ধন নং (ইংরেজী) *</label> <input autocomplete="false" class="form-control" id="basic-form-nid" type="number" placeholder="Enter your NID/ Birth ID" name="nid" required></div>
                        <div class="mb-3"><label class="form-label" for="basic-form-gender">লিঙ্গ *</label> <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="gender" required>
                            <option selected="selected">লিঙ্গ নির্বাচন করুন</option>
                            <option value="male">পুরুষ</option>
                            <option value="female">নারী</option>
                            <option value="other">অন্যান্য</option>
                          </select></div>
                          <div class="mb-3"><label class="form-label" for="basic-form-dob">জন্ম তারিখ*</label> <input autocomplete="false" class="form-control" id="basic-form-dob" type="date" name="dob" required></div>
                        <div class="mb-3"><label class="form-label" for="basic-form-father">পিতার নাম (বাংলা) *</label> <input autocomplete="false" class="form-control" id="basic-form-father" placeholder="আপনার পিতার নাম" name="father" required></div>
                        <div class="mb-3"><label class="form-label" for="basic-form-mother">মাতার নাম (বাংলা) *</label> <input autocomplete="false" class="form-control" id="basic-form-mother" placeholder="আপনার মাতার নাম" name="mother"required></div>
                
                        <div class="mb-3"><label class="form-label" for="basic-form-name">ফোন নাম্বার (ইংরেজী) *</label> <input autocomplete="false" class="form-control" id="basic-form-name" name="phone" placeholder="Enter your phone number" required></div>

                        <div class="mb-3"><label class="form-label" for="basic-form-address">ঠিকানা *</label> <textarea class="form-control" id="basic-form-address" rows="3" placeholder="আপনার ঠিকানা" name="address" required></textarea></div>

                        <div class="mb-3"><label class="form-label" for="basic-form-holding_no">হোল্ডিং নং (ইংরেজী) *</label> <input autocomplete="false" class="form-control" id="basic-form-holding_no" type="text" placeholder="63/1" name="holding_no" required></div>
                       
                        <div class="mb-3"><label class="form-label">ফটো নির্বাচন করুন *</label> <input autocomplete="false" class="form-control" name="image" type="file" required></div>
                      
                  
                    
   <!-- end input -->
        </div>
        <!-- End Coll -->
        <div class="col-sm-6">
        <h4 class="">
                অ্যাকাউন্ট তথ্য
            </h4>
           
            <div class="pt-5">
                <div class="mb-3 text-start"><label class="form-label" for="email">ইমেইল *</label><input autocomplete="false" class="form-control" name="email" id="email" type="email" placeholder="Enter your email" required></div>
                <div class="row g-3 mb-3">
                  <div class="col-md-6"><label class="form-label" for="password">পাসওয়ার্ড *</label><input autocomplete="false" class="form-control form-icon-input" type="password" name="password" placeholder=" Enter your Password" required></div>
                  <div class="col-md-6"><label class="form-label" for="confirm_password">কনফার্ম পাসওয়ার্ড *</label><input autocomplete="false" class="form-control form-icon-input" name="password_confirmation" type="password" placeholder="Confirm Password" required></div>
                </div>
                <div class="form-check mb-3"><input autocomplete="false" class="form-check-input" id="termsService" type="checkbox"><label class="form-label" for="termsService">আমি <a href="#!">শর্তাবলী </a>এবং <a href="#!">গোপনীয় </a>নীতি মেনে চলবো।</label></div>
                <button type="submit" class="btn btn-primary w-100 mb-3">রেজিস্ট্রেশন করুন</button>
                <div class="text-center"><a class="fs--1 fw-bold" href="{{route('login')}}">অ্যাকাউন্ট থাকলে সাইনইন করুন</a></div>
                </div>
             </form>
        </div>
        </div>
      </div>
   </div>
</main>
@endsection