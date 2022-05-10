@extends('frontend.header')
@section('frontend_content')

    <div id="wrapper">
        <!-- Sidebar -->
    @include('layouts.navbars.fesidebar')
    <!-- Component added for sidebar -->

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
            <!-- /.container-fluid -->
            @include('frontend.footer');
        </div>
        <hr>

    </div>
@stop
@push('frontend_script')

    <script>
        $(document).ready(function () {
            let video = $(".video_list_item");
            video.each(function () {
                $(this).mouseover(function () { this.play(); });
                $(this).mouseout(function () { this.pause(); });
            })
        })
        function get_duration() {
            $(".video_list_item").each(function (index, element) {
                var value = element.duration;
                if (value){
                    var duration_min = Math.floor(value / (3600 / 60));
                    var duration_sec = Math.floor(value % 60);
                    var min = (duration_min < 9) ? '0'+duration_min:duration_min;
                    var sec = (duration_sec < 9) ? '0'+duration_sec:duration_sec;
                    var elemtent_get = $('.duaration_' + index).text(min + ':' + sec)
                }
            });

        }
    </script>
@endpush