<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function index()
    {
        $apponitment = Appointment::all();
        return view('appointment.index',compact('apponitment'));
    }
    public function create()
    {
        return view('appointment.create');
    }
    public function store(AppointmentRequest $request)
    {
        $date = $request->get('date');
        $start_time = $request->get('start_time');
        $finish_time = $request->get('finish_time');
        if($request->get('start_time'))
        {
            $sql ="select date,start_time from appointments where start_time ='$start_time' and date='$date'";
            $result = DB::select($sql);
            if(!empty($result)){
                return redirect()->route('appointment.create')->withErrors('There are records for this hour');
            }
            if((substr($start_time,0,-6)) < '09' ){
                return redirect()->route('appointment.create')->withErrors('can not enter this time');
            }
            if((substr($finish_time,0,-6)) > '18' ){
                return redirect()->route('appointment.create')->withErrors('can not enter this time');
            }else{
                Appointment::create($request->all());
                return redirect()->route('appointment.index');
            }
        }
    }
    public function edit(Request $request,$id)
    {
        $appointment = Appointment::find($id);
        return view('appointment/edit',compact('appointment'));
    }
    public function update(Request $request,$id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());
        return redirect()->route('appointment.index');
    }
}
