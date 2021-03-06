@extends('layouts.site')

@section('content')

{{-- Header --}}
<div class="nk-header-title nk-header-title-lg nk-header-title-parallax-opacity">
	<div class="bg-image">
		<div style="background-image: url('/img/lichking.jpg'); background-position: 0 0"></div>
	</div>
	<div class="nk-header-table">
		<div class="nk-header-table-cell">
			<div class="container">

				<div class="nk-header-text">

					<h1 class="nk-title display-3">{{config('app.name')}}</h1>

					<div class="nk-gap-2"></div>
					<a href="{{route('rules')}}" class="nk-btn nk-btn-lg link-effect-4">
						<span>Rules</span>
					</a>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="{{route('apply')}}" target="_blank" class="nk-btn nk-btn-lg nk-btn-color-main-1 link-effect-4">
						<span>REGISTER</span>
					</a>

					<div class="nk-gap-4"></div>
				</div>

			</div>
		</div>
	</div>
</div>


{{-- Slider --}}
<div class="mnt-80">
    <div id="rev_slider_50_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="photography-carousel48" style="padding:0px;">
        <div id="rev_slider_50_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.0.7">
            <ul>
            	@foreach(\App\ImageGallery::with('media')->latest()->get() as $imageGallery)
                <li data-index="rs-185" data-transition="slideoverhorizontal" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="1500" data-thumb="{{$imageGallery->getFirstMedia('images')->getUrl('thumb')}}" data-rotate="0" data-saveperformance="off">
                    <img src="{{$imageGallery->getFirstMedia('images')->getUrl('site')}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                </li>
                @endforeach
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
</div>

{{-- Features --}}
<div class="container">
	<div class="nk-gap-6"></div>
	<div class="nk-gap-2"></div>
	<div class="row vertical-gap lg-gap">
		<div class="col-md-6">
			<div class="nk-ibox">
				<div class="nk-ibox-icon nk-ibox-icon-circle">
					<span class="ion-headphone"></span>
				</div>
				<div class="nk-ibox-cont">
					<h2 class="nk-ibox-title">Teamspeak</h2>
					{{Setting::get('teamspeak_server')}}
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="nk-ibox">
				<div class="nk-ibox-icon nk-ibox-icon-circle">
					<span class="ion-ios-time"></span>
				</div>
				<div class="nk-ibox-cont">
					<h2 class="nk-ibox-title">Raid Time</h2>
					{{Setting::get('raidtime')}}
				</div>
			</div>
		</div>
	</div>
	<div class="nk-gap-2"></div>
	<div class="nk-gap-6"></div>
</div>

{{-- About Guild --}}
<div class="nk-box bg-dark-1">
	<div class="container text-xs-center">
		<div class="nk-gap-6"></div>
		<div class="nk-gap-2"></div>
		<h2 class="nk-title h1">Moarefi Guild</h2>
		<div class="nk-gap-3"></div>

		<p class="lead">2017 will be a totally new year, had a share of warmane ( icecrown ) in 2016, still we come on top. We are still interested in more active players for in the guild. We had a great start as a guild. In a short time we gathered a group of nice friendly active members and got foot on land on the Warmane icecrown global map.</p>

		<div class="nk-gap-2"></div>
		<div class="row equal-height no-gap multi-columns-row">
			<div class="col-md-6">
				<div class="nk-box-2 nk-box-line">
					<div class="nk-counter-3">
						<div class="nk-count">+200</div>
						<h3 class="nk-counter-title h4">Ozv Active</h3>
						<div class="nk-gap-1"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="nk-box-2 nk-box-line">
					<div class="nk-counter-3">
						<div class="nk-count">+10</div>
						<h3 class="nk-counter-title h4">Weekly Successful Raid</h3>
						<div class="nk-gap-1"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="nk-gap-2"></div>
		<div class="nk-gap-6"></div>
	</div>
</div>

{{-- Video --}}
@if(Setting::get('stream_enable', 'no') == 'yes')
<div class="container">
	<div class="nk-gap-6"></div>
	<div class="nk-gap-2"></div>
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<iframe allowFullScreen="true" src="https://player.twitch.tv/?channel={{Setting::get('stream_channel')}}&autoplay={{Setting::get('stream_autoplay')}}&muted={{Setting::get('stream_muted')}}" style="display: block; width: 100%; height: 455px;" frameborder="0"></iframe>
		</div>
	</div>
	<div class="nk-gap-2"></div>
	<div class="nk-gap-6"></div>
</div>
@endif

{{-- Next Raid Time --}}
<div class="nk-box bg-dark-1 text-xs-center">
	<div class="nk-gap-6"></div>
	<div class="nk-gap-2"></div>
	<div class="bg-image op-3" style="background-image: url('{{asset('img/icecrown.jpg')}}');"></div>
	<div class="container">
		<h2 class="display-4">Next Raid Time</h2>
		<div class="nk-gap"></div>
		@if(($raidtitle = Setting::get('raidtitle', ' ')) == ' ')
		<div>Prepare yourself...</div>
		@else
		<h2 class="display-4">{{$raidtitle}}</h2>
		@endif
		<div class="nk-gap-4"></div>

		<div class="nk-countdown" data-end="{{date("Y-m-d H:i", \App\Helpers\Countdown::nextRaid())}}" data-timezone="GMT"></div>
	</div>
	<div class="nk-gap-2"></div>
	<div class="nk-gap-6"></div>
</div>

{{-- Stuffs --}}
<div class="nk-gap-6"></div>
<div class="nk-gap-2"></div>
<div class="nk-carousel-2" data-autoplay="12000" data-dots="true">
	<div class="nk-carousel-inner">
		@foreach(\App\Staff::with('media')->latest()->get() as $staff)
		<div>
			<div>
				<blockquote class="nk-testimonial-2">
					@if(!is_null($staff->description))
					<div class="nk-testimonial-body">{{$staff->description}}</div>
					@endif
					<div class="nk-testimonial-photo" style="background-image: url('{{$staff->getFirstMedia('images')->getUrl('thumb')}}');"></div>
					<div class="nk-testimonial-name h4">{{$staff->name}}</div>
					<div class="nk-testimonial-source">{{$staff->title}}</div>
				</blockquote>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="nk-gap-2"></div>
<div class="nk-gap-6"></div>
@stop