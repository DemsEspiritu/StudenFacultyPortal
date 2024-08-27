<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\SchoolYearModel;
use App\Models\StudentProfile;
use App\Models\User;
use App\Models\ClassTeacherStudentModel;
use Auth;


class CreateClassRoomController extends Controller
{   

    protected $my_class;

    public function construct($my_class)
    {
      
        $this->my_class = $my_class;
        
    }



    public function list(Request $request){

        return view('faculty.create_class.list');
    }

    public function add(Request $request){

        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::all();
        $data['getSchoolYearForAssign'] = SchoolYearModel::all();
        $data['getStudentProfile'] = StudentProfile::getStudentProfile();
        $data['getTeacher'] = User::getTeacher();

        return view('faculty.create_class.add', compact("data"));

    }

    public function insert (Request $request)
    {
        $data = $request->input('$class_id','$teacher_id','$school_year_id','$subject_id','$student_profile_id'); // Assuming 'data' is an array in your request
        
        // Loop through the array and save each set of data to the database
        foreach ($data as $item) {
            ClassTeacherStudentModel::create([
                'class_id' => $class_id, // Replace 'column1' with your actual column names
                'teacher_id' => $teacher_id,
                'schooly_year_id' => $school_year_id,
                'subject_id' => $subject_id,
                'student_profile_id' => $student_profile_id,
                // Add more columns as needed
            ]);
        }
    
    }

    // public function insert (Request $request)
    // {
    //     $data = $request->input('class_id'); // Assuming 'data' is an array in your request

    //     // Loop through the array and save each set of data to the database
    //     foreach ((array)$data as $item) {
    //         ClassTeacherStudentModel::create([
    //             'class_id' => $item[''] // Replace 'column1' with your actual column names
             
    //             // Add more columns as needed
    //         ]);
    //     }
    
    // }

  


    // public function insert(Request $request){

    
    //         $classTeacherStudent = ClassTeacherStudentModel::create('$class_id','$teacher_id','$school_year_id','$subject_id','$student_profile_id');

    //         foreach($request->class_id as $class_id)
    //         {  
    //            $classTeacherStudent->class->create([
    //                 'class_id' => $class_id,
    //            ]);
    //         }

    //         foreach($request->teacher as $teacher_id)
    //         {  
    //            $classTeacherStudent->class->create([
    //                 'teacher_id' => $teacher_id,
    //            ]);
    //         }


    //         foreach($request->school_year_id as $school_year_id)
    //         {  
    //            $classTeacherStudent->class->create([
    //                 'school_year_id' => $school_year_id,
    //            ]);
    //         }

            
    //         foreach($request->subject_id as $subject_id)
    //         {  
    //            $classTeacherStudent->class->create([
    //                 'subject_id' => $subject_id,
    //            ]);
    //         }

               
    //         foreach($request->subject_id as $subject_id)
    //         {  
    //            $classTeacherStudent->class->create([
    //                 'subject_id' => $subject_id,
    //            ]);
    //         }

    //         foreach($request->student_profile_id as $student_profile_id)
    //         {  
    //            $classTeacherStudent->class->create([
    //                 'student_profile_id' => $student_profile_id,
    //            ]);
    //         }

        
     
    //         return redirect()->back()->with('error', 'Due to some error');
    //     }
    //     dd($request->all());
    



    // if(!empty($request->teacher_id))
    // {
    //     foreach ($request->teacher_id as $teacher_id)
    //     {
    //         $getAlreadyFirst = ClassTeacherStudentModel::getAlreadyFirst();
    //         if(!empty($getAlreadyFirst))
    //         {
    //             $getAlreadyFirst->school_year_id = $request->school_year_id;
    //             $getAlreadyFirst->save;
    //         }
    //         else
    //         {
    //             $save = new ClassTeacherStudentModel;
    //             $save->class_id            = $request->class_id;
    //             $save->teacher_id          = $request->teacher_id;
    //             $save->schooly_year_id     = $request->school_year_id;
    //             $save->subject_id          = $request->subject_id;
    //             $save->student_profile_id  = $request->student_profile_id;
    //             $save->save();
    //         }
    //     }
    //     notify()->success('Class Successfully Create!');
    //     return view('faculty.create_class.add');
    // }

}

