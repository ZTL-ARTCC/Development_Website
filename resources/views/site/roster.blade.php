@extends('layouts.master')

@section('title')
@parent
| Roster
@stop

@section('content')

<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('/assets_new/img/photos/roster_lp_bg.jpg');">
	<div class="bg-black-op-75">
		<div class="content content-center text-center">
			<div class="pt-50 pb-20">
				<h1 class="font-w700 text-white mb-10">Roster</h1>
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
			<span class="breadcrumb-item active">Controller</span>
			<span class="breadcrumb-item active">Roster</span>
		</nav>
	</div>
</div>
<!-- End Breadcrumb -->

<!-- Page Content -->
<div class="content content-full">


<div class="block">
				<ul class="nav nav-tabs nav-tabs-alt align-items-center" data-toggle="tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" href="#home">Home Controllers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#visiting">Visiting Controllers</a>
					</li>
				</ul>
				<div class="block-content tab-content">
					<div class="tab-pane active" id="home" role="tabpanel">
						<h4 class="font-w400">Home Controllers</h4>
						<div class="table-responsive">
						<table class="table table-bordered">
						<thead>
					<tr>
						<th class="text-center">Full Name</th>
						<th class="text-center">VATSIM ID</th>
						<th class="text-center">Status</th>
						<th class="text-center">Membership</th>
						<th class="text-center">Rating</th>
						<th class="text-center">DEL</th>
						<th class="text-center">GND</th>
						<th class="text-center">TWR</th>
						<th class="text-center">TRACON</th>
						<th class="text-center">CTR</th>
					</tr>
				</thead>
				<tbody>

					@forelse($hcontrollers as $h)
					<tr>
						@if(Auth::check())
						@if(Auth::user()->can('roster'))
							<td class="text-center"><a href="/dashboard/admin/roster/edit/{{$h->id}}">{{{$h->backwards_name}}}</a></td>
						@else
						<td class="text-center">{{{$h->backwards_name}}}</td>
						@endif
					@else
						<td class="text-center">{{{$h->backwards_name}}}</td>
					@endif
						<td class="text-center">{{{$h->id}}}</td>
						<td class="text-center">
							@if($h->loa == '1') <span class="badge badge-info">Leave</span> @else <span class="badge badge-success">Active</span> @endif
						</td>

						@if($h->hasRole('atm'))
							<td class="text-center">ATM</td>
						@elseif($h->hasRole('datm'))
							<td class="text-center">DATM</td>
						@elseif($h->hasRole('ta'))
							<td class="text-center">TA</td>
						@elseif($h->hasRole('wm'))
							<td class="text-center">WM</td>
						@elseif($h->hasRole('awm'))
							<td class="text-center">AWM</td>
						@elseif($h->hasRole('ec'))
							<td class="text-center">EC</td>
						@elseif($h->hasRole('aec'))
							<td class="text-center">AEC</td>
						@elseif($h->hasRole('fe'))
							<td class="text-center">FE</td>
						@elseif($h->hasRole('afe'))
							<td class="text-center">AFE</td>
						@else
							<td class="text-center">Home Controller</td>
						@endif
						<td class="text-center">{{{$h->rating_short}}}</td>

						<td class="text-center">@if($h->del == '0') <span class="badge badge-secondary">None</span> @elseif($h->del == '1') <span class="badge badge-warning">Minor</span> @elseif($h->del == '2')<span class="badge badge-success">Major</span>@endif</td>

						<td class="text-center">@if($h->gnd == '0') <span class="badge badge-secondary">None</span> @elseif($h->gnd == '1') <span class="badge badge-warning">Minor</span> @elseif($h->gnd == '2')<span class="badge badge-success">Major</span>@endif</td>

						<td class="text-center">@if($h->twr == '0') <span class="badge badge-secondary">None</span> @elseif($h->twr == '1') <span class="badge badge-warning">Minor</span> @elseif($h->twr == '2')<span class="badge badge-success">Major</span> @elseif($h->twr == '99') <span class="badge badge-warning">Solo</span>@endif</td>

						<td class="text-center">@if($h->app == '0') <span class="badge badge-secondary">None</span> @elseif($h->app == '1') <span class="badge badge-warning">Minor</span> @elseif($h->app == '2') <span class="badge badge-success">Major</span> @elseif($h->app == '99') <span class="badge badge-warning">Solo</span>@endif</td>

						<td class="text-center">@if($h->ctr == '0') <span class="badge badge-secondary">None</span> @elseif($h->ctr == '2') <span class="badge badge-warning">Training</span> @elseif($h->ctr == '1') <span class="badge badge-success">Major</span> @elseif($h->ctr == '99') <span class="badge badge-warning">Solo</span> @endif</td>
					</tr>
					@empty
					@endforelse
                                    </tbody>
                                </table>
						</div>

					</div>
					<div class="tab-pane" id="visiting" role="tabpanel">
						<h4 class="font-w400">Visiting Controllers</h4>
						<div class="table-responsive">
						<table class="table table-bordered">
						<thead>
					<tr>
						<th class="text-center">Full Name</th>
						<th class="text-center">VATSIM ID</th>
						<th class="text-center">Status</th>
						<th class="text-center">Membership</th>
						<th class="text-center">Rating</th>
						<th class="text-center">DEL</th>
						<th class="text-center">GND</th>
						<th class="text-center">TWR</th>
						<th class="text-center">TRACON</th>
						<th class="text-center">CTR</th>
					</tr>
				</thead>
				<tbody>

					@forelse($vcontrollers as $h)
					<tr>
						@if(Auth::check())
						@if(Auth::user()->can('roster'))
							<td class="text-center"><a href="/dashboard/admin/roster/edit/{{$h->id}}">{{{$h->backwards_name}}}</a></td>
						@else
						<td class="text-center">{{{$h->backwards_name}}}</td>
						@endif
					@else
						<td class="text-center">{{{$h->backwards_name}}}</td>
					@endif
						<td class="text-center">{{{$h->id}}}</td>
						<td class="text-center">
							@if($h->loa == '1') <span class="badge badge-info">Leave</span> @else <span class="badge badge-success">Active</span> @endif
						</td>
						<td class="text-center">Visiting Controller</td>
						<td class="text-center">{{{$h->rating_short}}}</td>


						<td class="text-center">@if($h->del == '0') <span class="badge badge-secondary">None</span> @elseif($h->del == '1') <span class="badge badge-warning">Minor</span> @elseif($h->del == '2')<span class="badge badge-success">Major</span>@endif</td>

						<td class="text-center">@if($h->gnd == '0') <span class="badge badge-secondary">None</span> @elseif($h->gnd == '1') <span class="badge badge-warning">Minor</span> @elseif($h->gnd == '2')<span class="badge badge-success">Major</span>@endif</td>

						<td class="text-center">@if($h->twr == '0') <span class="badge badge-secondary">None</span> @elseif($h->twr == '1') <span class="badge badge-warning">Minor</span> @elseif($h->twr == '2')<span class="badge badge-success">Major</span> @elseif($h->twr == '99') <span class="badge badge-warning">Solo</span>@endif</td>

						<td class="text-center">@if($h->app == '0') <span class="badge badge-secondary">None</span> @elseif($h->app == '1') <span class="badge badge-warning">Minor</span> @elseif($h->app == '2') <span class="badge badge-success">Major</span> @elseif($h->app == '99') <span class="badge badge-warning">Solo</span>@endif</td>

						<td class="text-center">@if($h->ctr == '0') <span class="badge badge-secondary">None</span> @elseif($h->ctr == '2') <span class="badge badge-warning">Training</span> @elseif($h->ctr == '1') <span class="badge badge-success">Major</span> @elseif($h->ctr == '99') <span class="badge badge-warning">Solo</span> @endif</td>
					</tr>
					@empty
					@endforelse
                                    </tbody>
                                </table>
						</div>

					</div>
	</div>
	<!-- END Visiting Controller Roster -->



</div>

<!-- END Page Content -->


@stop
