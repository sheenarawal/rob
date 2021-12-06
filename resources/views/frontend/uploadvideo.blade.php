@extends('layouts.app')
@section('content')
@include('layouts.navbars.feheader')
<div id="wrapper">
   <!-- Sidebar -->
   <!-- Component added for sidebar -->
   @include('layouts.navbars.fesidebar')
   <!-- Component end for sidebar -->
   <div id="content-wrapper">
      <div class="container-fluid upload-details">
         <div class="row">
            <div class="col-lg-12">
               <div class="main-title">
                  <h6>Video Upload</h6>
               </div>
            </div>
            {{-- <div class="col-lg-2">
                     <div class="imgplace"></div>
                  </div>
                <div class="col-lg-10">
                     <div class="osahan-title">Contrary to popular belief, Lorem Ipsum (2019) is not.</div>
                     <div class="osahan-size">102.6 MB . 2:13 MIN Remaining</div>
                     <div class="osahan-progress">
                        <div class="progress">
                           <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"   aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                        </div>
                        <div class="osahan-close">
                           <a href="#"><i class="fas fa-times-circle"></i></a>
                        </div>
                     </div>
                     <div class="osahan-desc">Your Video is still uploading, please keep this page open until it's done.</div>
                  </div>--}}
         </div>
         <hr>
         <form action="{{route('savevideo')}}" id="uploadForm" method="post" onsubmit="return false" enctype="multipart/form-data">
            <div class="row">
               <div class="col-lg-12">
                  <div class="osahan-form">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="e1">Video Title</label>
                              <input type="text" name="title" placeholder="Contrary to popular belief, Lorem Ipsum (2019) is not." id="title" class="form-control">
                              <span class="error-message"></span>
                           </div>
                        </div>
                        {{csrf_field()}}
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="e2">About</label>
                              <textarea rows="3" id="description" name="description" class="form-control"></textarea>
                              <span class="error-message"></span>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="e2">Video Screenshot</label>
                              <input type="file" name="video" id="video" class="form-control">
                              <span class="error-message"></span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="e3">Recording Date</label>
                              <input type="date" name="recording_date" id="recording_date" class="form-control">
                              <span class="error-message"></span>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="e4">Recording Location</label>
                              <input type="text" name="recording_location" id="recording_location" class="form-control">
                              <span class="error-message"></span>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="e9">Language in Video (Optional)</label>
                              <select id="language" class="custom-select">
                                 @foreach($languages as $l)
                                 <option value="{{$l}}" @if($l=='english' ) {{'selected'}} @endif>{{$l}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="e9">Comments</label>
                              <select id="e9" class="custom-select" name="is_comment_enable_status">
                                 <option value="1">Allow all comments</option>
                                 <option value="2">Hold all comments for review</option>
                                 <option value="0">Disable comments</option>
                              </select>
                           </div>
                        </div>

                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="e7">Tags (13 Tags Remaining)</label>
                              <input type="text" placeholder="Gaming, PS4" id="e7" class="form-control">
                           </div>
                        </div>

                     </div>
                     <div class="row ">
                        <div class="col-lg-12">
                           <div class="main-title">
                              <h6>Category ( you can select upto 6 categories )</h6>
                           </div>
                        </div>
                     </div>
                     <div class="row category-checkbox">
                        <!-- checkbox 1col -->
                        @foreach($categories as $c)
                        <div class="col-lg-2 col-xs-6 col-4">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" value="{{$c->id}}" class="custom-control-input categories" name="categories[]" id="categories{{$c->id}}">
                              <label class="custom-control-label" for="categories{{$c->id}}">{{ucwords($c->title)}}</label>

                           </div>

                        </div>
                        @endforeach
                        <div class="col-lg-12 col-xs-12 col-12">
                           <span class="error-message"></span>
                        </div>
                        <!-- checkbox 2col -->
                     </div>
                  </div>
                  <div class="osahan-area text-center mt-3">
                     <input type="submit" class="btn btn-outline-primary" value="Save Changes" onclick="submitForm()">
                  </div>
                  <hr>
                  <div class="terms text-center">
                     <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.</p>
                     <p class="hidden-xs mb-0">Ipsum is therefore always free from repetition, injected humour, or non</p>
                  </div>
               </div>
            </div>
         </form>
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
            <a class="btn btn-primary" href="login.html">Logout</a>
         </div>
      </div>
   </div>
</div>

<script>
   function submitForm() {
      $(".form-control").removeClass('error');
      $(".error-message").text('');
      var formData = new FormData($('#uploadForm')[0]);
      $.ajax({
         url: $('#uploadForm').attr('action'),
         data: formData,
         type: 'POST',
         contentType: false,
         processData: false,
         success: function(data) {
            $(".preload").fadeOut('slow');

            if (data.code == 400) {

               errors = data.message;
               var firstError = "";
               $(".form-control").each(function() {
                  var keyname = $(this).attr('name');

                  if (errors[keyname]) {
                     if (firstError == "") {
                        firstError = "#" + $(this).attr('id');
                     }
                     $(this).addClass('error');
                     $(this).next('.error-message').text(errors[keyname][0]);
                  }
               })
               var cat = 'categories[]';
               if (errors[cat]) {

                  $(".categories").parent().parent().parent().find('.error-message').text(errors[cat][0]);
               }
            }

            if (firstError != "") {

               $('html, body').animate({
                  scrollTop: $(firstError).offset().top - 80
               }, 1000);
            }

            return false;
         },
         beforeSend: function() {
            $(".preload").fadeIn('fast');
         }
      })

   }
</script>
@stop