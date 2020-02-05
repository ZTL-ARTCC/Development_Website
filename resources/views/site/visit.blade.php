@extends('layouts.master')

@section('title')
@parent
| Statistics
@stop

@section('content')

<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('/assets_new/img/photos/stats_lp_bg.png');">
	<div class="bg-black-op-75">
		<div class="content content-center text-center">
			<div class="pt-50 pb-20">
				<h1 class="font-w700 text-white mb-10">ARTCC Statistics</h1>
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
			<span class="breadcrumb-item active">Visit</span>
		</nav>
	</div>
</div>
<!-- Page Content -->
<div class="content content-full">
<div class="container">
    {!! Form::open(['action' => 'FrontController@storeVisit']) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('cid', 'CID') !!}
                    {!! Form::text('cid', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('name', 'Full Name') !!}
                    {!! Form::text('name', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('rating', 'Rating') !!}
                    {!! Form::select('rating', [
                        1 => 'Observer (OBS)', 2 => 'Student 1 (S1)',
                        3 => 'Student 2 (S2)', 4 => 'Senior Student (S3)',
                        5 => 'Controller (C1)', 7 => 'Senior Controller (C3)',
                        8 => 'Instructor (I1)', 10 => 'Senior Instructor (I3)'
                    ], null, ['placeholder' => 'Select Rating', 'class' => 'form-control']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('home', 'Home ARTCC') !!}
                    {!! Form::text('home', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('reason', 'Explanation of Why You Want to Visit the ZTL ARTCC') !!}
            {!! Form::textArea('reason', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}
        </div>
        <div class="g-recaptcha" data-sitekey="6LcC3XoUAAAAAG8ST6HXqS3_reIZRLcA09sDdodw"></div>
        <br>
        <button class="btn btn-success" type="submit">Submit</button>
    {!! Form::close() !!}
</div>
@endsection