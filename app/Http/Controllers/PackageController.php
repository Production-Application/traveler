<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showPackageForm()
    {
        $data['categories'] = Category::all();
        return view('back_end.package.package',$data);
    }

    public function processPackageForm(Request $request)
    {
        dd($request->all());
    }
}
