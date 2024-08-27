<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\ClassSubjectModel;
Use App\Models\ClassModel;
Use App\Models\SubjectModel;
Use App\Models\SchoolYearModel;
Use App\Models\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;

class ClassSubjectController extends Controller
{
    public function list(Request $request){

        // $classes = ClassModel::with('subjects')->get();
        $classes = ClassSubjectModel::getRecord();

        return view('faculty.assign_subject_class.list', compact('classes'));

    }

    public function AddClassSubjectAndTeacher(Request $request){
         
        $req = $request->all();
        
        for ($i=0; $i < count($req['subject_id']); $i++) { 
          $totalGrades = new ClassSubjectModel;
          $totalGrades->class_id = $req['class_id'];
          $totalGrades->subject_id = $req['subject_id'][$i];
          $totalGrades->school_year_id = $req['school_year_id'];
          $totalGrades->teacher_id = $req['teacher_id'][$i];
          $totalGrades->created_by = Auth::user()->id;
          $totalGrades->fromTime=$req['from'.$i];
          $totalGrades->toTime=$req['to'.$i];
          $totalGrades->schedule=implode("/", $req['schedule'.$i]);
          $totalGrades->save();
        
        }

        notify()->success('Assign Subject Successfully Create!');
        return redirect('faculty/assign_subject_class/list');
  
  }
  

      public function MyClassSubject()
      {
          $data['getRecord'] = ClassSubjectModel::getMyClassSubject(Auth::user()->id);



          return view('teacher.myclass_subject.list', $data);
      }
      

    public function Attendance($class_id, $school_year_id, $subject_id )
    {
  
          $students = User::where('class_id', $class_id)
          ->orderBy('last_name', 'asc')
          ->get();
      

        return view('teacher.attendance.attendances', compact('students'));
    }


    public function add(Request $request)
    
    {
        $data['getRecord'] = ClassModel::getRecord();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['getSchoolYearForAssign'] = SchoolYearModel::all();
        $data['getTeacher'] = User::getTeacher();
       
        return view('faculty.assign_subject_class.add', compact('data'));
    }


    public function remove($id){

        $remove = ClassSubjectModel::getSingle($id);
        $remove->delete();
           
        notify()->success('Assign Subject Successfully Delete!');
        return redirect('faculty/assign_subject_class/list');
    }


    public function edit($id)
    {   
      
        $data['getRecord'] = ClassModel::getRecord();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['getSchoolYearForAssign'] = SchoolYearModel::all();
        $data['getTeacher'] = User::getTeacher();

        $yourModel = ClassSubjectModel::findOrFail($id);

        $assignedSubjects = ClassSubjectModel::where('class_id', $yourModel->class_id)->get();
        $assignedTeachers = ClassSubjectModel::where('class_id', $yourModel->class_id)->get();

        $previousSchedule = DB::table('class_subject')->where('id', $id)->value('schedule');
        
        return view('faculty.assign_subject_class.edit',compact('data' , 'yourModel' ,'assignedSubjects' ,'assignedTeachers','previousSchedule'));
        
    }

    public function update(Request $request, $id)
    {   

        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
            
        ], [
         
        ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $yourModel = ClassSubjectModel::findOrFail($id);

    $yourModel->class_id = $request->input('class_id');
    $yourModel->subject_id = $request->input('subject_id')[0]; 
    $yourModel->teacher_id = $request->input('teacher_id')[0]; 

    $schedule = implode(',', $request->input('schedule', []));
    $yourModel->schedule = $schedule;

    $yourModel->fromTime = $request->input('from0');
    $yourModel->toTime = $request->input('to0');

    $yourModel->save();


        notify()->success('Assign Subject Successfully Update!');
        return redirect('faculty/assign_subject_class/list');
    }

  
    ///Student Side
    
    public function MySubject()
    {
        $subjects = ClassSubjectModel::getMySubject(Auth::user()->class_id);
      
 
         return view('student.subject.list', compact('subjects'));
    }

    // Auth::user()->class_id)
    

}
