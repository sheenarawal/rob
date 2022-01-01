@extends('layouts.admin_layout')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-4">

                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Video Details') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <video width="100%" controls controlsList="nodownload" autoplay muted>
                                <source src="{{asset($video->videolink)}}" type="video/mp4">
                            </video>
                            <h3>{{$video->title}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-secondary border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ucfirst(str_replace('_',' ',$type))}}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pt-2">

                    </div>
                    <div class="card-body">
                        <div class="col" style="overflow-x: auto">

                            <table id="data_table" class="table table align-items-center table-flush">
                                <thead class="thead-light">
                                @if($type == 'comment')
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Publishing User</th>
                                        <th scope="col">Comment</th>
                                        <th scope="col">Create Date</th>
                                    </tr>
                                @endif
                                @if($type == 'challenged_videos')
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Publishing User</th>
                                        <th scope="col">Video</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Create</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                @endif
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('backend_css')
    <link href="{{asset('argon/css/jquery.dataTables.min.css')}}" >
    <link href="{{asset('argon/css/dataTables.bootstrap4.min.css')}}" >
    <style>
        .dataTables_filter label{
            float: right;
        }
        .pagination{
            float: right;
        }
    </style>
@endpush

@push('backend_script')
    <script src="{{asset('argon/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('argon/js/dataTables.bootstrap4.min.js')}}"></script>
    @if($type == 'comment')
        <script>
            $(document).ready(function() {
                $('#data_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax:"{{route('comments.table.data',$video)}}",
                    language: {
                        paginate: {
                            next: '<i class="fas fa-arrow-right"></i>',
                            previous: '<i class="fas fa-arrow-left"></i>'
                        }
                    },
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'user_id', name: 'userid'},
                        {data: 'comment', name: 'comment'},
                        {data: 'created_at', name: 'created_at'},
                    ]
                });
            } );
        </script>
    @endif
    @if($type == 'challenged_videos')
        <script>
            $(document).ready(function() {
                $('#data_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax:"{{route('challenge_videos.table.data',$video)}}",
                    language: {
                        paginate: {
                            next: '<i class="fas fa-arrow-right"></i>',
                            previous: '<i class="fas fa-arrow-left"></i>'
                        }
                    },
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'userid', name: 'userid'},
                        {data: 'videolink', name: 'videolink'},
                        {data: 'title', name: 'title'},
                        {data: 'status', name: 'status'},
                        {data: 'created_at', name: 'created_at'},
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ]
                });
            } );
        </script>
    @endif
@endpush