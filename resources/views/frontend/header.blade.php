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
    <link href="{{ asset('frontend') }}/css/osahan2.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendor//owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendor//owl-carousel/owl.theme.css">
    <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=61ef85696346030019493bd2&product=inline-share-buttons"
            async="async"></script>
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 7px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #07bf67 0%, #0cded5 100%);
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(-45deg, #07bf67 0%, #0cded5 100%);
        }

        video.img-fluid.video_list_item {
            max-width: 260px !important;
            height:auto;
            /* max-height: 143px !important; */
            margin: 0 auto;
            object-fit: fill;
        }

        @media (max-width: 480px) {
            video.img-fluid.video_list_item {
                max-width: 100% !important;
                max-height: 100% !important;
                margin: 0 auto;
            }
        }

        .video-card-image {
            margin: 0 auto;
        }
    </style>

    @stack('frontend_css')
</head>
<body id="page-top" class="{{in_array(\Route::currentRouteName(),['video.view'])?'sidebar-toggled':''}}">

@include('layouts.navbars.feheader')
<!-- Component end for sidebar -->
@yield('frontend_content')
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
                <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
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