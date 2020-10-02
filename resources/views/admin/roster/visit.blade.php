@extends('layouts.master')

@section('title')
    @parent
    | Visiting Requests | Administrator Center
@stop

@section('content')

    <!-- Hero -->
    <div class="bg-gd-dusk">
        <div class="bg-black-op-25">
            <div class="content content-top content-full text-center">
                <h1 class="h3 text-white font-w700 mb-10">
                    Pending Visiting Requests
                </h1>
                <h2 class="h4 font-w400 text-white-op">Jacksonville ARTCC Administrator Center</h2>
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
                <a class="breadcrumb-item" href="/admin/roster">Manage Roster</a>
                <span class="breadcrumb-item active">Pending Visiting Requests</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <div class="container">
        <div class="form-group inline">
            <a href="/dashboard/controllers/roster" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
            <span data-toggle="modal" data-target="#manualAdd">
            <button type="button" class="btn btn-warning">Manual Add Controller</button>
        </span>
        </div>
        <br><br>
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#new" role="tab" data-toggle="tab" style="color:black">New Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#accepted" role="tab" data-toggle="tab" style="color:black">Accepted
                    Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#rejected" role="tab" data-toggle="tab" style="color:black">Rejected
                    Requests</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="new">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name (CID)</th>
                        <th scope="col">
                            <center>Rating</center>
                        </th>
                        <th scope="col">
                            <center>Email</center>
                        </th>
                        <th scope="col">
                            <center>Home ARTCC/Division</center>
                        </th>
                        <th scope="col">
                            <center>Submitted at</center>
                        </th>
                        <th scope="col" width="120px">
                            <center>Actions</center>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($new)
                        @foreach($new as $v)
                            <tr>
                                <td data-toggle="tooltip" title="{{ $v->reason }}">{{ $v->name }} ({{ $v->cid }})</td>
                                <td>
                                    <center>{{ $v->rating_short }}</center>
                                </td>
                                <td>
                                    <center>{{ $v->email }}</center>
                                </td>
                                <td>
                                    <center>{{ $v->home }}</center>
                                </td>
                                <td>
                                    <center>{{ $v->created_at }}</center>
                                </td>
                                <td>
                                    <a href="/dashboard/admin/roster/visit/accept/{{ $v->id }}"
                                       class="btn btn-success simple-tooltip" data-toggle="tooltip" title="Accept"><i
                                            class="fa fa-check"></i></a>
                                    <span data-toggle="modal" data-target="#reject{{ $v->id }}">
                                        <button type="button" class="btn btn-danger simple-tooltip" data-placement="top"
                                                data-toggle="tooltip" title="Reject"><i
                                                class="fas fa-times"></i></button>
                                    </span>
                                </td>
                            </tr>
                            <div class="modal fade" id="reject{{ $v->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Reason for Visit Request Rejection</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {!! Form::open(['action' => ['AdminDash@rejectVisitRequest', $v->id]]) !!}
                                        @csrf
                                        <div class="modal-body">
                                            {!! Form::label('reject_reason', 'Please specify why the visit request is being rejected. This will be sent to the requesting visitor with a rejection notification.') !!}
                                            {!! Form::textArea('reject_reason', 'Your visit request has been rejected.', ['placeholder' => 'Required', 'class' => 'form-control']) !!}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button action="submit" class="btn btn-success">Confirm</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No new visit requests to show.</p>
                    @endif
                    </tbody>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="accepted">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name (CID)</th>
                        <th scope="col">
                            <center>Rating</center>
                        </th>
                        <th scope="col">
                            <center>Email</center>
                        </th>
                        <th scope="col">
                            <center>Home ARTCC/Division</center>
                        </th>
                        <th scope="col">
                            <center>Accepted at</center>
                        </th>
                        <th scope="col">
                            <center>Accepted by</center>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($accepted)
                        @foreach($accepted as $v)
                            <tr>
                                <td data-toggle="tooltip" title="{{ $v->reason }}">
                                    <center>{{ $v->name }} ({{ $v->cid }})
                                </td>
                                <td>
                                    <center>{{ $v->rating_short }}</center>
                                </td>
                                <td>
                                    <center>{{ $v->email }}</center>
                                </td>
                                <td>
                                    <center>{{ $v->home }}</center>
                                </td>
                                <td>
                                    <center>{{ $v->updated_at }}</center>
                                </td>
                                <td>
                                    <center>{{ App\Models\User::find($v->updated_by)->full_name }}</center>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p>No accepted visit requests to show.</p>
                    @endif
                    </tbody>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="rejected">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name (CID)</th>
                        <th scope="col">
                            <center>Rating</center>
                        </th>
                        <th scope="col">
                            <center>Email</center>
                        </th>
                        <th scope="col">
                            <center>Home ARTCC/Division</center>
                        </th>
                        <th scope="col">
                            <center>Rejected at</center>
                        </th>
                        <th scope="col">
                            <center>Rejected by</center>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($rejected)
                        @foreach($rejected as $v)
                            <tr>
                                <td data-toggle="tooltip" title="{{ $v->reason }}">
                                    <center>{{ $v->name }} ({{ $v->cid }})</center>
                                </td>
                                <td>
                                    <center>{{ $v->rating_short }}</center>
                                </td>
                                <td>
                                    <center>{{ $v->email }}</center>
                                </td>
                                <td>
                                    <center>{{ $v->home }}</center>
                                </td>
                                <td>
                                    <center>{{ $v->updated_at }}</center>
                                </td>
                                <td>
                                    <center>{{ App\Models\User::find($v->updated_by)->full_name }}</center>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p>No rejected visit requests to show.</p>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="manualAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Manually Add Controller</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['action' => 'AdminDash@manualAddVisitor']) !!}
                    @csrf
                    <div class="modal-body">
                        <div class="container">
                            <div class="form-group">
                                <div class="row">
                                    {!! Form::label('cid', 'Controller CID') !!}
                                    {!! Form::text('cid', null, ['placeholder' => 'Controller CID', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button action="submit" class="btn btn-success">Search CID</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection