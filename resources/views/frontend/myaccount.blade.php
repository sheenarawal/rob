@extends('layouts.app')
@include('layouts.navbars.feheader')
      <div id="wrapper">
         <!-- Sidebar -->
      <!-- Component added for sidebar -->
      @include('layouts.navbars.fesidebar')
      <!-- Component end for sidebar -->
         <div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="row">
                 <!-- <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-primary o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-users"></i>
                           </div>
                           <div class="mr-5"><b>26</b> Channels</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>-->
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-warning o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-video"></i>
                           </div>
                           <div class="mr-5"><b>{{count($videos)}}</b> Videos</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{url('/allvideos')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                 <!-- <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-success o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-list-alt"></i>
                           </div>
                           <div class="mr-5"><b>123</b> Categories</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-danger o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-cloud-upload-alt"></i>
                           </div>
                           <div class="mr-5"><b>13</b> New Videos</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>-->
               </div>
               <hr>
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
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
                           
                        </div>
                     </div>
                  </div>
                  <div class="row">
                  <div class="col">
                  <h6>My Videos</h6>
                  </div>
                  </div>
                  <div class="row">
                  
                  @foreach($videos as $video)
                     <div class="col-xl-3 col-sm-6 mb-3">
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
                             <!-- <div class="video-page text-success">
                                 Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>-->
                              <div class="video-view">
                              <i class="fas fa-calendar-alt"></i> {{$video->recording_date }}
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
               <hr class="mt-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
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
                           <h6>My Challanges</h6>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><{{ asset('frontend') }}/img/ class="{{ asset('frontend') }}/img/-fluid" src="{{ asset('frontend') }}/img//s1.png" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">Challange Name</a>
                              </div>
                              <div class="channels-view">
                                 382,323 subscribers
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><{{ asset('frontend') }}/img/ class="{{ asset('frontend') }}/img/-fluid" src="{{ asset('frontend') }}/img//s2.png" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">Challange Name</a>
                              </div>
                              <div class="channels-view">
                                 382,323 subscribers
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><{{ asset('frontend') }}/img/ class="{{ asset('frontend') }}/img/-fluid" src="{{ asset('frontend') }}/img//s3.png" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-secondary btn-sm">Subscribed <strong>1.4M</strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">Challange Name <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle"></i></span></a>
                              </div>
                              <div class="channels-view">
                                 382,323 subscribers
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><{{ asset('frontend') }}/img/ class="{{ asset('frontend') }}/img/-fluid" src="{{ asset('frontend') }}/img//s6.png" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">Challange Name</a>
                              </div>
                              <div class="channels-view">
                                 382,323 subscribers
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><{{ asset('frontend') }}/img/ class="{{ asset('frontend') }}/img/-fluid" src="{{ asset('frontend') }}/img//s8.png" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">Challange Name</a>
                              </div>
                              <div class="channels-view">
                                 382,323 subscribers
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><{{ asset('frontend') }}/img/ class="{{ asset('frontend') }}/img/-fluid" src="{{ asset('frontend') }}/img//s7.png" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-secondary btn-sm">Subscribed <strong>1.4M</strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">Challange Name <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle"></i></span></a>
                              </div>
                              <div class="channels-view">
                                 382,323 subscribers
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><{{ asset('frontend') }}/img/ class="{{ asset('frontend') }}/img/-fluid" src="{{ asset('frontend') }}/img//s1.png" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">Challange Name</a>
                              </div>
                              <div class="channels-view">
                                 382,323 subscribers
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><{{ asset('frontend') }}/img/ class="{{ asset('frontend') }}/img/-fluid" src="{{ asset('frontend') }}/img//s2.png" alt=""></a>
                              <div class="channels-card-image-btn"><button type="button" class="btn btn-danger btn-sm">Subscribe <strong>1.4M</strong></button></div>
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="#">Challange Name</a>
                              </div>
                              <div class="channels-view">
                                 382,323 subscribers
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            @include('layouts.footers.fefooter');
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="{{url('/userlogout')}}">Logout</a>
               </div>
            </div>
         </div>
      </div>