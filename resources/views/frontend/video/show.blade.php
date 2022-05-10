@extends('frontend.header')
@section('frontend_content')

    <div id="wrapper">
        <!-- Sidebar -->
        <!-- Component added for sidebar -->
    @include('layouts.navbars.fesidebar')
    <!-- Component added for sidebar

        Component end for sidebar -->
        <div id="content-wrapper">
            <div class="container-fluid pb-0">
                <div class="video-block section-padding">

                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="single-video-left">
                                <div class="single-video ">
                                    <?php //echo $uplodedPath = Storage::get($video->videolink);?>
                                    <video width="100%" height="315" controls controlsList="nodownload" autoplay muted playsInline>
                                        <source src="{{asset($video->videolink)}}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                            <div class="single-video-title box user-dropdown-link mb-3">
                                <h2><a href="#">{{$video->title}}</a></h2>
                                <div class="float-right pt-3">
                                    @guest
                                        <h6>Please Sign in to Rival - <a href="{{route('login')}}">Log
                                                in</a> or <a href="{{route('signup')}}">Register</a></h6>
                                    @else
                                        @if($video->userid != \Illuminate\Support\Facades\Auth::id())
                                            @if($challenge)
                                                @php $status = \App\Models\Challenge::status($challenge->status) @endphp
                                                @if($challenge->status == 2)
                                                    @if(\Carbon\Carbon::parse($challenge->updated_at)->diffInDays(\Carbon\Carbon::today()) < 7)
                                                        <p class="d-flex mb-0 mr-md-2 float-md-left">
                                                            <span class="pt-2 mr-3 font-weight-bold">
                                                                {{7 - \Carbon\Carbon::parse($challenge->updated_at)->diffInDays(\Carbon\Carbon::today())}}
                                                            days Left</span>
                                                            <a class="btn btn-outline-primary btn-sm text-white"
                                                               href="{{route('challenge.video.store',base64_encode($video->slug))}}">
                                                                <i class="fas fa-fw fa-cloud-upload-alt"></i>
                                                                <span>Upload Video</span>
                                                            </a>

                                                        </p>
                                                    @else
                                                        <p class="mr-md-2 float-md-left">Your Time is over to upload
                                                            Rival video</p>
                                                    @endif
                                                @else
                                                    <p class="mr-md-2 float-md-left">
                                                        <b>
                                                            {{$challenge->status == 1?'Your rival is pending. Waiting for rival accept!':'Your rival is '.$status}}
                                                        </b>
                                                    </p>
                                                @endif
                                            @else
                                                <a href="{{route('challenge.create',$video->slug)}}" id="challange"
                                                   class="btn btn-outline-danger ml-5"
                                                   onclick="funChallange()">Rival </a>
                                            @endif
                                            <a class="btn btn-{{get_subscribe($video->userid) == '1'?'success':'secondary'}} subscribe float-right mt-md-0 mt-2"
                                               href="#">Subscribe</a>
                                        @endif
                                    @endguest

                                </div>
                                <img class="img-fluid float-left mt-2 mr-2" src="{{profile_image($video->user['id'])}}"
                                     alt="">
                                <p class="mb-0">
                                    <a class="text-capitalize"
                                       href="{{route('account.show',['video',base64_encode($video->user['id']),$video->user['display_name']])}}">
                                        <strong>{{$video->user['display_name']}}</strong>
                                    </a>
                                    <span title="" data-placement="top" data-toggle="tooltip"
                                          data-original-title="Verified"><i
                                                class="fas fa-check-circle text-success"></i></span></p>
                                <small>Published
                                    on {{\Carbon\Carbon::parse($video->recording_date)->diffForHumans()}}</small>
                                <div class="wapper mt-3">
                                    <button class="like__btn" data-id="{{$video->id}}">
                                        <span id="icon"
                                              class="{{video_like($user_Details->id,$video->id)?'active':''}}">
                                            <i class="far fa-thumbs-up"></i></span>
                                        <span id="count">{{$video->likes->count()}}</span>
                                    </button>
                                    <button class="dislike__btn ml-2" data-id="{{$video->id}}">
                                        <span id="icon"
                                              class="{{video_dislike($user_Details->id,$video->id)?'active':''}}">
                                            <i class="far fa-thumbs-down"></i></span>
                                        <span id="count">{{$video->dislikes->count()}}</span>
                                    </button>
                                    <p class="float-right">
                                        <i class="fas fa-map-marker-alt text-warning"> </i>
                                        <b>{{$video->recording_location}}</b>
                                    </p>
                                    <div class="sharethis-inline-share-buttons"></div>

                                </div>
                            </div>

                            @if($video->latest_c_Videos->count() > 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-title">
                                            <h6>Rival Videos</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="owl-carousel owl-carousel-challenge">
                                        @php($i = 0)
                                        @foreach($challenge_videos as $list)
                                            @if($list)
                                                <div class="item">
                                                        <div class="mb-3 align-items-stretch">
                                                            <div class="video-card">
                                                                <div class="video-card-image">
                                                                    <a class="play-icon" href="#">
                                                                        <i class="fas fa-play-circle"></i>
                                                                    </a>
                                                                    <a href="{{route('video.view',$list->slug)}}"
                                                                       target="_blank">
                                                                        <video class="img-fluid video_list_item"
                                                                               style="max-height: 150px" src="{{asset($list->videolink)}}"
                                                                               onloadedmetadata="get_duration()" playsInline></video>
                                                                    </a>
                                                                    <div class="time duaration_{{$i}}">0:00</div>
                                                                </div>
                                                                <div class="video-card-body">
                                                                    <div class="video-title">
                                                                        <a href="{{route('video.view',$list->slug)}}"
                                                                           target="_blank">
                                                                            {{$list->title}}
                                                                        </a>
                                                                    </div>
                                                                    <div class="video-page text-success">
                                                                        @if(count($video->Category)>0)
                                                                            @foreach($video->Category as $cateData)
                                                                                @if($cateData->CategoryDetail)
                                                                                    <a href="{{route('video.category',$cateData->CategoryDetail->slug)}}">
                                                                                        {{ucfirst($cateData->CategoryDetail->title)}}
                                                                                        <i class="fas fa-check-circle text-success"></i>
                                                                                    </a>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                    <div class="video-view pb-4">
                                                                        <div class="float-left mt-2">
                                                                            <i class="fas fa-calendar-alt"></i> {{\Carbon\Carbon::parse($video->recording_date)->diffForHumans() }}
                                                                        </div>
                                                                        <div class="float-right">
                                                                            <button class="like__btn"
                                                                                    data-id="{{$list->id}}">
                                                                    <span id="icon"
                                                                          class="{{video_like(\Illuminate\Support\Facades\Auth::id(),$list->id)?'active':''}}">
                                                                        <i class="far fa-thumbs-up"></i>
                                                                    </span>
                                                                                <span id="count">{{$list->likes->count()}}</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endif
                                            @php ($i++)
                                        @endforeach

                                        </div>

                                    </div>
                                </div>
                            @endif
                            <div class="single-video-info-content box mb-3 text-dark">
                                <p>{{$video->desc}}</p>
                                <p>Language : {{$video->video_language}} </p>
                                <p class="tags mb-0">
                                    @if(count($video->tags)>0)
                                        @foreach($video->tags as $tag)
                                            <span><a href="#">{{$tag->title}}</a></span>
                                        @endforeach
                                    @endif
                                </p>
                                <br>
                                @if($video->is_comment_enable_status==1)

                                    <div class="box mb-3 single-video-comment-tabs">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="retro-comments-tab" data-toggle="tab"
                                                   href="#retro-comments" role="tab" aria-controls="retro"
                                                   aria-selected="false">video Comments</a>
                                            </li>
                                            <li class="nav-item d-none">
                                                <a class="nav-link" id="disqus-comments-tab" data-toggle="tab"
                                                   href="#disqus-comments" role="tab" aria-controls="disqus"
                                                   aria-selected="true">Disqus Comments</a>
                                            </li>
                                            <li class="nav-item d-none">
                                                <a class="nav-link" id="facebook-comments-tab" data-toggle="tab"
                                                   href="#facebook-comments" role="tab" aria-controls="facebook"
                                                   aria-selected="false">Facebook Comments</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade" id="disqus-comments" role="tabpanel"
                                                 aria-labelledby="disqus-comments-tab">
                                                <h1>Soon...</h1>
                                            </div>
                                            <div class="tab-pane fade" id="facebook-comments" role="tabpanel"
                                                 aria-labelledby="facebook-comments-tab">
                                                <h1>Soon...</h1>
                                            </div>
                                            <div class="tab-pane fade show active" id="retro-comments" role="tabpanel"
                                                 aria-labelledby="retro-comments-tab">

                                                @guest()
                                                    <div class="reviews-members pt-0">
                                                        <div class="media text-center">
                                                        <span class="h5 px-2 mx-auto">Please login first
                                                            <a class="btn btn-link text-success" href="#">Login</a> Or
                                                            <a class="btn btn-link text-success" href="#">SignUp</a>
                                                        </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="reviews-members pt-0">
                                                        <div class="media">
                                                            <a href="#">
                                                                <img class="mr-3"
                                                                     src="{{profile_image(\Illuminate\Support\Facades\Auth::id())}}"
                                                                     alt="Generic placeholder image"></a>
                                                            <div class="media-body">
                                                                <form action="{{route('video.comment.store',$video->id)}}"
                                                                      method="POST">
                                                                    <div class="form-members-body">
                                                                        @csrf
                                                                        <textarea rows="1" name="comment"
                                                                                  placeholder="Add a public comment..."
                                                                                  class="form-control"
                                                                                  required></textarea>

                                                                    </div>
                                                                    <div class="form-members-footer text-right mt-2">
                                                                        <b class="float-left">{{count($video->comments)}}
                                                                            Comments
                                                                        </b>
                                                                        <button class="btn btn-outline-danger btn-sm d-none"
                                                                                type="button">CANCEL
                                                                        </button>
                                                                        <button class="btn btn-success btn-sm"
                                                                                type="submit">COMMENT
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endguest
                                                @foreach ($video->comments as $comment)
                                                    <div class="reviews-members">
                                                        <div class="media">
                                                            <a href="#">
                                                                @if($comment->user && $comment->user->profileData)
                                                                    <img class="mr-3"
                                                                         src="{{profile_image($comment->user->id)}}"
                                                                         alt="Generic placeholder image">
                                                                @else
                                                                    <img class="mr-3"
                                                                         src="{{asset('frontend/img/s2.png')}}"
                                                                         alt="Generic placeholder image">
                                                                @endif
                                                            </a>
                                                            <div class="media-body">
                                                                <div class="reviews-members-header">
                                                                    <h6 class="mb-1">
                                                                        <a class="text-black" href="#">
                                                                            {{$comment->user->display_name}}
                                                                        </a>
                                                                        <small class="text-gray">{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</small>
                                                                    </h6>
                                                                </div>
                                                                <div class="reviews-members-body">
                                                                    <p> {!! $comment->comment !!}</p>
                                                                </div>
                                                                <div class="reviews-members-footer">

                                                                    <a class="btn btn-link text-success" role="button"
                                                                       data-toggle="collapse"
                                                                       href="#reply_{{$comment->id}}"
                                                                       aria-controls="collapseExample"
                                                                       aria-expanded="false">reply</a>

                                                                </div>
                                                                <div id="reply_{{$comment->id}}" class="collapse">
                                                                    @guest()
                                                                        <div class="reviews-members pt-0 mt-4">
                                                                            <div class="media text-center">
                                                                            <span class="h5 px-2 mx-auto">Please login first
                                                                                <a class="btn btn-link text-success"
                                                                                   href="#">Login</a> Or
                                                                                <a class="btn btn-link text-success"
                                                                                   href="#">SignUp</a>
                                                                            </span>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="reviews-members pt-0 mt-4">
                                                                            <div class="media">
                                                                                <a href="#">
                                                                                    <img class="mr-3"
                                                                                         src="{{asset('frontend/img/s1.png')}}"
                                                                                         alt="Generic placeholder image"></a>
                                                                                <div class="media-body">
                                                                                    <form action="{{route('video.reply.store',$comment->id)}}"
                                                                                          method="POST">
                                                                                        <div class="form-members-body">
                                                                                            @csrf
                                                                                            <textarea rows="1"
                                                                                                      name="comment"
                                                                                                      placeholder="Add a public reply..."
                                                                                                      class="form-control"
                                                                                                      required></textarea>
                                                                                        </div>
                                                                                        <div class="form-members-footer text-right mt-2">
                                                                                            <b class="float-left">{{$comment->replies->count()}}
                                                                                                reply
                                                                                            </b>
                                                                                            <button class="btn btn-outline-danger btn-sm d-none"
                                                                                                    type="button">CANCEL
                                                                                            </button>
                                                                                            <button class="btn btn-success btn-sm"
                                                                                                    type="submit">REPLY
                                                                                            </button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endguest
                                                                    @if($comment->replies->count() > 0)
                                                                        @foreach ($comment->replies as $reply)
                                                                            <div class="reviews-members">
                                                                                <div class="media">
                                                                                    <a href="#">
                                                                                        <img class="mr-3"
                                                                                             src="{{asset('frontend/img/s2.png')}}"
                                                                                             alt="Generic placeholder image"></a>
                                                                                    <div class="media-body">
                                                                                        <div class="reviews-members-header">
                                                                                            <h6 class="mb-1"><a
                                                                                                        class="text-black"
                                                                                                        href="#">{{$reply->user->display_name}}</a>
                                                                                                <small class="text-gray">{{\Carbon\Carbon::parse($reply->user->created_at)->diffForHumans()}}</small>
                                                                                            </h6>
                                                                                        </div>
                                                                                        <div class="reviews-members-body">
                                                                                            <p> {!! $reply->message !!}</p>
                                                                                        </div>
                                                                                        <div class="reviews-members-footer">

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start commentform Area -->
                                    <section class="commentform-area pb-120 pt-80 mb-100 d-none">
                                        @guest
                                            <div class="container">
                                                <h4>Please Sign in to post comments - <a href="{{route('login')}}">Log
                                                        in</a> or <a href="{{route('signup')}}">Register</a></h4>
                                            </div>
                                        @else
                                            <div class="container">
                                                <h5 class="text-uppercase pb-50">Leave a Comment</h5>
                                                <div class="row flex-row d-flex">
                                                    <div class="col-lg-12">
                                                        <form action="{{route('video.comment.store',$video->id)}}"
                                                              method="POST">
                                                            @csrf
                                                            <textarea class="form-control mb-10" name="message"
                                                                      placeholder="Message"
                                                                      onfocus="this.placeholder = ''"
                                                                      onblur="this.placeholder = 'Message'"
                                                                      required=""></textarea>
                                                            <button type="submit" class=" mt-2 btn btn-primary mt-20"
                                                                    href="#">Comment
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    @endguest
                                    <!-- End commentform Area -->
                                    </section>
                                    <!-- End comment-sec Area -->
                                @else
                                    <h6 class="text-center">Comment is Disabled !</h6>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-video-right">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-title">
                                            <h6>Related Videos</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        @if($video->Category->count() > 0)
                                            @php($i = 0)
                                            @foreach(videos_by_Cat(false,$video->Category) as $list)
                                                @if($video->id != $list->id)
                                                    <div class="video-card video-card-list">
                                                        <div class="video-card-image">
                                                            <a class="play-icon" href="{{route('video.view',$list->slug)}}">
                                                                <i class="fas fa-play-circle"></i>
                                                            </a>
                                                            <a href="{{route('video.view',$list->slug)}}">
                                                                <video class="img-fluid video_list_item" playsInline
                                                                       src="{{asset($list->videolink)}}" loop muted
                                                                       onloadedmetadata="get_duration()"></video>
                                                            </a>
                                                            <div class="time duaration_{{$i}}">0:00</div>
                                                        </div>
                                                        <div class="video-card-body">
                                                            <div class="video-title">
                                                                <a href="{{route('video.view',$list->slug)}}">{{$list->title}}</a>
                                                            </div>
                                                            <div class="video-page text-success">
                                                                @if(count($video->Category)>0)
                                                                    @foreach($list->Category as $cateData)
                                                                        @if($cateData->CategoryDetail)
                                                                            <a href="{{route('video.category',$cateData->CategoryDetail->slug)}}">
                                                                                {{ucfirst($cateData->CategoryDetail->title)}}
                                                                                <i class="fas fa-check-circle text-success"></i>
                                                                            </a>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div class="video-view">
                                                                <i class="fas fa-calendar-alt"></i> {{\Carbon\Carbon::parse($list->recording_date)->diffForHumans() }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @php ($i++)
                                            @endforeach
                                        @endif
                                        <hr>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->

            @include('frontend.footer')
        </div>
        <!-- /.content-wrapper -->
    </div>
@stop
@push('frontend_css')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .like__btn, .dislike__btn {
            margin-top: 2px;
            background: none;
            font-size: 18px;
            font-family: "Open Sans", sans-serif;
            color: #000000;
            outline: none;
            border: none;
            cursor: pointer;

        }

        .like__btn #icon:hover, .dislike__btn #icon:hover, .like__btn #icon.active, .dislike__btn #icon.active {
            color: #07bf67;

        }

        .like__btn:focus {
            outline: 0;
        }

        .st-last {
            display: none !important;
        }

        #st-1 .st-btn > img {
            top: 0 !important;
            vertical-align: middle !important;
        }
    </style>
@endpush
@push('frontend_script')

    <script>
        const objowlcarousel = $('.owl-carousel-challenge');
        if (objowlcarousel.length > 0) {
            objowlcarousel.owlCarousel({
                loop: false,
                margin: 15,
                nav: true,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 3,
                    },
                    1000: {
                        items: 4,
                    },
                },
            });
        }

        function funChallange() {
            if (chcount == 0) {
                if (confirm('Are you sure you want to Challenge?')) {
                    document.getElementById("challange").classList.remove('btn-outline-danger');
                    document.getElementById("challange").classList.add('btn-danger');
                    document.getElementById("challange").classList.add('active');
                    document.getElementById("challange").innerText = "Rival Request Sent";
                    chcount = 1;

                } else {

                }


            }
        }

        const duration_format = (num, decimals) => num.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        });
        $(document).on('click', '.like__btn', function (e) {
            var data, id;
            id = $(this).data('id')
            if (id) {
                data = runAjax('like', id)
                $(this).find('#count').text(data.like_count);
                $(this).next('.dislike__btn').find('#count').text(data.dislike_count);
                $(this).find('#icon').addClass(data.class);
                $(this).next('.dislike__btn').find('#icon').removeClass('active');
            }
        });
        $(document).on('click', '.subscribe', function (e) {
            var result, btn;
            btn = $(this);
            $.ajax({
                url: "{{route('subscribe.store')}}",
                data: {id: '{{base64_encode($video->userid)}}', _token: '{{csrf_token()}}'},
                type: 'POST',
                async: false,
                success: function (data) {
                    result = JSON.parse(data);
                    if (result.status == 1) {
                        btn.removeClass('btn-secondary').addClass('btn-success')
                    } else {
                        btn.addClass('btn-secondary').removeClass('btn-success')
                    }
                    console.log(result);
                    console.log(result.status);
                }
            });
        });
        $(document).on('click', '.dislike__btn', function (e) {
            var data, id;
            id = $(this).data('id')
            if (id) {
                data = runAjax('dislike', id)
                $(this).find('#count').text(data.dislike_count);
                $(this).prev('.like__btn').find('#count').text(data.like_count);
                $(this).find('#icon').addClass(data.class);
                $(this).prev('.like__btn').find('#icon').removeClass('active');
            }
        });

        function runAjax(type, id) {
            var result;
            $.ajax({
                url: (type == 'like') ? "{{route('video.like.store')}}" : "{{route('video.dislike.store')}}",
                data: {id: id, _token: '{{csrf_token()}}'},
                type: 'POST',
                async: false,
                success: function (data) {
                    result = JSON.parse(data);
                }
            });
            return result;
        }

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
    <script type="text/javascript">
        function showReplyForm(commentId, user) {
            var x = document.getElementById(`reply-form-${commentId}`);
            var input = document.getElementById(`reply-form-${commentId}-text`);
            if (x.style.display === "none") {
                x.style.display = "block";
                input.innerText = `@${user} `;
            } else {
                x.style.display = "none";
            }
        }
    </script>
@endpush
