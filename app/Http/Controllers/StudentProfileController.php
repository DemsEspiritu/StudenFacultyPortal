<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Auth;


class StudentProfileController extends Controller
{
    // public function list()
    // {    
      
    //   $studentlist = StudentProfile::all();

      
    //   return view('faculty.student.list',compact("studentlist"));
    // }



    public function list()
    {    
      $data['getStudentProfile'] = StudentProfile::getStudentProfile();

      return view('faculty.student.list',compact("data"));
         
    }




    // Teacher Side Work
    // public function MyStudent()
    // { 


    //   $data['getTeacherStudent'] = StudentProfile::getTeacherStudent(Auth::user()->id);

     
    //   return view('teacher.my_student.list', $data);
    // }




    // public function grades_list($student_profile_id)
    // {    

    //   $data['getStudentProfile'] = StudentProfile::getSingle($student_profile_id);
    //   if(!empty($data['getStudentProfile']))
    //   {
    //     return view('faculty.grades.list_grades', compact('data'));
    //   }
    //   else
    //   {
    //        abort(404);
    //   }

    // }
}
