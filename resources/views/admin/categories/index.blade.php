@extends('layouts.admin_layout')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-4">

                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Create Category') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('category.save') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Category information') }}</h6>
                            <div class="form-group @error('parent') has-danger @enderror">
                                <label class="form-control-label" for="parent">{{ __('Parent') }}</label>
                                <select name="parent" class="form-control" id="parent">
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"  {{$category->id == old('parent') ? 'selected':''}}>{{$category->title}}</option>
                                    @endforeach
                                </select>

                                @error('parent')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group @error('title') has-danger @enderror">
                                <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                <input type="text" name="title" id="input-title" class="form-control form-control-alternative @error('title') is-invalid @enderror" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>

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
                                <h3 class="mb-0">Category</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pt-2">

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
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
                                <th scope="col">Parent</th>
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
    <div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="edit_categoryLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-secondary">
                <div class="modal-header bg-white">
                    <h5 class="modal-title" id="edit_categoryLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="tag_edit_form" method="post" action="" autocomplete="off">
                    <div class="modal-body">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{ __('Category information') }}</h6>

                        <div class="form-group @error('parent') has-danger @enderror">
                            <label class="form-control-label" for="edit_parent">{{ __('Parent') }}</label>
                            <select name="parent" class="form-control" id="edit_parent">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"  {{$category->id == old('parent') ? 'selected':''}}>{{$category->title}}</option>
                                @endforeach
                            </select>

                            @error('parent')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
            $('#tag_table').DataTable({
                processing: true,
                serverSide: true,
                ajax:"{{route('category.index')}}",
                language: {
                    paginate: {
                        next: '<i class="fas fa-arrow-right"></i>',
                        previous: '<i class="fas fa-arrow-left"></i>'
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'parent_id', name: 'parent_id'},
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
            $(document).on('click', '.edit_category', function (e) {
                e.preventDefault();
                var id,title,parent,url;
                id = $(this).data('id')
                title = $(this).data('cate_title')
                parent = $(this).data('cate_parent')
                url = "{{route('category.update')}}/"+id
                console.log(title)
                console.log(url)
                $('#tag_edit_form').attr('action',url)
                $('#edit_title').val(title)
                $('#edit_parent option').each(function () {
                    $(this).attr('disabled',false)
                    if ($(this).val() == parent){
                        $(this).attr('selected',true)
                    }if ($(this).val() == id){
                        $(this).attr('disabled',true)
                    }
                })
            })
        } );
    </script>
@endpush