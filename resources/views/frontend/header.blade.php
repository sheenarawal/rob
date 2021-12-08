<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>VIDOE - Video Streaming Website HTML Template</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="{{ asset('frontend') }}/img//favicon.png">
      <!-- Bootstrap core CSS-->
      <link href="{{ asset('frontend') }}/vendor//bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="{{ asset('frontend') }}/vendor//fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="{{ asset('frontend') }}/css/osahan.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="{{ asset('frontend') }}/vendor//owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/vendor//owl-carousel/owl.theme.css">
      @stack('frontend_css')
   </head>
<body id="page-top">
<nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
   &nbsp;&nbsp;
   <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
      <i class="fas fa-bars"></i>
   </button> &nbsp;&nbsp;
   <a class="navbar-brand mr-1" href="{{url('/my-account')}}"><img class="img-fluid" alt="" src="{{ asset('frontend') }}/img/logo.png"></a>
   <!-- Navbar Search -->
   <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search" type="get" action="{{url('/search')}}">
      <div class="input-group">
         <input type="text" class="form-control" name="query" required placeholder="Search">
         <div class="input-group-append">
            <button class="btn btn-light" type="submit">
               <i class="fas fa-search"></i>
            </button>
         </div>
      </div>
   </form>
   <!-- Navbar -->
   <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
      <li class="nav-item dropdown no-arrow mx-1">
         <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-success">2</span>
         </a>
      </li>
      <li class="nav-item mx-1">
         <a class="nav-link" href="{{route('uploadvideo')}}">
            <i class="fas fa-plus-circle fa-fw"></i>
            Upload Video
         </a>
      </li>

      <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
         <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img alt="Avatar" src="{{ asset('frontend') }}/img/user.png">
            @if(Auth::check())
               {{Auth::user()->first_name}} {{Auth::user()->last_name}}
            @endif
         </a>
         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{url('account/edit')}}"><i class="fas fa-fw fa-cog"></i> &nbsp; Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> &nbsp; Logout</a>
         </div>
      </li>
   </ul>
</nav>
@yield('frontend_content')
<!-- /#wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
   <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
         <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
         </div>
      </div>
   </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('frontend') }}/vendor//jquery/jquery.min.js"></script>
<script src="{{ asset('frontend') }}/vendor//bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('frontend') }}/vendor//jquery-easing/jquery.easing.min.js"></script>
<!-- Owl Carousel -->
<script src="{{ asset('frontend') }}/vendor//owl-carousel/owl.carousel.js"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('frontend') }}/js/custom.js"></script>
@stack('frontend_script')
</body>

</html>