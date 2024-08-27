<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\ClassModel;
Use App\Models\SchoolYearModel;
Use App\Models\User;
Use App\Models\AssignClassTeacherModel;
use Auth;

class AssignClassTeacherController extends Controller
{
    public function list(Request $request){

        $data['getRecord'] = AssignClassTeacherModel::getRecord();

        return view('faculty.assign_class_teacher.list', compact('data'));

    }

    public function add(Request $request)
    {
        $data['getRecord'] = ClassModel::getRecord();
        $data['getSchoolYearForAssign'] = SchoolYearModel::all();
        $data['getTeacher'] = User::getTeacher();

        return view('faculty.assign_class_teacher.add', compact('data'));
    }


    public function insert(Request $request){

        // dd($request->all()); 

       
      
                $save = new AssignClassTeacherModel;
                $save->class_id = $request->class_id;
                $save->teacher_id  = $request->teacher_id;
                $save->school_year_id  = $request->school_year_id;
                $save->created_by = Auth::user()->id;
                $save->save();

            
            notify()->success('Assign Class Teacher Successfully Create!');
            return redirect('faculty/assign_class_teacher/list');
    
         }
    



        //  TEACHER SIDE WORK


        // public function MyClassSubject()
        // {
        //     $data['getRecord'] = AssignClassTeacherModel::getMyClassSubject(Auth::user()->id);

        //    // dd($data['getRecord']->toArray());

        //     return view('teacher.myclass_subject.list', $data);
        // }

       
}
