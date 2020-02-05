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
			<script id="setmore_script" type="text/javascript" src="https://my.setmore.com/webapp/js/src/others/setmore_iframe.js"></script><a class="btn btn-hero btn-noborder btn-rounded btn-alt-primary js-appear-enabled animated fadeInUp" data-toggle="appear" data-class="animated fadeInUp" data-timeout="300" href="https://my.setmore.com/bookingpage/3598990c-a847-4107-81eb-de1794648684/"><i class="fa fa-calendar-plus-o mr-5"></i> Book a Training Session</a>
			@endif
		</div>
	</div>
</div>
<!-- END Hero -->

<!-- Breadcrumb -->
<div class="bg-body-light border-b">
	<div class="content py-5 text-center">
		<nav class="breadcrumb bg-body-light mb-0">
			<a class="breadcrumb-item" href="/">Home</a>
			<a class="breadcrumb-item" href="/profile">Profile</a>
			<span class="breadcrumb-item active">My Training Center</span>
		</nav>
	</div>
</div>
<!-- END Breadcrumb -->

<!-- Main Page Content -->
<div class="content">
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
	
		<!-- Training Notes and Exams -->
		<h2 class="content-heading">
			<i class="fa fa-sticky-note mr-5"></i> Training Information
		</h2>
		<div class="row">
			<div class="col-md-12">
				<div class="block block-rounded">
					<div class="block-header block-header-default">
						<h3 class="block-title"><i class="fa fa-pencil mr-5"></i> Training Notes</h3>
					</div>
					<div class="block-content">
						<table class="table table-striped table-vcenter">
								<thead>
									<tr>
										<th style="text-align:center;">Date</th>
										<th style="text-align:center;">Position</th>
										<th style="text-align:center;">Training Staff</th>
								
								
									</tr>
								</thead>
								<tbody>
								@if(isset($tickets))
                           			 @foreach($tickets as $t)
                                <tr>
                                    <td><center><a href="/dashboard/controllers/ticket/{{ $t->id }}">{{ $t->date }}</a></center></td>
                                    <td><center>{{ $t->position_name }}</center></td>
									<td><center>{{ $t->trainer_name }}</center></td>
                                </tr>
                            	@endforeach
                        @endif
								</tbody>
							</table>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="block block-rounded">
					<div class="block-header block-header-default">
						<h3 class="block-title"><i class="fa fa-graduation-cap mr-5"></i> Examinations</h3>
					</div>
					<div class="block-content">
						<table class="table table-striped table-vcenter">
								<thead>
									<tr>
										<th style="text-align:center;">Exam Name</th>
										<th style="text-align:center;">Date</th>
										<th style="text-align:center;">Score</th>
										<th style="text-align:center;">Result</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										if(count($exam)==0){
											echo '<tr><td colspan="4"><center>No exam history available.</center></td></tr>';
										}
										else{
											foreach($exam as $e){
												if($e['exam_name']!=""){
													echo '<tr><td style="text-align:center;">'.$e['exam_name'].'</td>';
													echo '<td style="text-align:center;">'.date('Y-m-d',strtotime(explode("T",$e['date'])[0])).'</td>';
													echo '<td style="text-align:center;">'.$e['score'].'%</td>';
													if($e['passed']=="1"){
														echo '<td style="text-align:center;"><span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-5"></i>Passed</span></td>';
													}else{
														echo '<td style="text-align:center;"><span class="badge badge-pill badge-danger"><i class="fa fa-cross-circle mr-5"></i>Failed</span></td>';
													}
													echo '</tr>';
												}
											}
										}
									?>
								</tbody>
								</table>
					</div>
				</div>
			</div>
        	
	</div>
	
	
	
</div>
<!-- END Main Page Content -->

@stop
