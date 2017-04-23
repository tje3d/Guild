@extends('layouts.site', ['title' => 'Tactics'])

@section('content')
<br>
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="nk-gap-4"></div>
		
		<div class="nk-blog-list">


			@foreach($tactics as $tactic)
			<div class="nk-blog-post" data-mouse-parallax-z="5" data-mouse-parallax-speed="1">
				<div class="nk-post-thumb">

					<a href="{{route('tactics.readmore', $tactic)}}">
						<img src="{{$tactic->getFirstMedia()->getUrl('thumb_large')}}" alt="" class="nk-img-stretch">
					</a>
				</div>
				<div class="nk-post-content">
					<div data-mouse-parallax-z="2">
						<h2 class="nk-post-title h1">
							<a href="{{route('tactics.readmore', $tactic)}}">{{$tactic->title}}</a>
						</h2>
						<div class="nk-post-date">
							{{$tactic->created_at->format("F d, Y")}}
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<div class="nk-gap-4"></div>
        <div class="nk-gap-3"></div>

	</div>
</div>
@stop