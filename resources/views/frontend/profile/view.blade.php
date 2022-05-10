@extends('frontend.header')
@section('frontend_content')

    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.navbars.fesidebar')

        <div id="content-wrapper">
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
                    @php $links = ['facebook_link','twitter_link','google_link'] @endphp
                    @if($profile)
                        @if($profile->facebook_link || $profile->twitter_link || $profile->google_link)
                            <div class="social hidden-xs">
                                Social:
                                @foreach($links as $link)
                                    @if( $profile->$link)&nbsp;
                                    <a class="fb" href="{{$profile->$link}}">{{str_replace('_link','',$link)}}</a>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <div class="single-channel-nav">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="channel-brand" href="#">{{ ucfirst($user->display_name)}}
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
                            <li class="nav-item {{$tag == 'video'?'active':''}}">
                                <a class="nav-link" href="{{route('account.index','video')}}">Videos</a>
                            </li>
                            <li class="nav-item d-none">
                                <a class="nav-link" id="playlist-tab" data-toggle="tab" href="#playlist" role="tab"
                                   aria-controls="playlist" aria-selected="true">Playlist</a>
                            </li>
                            @if($user->id == \Illuminate\Support\Facades\Auth::id())
                                <li class="nav-item {{$tag == 'challenge'?'active':''}}">
                                    <a class="nav-link" id="challenges-tab"
                                       href="{{route('account.index','challenge')}}">Challenges</a>
                                </li>
                            @endif
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
                    <div class="col tab-pane fade {{$tag == 'video'?'show active':''}}" id="video" role="tabpanel"
                         aria-labelledby="video-tab">
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
                            @include('frontend.video.video_load')
                        </div>
                        {{ $videos->links('vendor.pagination.account_pager') }}
                    </div>
                    <div class="col tab-pane fade {{$tag == 'playlist'?'show active':''}}" id="playlist" role="tabpanel"
                         aria-labelledby="playlist-tab">

                        <div class="row">

                        </div>
                    </div>
                    @if($user->id == \Illuminate\Support\Facades\Auth::id())
                        <div class="col tab-pane fade {{$tag == 'challenge'?'show active':''}}" id="challenges"
                             role="tabpanel" aria-labelledby="challenges-tab">

                            <div class="row">
                                <div class="col-md-9 mx-auto">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Video</th>
                                            <th scope="col">Date</th>
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
                                                        <video class="img-fluid challeng_v"
                                                               src="{{asset($challenge->videoDetail->videolink)}}"
                                                               onloadedmetadata="get_duration()"
                                                               style="width: 260px;max-height: 260px"></video>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{\Carbon\Carbon::parse($challenge->created_at)->diffForHumans()}}
                                                </td>
                                                <td>
                                                    @if($challenge->status == 1)
                                                        <span class="badge badge-warning">Pending</span>
                                                    @endif
                                                    @if($challenge->status == 2)
                                                        <span class="badge badge-success">Accepted</span>
                                                    @endif
                                                    @if($challenge->status == 3)
                                                        <span class="badge badge-danger">Reject</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    @if($challenge->status == 1)
                                                        <a href="{{route('challenge.status',[$challenge,2])}}"
                                                           class="btn btn-success">Accept</a>
                                                        <a href="{{route('challenge.status',[$challenge,3])}}"
                                                           class="btn btn-danger">Reject</a>
                                                    @endif

                                                </td>
                                            </tr>
                                            @php($i++)
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 mx-auto">
                                    <hr>
                                    @if($challenges)
                                        {{ $challenges->links('vendor.pagination.account_pager') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col tab-pane fade {{$tag == 'discussion'?'show active':''}}" id="discussion"
                         role="tabpanel" aria-labelledby="discussion-tab">

                        <div class="row">discution
                        </div>
                    </div>
                    <div class="col tab-pane fade {{$tag == 'about'?'show active':''}}" id="about" role="tabpanel"
                         aria-labelledby="about-tab">

                        <div class="row">

                        </div>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->

            <!-- /.content-wrapper -->
        </div>

        @include('frontend.footer');
        </div>

    </div>
@stop

@push('frontend_script')
    <script>
        $(document).ready(function () {
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