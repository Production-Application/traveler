<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function showDashboard()
    {
        return view('back_end.dashboard');
    }
}
