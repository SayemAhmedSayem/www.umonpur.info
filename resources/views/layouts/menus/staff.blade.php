
@php $permissions = permission_list(); @endphp

<ul class="navbar-nav flex-column" id="navbarVerticalNav">

<li class="nav-item">
   <a class="nav-link active" href="{{route('dashboard.index')}}">
      <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="cast"></span></span><span class="nav-link-text">Dashbboard</span></div>
   </a>
</li>
<li class="nav-item">
   <p class="navbar-vertical-label">Modules</p>
   <a class="nav-link dropdown-indicator" href="#forms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">

   @if(Auth::user()->role_id==0)
   </a>
      </li>
</ul>
@endif
   @if (in_array('category.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#category" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="tables">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="columns"></span></span><span class="nav-link-text">Category</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="category">
      <li class="nav-item">
         <a class="nav-link" href="{{route('category.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Category List</span></div>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('category.create')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Add Category</span></div>
         </a>
      </li>
   </ul>
   @endif
   @if (in_array('posts.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#tables" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="tables">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="columns"></span></span><span class="nav-link-text">Posts</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="tables">
      <li class="nav-item">
         <a class="nav-link" href="{{route('posts.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Post List</span></div>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('posts.create')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Create Post</span></div>
         </a>
      </li>
   </ul>
   @endif
   @if (in_array('about.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#components" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">Pages</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="components">
      <li class="nav-item">
         <a class="nav-link" href="{{route('about.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">About Page</span></div>
         </a>
      </li>
   </ul>
   @endif
   @if (in_array('testimonial.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#testi" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">Testimonial</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="testi">
      <li class="nav-item">
         <a class="nav-link" href="{{route('testimonial.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Testimonial List</span></div>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('testimonial.create')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Add Testimonial</span></div>
         </a>
      </li>
   </ul>
   @endif
   @if (in_array('members.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#member" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">Members</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="member">
      <li class="nav-item">
         <a class="nav-link" href="{{route('members.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Member List</span></div>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('members.create')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Add Member</span></div>
         </a>
      </li>
   </ul>
   @endif
   @if (in_array('sliders.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#sliders" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">Sliders</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="sliders">
      <li class="nav-item">
         <a class="nav-link" href="{{route('sliders.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Slider List</span></div>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('sliders.create')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Add Slider</span></div>
         </a>
      </li>
   </ul>
   @endif
   @if (in_array('income.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#income" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">income</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="income">
      <li class="nav-item">
         <a class="nav-link" href="{{route('income.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">income List</span></div>
         </a>
      </li>
 
   </ul>
   @endif
   @if (in_array('expense.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#expense" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
<div class="d-flex align-items-center">
   <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
   <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">expense</span>
</div>
</a>
<ul class="nav collapse parent" id="expense">
<li class="nav-item">
   <a class="nav-link" href="{{route('expense.index')}}" data-bs-toggle="" aria-expanded="false">
      <div class="d-flex align-items-center"><span class="nav-link-text">expense List</span></div>
   </a>
</li>

</ul>
@endif
   @if (in_array('message.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#message" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">message</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="message">
      <li class="nav-item">
         <a class="nav-link" href="{{route('message.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">message List</span></div>
         </a>
      </li>
 
   </ul>
   @endif
   @if (in_array('statistic.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#statistic" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">statistic</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="statistic">
      <li class="nav-item">
         <a class="nav-link" href="{{route('statistic.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">statistic List</span></div>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('statistic.create')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Add statistic</span></div>
         </a>
      </li>
   </ul>
   @endif
   @if (in_array('profile.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#profile" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
<div class="d-flex align-items-center">
   <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
   <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">Profile</span>
</div>
</a>
<ul class="nav collapse parent" id="profile">
<li class="nav-item">
   <a class="nav-link" href="{{route('profile.index')}}" data-bs-toggle="" aria-expanded="false">
      <div class="d-flex align-items-center"><span class="nav-link-text">Profile List</span></div>
   </a>
</li>
</ul>
   @endif
   @if (in_array('link.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#link" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">link</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="link">
      <li class="nav-item">
         <a class="nav-link" href="{{route('link.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">link List</span></div>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="{{route('link.create')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Add link</span></div>
         </a>
      </li>
   </ul>
   @endif
   @if (in_array('album.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#media" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">Media</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="media">
      <li class="nav-item">
         <a class="nav-link" href="{{route('album.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Album</span></div>
         </a>
      </li>
   </ul>
   @endif
   @if (in_array('donate.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#donate" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">Donate</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="donate">
      <li class="nav-item">
         <a class="nav-link" href="{{route('donate.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">Donate Requests</span></div>
         </a>
      </li>
   </ul>
   @endif
   @if (in_array('roles.index',$permissions))
   <a class="nav-link dropdown-indicator" href="#roles" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">roles</span>
      </div>
   </a>
   <ul class="nav collapse parent" id="roles">
      <li class="nav-item">
         <a class="nav-link" href="{{route('roles.index')}}" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-text">roles</span></div>
         </a>
      </li>
   </ul>
   @endif
   @if (in_array('version.index',$permissions))
   <a class="nav-link dropdown-indicator" href="{{route('version.index')}}" >
      <div class="d-flex align-items-center">
         <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
         <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">version</span>
      </div>
   </a>
   @endif

