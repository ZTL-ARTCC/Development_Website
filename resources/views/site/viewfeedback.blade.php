@extends('layouts.master')

@section('title')
    @parent
    | Feedback
@stop



@section('content')

    <!-- Hero -->
    <div class="bg-gd-sea">
        <div class="bg-black-op-25">
            <div class="content content-top content-full text-center">
                <h1 class="h3 text-white font-w700 mb-10">


                </h1>

            </div>
        </div>
        <div class="container-fluid" style="background-color:#F0F0F0;">
            &nbsp;
            <h2>Showing Feedback Details for {{ $feedback->controller_name }}</h2>
            &nbsp;
        </div>
        <br>

        <div class="container">
            <a href="/profile" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
            <br><br>

            <div class="card">
                <div class="card-header">
                    <h3>
                        Feedback Left on {{ $feedback->created_at }}, Saved at {{ $feedback->updated_at }}
                    </h3>
                </div>
                <div class="card-body">
                    <p><b>Position:</b> {{ $feedback->position }}</p>
                    <p><b>Pilot Callsign:</b> {{ $feedback->callsign }}</p>
                    <p><b>Service Level:</b> {{ $feedback->service_level_text }}</p>
                    <p><b>Pilot Comments:</b></p>
                    @if($feedback->comments != null)
                        <p>{!! nl2br(e($feedback->comments)) !!}</p>
                    @else
                        <p>The pilot did not leave any comments.</p>
                    @endif
                    <p><b>Staff Comments:</b></p>
                    @if($feedback->staff_comments != null)
                        <p>{!! nl2br(e($feedback->staff_comments)) !!}</p>
                    @else
                        <p>The staff have not left any comments.</p>
                    @endif
                </div>
            </div>
        </div>
@endsection
