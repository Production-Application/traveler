<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showSubCategoryForm()
    {
        return view('back_end.category.sub_category');
    }

    public function processSubCategoryForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'sub_category_name' => 'required',
            'sub_category_status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            SubCategory::create([
                'category_id' => $request->input('category_id'),
                'sub_category_name' => $request->input('sub_category_name'),
                'sub_category_status' => $request->input('sub_category_status'),
                'slug' => strtolower(Str::slug($request->input('sub_category_name'), '-')),
            ]);

            session()->flash('message', 'Congratulations! Your sub category created successfully.');
            session()->flash('type', 'success');

            return redirect()->back();

        } catch (Exception $exception) {

            session()->flash('message', 'Oppes! Your sub category create unsuccessful.');
            session()->flash('type', 'danger');

            return redirect()->back();
        }
    }
}
