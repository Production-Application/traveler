<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    public function __construct()
    {
    }

    public function showCategoryForm()
    {
        return view('back_end.category.category');
    }

    public function processCategoryForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required | min:5',
            'category_des' => 'required | min:200',
            'category_status' => 'required',
            'category_img' => 'required | image | mimes:jpg,jpeg,png,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category_img = 0;

        try {
            Category::create([
                'category_name' => $request->input('category_name'),
                'category_des' => $request->input('category_des'),
                'category_status' => $request->input('category_status'),
                'category_img' => $category_img,
                'slug' => strtolower(Str::slug($request->input('category_name'), '-'))
            ]);

            session()->flash('message', 'Congratulations! Your category created successfully.');
            session()->flash('type', 'success');

            return redirect()->back();

        } catch (Exception $exception) {

            session()->flash('message', 'Oppes! Your category create unsuccessful.');
            session()->flash('type', 'danger');

            return redirect()->back();
        }
    }

    public function showAllCategory()
    {
        return view('back_end.category.categories');
    }
}
