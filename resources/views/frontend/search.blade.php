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
                            @php($i=1)
                            @foreach($videos as $video)
                                @if($video)
                                    <div class="col-xl-3 col-sm-6 mb-3 align-items-stretch">
                                        <div class="video-card">
                                            <div class="video-card-image">
                                                <a class="play-icon" href="#">
                                                    <i class="fas fa-play-circle"></i>
                                                </a>
                                                <a href="{{route('video.view',$video->slug)}}">
                                                    <video id="myVid" class="img-fluid video_list_item"
                                                           src="{{asset($video->videolink)}}" muted
                                                           onloadedmetadata="get_duration()"></video>
                                                </a>
                                                <div class="time duaration_{{$i}}">3:50</div>
                                            </div>
                                            <div class="video-card-body">
                                                <div class="video-title text-uppercase">
                                                    <a href="#">{{$video->title}}</a>
                                                </div>
                                                <div class="video-page text-success">
                                                    @if(count($video->Category)>0)
                                                        @foreach($video->Category as $cateData)
                                                            @if($cateData->CategoryDetail)
                                                                <a data-placement="top" data-toggle="tooltip"
                                                                   href="{{route('video.category',$cateData->CategoryDetail->slug)}}"
                                                                   data-original-title="Verified">
                                                                    {{ucfirst($cateData->CategoryDetail->title)}}
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                </a>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="video-view">
                                                    <i class="fas fa-calendar-alt"></i> {{\Carbon\Carbon::parse($video->recording_date)->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-xl-3 col-sm-6 mb-3 align-items-stretch">
                                        <h1 class="text-center text-danger">No results Found</h1>
                                        <p>Try different keywords </p>
                                    </div>
                                @endif
                                @php($i++)
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            @include('layouts.footers.fefooter');
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