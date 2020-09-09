@extends('layouts.master')

@section('title')
@parent
| Add Training Note | Administrator Center
@stop

@section('content')

<!-- Hero -->
<div class="bg-gd-dusk">
	<div class="bg-black-op-25">
		<div class="content content-top content-full text-center">
			<h1 class="h3 text-white font-w700 mb-10">
				Add Training Note
			</h1>
			<h2 class="h4 font-w400 text-white-op">Atlanta ARTCC Administrator Center</h2>
		</div>
	</div>
</div>
<!-- END Hero -->

<!-- Breadcrumb -->
<div class="bg-body-light border-b">
	<div class="content py-5 text-center">
		<nav class="breadcrumb bg-body-light mb-0">
			<a class="breadcrumb-item" href="/">Home</a>
			<a class="breadcrumb-item" href="/admin/dashboard">Administrator Center</a>
			<span class="breadcrumb-item active">Training Admin</span>
			<span class="breadcrumb-item active">Add Training Note</span>
		</nav>
	</div>
</div>
<!-- End Breadcrumb -->

<div class="content content-full">
	<div class="row">
		<div class="col-md-12">
			<div class="block block-themed">
				<div class="block-content">
					{{ Form::open(['action' => 'Training\MentorController@saveTicket']) }}
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									{{Form::label('controller', 'Controller:', ['class'=>'control-label'])}}
									{{Form::select('controller', $user, null, ['class'=>'form-control'])}}
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
                                {!! Form::label('position', 'Training Session', ['class' => 'form-label']) !!}
                    {!! Form::select('position', [
                                                 7 => 'S1T1-DEL-1 (Theory)',
                        8 => 'S1P1-DEL-2',
                        10 => 'S1M1-DEL-4 (Live Network Monitoring – CLT)',
                        11 => 'S1T2-DEL-5 (Theory, ATL)',
                        12 => 'S1P3-DEL-6',
                        13 => 'S1M2-DEL-7 (Live Network Monitoring – ATL)',
                        14 => 'S1T3-GND-1 (Theory)',
                        15 => 'S1P4-GND-2',
                        16 => 'S1P5-GND-3',
                        17 => 'S1M3-GND-4 (Live Network Monitoring – CLT)',
                        18 => 'S1T4-GND-5 (Theory, ATL)',
                        19 => 'S1P6-GND-6',
                        20 => 'S1P7-GND-7',
                        21 => 'S1M4-GND-8 (Live Network Monitoring – ATL)',
                        22 => 'S2T1-TWR-1 (Theory)',
                        23 => 'S2P1-TWR-2',
                        24 => 'S2P2-TWR-3',
                        25 => 'S2P3-TWR-4',
                        26 => 'S2M1-TWR-5 (Live Network Monitoring – CLT)',
                        27 => 'S2T2-TWR-6 (Theory, ATL)',
                        28 => 'S2P4-TWR-7',
                        29 => 'S2P5-TWR-8',
                        30 => 'S2M2-TWR-9 (Live Network Monitoring – ATL)',
                        31 => 'S3T1-APP-1 (Theory)',
                        32 => 'S3T2-APP-2 (Theory)',
                        33 => 'S3P1-APP-3',
                        34 => 'S3P2-APP-4',
                        35 => 'S3M1-APP-5 (Live Network Monitoring - BHM/CLT)',
                        36 => 'S3T3-APP-6 (Theory)',
                        37 => 'S3P3-APP-7',
                        38 => 'S3P4-APP-8',
                        39 => 'S3P5-APP-9',
                        40 => 'S3P6-APP-10',
                        41 => 'S3M2-APP-11 (Live Network Monitoring – ATL)',
                        42 => 'C1T1-CTR-1 (Theory)',
                        43 => 'C1P1-CTR-2',
                        45 => 'C1P3-CTR-3',
                        46 => 'C1M2-CTR-4',
                        47 => 'C1M3-CTR-5 (Live Network Monitoring)',
                        48 => 'C1M4-CTR-6',
                        49 => 'S1 Visiting Major Checkout',
                        50 => 'S2 Visiting Major Checkout',
                        51 => 'S3 Visiting Major Checkout',
                        52 => 'C1 Visiting Major Checkout',
                        53 => 'Enroute OTS',
                        54 => 'Approach OTS',
                        55 => 'Local OTS',
                    ], null, ['placeholder' => 'Select Training Session', 'class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
                                @if(Auth::user()->hasRole('ins'))
                        {!! Form::label('type', 'Progress', ['class' => 'form-label']) !!}
                        {!! Form::select('type', [
                            10 => 'No Show',
                            12 => 'Completed',
                            13 => 'Incompleted',
                        ], null, ['placeholder' => 'Select Position', 'class' => 'form-control']) !!}
                    @else
                        {!! Form::label('type', 'Progress', ['class' => 'form-label']) !!}
                        {!! Form::select('type', [
                            10 => 'No Show',
                            12 => 'Completed',
                            13 => 'Incompleted',


                        ], null, ['placeholder' => 'Select Progress Type', 'class' => 'form-control']) !!}
                    @endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
                                {!! Form::label('date', 'Date', ['class' => 'form-label']) !!}
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                        {!! Form::text('date', null, ['placeholder' => 'MM/DD/YYYY', 'class' => 'form-control datetimepicker-input', 'data-target' => '#datetimepicker1']) !!}
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
								</div>
							</div>
                            </div>
							<div class="col-sm-2">
								<div class="form-group">
									{{Form::label('start', 'Start Time:', ['class'=>'control-label'])}}
                                    {!! Form::text('start', null, ['placeholder' => '00:00', 'class' => 'form-control datetimepicker-input', 'data-target' => '#datetimepicker4']) !!}
								</div>
							</div>
                            <div class="col-sm-2">
								<div class="form-group">
									{{Form::label('end', 'End Time:', ['class'=>'control-label'])}}
                                    {!! Form::text('end', null, ['placeholder' => '00:00', 'class' => 'form-control datetimepicker-input', 'data-target' => '#datetimepicker4']) !!}
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									{{Form::label('duration', 'Duration (mins):', ['class'=>'control-label'])}}
                                    {!! Form::text('duration', null, ['placeholder' => '00:00', 'class' => 'form-control datetimepicker-input', 'data-target' => '#datetimepicker2']) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{{Form::label('comments', 'Comments and Notes:', ['class'=>'control-label'])}}
									{{Form::textarea('comments', null, ['class'=>'form-control'])}}
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="col-sm-12">
								<div class="form-group">
                                {!! Form::label('trainer_comments', 'Trainer Comments (Visible to Only Other Trainers)', ['class' => 'form-label']) !!}
                    {!! Form::textArea('trainer_comments', null, ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>
                        {!! Form::label('ots', 'Recommend for OTS?', ['class' => 'form-label']) !!}
                        {!! Form::checkBox('ots', '1') !!}
                        <br>
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
	</div>
</div>
<script type="text/javascript">
$(function () {
    $('#datetimepicker1').datetimepicker({
        format: 'L'
    });
});

$(function () {
    $('#datetimepicker2').datetimepicker({
        format: 'HH:mm'
    });
});

$(function () {
    $('#datetimepicker3').datetimepicker({
        format: 'HH:mm'
    });
});

$(function () {
    $('#datetimepicker4').datetimepicker({
        format: 'HH:mm'
    });
});
</script>
<script>
    $(document).ready(function ($) {
        $('#timepicker').datetimepicker({
            format: 'hh:mm a'
        });
    });
</script>


@stop
