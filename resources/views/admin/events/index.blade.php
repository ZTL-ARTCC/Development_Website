@extends('layouts.master')

@section('title')
@parent
| Events
@stop

@section('content')
<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('/assets_new/img/photos/roster_lp_bg.jpg');">
	<div class="bg-black-op-75">
		<div class="content content-center text-center">
			<div class="pt-50 pb-20">
				<h1 class="font-w700 text-white mb-10">Events</h1>
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
			<span class="breadcrumb-item active">Events</span>
		</nav>
	</div>

</div>
<div class="container">
    @if(Auth::user()->can('events'))
        <a href="/admin/events/new" class="btn btn-primary">New Event</a>
        <br><br>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Event</th>
                <th scope="col"><center>Date</center></th>
                <th scope="col"><center>Time</center></th>
                @if(Auth::user()->can('events'))
                    <th scope="col"><center>Actions</center></th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if($events->count() > 0)
                @foreach($events as $e)
                    <tr>
                        @if($e->banner_path != null)
                            <td width="500px"><a href="/event/{{{$e->id}}}"><img src="{{ $e->banner_path }}" width="500px" alt="{{ $e->name }}"></a></td>
                        @else
                            <td width="500px"><a href="/event/{{{$e->id}}}"><h4>{{ $e->name }}</h4></a></td>
                        @endif
                        <td>{{ $e->date }}</td>
                        <td>{{ $e->start_time }} - {{ $e->end_time }}z</td>
                        @if(Auth::user()->can('events'))
                            <td>
                                @if($e->status == 0)
                                    <a href="/admin/events/set-active/{{ $e->id }}" class="btn btn-success" data-toggle="tooltip" title="Unhide Event"><i class="fas fa-check"></i></a>
                                @elseif($e->status == 1)
                                    <a href="/admin/events/hide/{{ $e->id }}" class="btn btn-warning" data-toggle="tooltip" title="Hide Event"><i class="fas fa-ban"></i></a>
                                @endif
                                <a href="/admin/events/edit/{{ $e->id }}" class="btn btn-success simple-tooltip" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                <a href="/admin/events/delete/{{ $e->id }}" class="btn btn-danger simple-tooltip" data-toggle="tooltip" title="Delete"><i class="fas fa-times"></i></a>
                                @if($e->status == 0)
                                    <br>
                                    <p><small><i>Hidden</i></small></p>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No events found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@stop