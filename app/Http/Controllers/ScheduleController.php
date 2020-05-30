<?php

namespace App\Http\Controllers;

use App\Package;
use App\Schedule;
use Exception;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showScheduleForm()
    {
        $data['packages'] = Package::all();
        return view('back_end.package.schedule', $data);
    }

    public function processScheduleForm(Request $request)
    {
        try {
            Schedule::create($request->all());

            session()->flash('message', 'Congratulations! Your category created successfully.');
            session()->flash('type', 'success');

            return redirect()->back();
        } catch (Exception$exception) {

            session()->flash('message', 'Oppes! Your category create unsuccessful.'.$exception->getMessage());
            session()->flash('type', 'danger');
        }
    }

    public function showAllSchedule()
    {
        return view('back_end.package.schedules');
    }
}
