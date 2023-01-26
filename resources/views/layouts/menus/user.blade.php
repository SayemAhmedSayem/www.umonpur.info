
         <ul class="navbar-nav flex-column" id="navbarVerticalNav">
         <li class="nav-item">
            <a class="nav-link active" href="{{route('dashboard.index')}}">
               <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="cast"></span></span><span class="nav-link-text">ড্যাশবোর্ড</span></div>
            </a>
         </li>
         <li class="nav-item">
            <p class="navbar-vertical-label">Modules</p>
            <a class="nav-link dropdown-indicator" href="#forms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
            <a class="nav-link dropdown-indicator" href="#category" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="tables">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="columns"></span></span><span class="nav-link-text">আমাদের ক্যাটাগরি</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="category">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('category.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">ক্যাটাগরি তালিকা</span></div>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{route('category.create')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">ক্যাটাগরি যুক্ত করুন</span></div>
                  </a>
               </li>
            </ul>
            <a class="nav-link dropdown-indicator" href="#tables" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="tables">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="columns"></span></span><span class="nav-link-text">হোম পোস্ট</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="tables">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('posts.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">হোম পোস্ট তালিকা</span></div>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{route('posts.create')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">হোম পোস্ট যুক্ত করুন</span></div>
                  </a>
               </li>
            </ul>
            <a class="nav-link dropdown-indicator" href="#components" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">আমাদের সম্পর্কে</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="components">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('about.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">আমাদের সম্পর্কে তালিকা</span></div>
                  </a>
               </li>
            </ul>
            <a class="nav-link dropdown-indicator" href="#testi" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">প্রশংসা পত্র</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="testi">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('testimonial.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">প্রশংসা পত্রের তালিকা</span></div>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{route('testimonial.create')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">প্রশংসা পত্র যুক্ত করুন</span></div>
                  </a>
               </li>
            </ul>
            <a class="nav-link dropdown-indicator" href="#member" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">আমাদের সদস্যরা</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="member">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('members.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">সদস্যদের তালিকা</span></div>
                  </a>
               </li>
               <!-- <li class="nav-item">
                  <a class="nav-link" href="{{route('members.create')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">সদস্য যুক্ত করুন</span></div>
                  </a>
               </li> -->
            </ul>
            <a class="nav-link dropdown-indicator" href="#sliders" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">স্লাইডার</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="sliders">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('sliders.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">স্লাইডার তালিকা</span></div>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{route('sliders.create')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">স্লাইডার যুক্ত করুন</span></div>
                  </a>
               </li>
            </ul>
            <a class="nav-link dropdown-indicator" href="#income" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">আমাদের আয়</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="income">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('income.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">আয়ের তালিকা</span></div>
                  </a>
               </li>
       
            </ul>
            <a class="nav-link dropdown-indicator" href="#expense" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
<div class="d-flex align-items-center">
   <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
   <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">আমাদের ব্যয়</span>
</div>
</a>
<ul class="nav collapse parent" id="expense">
<li class="nav-item">
   <a class="nav-link" href="{{route('expense.index')}}" data-bs-toggle="" aria-expanded="false">
      <div class="d-flex align-items-center"><span class="nav-link-text">ব্যয় তালিকা</span></div>
   </a>
</li>

</ul>
            <a class="nav-link dropdown-indicator" href="#message" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">বার্তা</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="message">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('message.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">বার্তা তালিকা</span></div>
                  </a>
               </li>
          
            </ul>
            <a class="nav-link dropdown-indicator" href="#statistic" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">পরিসংখ্যান</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="statistic">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('statistic.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">পরিসংখ্যান তালিকা</span></div>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{route('statistic.create')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">পরিসংখ্যান যুক্ত করুন</span></div>
                  </a>
               </li>
            </ul>
            <a class="nav-link dropdown-indicator" href="#profile" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
<div class="d-flex align-items-center">
   <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
   <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">প্রোফাইল</span>
</div>
</a>
<ul class="nav collapse parent" id="profile">
<li class="nav-item">
   <a class="nav-link" href="{{route('profile.index')}}" data-bs-toggle="" aria-expanded="false">
      <div class="d-flex align-items-center"><span class="nav-link-text">প্রোফাইল তালিকা</span></div>
   </a>
</li>
</ul>
            <a class="nav-link dropdown-indicator" href="#link" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">লিংক সমূহ</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="link">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('link.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">লিংক তালিকা</span></div>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{route('link.create')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">লিঙ্ক যুক্ত করুন</span></div>
                  </a>
               </li>
            </ul>
            <a class="nav-link dropdown-indicator" href="#media" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">মিডিয়া</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="media">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('album.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text"> অ্যালবাম</span></div>
                  </a>
               </li>
            </ul>
            <a class="nav-link dropdown-indicator" href="#donate" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">সকল ডনেশন</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="donate">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('donate.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">ডনেশন রিকুয়েস্ট</span></div>
                  </a>
               </li>
            </ul>
            <a class="nav-link dropdown-indicator" href="#roles" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="components">
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">ভূমিকা ও দায়িত্ব</span>
               </div>
            </a>
            <ul class="nav collapse parent" id="roles">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('roles.index')}}" data-bs-toggle="" aria-expanded="false">
                     <div class="d-flex align-items-center"><span class="nav-link-text">নির্দিষ্ট বিষয়ে দায়িত্ব</span></div>
                  </a>
               </li>
            </ul>
            <a class="nav-link dropdown-indicator" href="{{route('version.index')}}" >
               <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon d-flex flex-center"><span class="fas fa-caret-right fs-0"></span></div>
                  <span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text">ওয়েবসাইট ভার্সন</span>
               </div>
            </a>
   