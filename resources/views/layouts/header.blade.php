<!doctype html>
<html lang="en-US" dir="ltr">


  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Umonpur - উমনপুর</title>
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="{{asset('template/assets/css/phoenix.min.css')}}" rel="stylesheet" id="style-default">
    <link href="{{asset('template/assets/css/user.min.css')}}" rel="stylesheet" id="user-style-default">
    <link href="{{asset('template/assets/css/phoenix.style.css')}}" rel="stylesheet" id="">
    <style>
      body {
        opacity: 0;
      }
         .cke_notifications_area{
      display: none !important;
   }
    </style>
       @stack('style')
  </head>

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">
      @include('layouts.sidebar')
        <div class="content">
        @if (Session::has('noaccess'))
<div class="alert alert-outline-danger d-flex align-items-center" role="alert">
  <span class="fas fa-times-circle text-danger fs-3 me-3"></span>
  <p class="mb-0 flex-1">{{ Session::get('noaccess') }}</p>
  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
          @yield('content')

          <footer class="footer">
            <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
              <div class="col-12 col-sm-auto text-center">
              
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p>Design and Development with passion by <span style="font-size:30px;font-weight:900;color:green">_S@YEM_</span><!--<span>sayem</span>-->
             | <span style="font-style:italic;font-size:12px;">Version 2023</span></p>
              
              </div>
            </div>
          </footer>
        </div>
      </div>

   @include('layouts.footer')