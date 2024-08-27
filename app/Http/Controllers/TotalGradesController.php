<?php

namespace App\Http\Controllers;
use App\Models\SubjectModel;
use Illuminate\Database\Eloquent\Builder;
use App\Models\GradesHandlingSetDate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Models\TotalGrades;
use App\Models\ClassModel;
use App\Models\AssignClassTeacherModel;
use App\Models\User;
use App\Models\GradingLogModel;
use App\Models\GradesPeriod;
use App\Models\ClassSubjectModel;
use Illuminate\Support\Facades\DB;
use Auth;



class TotalGradesController extends Controller
{


  public function MyGrades()
  {
    $userId = auth()->user()->id;


    $grades = TotalGrades::where('student_id', $userId)
        ->get();

        // dd($grades->pluck('subject'));

    return view('student.grade.mygrade', compact('grades'));
  }


    public function list()
    {    
      $data['getStudentProfile'] = StudentProfile::getStudentProfile();


      return view('faculty.grades.list',compact("data"));
         
    }


   


    public function ClassGrades(int $class_id, int $school_year_id, int $subject_id, $subject_name )
    {   

      // $subject_name = DB::table('subject')
      //   ->where('subject_id', $subject_id)
      //   ->value('name');


        $students = User::where('class_id', $class_id)
            ->orderBy('last_name', 'asc')
            ->get();
    
    
        $gradingFilter = DB::table('class_periods')
            ->select('name', 'short_name', 'status' ,'position')
            ->get();



            $grades = [];

            foreach ($students as $student) {
                $studentGrades = TotalGrades::where('school_year_id', $school_year_id)
                    ->where('subject_id', $subject_id)
                    ->where('class_id', $class_id)
                    ->where('student_id', $student->id)
                    ->get();
                $grades[$student->id] = $studentGrades;
            }

        if (!empty($students)) {
          return view('teacher.grades.student-class-grades', [
            'students' => $students,
            'gradingFilter' => $gradingFilter,
            'grades' => $grades,
            'class_id' => $class_id,  // Pass class_id to the view
            'subject_id' => $subject_id,  // Pass subject_id to the view
            'school_year_id' => $school_year_id,  // Pass school_year_id to the view
            'subject_name' => $subject_name
        ]);
        } else {
            abort(404);
        }
    } 

    

    // public function saveGrades(Request $request, int $class_id, int $subject_id, int $school_year_id)
    // {
    //   foreach ($request->input('grades') as $gradingData) {
    //     $student_id = $gradingData['student_id'];

    //     $updateData = [
    //         'school_year_id' => $school_year_id,
    //         'subject_id' => $subject_id,
    //         'class_id' => $class_id,
    //         'teacher_id' => Auth::user()->id,
    //         'student_id' => $student_id,
    //     ];

    //     $totalGrades = 0;
    //     $numGrades = 0;

    //     // Iterate through grading columns and update data
    //     for ($i = 1; $i <= 4; $i++) {
    //         $gradingKey = $i . '_grading';
    //         if (isset($gradingData[$gradingKey])) {
    //             $updateData[$gradingKey] = $gradingData[$gradingKey];
    //             $totalGrades += $gradingData[$gradingKey];
    //             $numGrades++;
    //         }
    //     }

    //     // Calculate final grades
    //     $finalGrades = $numGrades > 0 ? ($totalGrades / $numGrades) : 0;
    //     $updateData['final_grades'] = $finalGrades;

    //     // Determine passed or failed
    //     $updateData['passed_failed'] = $finalGrades >= 75 ? 'PASSED' : 'FAILED';

    //     // Update or create the TotalGrades record
    //     TotalGrades::updateOrCreate(
    //         [
    //             'school_year_id' => $school_year_id,
    //             'subject_id' => $subject_id,
    //             'class_id' => $class_id,
    //             'teacher_id' => Auth::user()->id,
    //             'student_id' => $student_id,
    //         ],
    //         $updateData
    //     );
    // }

    //   notify()->success('Class Grades Successfully saved!');
    //   return redirect()->back()->with('success', 'Grades saved successfully');
    // }

    public function saveGrades(Request $request, int $class_id, int $subject_id, int $school_year_id,string $subject_name)
    {   

    

      foreach ($request->input('grades') as $gradingData) {
        $student_id = $gradingData['student_id'];

        $updateData = [
            'school_year_id' => $school_year_id,
            'subject_id' => $subject_id,
            'class_id' => $class_id,
            'teacher_id' => Auth::user()->id,
            'student_id' => $student_id,
            'subject_name' => $subject_name 
        ];

        $totalGrades = 0;
        $numGrades = 0;

        // Iterate through grading columns and update data
        for ($i = 1; $i <= 4; $i++) {
            $gradingKey = $i . '_grading';
            if (isset($gradingData[$gradingKey])) {
                $updateData[$gradingKey] = $gradingData[$gradingKey];
                $totalGrades += $gradingData[$gradingKey];
                $numGrades++;
            }
        }

        // Calculate final grades
        $finalGrades = $numGrades > 0 ? ($totalGrades / $numGrades) : 0;
        $updateData['final_grades'] = $finalGrades;

        // Determine passed or failed
        $updateData['passed_failed'] = $finalGrades >= 75 ? 'PASSED' : 'FAILED';

        // Update or create the TotalGrades record
        TotalGrades::updateOrCreate(
            [
                'school_year_id' => $school_year_id,
                'subject_id' => $subject_id,
                'class_id' => $class_id,
                'teacher_id' => Auth::user()->id,
                'student_id' => $student_id,
            ],
            $updateData
        );
    }

      notify()->success('Class Grades Successfully saved!');
      return redirect()->back()->with('success', 'Grades saved successfully');
    }









//********************************************************************************************************************************** */


    public function addStudentGrades(Request $request)
    {
      $req = $request->all();
      
      for ($i=0; $i < count($req['ids']); $i++) { 
        $totalGrades = TotalGrades::find($req['ids'][$i]);
        if(!empty($req['first_grading'][$i])){
          $totalGrades->first_grading = $req['first_grading'][$i];
        }
        if(!empty($req['second_grading'][$i])){

          $totalGrades->second_grading = $req['second_grading'][$i];
        }
        if(!empty($req['third_grading'][$i])){
          $totalGrades->third_grading = $req['third_grading'][$i];

        }
        if(!empty($req['fourth_grading'][$i])){
          $totalGrades->fourth_grading = $req['fourth_grading'][$i];

        }
        
        if(!empty($totalGrades->first_grading) 
        && !empty( $totalGrades->second_grading) &&
          !empty( $totalGrades->third_grading) && !empty($totalGrades->fourth_grading)){
          
          $total = ($totalGrades->first_grading + $totalGrades->second_grading + $totalGrades->third_grading +$totalGrades->fourth_grading) / 4;
          $totalGrades->final_grades = $total;
          $totalGrades->passed_failed = $total >= 75 ? "PASSED" : "FAILED";
        }

        $totalGrades->save();
      }
      notify()->success('Grade Successfully save!');
      return redirect()->back();
    }
  
   
    public function addStudentRecord(Request $request){
      
      $req = $request->all();
      
      $existingData = DB::table("total_grades_sbujects")->where('users_id',$req['users_id'])->where('school_year_id',$req['school_year_id'])->get()->toArray();
      $newData = array_map( function ($data){
        return $data->subject_id;
      },$existingData);
      
      foreach ($req['subjects'] as $key => $value) {
        if(!in_array($value,$newData)){
            $record = new TotalGrades();
            $record-> users_id = $req['users_id'];
            $record-> school_year_id = $req['school_year_id'];
            $record-> subject_id = $value;
            $record->Save();
        }else{
          foreach($newData as $temp){
            if(!in_array($temp,$req['subjects'])){
                DB::table("total_grades_sbujects")->where('users_id',$req['users_id'])->where('subject_id',$temp)->where('school_year_id',$req['school_year_id'])->delete();
            }
          }
          
            
          
        }
        
      }
      
      return redirect()->back();

    }

    //teahcer side

    public function student_list_grades($id)
    {    

      $data['getStudentProfile'] = User::getSingle($id);
      
      $subjects = ClassSubjectModel::getStudentSubject(Auth::user()->id,
      $data['getStudentProfile']->class_id)->toArray();
      
      $grades = DB::table('total_grades_sbujects')
      ->join('subject', 'total_grades_sbujects.subject_id', '=', 'subject.subject_id')
      ->where('users_id', $data['getStudentProfile']->id)
      ->where('school_year_id',$data['getStudentProfile']->school_year_id)
      ->get()->toArray();

      

      $gradingFilter = GradingLogModel::where('school_year_id','=',$subjects[0]['school_year_id'])->get();
      $now = date('Y-m-d');
      $now=date('Y-m-d', strtotime($now));
      
     foreach ($gradingFilter as $key => $value) {
        if(($now >= $value->fromdate) && ($now <= $value->enddate)){
            $gradingFilter = $value->description;
        }
     }
    //  if(is_countable($gradingFilter)){
    //    dd($gradingFilter);
    //  }
     

      if(!empty($data['getStudentProfile']))
      {
        return view('teacher.grades.list', compact('data','subjects','grades','gradingFilter'));
      }
      else
      {
           abort(404);
      }

    }


    public function add(Request $request, $id) {

        $user = $id;
        $firstgrade = $request->first_grading;
        $secondgrade = $request->second_grading;
        $thirdgrade = $request->third_grading;
        $fourthgrade = $request->fourth_grading;


        for ($i=0; $i < count($user); $i++)
        {
          $datasave = [
              'first_grading' => $fistgrade,
              'second_grading' => $secondgrade,
              'third_grading' => $thirdgrade,
              'fourth_grading' => $fourthgrade,
          ];
          DB::table('total_grades_sbujects')->insert($datasave);
        }
    }

    
    // public function MyGrades()
    // {
      
    //   $user = Auth::user();

    //   $grades = DB::table('total_grades_sbujects')
    //   ->join('subject', 'total_grades_sbujects.subject_id', '=', 'subject.subject_id')
    //   ->where('total_grades_sbujects.student_id', '=', $user->id)
    //   ->where('total_grades_sbujects.school_year_id', '=', $user->school_year_id)
    //   ->select('subject.name as subject_name', 'subject.subject_id')
    //   ->get();

    //  return view('student.grade.mygrade', compact('grades'));
    // }


}
