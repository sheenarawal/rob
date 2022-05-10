@if($videos && !empty($videos))
    @php($i = 1)
    @foreach($videos as $video)
        <div class="col-xl-3 col-sm-6 mb-3 align-items-stretch">
            <div class="video-card">
                <div class="video-card-image">
                    <a class="play-icon" id="play-icon" href="{{route('video.view',$video->slug)}}"><i class="fas fa-play-circle"></i></a>
                    <a href="{{route('video.view',$video->slug)}}" class="video_url">
                        <video id="myVid" class="img-fluid video_list_item" poster="{{asset($video->poster)}}"
                               muted onloadedmetadata="get_duration()" playsInline loop>
                            <source src="{{asset($video->videolink)}}"  type="video/mp4">
                        </video>
                    </a>
                    <div class="time duaration_">{{date('i:s',$video->duration)}}</div>
                </div>
                <div class="video-card-body">
                    <div class="video-title text-uppercase">
                        <a href="#">{{$video->title}}</a>
                    </div>
                    <div class="video-page text-success">
                        @if(count($video->Category)>0)
                            @foreach($video->Category as $cateData)
                                @if($cateData->CategoryDetail)
                                    <a data-placement="top" data-toggle="tooltip"
                                       href="{{route('video.category',$cateData->CategoryDetail->slug)}}"
                                       data-original-title="Verified" >
                                        {{ucfirst($cateData->CategoryDetail->title)}}
                                        <i class="fas fa-check-circle text-success"></i>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="video-view">
                        <i class="fas fa-calendar-alt"></i> {{\Carbon\Carbon::parse($video->created_at)->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>
        @php($i++)
    @endforeach
@endif