@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">Settings</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('pages.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Settings</li>
         </ol>
      </nav>
   </div>
   <div class="col-12 col-xxl-6">
      <form action="{{route('about.update', $about->id)}}" method="POST"  enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div class="row g-3">
            <div class="col-12 col-md-6">
               <div class="card border border-200 shadow-none h-100">
                  <div class="card-body">
                     <div class="d-flex justify-content-between">
                        <div>
                           <h5 class="mb-1">Header</h5>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Add Logo</label> 
                           <input type="file" class="form-control dropify" name="logo">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Site Title</label> 
                           <input class="form-control" type="text" value="{{$about->title}}" name="title">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Tagline</label> 
                           <input class="form-control" type="text" value="{{$about->tagline}}" name="tagline">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Show Social on Topbar</label>  
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="social_show" id="social_show1" value="1" {{$about->social_show==1 ? 'checked' : ''}}>
                              <label class="form-check-label" for="social_show1">
                              Yes
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="social_show" id="social_show2" value="2" {{$about->social_show==2 ? 'checked' : ''}}>
                              <label class="form-check-label" for="social_show2">
                              No
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Show Email</label>  
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="email_show" id="mem1" value="1" {{$about->email_show==1 ? 'checked' : ''}}>
                              <label class="form-check-label" for="mem1">
                              Yes
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="email_show" id="mem2" value="2" {{$about->email_show==2 ? 'checked' : ''}}>
                              <label class="form-check-label" for="mem2">
                              No
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Email Address</label> 
                           <input class="form-control" type="text" value="{{$about->email_address}}" name="email_address">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Show Phone</label>  
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="phone_show" id="mem1" value="1" {{$about->phone_show==1 ? 'checked' : ''}}>
                              <label class="form-check-label" for="mem1">
                              Yes
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="phone_show" id="mem2" value="2" {{$about->phone_show==2 ? 'checked' : ''}}>
                              <label class="form-check-label" for="mem2">
                              No
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Phone Number</label> 
                           <input class="form-control" type="text" value="{{$about->phone_number}}" name="phone_number">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Show Donation</label>  
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="don_show" id="don_show1" value="1" {{$about->don_show==1 ? 'checked' : ''}}>
                              <label class="form-check-label" for="don_show1">
                              Yes
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="don_show" id="don_show2" value="2" {{$about->don_show==2 ? 'checked' : ''}}>
                              <label class="form-check-label" for="don_show2">
                              No
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Donation Button text</label> 
                           <input class="form-control" type="text" value="{{$about->don_text}}" name="don_text">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6">
               <div class="card border border-200 shadow-none h-100">
                  <div class="card-body">
                     <div class="d-flex justify-content-between">
                        <div>
                           <h5 class="mb-1">Footer Link One</h5>
                        </div>
                        <input type="hidden" name="page_id" value="">
                     </div>
                     <div class="row">
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Show Footer Link One</label>  
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="footer_link_1_show" id="footer_link_1_show1" value="1" {{$about->footer_link_1_show==1 ? 'checked' : ''}}>
                              <label class="form-check-label" for="footer_link_1_show1">
                              Yes
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="footer_link_1_show" id="footer_link_1_show2" value="2" {{$about->footer_link_1_show==2 ? 'checked' : ''}}>
                              <label class="form-check-label" for="footer_link_1_show2">
                              No
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Link One URL</label> 
                           <input class="form-control"  value="{{$about->footer_link_1_url_1}}" type="text" name="footer_link_1_url_1">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Link Two URL</label> 
                           <input class="form-control"  value="{{$about->footer_link_1_url_2}}" type="text" name="footer_link_1_url_2">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Link Three URL</label> 
                           <input class="form-control"  value="{{$about->footer_link_1_url_3}}" type="text" name="footer_link_1_url_3">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Link Four URL</label> 
                           <input class="form-control"  value="{{$about->footer_link_1_url_4}}" type="text" name="footer_link_1_url_4">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Link Five URL</label> 
                           <input class="form-control"  value="{{$about->footer_link_1_url_5}}" type="text" name="footer_link_1_url_5">
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6">
               <div class="card border border-200 shadow-none h-100">
                  <div class="card-body">
                     <div class="d-flex justify-content-between">
                        <div>
                           <h5 class="mb-2">Footer Section Two</h5>
                        </div>
                     </div>
                     <div>
                        <div class="row">
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Show Footer Link Two</label>  
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="footer_link_2_show" id="footer_link_2_show1" value="1" {{$about->footer_link_2_show==1 ? 'checked' : ''}}>
                              <label class="form-check-label" for="footer_link_2_show1">
                              Yes
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" name="footer_link_2_show" id="footer_link_2_show2" value="2" {{$about->footer_link_2_show==2 ? 'checked' : ''}}>
                              <label class="form-check-label" for="footer_link_2_show2">
                              No
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Link One URL</label> 
                           <input class="form-control"  value="{{$about->footer_link_2_url_1}}" type="text" name="footer_link_2_url_1">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Link Two URL</label> 
                           <input class="form-control"  value="{{$about->footer_link_2_url_2}}" type="text" name="footer_link_2_url_2">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Link Three URL</label> 
                           <input class="form-control"  value="{{$about->footer_link_2_url_3}}" type="text" name="footer_link_2_url_3">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Link Four URL</label> 
                           <input class="form-control"  value="{{$about->footer_link_2_url_5}}" type="text" name="footer_link_2_url_5">
                        </div>
                        <div class="form-group">
                           <label class="form-label" for="exampleTextarea">Link Five URL</label> 
                           <input class="form-control"  value="{{$about->footer_link_1_url_5}}" type="text" name="footer_link_1_url_5">
                        </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6">
               <div class="card border border-200 shadow-none h-100">
                  <div class="card-body">
                     <div class="d-flex justify-content-between">
                        <div>
                           <h5 class="mb-2">Section Four</h5>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group">
                           <div class="form-group">
                              <label class="form-label" for="exampleTextarea">Title</label> 
                              <input class="form-control" value="{{$about->sec_4_title}}" type="text" name="sec_4_title">
                           </div>
                           <div class="form-group">
                              <label class="form-label" for="exampleTextarea">Description</label> 
                              <textarea class="form-control" name="sec_4_description" rows="3">{{$about->sec_4_description}} </textarea>
                           </div>
                           <div class="form-group">
                              <label class="form-label" for="exampleTextarea">Show Statistics</label>  
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="1" name="sec_4_stat_grid" id="stat1" {{$about->sec_4_stat_grid==1 ? 'checked' : ''}}>
                                 <label class="form-check-label" for="stat1">
                                 Yes
                                 </label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="2" name="sec_4_stat_grid" id="stat2"  {{$about->sec_4_stat_grid==2 ? 'checked' : ''}}>
                                 <label class="form-check-label" for="stat2">
                                 No
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6">
               <div class="card border border-200 shadow-none h-100">
                  <div class="card-body">
                     <div class="d-flex justify-content-between">
                        <div>
                           <h5 class="mb-2">Section Five</h5>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group">
                           <div class="form-group">
                              <label class="form-label" for="exampleTextarea">Title</label> 
                              <input class="form-control" value="{{$about->sec_5_title}}" type="text" name="sec_5_title">
                           </div>
                           <div class="form-group">
                              <label class="form-label" for="exampleTextarea">Description</label> 
                              <textarea class="form-control" name="sec_5_description" rows="3">{{$about->sec_5_description}} </textarea>
                           </div>
                           <div class="form-group">
                              <label class="form-label" for="exampleTextarea">Show Testimonial</label>  
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="1" name="sec_5_testimonial" id="testi_1" {{$about->sec_5_testimonial==1 ? 'checked' : ''}}>
                                 <label class="form-check-label" for="testi_1">
                                 Yes
                                 </label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="2" name="sec_5_testimonial" id="testi_2"  {{$about->sec_5_testimonial==2 ? 'checked' : ''}}>
                                 <label class="form-check-label" for="testi_2">
                                 No
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6">
               <div class="card border border-200 shadow-none h-100">
                  <div class="card-body">
                     <div class="d-flex justify-content-between">
                        <div>
                           <h5 class="mb-2">Section Six</h5>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group">
                           <div class="form-group">
                              <label class="form-label" for="exampleTextarea">Title</label> 
                              <input class="form-control" value="{{$about->sec_6_title}}" type="text" name="sec_6_title">
                           </div>
                           <div class="form-group">
                              <label class="form-label" for="exampleTextarea">Description</label> 
                              <textarea class="form-control" name="sec_6_description" rows="3">{{$about->sec_6_description}} </textarea>
                           </div>
                           <div class="form-group">
                              <label class="form-label" for="exampleTextarea">Show Donar List</label>  
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="1" name="sec_6_donar_list" id="non_1" {{$about->sec_6_donar_list==1 ? 'checked' : ''}}>
                                 <label class="form-check-label" for="non_1">
                                 Yes
                                 </label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="2" name="sec_6_donar_list" id="non_2"  {{$about->sec_6_donar_list==2 ? 'checked' : ''}}>
                                 <label class="form-check-label" for="non_2">
                                 No
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-auto pt-3">
            <div class="d-flex align-items-right">
               <button type="submit" class="btn btn-primary">
               <span class="fas fa-plus me-2"></span>
               Update Page
               </button>
            </div>
         </div>
      </form>
   </div>
</div>
</div>
</div>
@endsection