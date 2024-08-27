<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\LogicalAnd;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {
        //dd(hash::make('password'));
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1 ){
                return redirect('admin/dashboard');
            }

            if(Auth::user()->user_type == 2 ){
                return redirect('teacher/dashboard');
            }

            if(Auth::user()->user_type == 3 ){
                return redirect('student/dashboard');
            }

            if(Auth::user()->user_type == 4 ){
                return redirect('faculty/dashboard');
            }
        }
        return view('auth/login');
    }

    public function AuthLogin(Request $request)
    {
    //  dd($request->all());
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {   
            if(Auth::user()->user_type == 1 ){
                return redirect('admin/dashboard');
            }

            if(Auth::user()->user_type == 2 ){
                return redirect('teacher/dashboard');
            }

            if(Auth::user()->user_type == 3 ){
                return redirect('student/dashboard');
            }

            if(Auth::user()->user_type == 4 ){
                return redirect('faculty/dashboard');
            }

            //return redirect('admin/dashboard');
        }
        else
            {
                return redirect()->back()->with('error', 'Please Enter a Correct Email and Password');
            }
        }

        public function logout(){
            {
                Auth::logout();
                return redirect(url(''));
            }
        }
    
}
