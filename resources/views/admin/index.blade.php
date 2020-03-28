@extends('layouts.master')

@section('title')
@parent| Administrator Center @stop

@section('content')

<!-- Hero -->
<div class="bg-gd-dusk">
	<div class="bg-black-op-25">
		<div class="content content-top content-full text-center">
			<h1 class="h3 text-white font-w700 mb-10">
				Administrator Center
			</h1>
			<h2 class="h4 font-w400 text-white-op">Atlanta ARTCC</h2>
		</div>
	</div>
</div>
<!-- END Hero -->

<!-- Breadcrumb -->
<div class="bg-body-light border-b">
	<div class="content py-5 text-center">
		<nav class="breadcrumb bg-body-light mb-0">
			<a class="breadcrumb-item" href="/">Home</a>
			<span class="breadcrumb-item active">Administrator Center</span>
		</nav>
	</div>
</div>
<!-- END Breadcrumb -->

<!-- Begin Page Content -->
<div class="content">
	<div class="row">
		
		<!-- Roster Management -->
		@if(Auth::user()->can('roster'))
		<div class="col-md-4">
			<div class="block">
				<div class="block-header block-header-default">
					<div class="block-options">
						<div class="dropdown">
							<button type="button" class="btn-block-option dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</button>
							<div class="dropdown-menu dropdown-menu-left" x-placement="top-end" style="position: absolute; transform: translate3d(73px, -2px, 0px); top: 0px; left: 0px; will-change: transform;">
								<a class="dropdown-item" href="/admin/roster">
									<i class="fa fa-fw fa-address-book mr-5"></i>Manage Roster
								</a>
								@if(Auth::user()->can('roster'))
								<a class="dropdown-item" href="/admin/show/visit">
									<i class="fa fa-fw fa-id-card mr-5"></i>Visiting Requests
								</a>
								@endif
								@if(Auth::user()->hasRole('ATM') || Auth::user()->hasRole('DATM') || Auth::user()->hasRole('WM'))
								<a class="dropdown-item" href="/admin/rostertidy">
									<i class="fa fa-fw fa-trash mr-5"></i>Roster Activity Check
								</a>
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="block-content text-center">
					<div class="py-20">
						<p class="h1 text-corporate-dark font-w600 mb-10"><i class="fa fa-user"></i></p>
						<p class="font-size-lg">Roster Management</p><p>
					</p></div>
				</div>
			</div>
		</div>
		@endif
		<!-- END Roster Management -->
		
		<!-- Training Admin -->
		@if(Auth::user()->can('train'))
		<div class="col-md-4">
			<div class="block">
				<div class="block-header block-header-default">
					<div class="block-options">
						<div class="dropdown">
							<button type="button" class="btn-block-option dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</button>
							<div class="dropdown-menu dropdown-menu-left" x-placement="top-end" style="position: absolute; transform: translate3d(73px, -2px, 0px); top: 0px; left: 0px; will-change: transform;">
								<a class="dropdown-item" href="/admin/mentor/students">
									<i class="fa fa-fw fa-sticky-note mr-5"></i>Search for Student Profile
								</a>
								<a class="dropdown-item" href="/admin/mentor/addticket">
									<i class="fa fa-fw fa-plus-square mr-5"></i>Create Training Note
								</a>
								
							</div>
						</div>
					</div>
				</div>
				<div class="block-content text-center">
					<div class="py-20">
						<p class="h1 text-corporate-dark font-w600 mb-10"><i class="fa fa-pencil"></i></p>
						<p class="font-size-lg">Training Admin</p><p>
					</p></div>
				</div>
			</div>
		</div>
		@endif
		<!-- END Training Admin -->
		
		<!-- Website Notices -->
		@if(Auth::user()->can('staff'))
		<div class="col-md-4">
			<a class="block block-link-shadow" href="" target="_blank">
				<div class="block-content text-center" style="height:215px;">
					<div class="py-20" style="margin-top: 35px;">
						<p class="h1 text-corporate-dark font-w600 mb-10"><i class="fa fa-newspaper-o"></i></p>
						<p class="font-size-lg">Website Notices</p><p>
					</p>
					</div>
				</div>
			</a>
		</div>
		@endif
		<!-- END Website Notices -->
		
		<!-- Webmail -->
		@if(Auth::user()->can('staff'))
		<div class="col-md-4">
			<a class="block block-link-shadow" href="/webmail" target="_blank">
				<div class="block-content text-center" style="height:215px;">
					<div class="py-20" style="margin-top: 35px;">
						<p class="h1 text-corporate-dark font-w600 mb-10"><i class="fa fa-envelope-open"></i></p>
						<p class="font-size-lg">Email</p><p>
					</p>
					</div>
				</div>
			</a>
		</div>
		@endif
		<!-- END Webmail -->
		
		<!-- Activity Log -->
		@if(Auth::user()->can('staff'))
		<div class="col-md-4">
			<a class="block block-link-shadow" href="/admin/activitylog">
				<div class="block-content text-center" style="height:215px;">
					<div class="py-20" style="margin-top: 35px;">
						<p class="h1 text-corporate-dark font-w600 mb-10"><i class="fa fa-user-secret"></i></p>
						<p class="font-size-lg">Website Activity Log</p><p>
					</p>
					</div>
				</div>
			</a>
		</div>
		@endif
		<!-- END Activity Log -->
		
		<!-- Documents -->
		@if(Auth::user()->can('files'))
		<div class="col-md-4">
			<a class="block block-link-shadow" href="/admin/docs">
				<div class="block-content text-center" style="height:215px;">
					<div class="py-20" style="margin-top: 35px;">
						<p class="h1 text-corporate-dark font-w600 mb-10"><i class="fa fa-folder"></i></p>
						<p class="font-size-lg">Documents and Downloads</p><p>
					</p>
					</div>
				</div>
			</a>
		</div>
		@endif
		<!-- END Documents -->
		
		<!-- Events -->
		@if(Auth::user()->can('events'))
		<div class="col-md-4">
			<a class="block block-link-shadow" href="/admin/events">
				<div class="block-content text-center" style="height:215px;">
					<div class="py-20" style="margin-top: 35px;">
						<p class="h1 text-corporate-dark font-w600 mb-10"><i class="fa fa-calendar"></i></p>
						<p class="font-size-lg">Events</p><p>
					</p>
					</div>
				</div>
			</a>
		</div>
		@endif
		<!-- END Events -->
		
		<!-- Scenery -->
		@if(Auth::user()->can('scenery'))
		<div class="col-md-4">
			<a class="block block-link-shadow" href="/admin/scenery">
				<div class="block-content text-center" style="height:215px;">
					<div class="py-20" style="margin-top: 35px;">
						<p class="h1 text-corporate-dark font-w600 mb-10"><i class="fa fa-sun-o"></i></p>
						<p class="font-size-lg">Scenery</p><p>
					</p>
					</div>
				</div>
			</a>
		</div>
		@endif
		<!-- END Scenery -->
		
		<!-- Feedback -->
		@if(Auth::user()->can('snrStaff'))
		<div class="col-md-4">
			<a class="block block-link-shadow" href="/admin/feedback">
				<div class="block-content text-center" style="height:215px;">
					<div class="py-20" style="margin-top: 35px;">
						<p class="h1 text-corporate-dark font-w600 mb-10"><i class="fa fa-star"></i></p>
						<p class="font-size-lg">Pending Feedback</p><p>
					</p>
					</div>
				</div>
			</a>
		</div>
		@endif
		<!-- END Feedback -->
		
	</div>
</div>
<!-- END Page Content -->
 
@stop
