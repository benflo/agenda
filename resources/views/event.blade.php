@extends('layouts.app2')

@section('content')
<div class="container">

    <div class="panel panel-primary">

        <div class="panel-heading">Agenda</div>

        <div class="panel-body">

            {!! Form::open(array('route' => 'events.add','method'=>'POST','files'=>'true')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @elseif (Session::has('warnning'))
                        <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                    @endif

                </div>

                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        {!! Form::label('titre','titre:') !!}
                        <div class="">
                            {!! Form::text('titre', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('titre', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        {!! Form::label('date debut','date debut:') !!}
                        <div class="">
                            {!! Form::date('date debut', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('date debut', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        {!! Form::label('date fin','date fin:') !!}
                        <div class="">
                            {!! Form::date('date fin', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('date fin', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                    {!! Form::submit('Ajout Evenement',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}

        </div>

    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">Details Evenement</div>
        <div class="panel-body" >
            {!! $calendar_details->calendar() !!}
        </div>
    </div>

</div>
    @endsection
