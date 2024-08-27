<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Models\User;
use App\Models\ClassModel;
class AssignClassController extends Controller
{
    
    

    

    public function show(): View
    {
        
        $stud = StudentProfile::all()->toArray();
        $prof = User::getTeacher()->toArray()['data'];
      //  dd($stud);
        $classes = ClassModel::all()->toArray();
        $merge = array_merge($stud,$prof);
        //dd($classes);
        return view('faculty.create_schedule.index',compact('merge','classes'));
    }
}
