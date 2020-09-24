@extends('layouts.master')

@section('title')
    @parent
    | Roster
@stop
@section('content')
    <div class="page-heading-two">
        <div class="container">
            <h2>Roster - Admin</h2>
        </div>
    </div>
    <div class="container">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#home">Home Controllers</a></li>
            <li><a data-toggle="tab" href="#visit">Visiting Controllers</a></li>

        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <br/>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="home-table" class="table table-condensed">
                                <thead>
                                <tr>
                                    <th width="20%">Name</th>
                                    <th width="15%">CID</th>
                                    <th width="20%">Email</th>
                                    <th width="15%">Rating</th>
                                    <th width="15%">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($hcontrollers as $h)
                                    <tr>
                                        <td>{{{$h->backwards_name}}}</td>
                                        <td>
                                            <a href="http://stats.vatsim.net/search_id.php?id={{$h->id}}">{{{$h->id}}}</a>
                                        </td>
                                        <td>{{{$h->email}}}</td>
                                        <td>{{{$h->rating_long}}}</td>
                                        <td>
                                            <a href="/admin/roster/edit/{{$h->id}}" style="display:inline-block"
                                               class="btn btn-success btn-xs simple-tooltip" title="Edit"><i
                                                    class="fa fa-pencil-square-o"></i></a>
                                            @if(Auth::user()->can('roster_del'))
                                                @if($h->loa == 0)
                                                    {{Form::open(['action'=>['AdminController@setLOA', $h->id], 'style'=>'display:inline-block'])}}
                                                    <button type="submit" class="btn btn-primary btn-xs simple-tooltip"
                                                            title="Mark LOA"><i class="fa fa-unlock"></i></button>
                                                    {{Form::close()}}
                                                @elseif($h->loa == 1)
                                                    {{Form::open(['action'=>['AdminController@setActive', $h->id], 'style'=>'display:inline-block'])}}
                                                    <button type="submit" class="btn btn-warning btn-xs simple-tooltip"
                                                            title="Mark Active"><i class="fa fa-lock"></i></button>
                                                    {{Form::close()}}
                                                @endif

                                                {{Form::open(['action'=>['AdminController@setFormerController', $h->id], 'style'=>'display:inline-block'])}}
                                                <button type="submit" class="btn btn-danger btn-xs simple-tooltip"
                                                        title="Delete"><i class="fa fa-times"></i></button>
                                                {{Form::close()}}
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <center>No Home Controllers</center>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="visit" class="tab-pane fade in">
                <br/>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="visit-table" class="table table-condensed">
                                <thead>
                                <tr>
                                    <th width="20%">Name</th>
                                    <th width="15%">CID</th>
                                    <th width="20%">Email</th>
                                    <th width="15%">Rating</th>
                                    <th width="15%">Visiting From</th>
                                    <th width="15%">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($vcontrollers as $v)
                                    <tr>
                                        <td>{{{$v->backwards_name}}}</td>
                                        <td>
                                            <a href="http://stats.vatsim.net/search_id.php?id={{$v->id}}">{{{$v->id}}}</a>
                                        </td>
                                        <td>{{{$v->email}}}</td>
                                        <td>{{{$v->rating_long}}}</td>
                                        <td>{{{$v->visitor_from}}}</td>
                                        <td>
                                            <a href="/admin/roster/edit/{{$v->id}}" style="display:inline-block"
                                               class="btn btn-success btn-xs simple-tooltip" title="Edit"><i
                                                    class="fa fa-pencil-square-o"></i></a>
                                            @if(Auth::user()->can('roster_del'))
                                                @if($v->loa == 0)
                                                    {{Form::open(['action'=>['AdminController@setLOA', $v->id], 'style'=>'display:inline-block'])}}
                                                    <button type="submit" class="btn btn-primary btn-xs simple-tooltip"
                                                            title="Mark LOA"><i class="fa fa-unlock"></i></button>
                                                    {{Form::close()}}
                                                @elseif($v->loa == 1)
                                                    {{Form::open(['action'=>['AdminController@setActive', $v->id], 'style'=>'display:inline-block'])}}
                                                    <button type="submit" class="btn btn-warning btn-xs simple-tooltip"
                                                            title="Mark Active"><i class="fa fa-lock"></i></button>
                                                    {{Form::close()}}
                                                @endif

                                                {{Form::open(['action'=>['AdminController@setFormerController', $v->id], 'style'=>'display:inline-block'])}}
                                                <button type="submit" class="btn btn-danger btn-xs simple-tooltip"
                                                        title="Delete"><i class="fa fa-times"></i></button>
                                                {{Form::close()}}
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <center>No Visiting Controllers</center>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#former-table").DataTable({
                "lengthChange": false,
                "bPaginate": false,
                "bFilter": true,
                "bInfo": false
            });
        });
    </script>

@stop
