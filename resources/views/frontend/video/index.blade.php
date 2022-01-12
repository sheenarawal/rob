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
                    <div class="col-12">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {!! session('success') !!}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {!! session('error') !!}
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h5>Put your musical talents to the test</h5>
                        </div>
                    </div>
                </div>

                {{-- <div class="top-category section-padding mb-4">

                    @foreach($categories as $category)
                        @if($category->latestVideoCat->count() > 0)
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="main-title">
                                        <div class="btn-group float-right right-action">
                                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i>
                                                    Top Rated
                                                </a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i>
                                                    Viewed
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-fw fa-times-circle"></i>
                                                    Close
                                                </a>
                                            </div>
                                        </div>
                                        <h6>{{ucfirst($category->title)}}</h6>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="owl-carousel owl-carousel-categoryVideo">
                                        @php $i = 1 @endphp
                                        @foreach($category->latestVideoCat as $cate)
                                            @php $video = $cate->video @endphp
                                            @if($video)
                                                <div class="item">
                                                    <div class="">
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
                                                                <div class="time duration_{{$i}}">1:00</div>
                                                            </div>
                                                            <div class="video-card-body">
                                                                <div class="video-title text-uppercase">
                                                                    <a href="#">{{$video->title}}</a>
                                                                </div>
                                                                <div class="video-page text-success">
                                                                    @if(count($video->Category)>0)
                                                                        @foreach($video->Category as $cateData)
                                                                            @if($cateData->CategoryDetail)
                                                                                <a data-placement="top"
                                                                                   data-toggle="tooltip"
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
                                                </div>
                                                @php($i++)
                                            @endif

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-title">
                            <div class="btn-group float-right right-action">
                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @foreach($categories as $category)
                                        <a class="dropdown-item" href="{{route('video.filter',$category->slug)}}">
                                            {{$category->title}}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="btn-group float-right right-action">
                                Short by
                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('video.filter','oldest')}}">
                                        Oldest
                                    </a>
                                    <a class="dropdown-item" href="{{route('video.filter','newest')}}">
                                        Newest
                                    </a>
                                </div>
                            </div>
                            <h6>{{isset($filter)?ucfirst($filter):''}} Videos</h6>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row ">
                            @if($videos && !empty($videos))
                                @php($i = 1)
                                @foreach($videos as $video)
                                    <div class="col-xl-3 col-sm-6 mb-3 align-items-stretch">
                                        <div class="video-card">
                                            <div class="video-card-image">
                                                <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                                <a href="{{route('video.view',$video->slug)}}">
                                                    <video id="myVid" class="img-fluid video_list_item"
                                                           src="{{asset($video->videolink)}}" muted
                                                           onloadedmetadata="get_duration()"></video>
                                                </a>
                                                <div class="time duaration_">{{date('i:s',$video->duration)}}</div>
                                            </div>
                                            <div class="video-card-body">
                                                <div class="video-title text-uppercase">
                                                    <a href="#">{{$video->title}}</a>
                                                </div>
                                                <div class="video-page text-success">
                                                    @if(count($video->Category)>0)
                                                        @foreach($video->Category as $cateData)
                                                            @if($cateData->CategoryDetail)
                                                                <a data-placement="top"
                                                                   data-toggle="tooltip"
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
                                    @php($i++)
                                @endforeach
                            @endif
                        </div>
                        <div class="row justify-content-center mt-md-4">
                            @if($videos)
                            {{ $videos->links('vendor.pagination.account_pager') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

    </div>
@stop

@push('frontend_css')
    <style>
        .video-card-image {
            max-height: 160px;
        }
    </style>
@endpush
@push('frontend_script')

    <script>
        $(document).ready(function (index, element) {
            let video = $(".video_list_item");
            video.each(function () {
                $(this).mouseover(function () {
                    this.play();
                });
                $(this).mouseout(function () {
                    this.pause();
                });
            })
        })

        const objowlcarousel = $('.owl-carousel-categoryVideo');
        if (objowlcarousel.length > 0) {
            objowlcarousel.owlCarousel({
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 4,
                    },
                    1200: {
                        items: 4,
                    },
                },
                loop: false,
                lazyLoad: true,
                autoplay: true,
                margin: 30,
                autoplaySpeed: 1000,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                nav: true,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            });
        }

        function get_duration() {
            $(".video_list_item").each(function (index, element) {
                var value = element.duration;
                if (value) {
                    var duration_min = Math.floor(value / (3600 / 60));
                    var duration_sec = Math.floor(value % 60);
                    var min = (duration_min < 9) ? '0' + duration_min : duration_min;
                    var sec = (duration_sec < 9) ? '0' + duration_sec : duration_sec;
                    var elemtent_get = $('.duaration_' + index).text(min + ':' + sec)
                }
            });

        }
    </script>

@endpush
