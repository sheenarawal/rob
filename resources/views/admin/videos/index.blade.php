@extends('layouts.admin_layout')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Videos</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="video_table" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Publishing User</th>
                                    <th scope="col">Video</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Create</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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
    <script>
        $(document).ready(function() {
            $('#video_table').DataTable({
                processing: true,
                serverSide: true,
                ajax:"{{route('videos.index')}}",
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
@endpush