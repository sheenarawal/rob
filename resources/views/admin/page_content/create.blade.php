@extends('layouts.admin_layout', ['title' => __('Create Content')])

@section('content')
@include('layouts.headers.cards')

    
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{ __('Create Content') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('pagecontent.save') }}" autocomplete="off">
                        @csrf
                    
                        <div class="col-12 text-right">
                        <a href="{{route('pagecontent.index')}}" class="btn btn-sm btn-primary">Back</a>
                            </div>

                        <div class="pl-lg-4">
                                                
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="container">
                        <div class="row">
                        <div class="col-sm-12 form-group{{ $errors->has('page_name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-page_name">{{ __('Page Name') }}</label>
                                <input type="text" name="page_name" id="input-page_name" class="form-control form-control-alternative{{ $errors->has('page_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Page Name') }}" value="{{ old('page_name') }}"  autofocus>

                                @if ($errors->has('page_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('page_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="col-sm-12 form-group{{ $errors->has('page_title') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-page_title">{{ __('Page Title') }}</label>
                                <input type="text" name="page_title" id="input-page_title" class="form-control form-control-alternative{{ $errors->has('page_title') ? ' is-invalid' : '' }}" placeholder="{{ __('Page Title') }}" value="{{ old('title') }}"  autofocus>

                                @if ($errors->has('page_title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('page_title') }}</strong>
                                    </span>
                                @endif
                            </div>
					
              
                            
                            <div class="col-sm-12 form-group">
                                <label class="form-control-label" for="input-bidding_increment">{{ __('Page Description') }}</label>
                                <textarea  name="page_description" id="input-page_description" class="form-control form-control-alternative summernote" placeholder="{{ __('page_description') }}" value="{{ old('page_description') }}" rows=6  autofocus></textarea>

                                </div>
                            
                            <div class="col-sm-12 form-group">
                                <label class="form-control-label" for="input-meta_title">{{ __('Meta Title') }}</label>
                                <input type="text" name="meta_title" id="input-meta_title" class="form-control form-control-alternative" placeholder="{{ __('Meta Title') }}" value="{{ old('meta_title') }}"  autofocus>

                            </div>
                            <div class="col-sm-12 form-group">
                                    <label class="form-control-label" for="input-meta_description">{{ __('Meta Description') }}</label>
                                 
                                <textarea name="meta_description" class="form-control form-control-alternative"  placeholder="{{ __('Meta Description') }}">{{!empty($data)?$data['meta_desc']:old('meta_desc')}}</textarea>

                                    
                                </div>

                            <div class="col-sm-12 form-group">
                                <label class="form-control-label" for="input-is_actve">{{ __('Status') }}</label>
                             
                                <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                                </select>
                              

                            </div>
                           
                            
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    </div>
<link href="{{ asset('frontend') }}/summernote/summernote.min.css" rel="stylesheet">
<script src="{{ asset('frontend') }}/summernote/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height:300
        });
    });
  </script>


@endsection
  
