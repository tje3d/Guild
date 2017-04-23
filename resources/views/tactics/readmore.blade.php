@extends('layouts.site', ['title' => $tactic->title])

@section('content')
<br>
<div class="row">
	<div class="col-md-8 offset-md-2">
		
		<div class="nk-blog-container nk-blog-container-offset">
			<div class="nk-gap-4"></div>
			<div class="nk-gap-4"></div>

			<!-- START: Post -->
			<div class="nk-blog-post nk-blog-post-single">
				<img class="nk-img-stretch" src="{{$tactic->getFirstMedia()->getUrl()}}" />

				<!-- START: Post Text -->
				<div class="nk-post-text mt-0">
					{!! $tactic->content !!}
				</div>
				<!-- END: Post Text -->

			</div>
			<!-- END: Post -->

			<div class="nk-gap-4"></div>
		</div>

	</div>
</div>
@stop