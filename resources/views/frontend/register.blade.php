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
      <link rel="icon" type="image/png" href="{{ asset('frontend') }}/img/favicon.png">
      <!-- Bootstrap core CSS-->
      <link href="{{ asset('frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="{{ asset('frontend') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="{{ asset('frontend') }}/css/osahan.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/owl-carousel/owl.theme.css">
   </head>
   <body class="login-main-body">
      <section class="login-main-wrapper">
         <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
               <div class="col-md-5 p-5 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="{{ asset('frontend') }}/img/favicon.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to Poprival</h5>
                        
                        @if (session()->has('success'))
    <div class="notification">
      
        <div class="alert alert-primary">  {!! session('success') !!}</div>
    </div>
@endif
                       

                     </div>
                     <form action="{{route('userregister')}}" method="post">
                     @csrf
                        <div class="form-group">
                           <label>First Name</label>
                           <input type="text" class="form-control" placeholder="First Name" name="firstname" value="{{ old('firstname') }}">
                        </div>
                        @error('firstname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                           <label>Last Name</label>
                           <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="{{ old('lastname') }}">
                        </div>
                        @error('lastname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                           <label>Display Name</label>
                           <input type="text" class="form-control" placeholder="Display Name" name="display_name" value="{{ old('display_name') }}">
                        </div>
                        @error('display_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                           <label>User Email </label>
                           <input type="email" class="form-control" placeholder="Email Id" name="email" value="{{ old('email') }}">
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mt-4">
                           <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign Up</button>
                        </div>
                     </form>
                     <div class="text-center mt-5">
                        <p class="light-gray">Already have an Account? <a href="{{route('/')}}">Sign In</a></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="login-main-right bg-white p-5 mt-5 mb-5">
                     <div class="owl-carousel owl-carousel-login">
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="{{ asset('frontend') }}/img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">​Watch videos offline</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="{{ asset('frontend') }}/img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Download videos effortlessly</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="{{ asset('frontend') }}/img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Create GIFs</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Bootstrap core JavaScript-->
      <script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
      <script src="{{ asset('frontend') }}/vendor/bootstrap/{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="{{ asset('frontend') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Owl Carousel -->
      <script src="{{ asset('frontend') }}/vendor/owl-carousel/owl.carousel.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="{{ asset('frontend') }}/js/custom.js"></script>
   </body>
</html>