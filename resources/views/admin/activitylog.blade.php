@extends('layouts.master')

@section('title')
    @parent
    | Activity Log
@stop

@section('content')

    <div class="page-heading-two">
        <div class="container">
            <h2>Website Activity Log</h2>
        </div>
    </div>


    <div class="container">
        <div class="row" id="allLogs">
            <div class="col-sm-12">
                {{ $audits->links() }}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped no-footer">
                        <thead>
                        <tr>
                            <th width="20%">Time</th>
                            <th width="50%">Description</th>
                            <th width="30%">IP</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($audits as $a)
                            <tr>
                                <td>{{ $a->time_date }}</td>
                                <td>{{ $a->what }}</td>
                                <td>{{ $a->ip }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $audits->links() !!}
                </div>
                <hr>
            </div>
        </div>


        <script src="/assets/js/activitylog.js"></script>

@stop