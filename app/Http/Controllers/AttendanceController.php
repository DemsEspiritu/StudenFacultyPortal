<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\User;
use App\Models\StudentAttendance;
use App\Models\ClassModel;
use App\Models\SchoolYearModel;
use Auth;
use Barryvdh\DomPDF\Facade;
use Illuminate\Support\Facades\View;
use PDF;
use App\Models\GradingLogModel;
use App\Models\SubjectModel;
use DB;
use Carbon\Carbon;




class AttendanceController extends Controller
{
    public function storeclassAttendances(Request $request, int $class_id, int $subject_id, int $school_year_id)
    {   
   
        // Validate the form data
        $request->validate([
            'attendance_date' => 'required|date',
            'attendances' => 'required|array',
        ]);

        $attendanceDate = $request->input('attendance_date');
        
        $Subject = $request->input('subject_id');

        $Sy = $request->input('school_year_id');

        $attendanceDate = Carbon::parse($request->input('attendance_date'))->format('F-j-Y');

        // Loop through each student's attendance and save it to the database
        foreach ($request->input('attendances') as $attendanceData) {
            StudentAttendance::updateOrCreate(
                [
                    'class_id' => $class_id,
                    'school_year_id' => $school_year_id,
                    'subject_id' => $subject_id,
                    'teacher_id' => Auth::user()->id,
                    'student_id' => $attendanceData['student_id'],
                    'attendance_date' =>  $attendanceDate,
                ],
                [
                    'status' => $attendanceData['status'],
                ]
            );
        }

        notify()->success('Students attendances successfully recorded');
        return back()->with('flash_success', 'Students attendances successfully recorded');
    }
    

    public function classAttendancesArchives(Request $request, int $class_id , int $subject_id , int $school_year_id ) 
    {
        
        $attendanceDates = StudentAttendance::select('class_id', 'attendance_date')
                                    ->where('class_id', $class_id)
                                    ->where('subject_id', $subject_id)
                                    ->where('school_year_id', $school_year_id)
                                    ->groupBy('class_id', 'attendance_date')
                                    ->get();

        return view('teacher.attendance.attendances-archives', compact('attendanceDates'));
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'attendance_user', 'attendance_id', 'user_id')
            ->withPivot(['present_count', 'absent_count']);
    }

    

   
    public function classAttendanceSummary(Request $request, int $class_id, int $subject_id, int $school_year_id) 
{
    $attendanceSummary = StudentAttendance::select(
        'student_id',
        DB::raw('MONTH(STR_TO_DATE(attendance_date, "%M-%e-%Y")) as month'),
        'status'
    ) 
        ->where('class_id', $class_id)
        ->where('subject_id', $subject_id)
        ->where('school_year_id', $school_year_id)
        ->get();

    $students = User::where('class_id', $class_id)
        ->orderBy('last_name', 'asc')
        ->get();

    // Group the attendance summary by student and month
    $groupedAttendance = $attendanceSummary->groupBy(['student_id', 'month']);

    // Calculate total absent and present for each student and month
    $totals = [];
    foreach ($groupedAttendance as $studentId => $monthlyAttendance) {
        foreach ($monthlyAttendance as $month => $attendances) {
            $absentCount = $attendances->where('status', 'absent')->count();
            $presentCount = $attendances->where('status', 'present')->count();

            // Store the totals in an array
            $totals[$studentId][$month] = [
                'absent' => $absentCount,
                'present' => $presentCount,
            ];
        }
    }

    // Extract unique months from the grouped data
    $uniqueMonths = $attendanceSummary->pluck('month')->unique()->sort();

    return view('teacher.attendance.attendances-summary', compact('totals', 'students', 'uniqueMonths','attendanceSummary'));
}
    public function EditAttendance(Request $request, int $class_id , $attendance_date)
{
    // Retrieve attendance data based on class_id and attendance_date

    $students = User::where('class_id', $class_id)
    ->orderBy('last_name', 'asc')
    ->get();


    $attendanceData = StudentAttendance::where([
        'class_id' => $class_id,
        // 'school_year_id' => $school_year_id,
        // 'subject_id' => $subject_id,
        'attendance_date' => $attendance_date,
        'teacher_id' => Auth::user()->id,
    ])->get();




    return view('teacher.attendance.attendances-edit', compact('attendanceData','students'));
}


    public function ClassStudent($class_id, $school_year_id)
    {


        $students = User::where('class_id', $class_id)
        ->orderBy('last_name', 'asc')
        // ->get()
        ->paginate(10);


        return view('teacher.my_student.student-list', compact('students'));

    }




public function downloadStudentList($class_id, $school_year_id)
{
    $students = User::join('class', 'users.class_id', '=', 'class.class_id')
        ->join('school_year', 'users.school_year_id', '=', 'school_year.school_year_id')
        ->where('users.class_id', $class_id)
        ->where('users.school_year_id', $school_year_id)
        ->orderBy('users.last_name', 'asc')
        ->select('users.*', 'class.name as class_name', 'school_year.year_name as school_year_name', 'class.section as section')
        ->get(); // Use get() to retrieve a collection of students

    $pdf = PDF::loadView('teacher.my_student.student_list_pdf', compact('students'));

    return $pdf->stream('student_list.pdf');
}


//------------------------------------------------------------//






}