@section('content')
<div class="container-fluid" style="background-color:#F0F0F0;">
    &nbsp;
    <h2>Upload Profile</h2>
    &nbsp;
</div>
<br>
<div class="container">
{!! Form::open(['action' => 'FrontController@sFile', 'files' => true]) !!}
<div class="form-group">
            {!! Form::file('file', ['class' => 'form-control']) !!}
        </div>
          <div class="form-group">

            {!! Form::label('cid', 'Enter your CID') !!}

            {!! Form::textArea('cid', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}

        </div>
        <div class="row">
            <div class="col-sm-1">
                <button class="btn btn-success" action="submit">Submit</button>
            </div>
     <div class="form-group">

            {!! Form::label('cid', 'Enter your CID') !!}

            {!! Form::textArea('cid', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}

        </div>
        </div>
    {!! Form::close() !!}
    </div>

