@extends('layouts.master')

@section('title')
@parent
| Staff
@stop

@section('content')

<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('/assets_new/img/photos/feedback.jpg');">
	<div class="bg-black-op-75">
		<div class="content content-center text-center">
			<div class="pt-50 pb-20">
				<h1 class="font-w700 text-white mb-10">Feedback</h1>
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
			<span class="breadcrumb-item active">Feedback</span>
		</nav>
	</div>
</div>
<!-- End Breadcrumb -->

<!-- Page Content -->
<div class="content content-full">
<div class="container">
    {!! Form::open(['action' => 'FrontController@saveNewFeedback']) !!}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('controller', 'Controller:', ['class' => 'control-label']) !!}
                    {!! Form::select('controller', $controllers, null, ['placeholder' => 'Select Controller', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('service', 'Service Level:', ['class' => 'control-label']) !!}
                    {!! Form::select('service', [
                        0 => 'Excellent',
                        1 => 'Good',
                        2 => 'Fair',
                        3 => 'Poor',
                        4 => 'Unsatisfactory'
                    ], null, ['placeholder' => 'Select Level', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::label('pilot_name', 'Pilot Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('pilot_name', null, ['placeholder' => 'Your Name', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('pilot_email', 'Pilot Email:', ['class' => 'control-label']) !!}
                            {!! Form::email('pilot_email', null, ['placeholder' => 'Your Email', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('position', 'Position:', ['class' => 'control-label']) !!}
                    {!! Form::text('position', null, ['placeholder' => 'Position Staffed', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('callsign', 'Flight Callsign:', ['class' => 'control-label']) !!}
                    {!! Form::text('callsign', null, ['placeholder' => 'Your Flight Callsign', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('pilot_cid', 'Pilot VATSIM CID:', ['class' => 'control-label']) !!}
                    {!! Form::text('pilot_cid', null, ['placeholder' => 'Your VATSIM CID', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('comments', 'Additional Comments:', ['class' => 'control-label']) !!}
            {!! Form::textArea('comments', null, ['placeholder' => 'Additional Comments', 'class' => 'form-control']) !!}
        </div>
        <div class="g-recaptcha" data-sitekey="6LcC3XoUAAAAAG8ST6HXqS3_reIZRLcA09sDdodw"></div>
        <br>
        <button class="btn btn-success" type="submit">Send Feedback</button>
    {!! Form::close() !!}
</div>
@endsection
