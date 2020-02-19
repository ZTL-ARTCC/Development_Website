@extends('layouts.master')

@section('title')
@parent
| Controller Profile
@stop

@section('content')
@if($user)

<!-- User Info -->
<div class="bg-image bg-image-bottom" style="background-image: url('/assets_new/img/photos/profile_bg_lp.png');">
	<div class="bg-primary-dark-op py-30">
		<div class="content content-full text-center">
		<br />
			<!-- Personal -->
			<h1 class="h3 text-white font-w700 mb-10">Profile: {{{$user->full_name}}} ({{{$user->id}}})
				
			</h1>
			<!-- END Personal -->
		</div>
	</div>
</div>
<!-- END User Info -->

<!-- Breadcrumb -->
<div class="bg-body-light border-b">
	<div class="content py-5 text-center">
		<nav class="breadcrumb bg-body-light mb-0">
			<a class="breadcrumb-item" href="be_pages_ecom_dashboard.html">Home</a>
			<span class="breadcrumb-item active">Profile</span>
		</nav>
	</div>
</div>
<!-- END Breadcrumb -->

<!-- Main Content -->
	<div class="content">
		
		<!-- Quick Stats of User -->
		<h2 class="content-heading">
			<i class="fa fa-user mr-5"></i> Quick User Statistics
		</h2>
		<div class="row text-center">
                        <div class="col-sm-6 col-lg-3">
                            <div class="block">
                                   <a class="block block-transparent text-center bg-success">
                                <div class="block-content">
                                    <p class="font-size-h1 text-white">
                                        <strong>
											@if(!empty($stats['month']))
											{{{ $stats['month'] }}}
											@else
											0
											@endif
										</strong>
                                    </p>
                                    <p class="font-w600 text-white-op">
                                        <i class="fa fa-calendar mr-5"></i> <?php echo date("M Y"); ?> Hours
                                    </p>
                                </div>
                            </a>
                            </div>
                        </div>
						<div class="col-sm-6 col-lg-3">
                            <div class="block">
                                <a class="block block-transparent text-center bg-gd-lake" href="/edit_pic/<?php echo $user->id; ?>">
                                <div class="block-content"><img class="img-avatar" src="<?php echo $user->path; ?>.jpg" alt="Profile Picture">
                                  <br>
                                    <p class="font-w600 text-white-op">
                                       <br>
                                    </p>
                                </div>
                            </a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="block">
                                <a class="block block-transparent text-center bg-primary" >
									<div class="block-content">
                                    <p class="font-size-h1 text-white">
                                        <strong>
											@if(!empty($stats['total']))
											{{{ $stats['total'] }}}
											@else
											0
											@endif
										</strong>
                                    </p>
                                    <p class="font-w600 text-white-op">
                                        <i class="fa fa-clock-o mr-5"></i> All-Time Hours
                                    </p>
                                </div>
                            </a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="block">
                                <a class="block block-transparent text-center bg-gd-dusk" >
                                <div class="block-content">
                                    <p class="font-size-h1 text-white">
                                        <strong>{{{$user->rating_short}}}</strong>
                                    </p>
                                    <p class="font-w600 text-white-op">
                                        <i class="fa fa-user mr-5"></i> VATSIM Rating
                                    </p>
                                </div>
                            </a>
                            </div>
                        </div>
        </div>
		
		<!-- Certifications -->
		<h2 class="content-heading">
			<i class="fa fa-address-card mr-5"></i> Certifications
		</h2>
		<div class="row items-push">
			<div class="col-md-6 col-xl-6">
				<div class="block block-content block-content-full ribbon-left ribbon ribbon-bookmark ribbon-danger" style="height:350px;">
					<div class="ribbon-box">Minor Certifications</div>
					<br /><br /><div class="block-content block-content-full block-content-sm">
						<table class="table table-borderless table-vcenter" style="font-size: 1.5em;">
                                <tbody>
                                    <tr>
                                        @if($user->del == 99)
										<td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5">Solo Certification</span></td>
										@elseif($user->del == 1)
										<td><span class="badge badge-pill badge-danger"><i class="fa fa-check-circle mr-5"></i>Minor Delivery Certification</span></td>
										@elseif($user->del == 0)
											<td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No Minor Delivery Certification</span></td>
										@endif
                                    </tr>
									<tr>
                                        @if($user->gnd == 99 )
										<td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5">Solo Certification</span></td>
										@elseif($user->gnd == 1)
										<td><span class="badge badge-pill badge-danger"><i class="fa fa-check-circle mr-5"></i>Minor Ground Certification</span></td>
										@elseif($user->gnd == 0)
											<td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No Minor Ground Certification</span></td>
										@endif
                                    </tr>
									<tr>
                                        @if($user->twr == 99)
											<td><span class="badge badge-pill badge-danger"><i class="fa fa-check-circle mr-5"></i>Solo Certification</span></td>
										@elseif($user->twr == 1)
										<td><span class="badge badge-pill badge-danger"><i class="fa fa-check-circle mr-5"></i>Minor Tower Certification</span></td>
										@elseif($user->twr == 0)
											<td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No Minor Tower Certification</span></td>
										@endif
                                    </tr>
									<tr>
                                        @if($user->app == 99)
										<td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5"></i>Solo Certification</span></td>
										@elseif($user->app == 1)
										<td><span class="badge badge-pill badge-danger"><i class="fa fa-check-circle mr-5"></i>Minor TRACON Certification</span></td>
										@elseif($user->app == 0)
											<td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No Minor TRACON Certification</span></td>
										@endif
                                    </tr>
                                </tbody>
                            </table>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-6">
			<div class="block block-content block-content-full ribbon-left ribbon ribbon-bookmark ribbon-success" style="height:350px;">
					<div class="ribbon-box">Major Certifications</div>
					<br /><br /><div class="block-content block-content-full block-content-sm">
						<table class="table table-borderless table-vcenter" style="font-size: 1.5em;">
                                <tbody>
                                    <tr>
                                        @if($user->del == 1)
											<td><span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-5"></i>Atlanta Delivery Certification</span></td>
										@elseif($user->del == 99)
											<td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5"></i>Solo Atlanta Delivery Certification</span></td>
										@elseif($user->del == 0)
											<td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No Atlanta Delivery Certification</span></td>
										@endif
                                    </tr>
									<tr>
                                        @if($user->gnd == 1)
											<td><span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-5"></i>Atlanta Ground Certification</span></td>
										@elseif($user->gnd == 99)
											<td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5"></i>Solo Atlanta Ground Certification</span></td>
										@elseif($user->gnd == 0)
											<td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No Atlanta Ground Certification</span></td>
										@endif
                                    </tr>
									<tr>
                                        @if($user->twr == 1)
											<td><span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-5"></i>Solo Atlanta Tower Certification</span></td>
										@elseif($user->twr == 99)
											<td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5"></i>Solo Atlanta Certification</span></td>
										@elseif($user->twr == 0)
											<td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No Atlanta Tower Certification</span></td>
										@endif
                                    </tr>
									<tr>
                                        @if($user->app == 1)
											<td><span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-5"></i>A80 TRACON Certification</span></td>
										@elseif($user->app == 99)
											<td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5"></i>Solo A80 TRACON Certification</span></td>
										@elseif($user->app == 0)
											<td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No A80 TRACON Certification</span></td>
										@endif
                                    </tr>
									<tr>
                                        @if($user->ctr == 1)
											<td><span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-5"></i>ZTL Center Certification</span></td>
										@elseif($user->ctr == 99)
											<td><span class="badge badge-pill badge-warning"><i class="fa fa-times-circle mr-5"></i>Solo ZTL Center Training</span></td>
										@elseif($user->ctr == 0)
											<td><span class="badge badge-pill badge-secondary"><i class="fa fa-times-circle mr-5"></i>No ZTL Center Certification</span></td>
										@endif
                                    </tr>
                                </tbody>
                            </table>
					</div>
				</div>
			</div>
		</div>
		<!-- END Certifications -->
		
		<!-- Session Statistics -->
		<h2 class="content-heading">
			<i class="fa fa-pie-chart mr-5"></i> User Data
		</h2>
		
		<div class="row text-center">
			<div class="col-md-6 col-xl-6">
				<div class="block">
				<div class="block-header block-header-default">
                   <h3 class="block-title">Feedback</h3>
                </div>
					<div class="block-content">
						<table class="table table-bordered table-striped table-vcenter js-dataTable-profile dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Date</th>
										<th style="text-align: center;">Position</th>
                                        <th style="text-align: center;">Service Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($feedback as $f)
										<tr>
											<td>{{{$f->created_at}}}z</td>
											<td><a href="/feedback/{{$f->id}}">{{{$f->position}}}</a></td>
											<td>{{{$f->level_text}}}</td>
										</tr>
									@endforeach
                                </tbody>
                            </table>
						
					</div>
			</div>
			</div>
			<div class="col-md-6 col-xl-6">
				<div class="block">
				<div class="block-header block-header-default">
                   <h3 class="block-title">Controller Sessions</h3>
                </div>
					<div class="block-content">
						<table class="table table-bordered table-striped table-vcenter js-dataTable-profile dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Date</th>
                                        <th style="text-align: center;">Position</th>
                                        <th style="text-align: center;">Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
									@foreach($log as $l)
										<tr>
											<td>{{{$l->date}}}</td>
											<td>{{{$l->position}}}</td>
											<td>{{{$l->duration_time}}}</td>
										</tr>
									@endforeach
								</tbody>
                            </table>
					</div>
				</div>
			</div>
        </div>
	</div>
	@else
	<!-- Page Content -->
	<div class="content content-full">
		<div class="hero-inner">
			<div class="content content-full">
				<div class="py-30 text-center">
					<div class="display-3 text-danger">
						<i class="fa fa-warning"></i> Profile Error
					</div>
					<h1 class="h2 font-w700 mt-30 mb-10">You just found an error page!</h1>
					<h2 class="h3 font-w400 text-muted mb-50">We are sorry. The profile you are looking for was not found.</h2>
					<a class="btn btn-hero btn-rounded btn-alt-secondary" href="/">
						<i class="fa fa-arrow-left mr-10"></i> Back to Homepage
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- END Page Content -->
	@endif

@stop
