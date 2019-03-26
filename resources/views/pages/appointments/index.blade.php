@extends('layouts.app')

@section('content')
        @if (Session::has('success')) 
            <div class="alert alert-success text-center success-alert">{{ Session::get('success')}}</div>
        @endif
        <div class="calendar">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3>My Appointments</h3>
                    <a href="/appointments/create" class="btn btn-primary">+ Add Appointment</a>
                    <a href="/appointments/list" class="btn btn-success">Appointment List</a>
                </div>

                <div class="panel-body">
                    {!! $calendar_details->calendar() !!}
                </div>
            </div>
        </div>
@endsection