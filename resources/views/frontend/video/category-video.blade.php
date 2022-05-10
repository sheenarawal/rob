@extends('frontend.header')
@section('frontend_content')
<div id="wrapper">
    <!-- Sidebar -->
    <!-- Component added for sidebar -->
    @include('layouts.navbars.fesidebar')
    <!-- Component end for sidebar -->
    <div id="content-wrapper">
        <div class="container-fluid upload-details">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title">
                        <h6>Videos</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row ">
                        @include('frontend.video.video_load')
                    </div>
                </div>
            </div>
        </div>
        @include('frontend.footer')
    </div>
    <hr>

</div>
@stop

@push('frontend_css')
@endpush
@push('frontend_script')

    <script>
        document.getElementById("myVid").addEventListener("mouseover", function() {
            this.play();
        });

        document.getElementById("myVid").addEventListener("mouseleave", function() {
            this.pause();
        });
    </script>

@endpush
