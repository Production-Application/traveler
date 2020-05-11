<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showPackageForm()
    {
        return view('back_end.package.package');
    }

    public function processPackageForm(Request $request)
    {

    }
}
