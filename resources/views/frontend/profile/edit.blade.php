@extends('frontend.header')
@section('frontend_content')
    <div id="wrapper">
        <!-- Sidebar -->
        <!-- Component added for sidebar -->
    @include('layouts.navbars.fesidebar')
    <!-- Component end for sidebar -->
        <div id="content-wrapper">
            <div class="container-fluid upload-details">
                <div class="row">
                    <div class="col-12">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {!! session('success') !!}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {!! session('error') !!}
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <form method="post" action="{{route('account.update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" value="{{$user->first_name}}" class="form-control"
                                           id="first_name" placeholder="First Name" name="first_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" value="{{$user->last_name}}" class="form-control" id="last_name"
                                           placeholder="Last Name" name="last_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"
                                       name="address" value="{{$profile?$profile->address:''}}">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2" name="address1"
                                       placeholder="Apartment, studio, or floor" value="{{$profile?$profile->alt_address:''}}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <input type="text" class="form-control" id="inputCity" name="city" value="{{$profile?$profile->city:''}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">State</label>
                                    <input id="inputState" class="form-control" name="state" value="{{$profile?$profile->state:''}}"/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Zip</label>
                                    <input type="text" class="form-control" id="inputZip" name="zip" value="{{$profile?$profile->zip:''}}"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">Profile Photo</label>
                                    <input type="file" value="{{$user->first_name}}" class="form-control"
                                           id="first_name" placeholder="First Name" name="profile_photo">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cover_photo">Cover Photo</label>
                                    <input type="file" value="{{$user->last_name}}" class="form-control" id="cover_photo"
                                           placeholder="Last Name" name="cover_photo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 mx-auto">
                                    @if($profile && $profile->profile_photo)
                                        <img class="img-fluid" src="{{asset($profile->profile_photo)}}">
                                    @endif
                                </div>
                                <div class="form-group col-md-4 mx-auto">
                                    @if($profile && $profile->cover_photo)
                                        <img class="img-fluid" src="{{asset($profile->cover_photo)}}">
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control"
                                           id="twitter" placeholder="Twitter Link" name="twitter" value="{{$profile?$profile->twitter_link:''}}">
                                </div>
                                <div class="form-group col-md">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control" id="facebook"
                                           placeholder="Facebook Link" name="facebook" value="{{$profile?$profile->facebook_link:''}}">
                                </div>
                                <div class="form-group col-md">
                                    <label for="google">Google</label>
                                    <input type="text" class="form-control" id="google"
                                           placeholder="Google Link" name="google" value="{{$profile?$profile->google_link:''}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop