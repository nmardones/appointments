<?php

namespace App\Http\Controllers;

use App\User;
use App\Appointment;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        Appointment::create($request->all());
        return redirect()->route('appointment.index');
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
