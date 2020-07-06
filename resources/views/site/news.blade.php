@extends('layouts.master')

@section('title')
@parent
| Roster
@stop

@section('content')

<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('/assets_new/img/photos/news.jpg');">
	<div class="bg-black-op-75">
		<div class="content content-center text-center">
			<div class="pt-50 pb-20">
				<h1 class="font-w700 text-white mb-10">News</h1>
				<h2 class="h4 font-w400 text-white-op">Atlanta ARTCC</h2>
			</div>
		</div>
	</div>
</div>
<!-- END Hero -->

<!-- Breadcrumb -->
<div class="bg-body-light border-b">
	<div class="content py-5 text-center">
		<nav class="breadcrumb bg-body-light mb-0">
			<a class="breadcrumb-item" href="/">Home</a>

			<span class="breadcrumb-item active">News</span>
		</nav>
	</div>
</div>
<!-- End Breadcrumb -->

<!-- Page Content -->
<div class="content content-full">

<div class="row">

<br>
<div class="container">
    <a href="/" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    <br><br>

    <div class="card">
        <div class="card-header">
            <h3>
                {{ $calendar->title }}
            </h3>
        </div>
        <div class="card-body">
            <p><b>Date:</b> {{ $calendar->date }}</p>
            <p><b>Time:</b> @if($calendar->time != null) {{ $calendar->time }} @else No time listed. @endif</p>
            <p><b>Additional Information:</b></p>
            <p>{!! $calendar->body !!}</p>
            <hr>
            <p class="small"><i>Created by {{ App\User::find($calendar->created_by)->full_name }} at {{ $calendar->created_at }}</i></p>
            @if($calendar->updated_by != null)
                <p class="small"><i>Last updated by {{ App\User::find($calendar->updated_by)->full_name }} at {{ $calendar->updated_at }}</i></p>
            @endif
        </div>
    </div>
</div>