@extends('layouts.master')

@section('title')
    @parent
    | Controller Profile
@stop

@section('content')


    <!-- User Info -->
    <div class="bg-image bg-image-bottom" style="background-image: url('/assets_new/img/photos/profile_bg_lp.png');">
        <div class="bg-primary-dark-op py-30">
            <div class="content content-full text-center">
                <br/>
                <!-- Personal -->


                </h1>
                <!-- END Personal -->
            </div>
        </div>
    </div>


    <div class="container-fluid" style="background-color:#F0F0F0;">
        &nbsp;
        <h2>Upload Profile</h2>
        &nbsp;
    </div>
    <br>
    <div class="container">
        {!! Form::open(['action' => ['AdminDash@editprofilepic', $user->id], 'files' => true]) !!}
        <div class="form-group">
            {!! Form::file('file', ['class' => 'form-control']) !!}
        </div>

        <div class="row">
            <div class="col-sm-1">
                <button class="btn btn-success" action="submit">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

