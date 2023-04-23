@extends('frontend.main')

@section('content')



  <!-- Post Banner Area Starts -->
  <section class="post-banner-area banner-section" style="background-image: url('{{asset('frontend/assets/img/blog1.jpg')}}');">
    <div class="container">
      <div class="banner-title">
        <h2><span>ভোটার</span> তালিকা</h2>
        <p><a href="index.html">হোম</a><i class="fa fa-angle-right"></i><span>ভোটার তালিকা</span></p>
      </div>
    </div>
  </section>
  <!-- Post Banner Area Ends -->


  <!-- Voter List Area Starts  -->
  <section class="voter_list_area">
    <div class="container-md">
      <div class="section-title">
        <h2>ভোটার তালিকা</h2>
        <p>উমনপুর গ্রামের সকল ভোটার রেকর্ড সংযুক্ত রয়েছে এবং এনাইডি নাম্বার অনুসন্ধানের মাধ্যমে ভোটার তার সিরিয়াল নং জানতে পারবেন। </p>
      </div>
      <!-- Voter Search  -->
      <div class="row">
        <div class="search-area my-4 col-md-6">
          <form class="d-flex" id="frm1">
            <input class="form-control me-2" name="search" type="text" placeholder="এখানে ভোটার নাম্বার খুজুন..."
              aria-label="Search">
            <button class="btn btn-outline-success" id="toggle-class" type="button">খুজুন</button>
          </form>
        </div>
      </div>
      <div class="voter-card">
        <div class="row">
          <div class="col-2">
            <p class="voter-card-token">সিরিয়াল নং - <span id="sl" class="token">01</span></p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <!-- Voter Card Layout -->
            <div class="single-voter-card">
              <div class="voter-card-header">
                <div class="voter-card-header-img">
                  <img src="{{asset('frontend/assets/img/nid-header-logo.jpg')}}" alt="NID Header">
                </div>
                <div class="header-content">
                  <h4>ভোটার তালিকা</h4>
                  <p>উমনপুর গ্রামের ভোটার এর তালিকায় আপনার যে সিরিয়াল অন্তর্ভুক্ত।</p>
                  <p>  উমনপুর গ্রামের পরিচয় পত্র</p>
                </div>
              </div>
              <div class="main-voter-info">
                <div class="voter-img"> 
                 <span id="img"></span>
                </div>
                <div class="voter-info">
                  <div class="water-mark-img">
                    <img src="{{asset('frontend/assets/img/water-mark.png')}}" alt="Water Mark">
                  </div>
                  
                  <p><span class="name-title">নাম:</span> <span id="nameb" class="name">উমনপুর</span></p>
                  <p><span class="name-title-en">Name:</span> <span  id="name" class="name-en">Umonpur</span></p>
                  <p><span class="name-title-father">পিতা:</span> <span id="father" class="name-father">উমনপুর </span></p>
                  <p><span class="name-title-mother">মাতা:</span> <span id="mother" class="name-mother">উমনপুর </span></p>
                  <p><span class="birth-date-title">Date of Birth</span>   <span id="dob" class="date-birth">01 January,
                      1900</span></p>
                  <p><span class="id-title">ID NO:</span> <span id="nid" class="voter-id">474754949493</span></p>
                  <p><span class="name-title">সিরিয়াল নং:</span> <span id="sl2" class="name">০১</span></p>
                </div>
              </div>
            </div>
            <!-- Voter Card Print -->
            <div class="row">
              <div class="voter-card-print">
              <form action="{{route('web-voter-print')}}" method="POST">
                <input type="hidden" name="user_id"  id="userID" class="userID">
                @csrf
                  <button type="submit" class="btn btn-box">প্রিন্টের জন্য এইখানে ক্লিক করুন</button>
                </form>
      
               
              </div>
            </div>
          </div>
        </div>
      </div>

     

    </div>
  </section>
  <!-- Voter List Area Ends  -->
  @push('scripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  </script>
  <script type="text/javascript">
            
           $("#toggle-class").click(function(){
               
            var search =  document.getElementsByName('search')[0].value;

    
               $.ajax({

                     type: "post",
                     url: "{{ route('voter.search') }}",
                     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                     cache: false,
                     data: {'search': search},
                     success: function(data){
                     $.each(data.nids, function (key, value) {
      
                        $('#name').html(value.name);
                        $('#nameb').html(value.name_bn);
                        $('#father').html(value.father);
                        $('#mother').html(value.mother);
                        $('#phone').html(value.phone);
                        $('#dob').html(value.dob);
                        $('#nid').html(value.nid);
                        $('#sl').html(value.serial);
                        $('#sl2').html(value.serial);
                        $('#img').html('<img src="uploads/members/'+value.image+'" alt="Voter Image" >');
                        $("#userID").val(value.id);
  
                     });
                  

               

                   
         
                  },
               error: function error() {
               $("#help-block").text("Sorry, An error has occurred");
               }
               }, "json");   
      
         });
      </script>
@endpush	  
@endsection
     