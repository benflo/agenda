@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Agenda</div>
        <div class="panel-body" >
            {!! $calendar_details->calendar() !!}
        </div>
    </div>

</div>
    @endsection
