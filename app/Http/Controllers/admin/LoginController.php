<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    // The method will show admin login page/screen
    public function index() {
        return view ('admin.login');
    }

    // This method will uthenticate admin user
    public function authenticate(Request $request) {

        $validator = Validator::make($request->all(),[
            'email' =>'required|email' ,
            'password' => 'required'
        ]);

        if ($validator->passes()){
            if(Auth::guard('superadmin')->attempt(['email' => $request->email,'password' =>$request->password])){

                if(Auth::guard('superadmin')->user()->role != "superadmin"){
                    Auth::guard('superadmin')->logout();
                    return redirect()->route('admin.login')->with('error','You are not authorized to access this page.');

                }
                return redirect()->route('admin.dashboard');
            } else{
                return redirect()->route('admin.login')->with('error','Either email or password is incorrect.');
            }

        } else{
            return redirect()->route('admin.login')
            ->withInput()
            ->withErrors($validator);
        }
    }

    // This Method will logout Super admin user
    public function logout () {
        Auth::guard('superadmin')->logout();
        return redirect()->route('admin.login');
    }
}
