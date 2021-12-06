@extends('layouts.admin_layout', ['title' => __('User Create')])

@section('content')
@include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Create User') }}</h3>
                        </div>
                        <div class="col-12 text-right">
                            <a href="{{route('user.index')}}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.save') }}" autocomplete="off">
                            @csrf
                           
                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
       

                            <div class="pl-lg-4">
                                                 
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                                <div class="form-group{{ $errors->has('fname') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('First Name') }}</label>
                                    <input type="text" name="fname" id="input-name" class="form-control form-control-alternative{{ $errors->has('fname') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ old('fname') }}" required autofocus>

                                    @if ($errors->has('fname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('lname') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Last Name') }}</label>
                                    <input type="text" name="lname" id="input-name" class="form-control form-control-alternative{{ $errors->has('lname') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" value="{{ old('lname') }}" required autofocus>

                                    @if ($errors->has('lname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                               
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
       
    </div>
@endsection