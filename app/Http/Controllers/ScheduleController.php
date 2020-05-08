<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct()
    {
    }

    public function showScheduleForm()
    {
        return view('back_end.package.schedule');
    }

    public function processScheduleForm(Request $request)
    {
    }

    public function showAllSchedule()
    {
        return view('back_end.package.schedules');
    }
}
