@extends('frontend.header')
@section('frontend_content')

    <div id="container">
        <!-- Sidebar -->
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
                                    <video width="100%" height="315" controls controlsList="nodownload" autoplay muted>
                                        <source src="{{asset($video->videolink)}}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                            <div class="single-video-title box mb-3">
                                <h2><a href="#">{{$video->title}}</a></h2>
                                <div class="wapper">

                                    <button class="like__btn">
                                        <span id="icon"> <i class="far fa-thumbs-up"></i></span>
                                        <span id="count">0</span>
                                    </button>
                                    <a href="{{route('challange.store',$video->id)}}" id="challange"
                                       class="btn btn-outline-danger ml-5" onclick="funChallange()">Challenge </a>

                                    <p class="float-right"><i class="fas fa-map-marker-alt text-warning"> </i>
                                        <b>{{$video->recording_location}}</b> Published on {{$video->created_at}}</p>
                                </div>
                            </div>
                            <div class="single-video-info-content box mb-3 text-dark">
                                <p><b>{{$video->user['display_name']}}</b></p>
                                <p>{{$video->desc}}</p>
                                <p>Language : {{$video->video_language}} </p>
                                <p class="tags mb-0">
                                    <span><a href="#">Uncharted 4</a></span>
                                    <span><a href="#">Playstation 4</a></span>
                                    <span><a href="#">Gameplay</a></span>
                                    <span><a href="#">1080P</a></span>
                                    <span><a href="#">ps4Share</a></span>
                                    <span><a href="#">+ 6</a></span>
                                </p>
                                <br>
                            @if($video->is_comment_enable_status==1)


                                <div class="box mb-3 single-video-comment-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="retro-comments-tab" data-toggle="tab"
                                               href="#retro-comments" role="tab" aria-controls="retro"
                                               aria-selected="false">vidoe Comments</a>
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
                                                            <img class="mr-3" src="{{asset('frontend/img/s1.png')}}"
                                                                         alt="Generic placeholder image"></a>
                                                        <div class="media-body">
                                                            <form action="{{route('comment.store',$video->id)}}"
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
                                                        <a href="#"><img class="mr-3"
                                                                         src="{{asset('frontend/img/s2.png')}}"
                                                                         alt="Generic placeholder image"></a>
                                                        <div class="media-body">
                                                            <div class="reviews-members-header">
                                                                <h6 class="mb-1"><a class="text-black"
                                                                                    href="#">{{$comment->user->display_name}}</a>
                                                                    <small class="text-gray">{{\Carbon\Carbon::parse($comment->user->created_at)->diffForHumans()}}</small>
                                                                </h6>
                                                            </div>
                                                            <div class="reviews-members-body">
                                                                <p> {!! $comment->message !!}</p>
                                                            </div>
                                                            <div class="reviews-members-footer">
                                                                <a class="total-like mr-2" href="#">
                                                                    <i class="fas fa-thumbs-up"></i> 123</a>
                                                                <a class="total-like" href="#">
                                                                    <i class="fas fa-thumbs-down"></i> 02</a>
                                                                <a class="btn btn-link text-success" role="button"
                                                                   data-toggle="collapse" href="#reply_{{$comment->id}}"
                                                                   aria-controls="collapseExample"
                                                                   aria-expanded="false" >reply</a>

                                                            </div>
                                                            <div id="reply_{{$comment->id}}" class="collapse">
                                                                <div class="reviews-members pt-0 mt-4">
                                                                    <div class="media">
                                                                        <a href="#">
                                                                            <img class="mr-3"
                                                                                 src="{{asset('frontend/img/s1.png')}}"
                                                                                 alt="Generic placeholder image"></a>
                                                                        <div class="media-body">
                                                                            <form action="{{route('reply.store',$comment->id)}}"
                                                                                  method="POST">
                                                                                <div class="form-members-body">
                                                                                    @csrf
                                                                                    <textarea rows="1" name="comment"
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
                                                                @if($comment->replies->count() > 0)
                                                                    @foreach ($comment->replies as $reply)
                                                                        <div class="reviews-members">
                                                                            <div class="media">
                                                                                <a href="#">
                                                                                    <img class="mr-3" src="{{asset('frontend/img/s2.png')}}"
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
                                                                                        <a class="total-like mr-2" href="#">
                                                                                            <i class="fas fa-thumbs-up"></i>
                                                                                            123
                                                                                        </a>
                                                                                        <a class="total-like" href="#">
                                                                                            <i class="fas fa-thumbs-down"></i>
                                                                                            02
                                                                                        </a>
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
                                            <h4>Please Sign in to post comments - <a href="{{route('/')}}">Log
                                                    in</a> or <a href="{{route('register')}}">Register</a></h4>
                                        </div>
                                    @else
                                        <div class="container">
                                            <h5 class="text-uppercase pb-50">Leave a Comment</h5>
                                            <div class="row flex-row d-flex">
                                                <div class="col-lg-12">
                                                    <form action="{{route('comment.store',$video->id)}}"
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
                                    @else
                                        <h6 class="text-center">Comment is Disabled !</h6>
                                </section>
                                <!-- End comment-sec Area -->
                            @endif

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-video-right">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- <div class="adblock">
                                        <div class="img">
                                           Google AdSense<br>
                                           336 x 280
                                        </div>
                                     </div> -->
                                        <div class="main-title">
                                            <div class="btn-group float-right right-action">
                                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i>
                                                        &nbsp; Top Rated</a>
                                                    <a class="dropdown-item" href="#"><i
                                                                class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                    <a class="dropdown-item" href="#"><i
                                                                class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                                </div>
                                            </div>
                                            <h6>Up Next</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <?php $i = 0; ?>
                                        @foreach($video_list as $list)
                                            <div class="video-card video-card-list">
                                                <div class="video-card-image">
                                                    <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                                    <a href="{{route('singlevideo',$list->slug)}}">
                                                        <video class="img-fluid video_list_item"
                                                               src="{{asset($list->videolink)}}"
                                                               onloadedmetadata="get_duration()"></video>
                                                    </a>
                                                    <div class="time duaration_{{$i}}">3:50</div>
                                                </div>
                                                <div class="video-card-body">
                                                    <div class="btn-group float-right right-action">
                                                        <a href="#" class="right-action-link text-gray"
                                                           data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#"><i
                                                                        class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                        class="fas fa-fw fa-signal"></i> &nbsp;
                                                                Viewed</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                        class="fas fa-fw fa-times-circle"></i> &nbsp;
                                                                Close</a>
                                                        </div>
                                                    </div>
                                                    <div class="video-title">
                                                        <a href="{{route('singlevideo',$list->slug)}}">{{$list->title}}</a>
                                                    </div>
                                                    <div class="video-page text-success">
                                                        Education <a title="" data-placement="top" data-toggle="tooltip"
                                                                     href="#" data-original-title="Verified"><i
                                                                    class="fas fa-check-circle text-success"></i></a>
                                                    </div>
                                                    <div class="video-view">
                                                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months
                                                        ago
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $i++; ?>
                                        @endforeach
                                        <div class="adblock mt-0">
                                            <div class="img">
                                                Google AdSense<br>
                                                336 x 280
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
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

        .like__btn {
            margin-top: 2px;
            background: none;
            font-size: 18px;
            font-family: "Open Sans", sans-serif;
            color: #000000;
            outline: none;
            border: none;
            cursor: pointer;

        }

        .like__btn #icon:hover {
            color: #07bf67;

        }

        .like__btn:focus {
            outline: 0;
        }
    </style>
@endpush
@push('frontend_script')

    <script>
        const likeBtn = document.querySelector(".like__btn");
        let likeIcon = document.querySelector("#icon"),
            count = document.querySelector("#count");

        let clicked = false;


        likeBtn.addEventListener("click", () => {
            if (!clicked) {
                clicked = true;
                likeIcon.innerHTML = `<i class="fas fa-thumbs-up"></i> Flower `;
                count.textContent++;
            } else {
                clicked = false;
                likeIcon.innerHTML = `<i class="far fa-thumbs-up"></i> Flower `;
                count.textContent--;
            }
        });

        var chcount = 0;

        function funChallange() {
            if (chcount == 0) {
                if (confirm('Are you sure you want to Challenge?')) {
                    document.getElementById("challange").classList.remove('btn-outline-danger');
                    document.getElementById("challange").classList.add('btn-danger');
                    document.getElementById("challange").classList.add('active');
                    document.getElementById("challange").innerText = "Challenge Request Sent";
                    chcount = 1;

                } else {

                }


            }
        }

        const duration_format = (num, decimals) => num.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        });

        function get_duration() {
            $(".video_list_item").each(function (index, element) {
                var value = element.duration;
                var duration = value / 60;
                var elemtent_get = $('.duaration_' + index).text(duration_format(duration))
                console.log(elemtent_get)


            });

            /*var video_duration = $('#videoid').duration
            alert(video_duration); // or window.alert(video_duration);*/
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

@include('frontend.footer')