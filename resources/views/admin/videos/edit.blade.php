@extends('layouts.admin_layout', ['title' => __('Videos Edit')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Edit Videos') }}</h3>
                        </div>
                        <div class="col-12 text-right">
                            <a href="{{route('videos.index')}}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="" action="{{route('videos.store')}}" id="uploadForm" onsubmit="return false"
                              method="post" enctype="multipart/form-data">
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
                                                    <input type="text" name="title" id="title" class="form-control"
                                                           value="{{$video->title}}"
                                                           placeholder="Contrary to popular belief, Lorem Ipsum (2019) is not.">
                                                    <span class="error-message"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="e2">About</label>
                                                    <textarea rows="3" id="description" name="description"
                                                              class="form-control">{{$video->desc}}</textarea>
                                                    <span class="error-message"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="e2">Video</label>
                                                    <input type="hidden" name="video_duration"
                                                           value="{{$video->video_duration}}">
                                                    <input type="file" name="video" id="video" class="form-control">
                                                    <span class="error-message"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="recording_date">Recording Date</label>
                                                    <input type="date" name="recording_date" id="recording_date"
                                                           class="form-control" value="{{$video->recording_date}}">
                                                    <span class="error-message"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="e4">Recording Location</label>
                                                    <input type="text" name="recording_location" id="recording_location"
                                                           class="form-control" value="{{$video->title}}">
                                                    <span class="error-message"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="e9">Language in Video (Optional)</label>
                                                    <select id="language" class="custom-select" name="language">
                                                        @foreach($languages as $l)
                                                            <option value="{{$l}}" @if($l=='English' ) {{'selected'}} @endif>{{$l}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="e9">Comments</label>
                                                    <select id="e9" class="custom-select"
                                                            name="is_comment_enable_status">
                                                        <option value="1" {{$video->is_comment_enable_status == 1?'selected':''}}>
                                                            Allow all comments
                                                        </option>
                                                        <option value="2" {{$video->is_comment_enable_status == 2?'selected':''}}>
                                                            Hold all comments for review
                                                        </option>
                                                        <option value="0" {{$video->is_comment_enable_status == 3?'selected':''}}>
                                                            Disable comments
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="e7">Tags (13 Tags Remaining)</label>
                                                    <input type="text" name="tags" placeholder="Gaming, PS4" id="e7"
                                                           class="form-control" value="{{$tags}}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row ">
                                            <div class="col-lg-12">
                                                <div class="main-title">
                                                    <label>Category ( you can select upto 6 categories )</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row category-checkbox">
                                            <!-- checkbox 1col -->
                                            @foreach($categories as $c)
                                                <div class="col-lg-2 col-xs-6 col-4">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="{{$c->id}}" name="categories[]"
                                                               class="custom-control-input categories"
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
                                        <input type="submit" class="btn btn-outline-primary" value="Save Changes"
                                               onclick="submitForm()">
                                    </div>
                                    <hr>
                                    <div class="terms text-center">

                                        <p class="mb-0">There are many variations of passages of Lorem Ipsum available,
                                            but the majority
                                            <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.
                                        </p>
                                        <p class="hidden-xs mb-0">Ipsum is therefore always free from repetition,
                                            injected
                                            humour, or non</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@push('backend_css')
    <style>
        .error-message {
            color: #da3015;
        }

        .amsify-suggestags-input {
            background: transparent;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/amsify.suggestags.css')}}">
@endpush
@push('backend_script')
    <script src="{{asset('frontend/js/jquery.amsify.suggestags.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.22.0/js/jquery.iframe-transport.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.22.0/js/jquery.fileupload.js"></script>
    <script>

        $("input[name=video]").on("change", function (e) {
            var file = this.files[0]; // Get uploaded file
            validateFile($(this), file) // Validate Duration
        })

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
                    if (data.code == 200) {
                        $('#uploadForm')[0].reset();
                        $('#success_massage').removeClass('d-none').addClass('d-block').text(data.message);
                    }
                    if (data.code == 400) {
                        var errors = data.message;
                        console.log(errors)
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

                        var cat = 'categories';
                        if (errors[cat]) {
                            $(".category-checkbox").find('.error-message').text(errors[cat][0]);
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
                },
                progressall: function (e, data) {
                    setProgressBar(parseInt(data.loaded / data.total * 100, 10));
                },
                done: function (e, data) {
                    $('#upload-status').text("Uploading Complete!");
                }
            })

        }

        function setProgressBar(percentage) {
            $('#progress .progress-bar').css(
                'width',
                percentage + '%'
            ).text(percentage + '%');
        }

        function validateFile(input, file) {
            var video = document.createElement('video');
            video.preload = 'metadata';
            video.onloadedmetadata = function () {
                window.URL.revokeObjectURL(video.src);
                $("input[name=video_duration]").val(video.duration)

            }
            video.src = URL.createObjectURL(file);
        }

        {{--$("#video").change(function(e) {
            $('.osahan-title').text()
            $('.osahan-size').text()
            var token = $('input[name=_token]').val()
            var file = e.target.files[0];
            console.log(file)
            var sizeInMB = (file.size / (1024*1024)).toFixed(2);
            // Validate video file type
            if (["video/mp4"].indexOf(file.type) === -1) {
                alert("Only 'MP4' video format allowed.");
                return;
            } else {
                $('.video-preview-outer').removeClass('d-none')
                $('.video-outer').addClass('d-none')
                document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0])
                $('.osahan-title').text(file.name)
                $('.osahan-size').text(sizeInMB + 'MB')
                var formData = new FormData();;
                formData.append('_token','{{csrf_token()}}');
                formData.append('video', file, file.name);
                console.log(formData)
                var xhr = new XMLHttpRequest();

                // Open the connection
                xhr.open('POST', '{{route('uploadVideo')}}', true);

                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        console.log(percentComplete);
                        $('.progress-bar').css({
                            width: percentComplete * 100 + '%'
                        });
                        if (percentComplete === 1) {
                            $('.progress-bar').addClass('hide');
                        }
                    }
                }, false);
                xhr.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        console.log(percentComplete);
                        $('.progress-bar').css({
                            width: percentComplete * 100 + '%'
                        });
                    }
                }, false);

                // Send the data.
                xhr.send(formData);

                /*$.ajax({
                   type:"post",
                   url:"{{route('video.store')}}",
                 data:{_token:token,video:$(this).val()},
                 success:function(data){
                    $("#result").html(data);
                 }
              });*/
            }

        });--}}
        $('#e7').amsifySuggestags({
            trimValue: true,
            dashspaces: true,
            lowercase: true,
            tagLimit: 5
        });
    </script>
@endpush