@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
  <section class="banner">
            <img src="{{ asset('public/siteimages/'.$setting['site_banner']) }}">
            <div class="banner-conts">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="inner-conts">
                                <h1>{{$setting['site_name']}}</h1>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="banner-form">
                                <i class="fa fa-envelope-o"></i>
                                <div class="alert-form">
                                    <h4>305.822.5000</h4>
                                    <form id="subForm" action="<?php echo route('subscribe')?>" onsubmit="return false">
                                        {{csrf_field()}}
                                        <input type="email" placeholder="Enter Email for Auction Alerts..." requierd name="sub_email" id="sub_email">
                                        <input class="btn btn-sub" type="submit" onClick="subscribe()" value="SUBMIT">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!--- End of Banner ---->

    <!--- Start Banner Strip --->

        <section class="strip-main">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>PUBLIC AUCTIONS OF LOCAL GOVERNMENT SURPLUS</h5>
                            <a href="{{route('current_auctions')}}" class="border-btn">SEE UPCOMING</a>
                            <a href="#"><img src="images/google-play.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!--- End of Banner Strip --->
    <!--- Start Client Logo --->
@if(count($partnerslogos) > 0)
        <section class="client-logo">
            <div class="container">
                <div class="row">
                    @foreach($partnerslogos as $p)
                    <div class="logo-item">
                        <a href="{{ !empty($p->logo_link) ? $p->logo_link:'#'}}"><img src="{{url('partnerlogos/'.$p->logo_image_name)}}"></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    <!--- End of Client Logo -->

    <!--- Start Upcoming Auction --->

        <section class="upcoming-auction">
            <div class="container">
                <div class="row">
                    
                         @foreach($upcoming as $key=> $up)
                         <div class="col-12">
                        <div class="upcoming-hdng">
                            @if($key == 0)
                            <h5>Upcoming Auctions</h5>
                            @endif
                        </div>
                       
                        <a href="{{route('catalog', $up['slug'])}}">Online, {{$up['auction_title']}} ends {{date('m-d-Y', strtotime($up['auction_end_date']))}}</a>
                        <div class="row">
                            <div class="col-12">
                                <div class="owl-carousel owl-theme autoplay-slider">
                                    @foreach($up['image'] as $im)
                                    <div class="item">
                                        <img src="{{url('auctions/'.$im->image_name)}}">
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                     
                   @endforeach
               </div>
            </div>
        </section>
        
    <!--- End of Upcoming Auction --->

@endsection
