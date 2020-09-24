@extends('layouts.master')

@section('title')
    @parent
    | Controller Profile
@stop

@section('content')
    @if($user)

        <!-- User Info -->
        <div class="bg-image bg-image-bottom"
             style="background-image: url('/assets_new/img/photos/profile_bg_lp.png');">
            <div class="bg-primary-dark-op py-30">
                <div class="content content-full text-center">
                    <br/>
                    <!-- Personal -->
                    <h1 class="h3 text-white font-w700 mb-10">Profile: {{{$user->full_name}}} ({{{$user->id}}})

                    </h1>
                    <!-- END Personal -->
                </div>
            </div>
        </div>
        <div class="content">

            <!-- Quick Stats of User -->
            <h2 class="content-heading">
                <i class="fa fa-user mr-5"></i> Quick User Statistics
            </h2>
            <div class="row text-center">
                <div class="container-fluid" style="background-color:#F0F0F0;">
                    &nbsp;
                    <h2>Upload Profile</h2>
                    &nbsp;
                </div>
                <br>

                <div class="container-fluid" style="background-color:#F0F0F0;">
                    &nbsp;
                    <h2>Upload Profile</h2>
                    &nbsp;
                </div>
                <br>
                <div class="container">
                    {!! Form::open(['action' => 'FrontController@edit', 'files' => true]) !!}

                    <div class="form-group">

                        {!! Form::textArea('cid', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}


                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                            <button class="btn btn-success" action="submit">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

