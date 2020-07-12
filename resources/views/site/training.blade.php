@extends('layouts.master')

@section('title')
@parent
| My Training
@stop



@section('content')

<!-- Hero -->
<div class="bg-gd-sea">
	<div class="bg-black-op-25">
		<div class="content content-top content-full text-center">
			<h1 class="h3 text-white font-w700 mb-10">
				{{{$user->full_name}}} ({{{$user->id}}})
				<br /><span class="badge badge-secondary">{{{$user->rating_long}}}</span>
			</h1>
			@if(Auth::user()->canTrain == 1)
			<br />
			<href="https://training.ztlartcc.org"><i class="si si-cup"></i><span class="sidebar-mini-hide">Book a Training Session</span></a>
			@endif
		</div>
	</div>
</div>
<!-- END Hero -->
<!--sorry benny-->
@stop
