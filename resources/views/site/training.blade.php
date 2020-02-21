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
		<div class="table-responsive">
		<table class="availability table table-bordered table-condensed">
			<thead>
				<tr></tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
		<div class="col-md-12">
				<div class="block block-rounded">
					<div class="block-header block-header-default">
						<h3 class="block-title"><i class="fa fa-graduation-cap mr-5"></i>Book a training session</h3>
					</div>
					<div class="block-content">
					{{ Form::open(['action' => 'TrainingController@saveSession', 'class' => 'session-request-form']) }}
		<div class="row">
			<div class="col-sm-12">
				{{Form::label('slot', 'Mentor:', ['class'=>'control-label'])}}
				{{Form::select('slot', [], 0, ['class'=>'form-control','onChange'=>'populatePositions()'])}}
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					{{Form::label('position', 'Position:', ['class'=>'control-label'])}}
					{{Form::select('position', [], 0, ['class'=>'form-control'])}}
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					{{Form::label('date', 'Slot:', ['class'=>'control-label'])}}
					{{Form::text('date', null, ['class'=>'form-control', 'disabled' => 'disabled'])}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					{{Form::label('comments', 'Comments:', ['class'=>'control-label'])}}
					{{Form::textarea('comments', null, ['class'=>'form-control'])}}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
				</div>
			</div>
		</div>
	{{ Form::close() }}
					</div>
				</div>
			</div>
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
<script src="/assets/js/moment.min.js"></script>
<script src="/assets/js/moment-timezone-with-data-2010-2020.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js'></script>
<script>
	function pad (str, max) {
		str = str.toString();
		return str.length < max ? pad("0" + str, max) : str;
	}
	
    function populatePositions() {
		var $form = $(".session-request-form");
		var maxi = $form.find('option:selected').attr('name');
		var pos = ['Minor Delivery/Ground',
		'Major Delivery/Ground',
		'Minor Tower', 
		'Major Tower', 
		'Minor Approach',
		'Major Approach', 
		'Enroute'];
		var $Hookername = $form.find('#position');
		$Hookername.html('');
		for (i=0;i<=6;i++){
		    if (maxi-1>=i){
		        var $option = $("<option />");
		$option.val(i);
		$option.text(pos[i]);
		$Hookername.append($option);	
		    }
		}
	}
	var ratingIdToText = {!! json_encode(App\User::$RatingShort, JSON_FORCE_OBJECT) !!},
		currentAvailability = {!! $availability->toJSON() !!},
		now = moment(),
		$table = $(".availability"),
		$headerRow = $table.find('thead tr'),
		$body = $table.find('tbody');
if (!sessionStorage.getItem('timezone')) {var tz = jstz.determine() || 'UTC';sessionStorage.setItem('timezone', tz.name());}
var currTz = sessionStorage.getItem('timezone');
	now.tz('UTC');
	
	$(".time").text(now.format("HH:mm"));

	$headerRow.append($("<th />").text("Date"));

	for (var i = 0; i < 24; i++) {

		$headerRow.append($("<th />").text(pad(i, 2) + ":00"));
	}

	var slotsGrouped = currentAvailability.reduce(function(pv, avail){
		if (avail.slot in pv) {
			pv[avail.slot].push(avail);
		} else {
			pv[avail.slot] = [avail];
		}

		return pv;
	}, {});

	for (var i = 0; i < 14; i++) {
		var $tr = $("<tr />");

		$tr.append($("<th />").text(now.format('MM/DD')));

		for (var j = 0; j < 24; j++) {
			var $td = $("<td />"),
				date = now.format('YYYY-MM-DD') + ' ' + pad(j, 2) + ":00:00";

			if (date in slotsGrouped) {
				$td.addClass('available');
				$td.addClass('simple-tooltip');
				$td.data('toggle', 'tooltip');

				var slots = slotsGrouped[date],
					mentors = slots.map(function(slot){
						return slot.mentor.first_name + " " + slot.mentor.last_name + " - " + ratingIdToText[slot.mentor.rating_id];
					});

				$td.attr('title', mentors.join("\n"));

				$td.on('click', (function(date){
					return function(){
						var slots = slotsGrouped[date],
							$form = $(".session-request-form"),
							$slot = $form.find('#slot');


						$form.show();
						$form.find('#date').val(date);

						$slot.html('');
						slots.forEach(function(slot){
							var $option = $("<option />");
							$option.val(slot.id);
							$option.attr("name", slot.mentor.max);
							$option.text(slot.mentor.first_name + " " + slot.mentor.last_name + " - " + ratingIdToText[slot.mentor.rating_id]);

							$slot.append($option);
						});
						populatePositions();
					}
				})(date));
			}

			$tr.append($td);
		}

		$body.append($tr);
		now.add(1, 'd');
	}
</script>
@stop
