@extends('layouts.master')

@section('title')
@section('content')

    <div class="page-heading-two">
        <div class="container">
            <h2>Announcements Admin</h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            {!! Form::open(['action' => 'AdminDash@saveAnnouncement']) !!}
            @csrf
            <div class="form-group">
                {{{ Form::label('body', 'Announcement (Leave Blank to Remove the Announcement):', ['class' => 'control-label']) }}}
                {{{ Form::textArea('body', $announcement->body, ['placeholder' => 'Leave Blank for no Announcement', 'id' => 'article-ckeditor', 'class' => 'form-control']) }}}
            </div>
            <p class="small"><i>Last edited by {{ $announcement->staff_name }} on {{ $announcement->update_time }}</i>
            </p>
            <button class="btn btn-success" type="submit">Save Announcement</button>
            {!! Form::close() !!}
        </div>
    </div>
    </div>
    {{ Form::close() }}
    </div>
    </div>

@stop
