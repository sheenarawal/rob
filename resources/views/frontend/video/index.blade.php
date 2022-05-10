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
                            @php($setting = getSiteSetting())
                            <h5>{!! isset($setting['home_tag_line'])?$setting['home_tag_line']:'' !!}</h5>
                        </div>
                    </div>
                </div>

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
                        <div class="row video_outer">
                            @include('frontend.video.video_load')
                        </div>
                        <div class="row">
                            <div class="col ajax-load"></div>
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

    <script type="text/javascript">
        var page = 1;
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });

        function loadMoreData(page) {
            var ajax_load = $('.ajax-load');
            $.ajax({
                url: '?page=' + page,
                type: "get",
                beforeSend: function () {
                    ajax_load.show();
                }
            })
                .done(function (data) {
                    if (data.html == " ") {
                        ajax_load.html("No more records found");
                        return;
                    }
                    ajax_load.hide();
                    $(".video_outer").append(data.html);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('server not responding...');
                });
        }
    </script>

@endpush
