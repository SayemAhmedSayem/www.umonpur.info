@extends('layouts.header')
@section('content')
<div class="content">
   <div class="row align-items-center justify-content-between g-3 mb-4">
      <div class="col-auto">
         <h2 class="mb-0">{{$about->page->title}}</h2>
      </div>
      <nav class="mb-2" aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('pages.index')}}">Pages</a></li>
            <li class="breadcrumb-item active">{{$about->page->title}}</li>
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
                        <h5 class="mb-1">Section One</h5>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group">
                        <label class="form-label" for="exampleTextarea">Select Image</label> 
                        <input type="file" class="form-control dropify" name="image">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleTextarea">Title</label> 
                        <input class="form-control" type="text" value="{{$about->sec_1_title}}" name="sec_1_title">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleTextarea">Description</label> 
                        <textarea class="form-control" name="sec_1_description" rows="3"> {{$about->sec_1_description}} </textarea>
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleTextarea">Button</label> 
                        <input class="form-control" value="{{$about->sec_1_button}}" type="text" name="sec_1_button">
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
                        <h5 class="mb-1">Section Two</h5>
                     </div>
                     <input type="hidden" name="page_id" value="{{$page_id}}">
                  </div>
                  <div class="row">
                     <div class="form-group">
                        <label class="form-label" for="exampleTextarea">Select Category</label>  
                        <select name="sec_2_cat_id" id="" class="form-control">
                  @foreach($categories as $cat)
                  <option value="{{$cat->id}}" {{$about->sec_2_cat_id==$cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
                  @endforeach
               </select>
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleTextarea">How many post to show</label>  
                        <div class="form-check">
                           <input class="form-check-input" type="radio" value="3" name="sec_2_post" id="flexRadioDefault1" {{$about->sec_2_post==3 ? 'checked' : ''}}>
                           <label class="form-check-label" for="flexRadioDefault1">
                           3
                           </label>
                        </div>
                        <div class="form-check">
                           <input class="form-check-input" type="radio" value="6" name="sec_2_post" id="flexRadioDefault2" {{$about->sec_2_post==6 ? 'checked' : ''}}>
                           <label class="form-check-label" for="flexRadioDefault2">
                           6
                           </label>
                        </div>
                        <div class="form-check">
                           <input class="form-check-input" type="radio"  value="9" name="sec_2_post" id="flexRadioDefault3" {{$about->sec_2_post==9 ? 'checked' : ''}}>
                           <label class="form-check-label" for="flexRadioDefault3">
                           9
                           </label>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleTextarea">Button</label> 
                        <input class="form-control"  value="{{$about->sec_2_button}}" type="text" name="sec_2_button">
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
                        <h5 class="mb-2">Section Three</h5>
                     </div>
                  </div>
                  <div>
                     <div class="row">
                        <div class="form-group">
                           <div class="form-group">
                              <label class="form-label" for="exampleTextarea">Title</label> 
                              <input class="form-control" type="text" value="{{$about->sec_3_title}}" name="sec_3_title">
                           </div>
                           <div class="form-group">
                              <label class="form-label" for="exampleTextarea">Description</label> 
                              <textarea class="form-control" name="sec_3_description" rows="3">{{$about->sec_3_description}} </textarea>
                           </div>
                           <div class="form-group">
                              <label class="form-label" for="exampleTextarea">Show Member Grids</label>  
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" name="sec_3_member_grid" id="mem1" value="1" {{$about->sec_3_member_grid==1 ? 'checked' : ''}}>
                                 <label class="form-check-label" for="mem1">
                                 Yes
                                 </label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" name="sec_3_member_grid" id="mem2" value="2" {{$about->sec_3_member_grid==2 ? 'checked' : ''}}>
                                 <label class="form-check-label" for="mem2">
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