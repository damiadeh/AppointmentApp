@extends('layouts.app')

@section('content')

@if (Session::has('success')) 
        <div class="alert alert-success text-center success-alert">{{ Session::get('success')}}</div>
@endif
<div class="app-list">
    <h3>List of Appointments</h3>
</div>
<div class="container">
    <table id="table_id" class="table display">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Title</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($appointments as $appointment)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$appointment->title}}</td>
                <td>{{date('D, F j, Y',strtotime($appointment->date))}}</td>
                <td>{{date("h:ia", strtotime($appointment->start_time))}}</td>
                <td>{{date("h:ia", strtotime($appointment->end_time))}}</td>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>
</div>

        
@endsection