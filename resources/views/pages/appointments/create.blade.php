@extends('layouts.app')

@section('content')
<div class="form-div">
    <form method="POST" action="{{route('appointments.store')}}"  class="">
        <!-- @csrf -->
        <input type="hidden" name="_token" id="csrf_token" value="{{Session::token()}}" />
        <h3>Add Appointment</h3>
        @if (Session::has('warning'))
            <div class="alert alert-danger">{{ Session::get('warning')}}</div>
        @endif
        <div>
            <label for="title"> Name of Appointment <span class="required">*</span></label>
            <div>
                <input type="text" id="title" value="{{ old('title')}}" name="title" required="required">
                @if ($errors->has('title'))
                <span class="error text-danger">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div>
            <label for="class_name"> Date of Appointment <span class="required">*</span></label>
            <div>
            <input type="date" id="date" value="{{ old('date')}}" name="date" required="required">
            @if ($errors->has('date'))
            <span class="error text-danger">
                <strong>{{ $errors->first('date') }}</strong>
            </span>
            @endif
            </div>
        </div>
        <div class="col-md-6">
            <label class="" for="start_time"> Start Time <span class="required">*</span>
            </label>
            <div>
                <input type="time" id="start_time" value="{{ old('start_time')}}" name="start_time" required="required">
                @if ($errors->has('start_time'))
                <span class="error text-danger">
                    <strong>{{ $errors->first('start_time') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <label class="" for="end-time"> End Time <span class="required">*</span>
            </label>
            <div>
            <input type="time" id="end_time" value="{{ old('end_time')}}" name="end_time" required="required">
            @if ($errors->has('end_time'))
            <span class="error text_danger">
                <strong>{{ $errors->first('end_time') }}</strong>
            </span>
            @endif
            </div>
        </div>
            <button type="submit">+ Add Appointment </button> 
    </form>
</div>
        
@endsection