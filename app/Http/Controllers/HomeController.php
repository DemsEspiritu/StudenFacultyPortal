<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dotenv\Validator;


class HomeController extends Controller
{    


    public function home()
    {    
        return view('home.home');

    }

    public function enroll()
    {    
         return view('home.enroll');
 
    }

    public function enroll_sub(Request $request)
    {


      $request->validate([
            'lrn' => 'required|max:11|unique:enroll_request,users',
            'name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'middle_name' => 'required|max:100',
            'email' => 'required|email|unique:enroll_request,users',
            'birthdate' => 'required|max:100',
            'address' => 'required|max:100',
            'age' => 'required|max:100',
            'gender' => 'required|max:100',
            'phone_number' => 'required|max:100',
            'place_bdate' => 'required|max:100',
            'user_type' => 'required|max:100',      

          ],[
            'user_type' => 'The type is required.',
            'sex' => 'Please select gender.',
            'lrn' => 'This LRN number is already used.',
            'email' => 'This Emaail is already used.',
            
       ]);

       
      $query = DB::table('enroll_request')->insert([
            'name'=>$request->input('name'),
            'last_name'=>$request->input('last_name'),
            'address'=>$request->input('address'),
            'age' => $request->input('age'),
            'sex' => $request->input('sex'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'grade' => $request->input('grade'),
            'created_at' => $request->input('created_at'),
            'user_type' => $request->input('user_type')

      ]);

 
     return redirect('home/enroll')->with('succes', "Form Submitted!");
    }
}
