<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showDashboard()
    {
        return view('back_end.dashboard');
    }
}
