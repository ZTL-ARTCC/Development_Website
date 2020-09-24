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
    <div class="container">
        {!! Form::open(['action' => 'AdminDash@sendEmail']) !!}
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('from', 'From') !!}
                    {!! Form::text('from', 'info@notams.ztlartcc.org', ['disabled', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['placeholder' => 'Name (Required)', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                {!! Form::label('reply_to', 'Reply to Email') !!}
                {!! Form::text('reply_to', null, ['placeholder' => 'ex. youremail@ztlartcc.org (Required)', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('to', 'To (Single Person)') !!}
                    {!! Form::select('to', $controllers, null, ['placeholder' => 'Select Controller', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('bulk', 'Bulk Email') !!}
                    {!! Form::select('bulk', [
                        0 => 'All Controllers',
                        1 => 'Home Controllers',
                        6 => 'Home Observers',
                        7 => 'Home S1s',
                        8 => 'Home S2s',
                        9 => 'Home S3s',
                        10 => 'Home C1/C3s',
                        2 => 'Visiting Controllers',
                        3 => 'Mentors',
                        4 => 'Instructors',
                        5 => 'All Training Staff'
                    ], null, ['placeholder' => 'N/A', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('subject', 'Subject') !!}
            {!! Form::text('subject', null, ['placeholder' => 'Subject (Required)', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('message', 'Message') !!}
            {!! Form::textarea('message', null, ['id' => 'article-ckeditor', 'placeholder' => 'Message (Required)', 'class' => 'form-control']) !!}
        </div>
        <button class="btn btn-success" type="submit">Send</button>
        {!! Form::close() !!}
    </div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('article-ckeditor');
    </script>