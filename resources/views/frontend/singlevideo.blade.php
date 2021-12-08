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
                           <a href="{{route('challange.store',$video->id)}}"id="challange" class="btn btn-outline-danger ml-5" onclick="funChallange()" >Challenge </a>
                           
                           <p class="float-right"><i class="fas fa-map-marker-alt text-warning"></i> <b>{{$video->recording_location}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Published on {{$video->created_at}}</p>

                        </div>

                     </div>
                     <!-- 
                     <div class="single-video-author box  p-3 mb-3">
                        <div class="float-right"><button class="btn btn-danger" type="button">Subscribe <strong>1.4M</strong></button> <button class="btn btn btn-outline-danger" type="button"><i class="fas fa-bell"></i></button></div>
                        <img class="img-fluid" src="{{ asset('frontend') }}/img/s4.png" alt="">
                        <p><a href="#"><strong>Osahan Channel</strong></a> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></p>
                     </div> -->
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
                        <!-- Start commentform Area -->
                        <div>
                           <div>
                              @foreach ($video->comments as $comment)
                              <div class="comment">
                                 <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                       <div class="user justify-content-between d-flex">
                                          <div class="thumb">
                                             <!-- <img src="{{asset('storage/user/'.$comment->user->image)}}" alt="{{$comment->user->image}}" width="50px"> -->
                                          </div>
                                          <div class="desc">
                                             <h5><a href="#">{{$comment->user->display_name}}</a></h5>
                                             <p class="date">{{$comment->created_at->format('D, d M Y H:i')}}</p>
                                             <p class="comment">
                                                {{$comment->message}}
                                             </p>
                                          </div>
                                       </div>
                                       <div class="">
                                          <button class="btn-reply btn-primary p-2 text-uppercase" id="reply-btn" onclick="showReplyForm('{{$comment->id}}','{{$comment->user->display_name}}')">reply</button>
                                       </div>
                                    </div>
                                 </div>
                                 @if($comment->replies->count() > 0)
                                 @foreach ($comment->replies as $reply)
                                 <div class="comment-list left-padding">
                                    <div class="single-comment justify-content-between d-flex">
                                       <div class="user justify-content-between d-flex">
                                          <div class="thumb">
                                             <img src="{{asset('storage/user/'.$reply->user->image)}}" alt="{{$reply->user->image}}" width="50px" />
                                          </div>
                                          <div class="desc">
                                             <h5><a href="#">{{$reply->user->display_name}}</a></h5>
                                             <p class="date">{{$reply->created_at->format('D, d M Y H:i')}}</p>
                                             <p class="comment">
                                                {{$reply->message}}
                                             </p>
                                          </div>
                                       </div>
                                       <div class="">
                                          <button class="btn-reply btn-primary p-2 text-uppercase" id="reply-btn" onclick="showReplyForm('{{$comment->id}}','{{$reply->user->display_name}}')">reply</button>
                                       </div>
                                    </div>
                                 </div>

                                 @endforeach
                                 @else
                                 @endif
                                 {{-- When user login show reply fourm --}}
                                 @guest
                                 {{-- Show none --}}
                                 @else
                                 <div class="comment-list left-padding" id="reply-form-{{$comment->id}}" style="display: none">
                                    <div class="single-comment justify-content-between d-flex">
                                       <div class="user justify-content-between d-flex">
                     
                                          <div class="desc">
                                             <h5><a href="#">{{Auth::user()->display_name}}</a></h5>
                                             <p class="date">{{date('D, d M Y H:i')}}</p>
                                             <div class="row flex-row d-flex">
                                                <form action="{{route('reply.store',$comment->id)}}" method="POST">
                                                   @csrf
                                                   <div class="col-lg-12">
                                                      <textarea id="reply-form-{{$comment->id}}-text" cols="60" rows="2" class="form-control mb-10" name="message" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required=""></textarea>
                                                   </div>
                                                   <button type="submit" class="btn-reply btn-primary p-2 m-2 text-uppercase ml-3">Reply</button>
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 @endguest
                              </div>
                              @endforeach
                           </div>
                        </div>
                        </section>
                        <!-- End comment-sec Area -->

                        <!-- Start commentform Area -->
                        <section class="commentform-area pb-120 pt-80 mb-100">
                           @guest
                           <div class="container">
                              <h4>Please Sign in to post comments - <a href="{{route('/')}}">Log in</a> or <a href="{{route('register')}}">Register</a></h4>
                           </div>
                           @else
                           <div class="container">
                              <h5 class="text-uppercase pb-50">Leave a Comment</h5>
                              <div class="row flex-row d-flex">
                                 <div class="col-lg-12">
                                    <form action="{{route('comment.store',$video->id)}}" method="POST">
                                       @csrf
                                       <textarea class="form-control mb-10" name="message" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required=""></textarea>
                                       <button type="submit" class= " mt-2 btn btn-primary mt-20" href="#">Comment</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           @endguest
                           <!-- End commentform Area -->
                           @else
                           <h6 class="text-center">Comment is Disabled !</h6>
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
                                    <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                       <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                       <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                       <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                    </div>
                                 </div>
                                 <h6>Up Next</h6>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <?php $i=0; ?>
                              @foreach($video_list as $list)
                              <div class="video-card video-card-list">
                                 <div class="video-card-image">
                                    <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                    <a href="{{route('singlevideo',$list->slug)}}">
                                       <video class="img-fluid video_list_item" src="{{asset($list->videolink)}}" onloadedmetadata="get_duration()" ></video> </a>
                                    <div class="time duaration_{{$i}}">3:50</div>
                                 </div>
                                 <div class="video-card-body">
                                    <div class="btn-group float-right right-action">
                                       <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right">
                                          <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                          <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                          <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                       </div>
                                    </div>
                                    <div class="video-title">
                                       <a href="{{route('singlevideo',$list->slug)}}">{{$list->title}}</a>
                                    </div>
                                    <div class="video-page text-success">
                                       Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                    </div>
                                    <div class="video-view">
                                       1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
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
         $(".video_list_item").each(function(index, element) {
            var value = element.duration;
            var duration = value / 60;
            var elemtent_get = $('.duaration_'+index).text(duration_format(duration))
            console.log(elemtent_get)


         });

         /*var video_duration = $('#videoid').duration
         alert(video_duration); // or window.alert(video_duration);*/
      }
   </script>
   <script type="text/javascript">
      function showReplyForm(commentId,user) {
         var x = document.getElementById(`reply-form-${commentId}`);
         var input = document.getElementById(`reply-form-${commentId}-text`);
         if (x.style.display === "none") {
            x.style.display = "block";
            input.innerText=`@${user} `;
         } else {
            x.style.display = "none";
         }
      }
   </script>
@endpush

@include('frontend.footer')