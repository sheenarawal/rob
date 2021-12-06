@extends('layouts.app')
@section('content')
@include('layouts.navbars.feheader')
@include('layouts.navbars.fesidebar')
<div id="wrapper">
    <!-- Sidebar -->
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
                        @foreach($videos as $video)
                        <div class="col-xl-3 col-sm-6 mb-3 align-items-stretch">
                            <div class="video-card">
                                <div class="video-card-image">
                                    <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                    <a href="{{route('singlevideo',$video->slug)}}"><video id="myVid" width="100%" height="auto" loop>
                                            <source src="{{Storage::disk('public')->url('videos/'.$video->videolink)}}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video></a>
										<!-- <div class="time">1:00</div>-->
                                </div>
                                <div class="video-card-body">
                                    <div class="video-title text-uppercase">
                                        <a href="#">{{$video->title}}</a>
                                    </div>
                                    <div class="video-page text-success">
                                        Education <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                    </div>
                                    <div class="video-view">
                                        <i class="fas fa-calendar-alt"></i> {{$video->recording_date }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
  
</div>
<!-- /.container-fluid 
@include('layouts.footers.fefooter');
Sticky Footer -->

</div>
<!-- /.content-wrapper -->

</div>

<script>
    document.getElementById("myVid").addEventListener("mouseover", function() {
        this.play();
    });

    document.getElementById("myVid").addEventListener("mouseleave", function() {
        this.pause();
    });
</script>