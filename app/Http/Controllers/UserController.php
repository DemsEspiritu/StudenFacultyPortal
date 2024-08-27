<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
Use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
//     public function MyAccount()
//     {
//         $data['getRecord'] = User::getSingle(Auth::user()->id);
        
//         if(Auth::user()->user_type == 4 )

//         4 = faculty as aadmin
// 2= teacher
// // 3 stdeut
//     }

    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);

        if(Auth::user()->user_type == 4)
        {
            return view('student.my_account', $data);
        }
        else if(Auth::user()->user_type == 3)
        {
            return view('student.my_account', $data);
        }
    }

    public function Update(Request $request)
    {   
        $id = Auth::user()->id;

        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'name'=> 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            // 'address' => 'required',
            // 'father_name' => 'required',
            // 'mother_name' => 'required',
            // 'father_phone' => 'required',
            // 'mother_phone' => 'required',

       ],[
            'email.unique' => 'email has already been taken.'
       ]);

       $student = User::getSingle($id);
       $student->email = trim($request->email);
       $student->name = trim($request->name);
       $student->middle_name = trim($request->middle_name);
       $student->last_name = trim($request->last_name);
       $student->phone_number = trim($request->phone_number);
       $student->address = trim($request->address);
       $student->father_name = trim($request->father_name);
       $student->mother_name = trim($request->mother_name);
       $student->father_phone = trim($request->father_phone);
       $student->mother_phone = trim($request->mother_phone);
       if(!empty($request->password))
       {
            $student->password = Hash::make($request->password);
       }
       $student->save();

       notify()->success('Account Successfully Updated!');

       return redirect('student/account');

    }


    ///Teacher Account
    public function TeacherMyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);

        if(Auth::user()->user_type == 2)
        {
            return view('teacher.my_account', $data);
        }
        else if(Auth::user()->user_type == 2)
        {
            return view('teacher.my_account', $data);
        }
    }

    public function TeacherMyUpdate(Request $request)
    {   
        $id = Auth::user()->id;

        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'name'=> 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
       ],[
            'email.unique' => 'email has already been taken.'
       ]);

       $student = User::getSingle($id);
       $student->email = trim($request->email);
       $student->name = trim($request->name);
       $student->middle_name = trim($request->middle_name);
       $student->last_name = trim($request->last_name);
       $student->phone_number = trim($request->phone_number);
       $student->address = trim($request->address);
       $student->father_name = trim($request->father_name);
       $student->mother_name = trim($request->mother_name);
       $student->father_phone = trim($request->father_phone);
       $student->mother_phone = trim($request->mother_phone);
       if(!empty($request->password))
       {
            $student->password = Hash::make($request->password);
       }
       $student->save();

       notify()->success('Account Successfully Updated!');

       return redirect('teacher/account');

    }

    public function grades()
    {
        return $this->hasMany(TotalGrades::class, 'id');
    }



   
}

