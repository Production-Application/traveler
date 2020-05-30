<?php

namespace App\Http\Controllers;

use App\Category;
use App\Package;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showPackageForm()
    {
        $data['categories'] = Category::all(['id', 'category_name']);
        return view('back_end.package.package', $data);
    }

    public function processPackageForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'package_title' => 'required',
            'package_sub_title' => 'required',
            'package_attractions' => 'required',
            'package_best_time' => 'required',
            'package_des' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $img = $request->file('package_img');
        $img_name = uniqid('package_', true) . '_' . Str::random(10) . '.' . $img->getClientOriginalExtension();

        if ($img->isValid()) {
            $package_img = $img->storeAs('package', $img_name);
        }
        try {
            Package::create([
                'category_id' => $request->input('category_id'),
                'package_title' => $request->input('package_title'),
                'package_sub_title' => $request->input('package_sub_title'),
                'package_attractions' => $request->input('package_attractions'),
                'package_best_time' => $request->input('package_best_time'),
                'package_des' => $request->input('package_des'),
                'package_img' => $package_img,
                'slug' => strtolower(Str::slug($request->input('package_title'), '-'))
            ]);

            session()->flash('message', 'Congratulations! Your package created successfully.');
            session()->flash('type', 'success');

            return redirect()->back();

        } catch (Exception $exception) {
            session()->flash('message', 'Oppes! Your package create unsuccessful.' . $exception->getMessage());
            session()->flash('type', 'danger');

            return redirect()->back();
        }
    }

    public function showAllPackages()
    {
        $data['packages'] = Package::all();
        return view('back_end.package.packages',$data);
    }
}
