<?php

namespace App\Http\Controllers;

use App\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showCategoryForm()
    {
        return view('back_end.category.category');
    }

    public function processCategoryForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required | min:5',
            'category_des' => 'required | min:100',
            'category_status' => 'required',
            'category_img' => 'required | image | mimes:jpg,jpeg,png,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $img = $request->File('category_img');
        $img_name = uniqid('category_',true).'_'.Str::random(10).'.'.$img->getClientOriginalExtension();

        if ($img->isValid()){
            $category_img = $img->storeAs('category',$img_name);
        }

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

            session()->flash('message', 'Oppes! Your category create unsuccessful.'.$exception->getMessage());
            session()->flash('type', 'danger');

            return redirect()->back();
        }
    }

    public function editCategoryForm($slug)
    {
        return view('back_end.category.edit_category')->with([
           'category' => Category::where('slug',$slug)->firstOrFail()
        ]);
    }

    public function updateCategoryForm()
    {

    }

    public function deleteCategoryForm(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();

        return redirect()->back();
    }

    public function showAllCategory()
    {
        return view('back_end.category.categories')->with([
            'categories' => Category::all()
        ]);
    }
}
