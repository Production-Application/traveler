<?php

namespace App\Http\Controllers;

use App\Category;
use App\Package;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'package_title' => 'required',
            'package_sub_title' => 'required',
            'package_attraction' => 'required',
            'package_best_time' => 'required',
            'package_des' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            Package::create($request->all());

            session()->flash('message', 'Congratulations! Your package created successfully.');
            session()->flash('type', 'success');

            return redirect()->back();

        } catch (Exception $exception) {
            session()->flash('message', 'Oppes! Your package create unsuccessful.'.$exception->getMessage());
            session()->flash('type', 'danger');

            return redirect()->back();
        }
    }
}
