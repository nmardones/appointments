<?php

namespace App\Http\Controllers\Api\v1;

use App\appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index()
    {
        return Appointment::all();
    }
}
