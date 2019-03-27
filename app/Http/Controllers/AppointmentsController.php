<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Helpers\Utilities;
use App\Helpers\AppointmentHelper;
use Validator;
use App\Appointments;
use Calendar;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller
{
    public function index(){
        $appointments = AppointmentHelper::getAllUserAppointments();
        $appointment_list = [];
        foreach($appointments as $key => $appointment){
            $appointment_list[] = Calendar::event( 
                $appointment->title ."\r\n[". Utilities::prettyTime($appointment->start_time)." - ". Utilities::prettyTime($appointment->end_time)."]",
                false,
                new \DateTime($appointment->date.' '.$appointment->start_time),
                new \DateTime($appointment->date.' '.$appointment->end_time),
                null,
                [
                    'color' => 'blue',
                    'textColor' => '#fff',
                ]
            );
        }
        $calendar_details = Calendar::addEvents($appointment_list);
        return view('pages.appointments.index', compact('calendar_details'));
    }

    public function create(){
        return view('pages.appointments.create');
    }

    public function store(Request $request){
        if($request['start_time'] > $request['end_time']){
            \Session::flash('warning', 'Start time cannot be greater than end time');
            return Redirect::to('/appointments/create');
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        if ($validator->fails()){
            \Session::flash('warning', 'Please enter the valid details');
            return Redirect::to('/appointments/create')->withInput()->withErrors($validator);
        }

        $appointment = new Appointments;
        $appointment->title = $request['title'];
        $appointment->date = $request['date'];
        $appointment->start_time = $request['start_time'];
        $appointment->end_time = $request['end_time'];
        $appointment->user_id = Auth::id();
        $appointment->save();

        \Session::flash('success', 'Appointment added successfully');
        return Redirect::to('/appointments');

    }

    public function list(){
        $appointments = AppointmentHelper::getAllUserAppointments();
        return view('pages.appointments.list', compact('appointments'));
    }
}
