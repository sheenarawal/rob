@extends('layouts.admin_layout')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-4">

                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Create Tag') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('tags.save') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Tag information') }}</h6>

                            <div class="form-group @error('title') has-danger @enderror">
                                <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                <input type="text" name="title" id="input-title"
                                       class="form-control form-control-alternative @error('title') is-invalid @enderror"
                                       placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-secondary border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Tags</h3>
                            </div>
                            <div class="col-4 text-right d-none">
                                <a href="{{route('tags.create')}}" class="btn btn-sm btn-primary">Create</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table id="tag_table" class="table table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Create Date</th>
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
    <!-- Modal -->
    <div class="modal fade" id="edit_tag" tabindex="-1" role="dialog" aria-labelledby="edit_tagLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_tagLabel">Edit Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="tag_edit_form" method="post" action="" autocomplete="off">
                    <div class="modal-body">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{ __('Tag information') }}</h6>


                        <div class="pl-lg-4">
                            <div class="form-group @error('title') has-danger @enderror">
                                <label class="form-control-label" for="edit_title">{{ __('Title') }}</label>
                                <input type="text" name="title" id="edit_title"
                                       class="form-control form-control-alternative @error('title') is-invalid @enderror"
                                       placeholder="{{ __('Title') }}" value="" required autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('backend_css')
    <link href="{{asset('argon/css/jquery.dataTables.min.css')}}">
    <link href="{{asset('argon/css/dataTables.bootstrap4.min.css')}}">
    <style>
        .dataTables_filter label {
            float: right;
        }

        .pagination {
            float: right;
        }
    </style>
@endpush

@push('backend_script')
    <script src="{{asset('argon/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('argon/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#tag_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('tags.index')}}",
                language: {
                    paginate: {
                        next: '<i class="fas fa-arrow-right"></i>',
                        previous: '<i class="fas fa-arrow-left"></i>'
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'created_at', name: 'created_at'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

            $(document).on('click', '.edit_tag', function (e) {
                e.preventDefault();
                var id,title,url;
                id = $(this).data('id')
                title = $(this).data('tag_title')
                url = "{{route('tags.update')}}/"+id
                $('#tag_edit_form').attr('action',url)
                $('#edit_title').val(title)
            })
        });
    </script>
@endpush