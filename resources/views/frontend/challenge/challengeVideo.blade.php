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

                {{--<form class="d-none">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h6>Video Upload</h6>
                            </div>
                        </div>
                        <div class="col-12 video-preview-outer d-none">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="imgplace">
                                        <video class="w-100" id="img_preview" controls> </video>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="osahan-title">Contrary to popular belief, Lorem Ipsum (2019) is not.</div>
                                    <div class="osahan-size">102.6 MB . 2:13 MIN Remaining</div>
                                    <div class="osahan-progress">
                                        <div class="progress" id="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                 role="progressbar"
                                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 75%"></div>
                                        </div>
                                        <div class="osahan-close">
                                            <a href="#"><i class="fas fa-times-circle"></i></a>
                                        </div>
                                    </div>
                                    <div class="osahan-desc" id="upload-status"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row video-outer">
                                <div class="col-md-8 mx-auto text-center upload-video pt-5 pb-5">
                                    <h1><i class="fas fa-file-upload text-primary"></i></h1>
                                    <h4 class="mt-5">Select Video files to upload</h4>
                                    <p class="land">or drag and drop video files</p>
                                    <div class="mt-4">
                                        <input id="video" class="btn btn-outline-primary" type="file" name="files[]" onchange=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>--}}
                <form action="{{route('challenge.video.store',base64_encode($video->slug))}}" id="uploadForm" method="post" onsubmit="return false"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <span class="alert alert-success d-none" id="success_massage"> </span>
                        </div>
                        <div class="col-lg-12">
                            <div class="osahan-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="e1">Video Title</label>
                                            <input type="text" name="title"
                                                   placeholder="Contrary to popular belief, Lorem Ipsum (2019) is not."
                                                   id="title" class="form-control">
                                            <span class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="e2">About</label>
                                            <textarea rows="3" id="description" name="description"
                                                      class="form-control"></textarea>
                                            <span class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="e2">Video</label>
                                            <input type="file" name="video" id="video" class="form-control">
                                            <input type="hidden" name="video_duration" >
                                            <span class="error-message"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="recording_date">Recording Date</label>
                                            <input type="date" name="recording_date" id="recording_date"
                                                   class="form-control" value="{{date('Y-m-d')}}">
                                            <span class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="e4">Recording Location</label>
                                            <input type="text" name="recording_location" id="recording_location"
                                                   class="form-control">
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
                                            <input type="text" name="tags" placeholder="Gaming, PS4" id="e7" class="form-control">
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
                                                <input type="checkbox" value="{{$c->id}}"
                                                       class="custom-control-input categories" name="categories[]"
                                                       id="categories{{$c->id}}">
                                                <label class="custom-control-label"
                                                       for="categories{{$c->id}}">{{ucwords($c->title)}}</label>

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
                                <input type="submit" class="btn btn-outline-primary submit_video" value="Save Changes"
                                       onclick="submitForm()">
                            </div>
                            <hr>
                            <div class="terms text-center">
                                <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the
                                    majority <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.
                                </p>
                                <p class="hidden-xs mb-0">Ipsum is therefore always free from repetition, injected
                                    humour, or non</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            @include('frontend.footer');
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@stop
@push('css')
    <style>
        .amsify-suggestags-input{
            background: transparent;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/amsify.suggestags.css')}}">
@endpush
@push('script')
    <script src="{{asset('frontend/js/jquery.amsify.suggestags.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.22.0/js/jquery.iframe-transport.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.22.0/js/jquery.fileupload.js"></script>
    <script>

        $("input[name=video]").on("change", function(e) {
            var file = this.files[0]; // Get uploaded file
            validateFile($(this),file) // Validate Duration
            console.log(this.files[0].size)
            const file_size = Math.round((this.files[0].size / 1024));
            // The size of the file.
            if (file_size >= 102400) {
                alert("Video File too Big, please select a file less than 100MB");
                $('.submit_video').addClass('d-none')
            } else if (file_size < 2048) {
                alert("Vidoe File too small, please select a file greater than 2MB");
                $('.submit_video').addClass('d-none')
            }else{
                $('.submit_video').removeClass('d-none')
            }
        })
        function validateFile(input,file)
        {
            var video = document.createElement('video');
            video.preload = 'metadata';
            video.onloadedmetadata = function() {
                window.URL.revokeObjectURL(video.src);
                $("input[name=video_duration]").val(video.duration)

            }
            video.src = URL.createObjectURL(file);
        }
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
                success: function (data) {
                    $(".preload").fadeOut('slow');
                    if (data.code == 200){
                        $('#uploadForm')[0].reset();
                        $('#success_massage').removeClass('d-none').addClass('d-block').text(data.message);
                    }
                    if (data.code == 400) {
                        errors = data.message;
                        var firstError = "";
                        $(".form-control").each(function () {
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
                beforeSend: function () {
                    $(".preload").fadeIn('fast');
                }
            })

        }
       /* $("#video").change(function(e) {
            var token = $('input[name=_token]').val()
            var file = e.target.files[0];
            // Validate video file type

                $('.video-preview-outer').removeClass('d-none')
                $('.video-outer').addClass('d-none')
                document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0])

                $(this).fileupload({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('video.store')}}",
                    add: function (e, data) {
                        var files = $(this).text(data.files[0].name);
                        console.log(files)
                        $('#upload-status').text("Your Video is still uploading, please keep this page open until it's done.");
                        setProgressBar(0);
                        data.submit();
                    },
                    progressall: function (e, data) {
                        setProgressBar(parseInt(data.loaded / data.total * 100, 10));
                    },
                    done: function (e, data) {
                        $('#upload-status').text("Uploading Complete!");
                    }
                });

                function setProgressBar(percentage) {
                    $('#progress .progress-bar').css(
                        'width',
                        percentage + '%'
                    ).text(percentage + '%');
                }

                /!*$.ajax({
                   type:"post",
                   url:"{{route('video.store')}}",
                 data:{_token:token,video:$(this).val()},
                 success:function(data){
                    $("#result").html(data);
                 }
              });*!/


        });*/
        $('#e7').amsifySuggestags({
            trimValue: true,
            dashspaces: true,
            lowercase: true,
            tagLimit: 5
        });
    </script>
@endpush