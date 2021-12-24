@extends('frontend.header')
@section('frontend_content')

    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.navbars.fesidebar')

        <div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image">
                @if($profile && $profile->cover_photo)
                    <img class="img-fluid" alt="" src="{{asset($profile->cover_photo)}}" style="max-height: 330px">
                @else
                    <img class="img-fluid" alt="" src="{{asset('frontend/img/channel-banner.png')}}">
                @endif
                <div class="channel-profile">
                    @if($profile && $profile->profile_photo)
                    <img class="channel-profile-img" alt="" src="{{asset($profile->profile_photo)}}">
                    @else
                        <img class="channel-profile-img" alt="" src="{{asset('frontend/img/s2.png')}}">
                    @endif
                    <div class="social hidden-xs">
                        Social &nbsp;
                        <a class="fb" href="#">Facebook</a>
                        <a class="tw" href="#">Twitter</a>
                        <a class="gp" href="#">Google</a>
                    </div>
                </div>
            </div>

            <div class="single-channel-nav">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="channel-brand" href="#">{{ ucfirst(\Illuminate\Support\Facades\Auth::user()->display_name)}}
                        <span title="" data-placement="top" data-toggle="tooltip"
                              data-original-title="Verified"><i class="fas fa-check-circle text-success"></i>
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav mr-auto" id="myTab" role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active" id="video-tab" data-toggle="tab" href="#video" role="tab"
                                   aria-controls="video" aria-selected="true">Videos</a>
                            </li>
                            <li class="nav-item d-none">
                                <a class="nav-link" id="playlist-tab" data-toggle="tab" href="#playlist" role="tab"
                                   aria-controls="playlist" aria-selected="true">Playlist</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="challenges-tab" data-toggle="tab" href="#challenges" role="tab"
                                   aria-controls="challenges" aria-selected="true">Challenges</a>
                            </li>
                            <li class="nav-item d-none">
                                <a class="nav-link" id="discussion-tab" data-toggle="tab" href="#discussion" role="tab"
                                   aria-controls="discussion" aria-selected="true">Discussion</a>
                            </li>
                            <li class="nav-item d-none">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#about" role="tab"
                                   aria-controls="about" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item dropdown d-none">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Donate
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0  d-none">
                            <input class="form-control form-control-sm mr-sm-1" type="search" placeholder="Search"
                                   aria-label="Search">
                            <button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit"><i
                                        class="fas fa-search"></i></button> &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-outline-danger btn-sm" type="button">Subscribe <strong>1.4M</strong>
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
            <div class="container-fluid">
                <div class="video-block section-padding tab-content" id="myTabContent">
                    <div class="col tab-pane fade show active" id="video" role="tabpanel" aria-labelledby="video-tab">
                        <div class="row">
                            <div class="col-md-12 d-none">
                                <div class="main-title">
                                    <div class="btn-group float-right right-action">
                                        <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp;
                                                Top Rated</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                                Viewed</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>
                                                &nbsp; Close</a>
                                        </div>
                                    </div>
                                    <h6>Videos</h6>
                                </div>
                            </div>
                            @php $i = 0; @endphp
                            @foreach($videos as $video)
                                <div class="col-xl-3 col-sm-6 mb-3">
                                    <div class="video-card">
                                        <div class="video-card-image">
                                            <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                            <a href="{{route('video.view',$video->slug)}}">
                                                <video class="img-fluid video_list_item"
                                                       src="{{asset($video->videolink)}}"
                                                       onloadedmetadata="get_duration()"></video>
                                            </a>
                                            <div class="time duaration_{{$i}}">00:00</div>
                                        </div>
                                        <div class="video-card-body">
                                            <div class="video-title">
                                                <a href="{{route('video.view',$video->slug)}}">{{$video->title}}</a>
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
                                @php($i++)
                            @endforeach
                        </div>
                        {{ $videos->links('vendor.pagination.account_pager') }}
                    </div>
                    <div class="col tab-pane fade" id="playlist" role="tabpanel" aria-labelledby="playlist-tab">

                        <div class="row">

                        </div>
                    </div>
                    <div class="col tab-pane fade" id="challenges" role="tabpanel" aria-labelledby="challenges-tab">

                        <div class="row">
                            <div class="col-md-9 mx-auto">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Video</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($challenges as $challenge)
                                        <tr>
                                            <th scope="row">{{$i}}</th>
                                            <td>{{$challenge->userDetail?$challenge->userDetail->display_name:''}}</td>
                                            <td>
                                                @if($challenge->videoDetail)
                                                    <video class="" src="{{asset($challenge->videoDetail->videolink)}}"
                                                           onloadedmetadata="get_duration()" style="max-width: 260px"></video>
                                                @endif
                                            </td>
                                            <td>
                                                @if($challenge->status == 1)
                                                    <span class="badge badge-warning">Pending</span>
                                                @endif
                                                @if($challenge->status == 2)
                                                    <span class="badge badge-warning">Accepted</span>
                                                @endif
                                                @if($challenge->status == 3)
                                                    <span class="badge badge-warning">Reject</span>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{route('challenge.status',[$challenge,2])}}" class="btn btn-success">Accept</a>
                                                <a href="{{route('challenge.status',[$challenge,3])}}" class="btn btn-danger">Reject</a>
                                            </td>
                                        </tr>
                                        @php($i++)
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col tab-pane fade" id="discussion" role="tabpanel" aria-labelledby="discussion-tab">

                        <div class="row">discution
                        </div>
                    </div>
                    <div class="col tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">

                        <div class="row">

                        </div>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->

            @include('layouts.footers.fefooter');
            <!-- /.content-wrapper -->
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