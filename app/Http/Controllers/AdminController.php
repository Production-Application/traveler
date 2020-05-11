<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginFrom()
    {
        return view('back_end.auth.login');
    }

    public function processLoginFrom(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!Auth::guard('admin')
            ->attempt(['email' => $request->input('email'), 'password' => $request->input('password')],
                $request->remember)) {


            session()->flash('message', 'Opps! Access denied.');
            session()->flash('type', 'danger');

            return redirect()->back()->withInput($request->only('email', 'remember'));
        }

        session()->flash('message', 'Congratulations! You are authorized');
        session()->flash('type', 'success');

        return redirect()->intended(route('dashboard'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->intended(route('admin.login'));
    }

}
