<?php
$messages = App\Models\Message::where('status', 0)->get();
?>
<nav class="navbar navbar-light navbar-vertical navbar-vibrant navbar-expand-lg">
   <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
   <div class="navbar-vertical-content scrollbar">
@include('layouts.menus.'.Auth::user()->user_type)
     
    
   </div>
   </div>
</nav>
<nav class="navbar navbar-light navbar-top navbar-expand">
<div class="navbar-logo"><button class="btn navbar-toggler navbar-toggler-humburger-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button> <a class="navbar-brand me-1 me-sm-3" href="index.php">
<div class="d-flex align-items-center">
<div class="d-flex align-items-center"><img src="{{asset('template/assets/img/icons/logo-2.png')}}" alt="umonpur logo" width="32">
<p class="logo-text ms-2 d-none d-sm-block">উমনপুর</p>
</div>
</div>
</a></div>
<div class="collapse navbar-collapse">
<div class="search-box d-none d-lg-block" style="width:25rem;">
<form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control form-control-sm search-input search min-h-auto" type="search" placeholder="Search..." aria-label="Search"> <span class="fas fa-search search-box-icon"></span></form>
</div>
<ul class="navbar-nav navbar-nav-icons ms-auto flex-row">
   <li class="nav-item mx-5"><a href="{{route('web-home')}}" target="_blank" rel="noopener noreferrer"> <i class="fas fa-globe"></i> ওয়েবসাইট দেখুন</a> </li>
@if(Auth::user()->user_type=='user')
<li class="nav-item dropdown"><a class="av-link notification-indicator notification-indicator-primary" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

<span type="button" class="position-relative">
<span class="px-1">  <i style="font-size:20px;color:gray;" class="far fa-comment-alt"></i></span>
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="color:#ffffff">
   {{$messages->count()}}
  </span>
</span>

</a>
     <div class="dropdown-menu dropdown-menu-end py-0 dropdown-nide-dots shadow border border-300" aria-labelledby="navbarDropdownNindeDots">
       <div class="card bg-white position-relative border-0">
         <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
           <div class="row text-center align-items-center gx-0 gy-0">
             <div class="row align-items-md-center mb-4 g-3">
               <div class="col-auto flex-1">
                @forelse($messages as $message)
                <div class="row justify-content-sm-between align-items-center">
                   <div class="col-md-auto col-12">
                     <h4 class="fs--1 text-black">{{$message->name}} <span><a  class="badge bg-info" href="{{route('message.show', $message->id)}}">Read</a></span></h4>
                   </div>
                   <div class="col-md-auto col-12">
                     <p class="text-800 fs--1 mb-0" style="font-size:10px !important;"><span><i class="fas fa-clock"></i></span> <span class="fw-bold">10:41 AM </span>August 7,2021</p>
                   </div>
                 </div>
                 <hr>
                 @empty
                 <span>No Unread Messages</span>
               <hr>
                 @endforelse
               </div>
             </div>

           </div>
         </div>
       </div>
     </div>
   </li>
@endif
<li class="nav-item dropdown"><a class="nav-link lh-1 px-0 ms-5" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<div class="avatar avatar-l"><img class="rounded-circle" src="{{ asset('uploads/members/'.Auth::user()->nid->image) }}" alt=""></div>
</a>
<div class="dropdown-menu dropdown-menu-end py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
<div class="card bg-white position-relative border-0">
<div class="card-body p-0 overflow-auto scrollbar" style="height: 18rem;">
<div class="text-center pt-4 pb-3">
<div class="avatar avatar-xl"><img class="rounded-circle" style="width: 50px; height: 50px; padding: 2px; background-color:red" src="{{ asset('uploads/members/'.Auth::user()->nid->image) }}" alt=""></div>
<h6 class="mt-2">{{Auth::user()->name ?? ''}}</h6>
</div>
<ul class="nav d-flex flex-column mb-2 pb-1">
<li class="nav-item"><a class="nav-link px-3" href="{{route('my-profile', Auth::user()->id)}}"><span class="me-2 text-900" data-feather="user"></span>My Profile</a></li>
<li class="nav-item"><a class="nav-link px-3" href="{{route('my-payment', Auth::user()->id)}}"><span class="me-2 text-900" data-feather="pie-chart"></span>My Payment</a></li>
<li class="nav-item"><a class="nav-link px-3" href="{{route('change-pass', Auth::user()->id)}}"><span class="me-2 text-900" data-feather="lock"></span>Change Password</a></li>
</ul>
</div>
<div class="card-footer p-0 border-top">
<div class="px-3">
<a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="{{ route('logout') }}"
   onclick="event.preventDefault();
   document.getElementById('logout-form').submit();">
<span class="me-2" data-feather="log-out"></span>
Sign out
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
@csrf
</form>
</div>
<div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
</div>
</div>
</div>
</li>
</ul>
</div>
</nav>