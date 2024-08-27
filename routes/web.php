<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RequestFormController;
use App\Http\Controllers\MyRecordController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\EnrollController;  
use App\Http\Controllers\AcceptStudentCrontroller;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\CreateClassRoomController;
use App\Http\Controllers\TotalGradesController;
use App\Http\Controllers\AssignClassController;
use App\Http\Controllers\ClassSubjectController; 
use App\Http\Controllers\AssignClassTeacherController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\GradesSetDateController; 
use App\Http\Controllers\ClassListCountController; 
use App\Http\Controllers\AttendanceController; 
use App\Http\Controllers\GradingPeriod; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/',[HomeController::class, 'index'] );

// Route::get('/chooselog', [HomeController::class, 'choose']);


//------------------------Home Route-------------------------//
    Route::get('/', [HomeController::class, 'home']);

    Route::get('home/enroll',[HomeController::class, 'enroll']);

    Route::post('home/enroll',[EnrollController::class, 'enroll']);

    Route::get('/login', [AuthController::class, 'login']);

    Route::post('login', [AuthController::class, 'Authlogin']);

    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('/verify_otp', [EnrollController::class, 'showOtpForm'])->name('verify_otp_form');

    Route::post('/verify_otp', [EnrollController::class, 'verifyOtp'])->name('verify_otp');



//-------------------------------------------------Admin Route--------------------------------------------//

    Route::group(['middleware' => 'admin'], function (){

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/list', [AdminController::class, 'list']);
    Route::get('admin/add', [AdminController::class, 'add']);
    Route::post('admin/add', [AdminController::class, 'insert']);
    Route::get('admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/remove/{id}', [AdminController::class, 'remove']);
    
//--------------------------------------------Admin Student Route-----------------------------------------//
        
    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']); //Direct To add Page
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']); //Direct To Edit Page
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/list{id}', [StudentController::class, 'remove']);
    

//-------------------------------------------------Admin Class Route--------------------------------------//

    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::post('admin/class/list', [ClassController::class, 'add']);
    Route::post('admin/class/list{id}', [ClassController::class, 'edit']);
    Route::get('admin/class/list{class_id}', [ClassController::class, 'remove']);


    //-------------------------------------------------Admin Class Faculty Route--------------------------------------//

    Route::get('admin/faculty/list', [FacultyController::class, 'list']);
    Route::get('admin/faculty/add', [FacultyController::class, 'add']); //Direct To add Page
    Route::post('admin/faculty/add', [FacultyController::class, 'insert']);
    Route::get('admin/faculty/edit/{id}', [FacultyController::class, 'edit']); //Direct To Edit Page
    Route::post('admin/faculty/edit/{id}', [FacultyController::class, 'update']);
    Route::get('admin/faculty/list{id}', [FacultyController::class, 'remove']);


  

});



//-------------------------------------------------Teacher Account Route-----------------------------------------//

    Route::group(['middleware' => 'teacher'], function (){

    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
    

    Route::get('teacher/MyClassAndSubject/list', [ClassSubjectController::class, 'MyClassSubject']);

    Route::get('teacher/Attendace/list{class_id}/{subject_id}/{school_year_id}', [ClassSubjectController::class, 'Attendance'])->name('student');

    //ATTENDACE RECORD ARCHIVES
    Route::get('teacher/AttendanceArchives/list{class_id}/{subject_id}/{school_year_id}', [AttendanceController::class, 'classAttendancesArchives'])->name('attendance_archives');

    Route::get('teacher/AttendanceSummary/list{class_id}/{subject_id}/{school_year_id}', [AttendanceController::class, 'classAttendanceSummary'])->name('attendance_summary');
    
    Route::post('teacher/Attendace/list{class_id}/{subject_id}/{school_year_id}', [AttendanceController::class, 'storeclassAttendances']);
    //ATTENDANCE EDIT
    Route::get('teacher/attendance/edit/{class_id}/{attendance_date}', [AttendanceController::class, 'EditAttendance'])->name('attendances-edit');

    Route::get('teacher/class/list/student/{class_id}/{school_year_id}', [AttendanceController::class, 'ClassStudent'])->name('student-class');

  

    //Download PDF
    Route::get('teacher/download-student-list/{class_id}/{school_year_id}', [AttendanceController::class, 'downloadStudentList'])->name('downloadStudentList');


    //// 
  

    Route::get('teacher/MyStudent/list', [StudentController::class, 'MyStudent']);
    ////
    Route::post('teacher/save/grade', [TotalGradesController::class, 'SaveGrades']);
    /////

    Route::get('teacher/grades/list{id}', [TotalGradesController::class, 'student_list_grades']);

    Route::post('teacher/grades/list{id}', [TotalGradesController::class, 'add']);

    // Route::post('teacher/addrecord', [TotalGradesController::class, 'addStudentRecord']);
    // Route::post('teacher/addgrades', [TotalGradesController::class, 'addStudentGrades']);

    //Grades 
    Route::get('teacher/student/grades/{class_id}/{subject_id}/{school_year_id}/{subject_name}', [TotalGradesController::class, 'ClassGrades'])->name('class-grades');

    
    // Route::post('/teacher/student/grades/save{class_id}/{subject_id}/{school_year_id}', [TotalGradesController::class, 'saveGrades']);

   Route::post('/save-grades/{class_id}/{subject_id}/{school_year_id}/{subject_name}', [TotalGradesController::class, 'saveGrades'])
    ->name('save.grades');

     //----------------Teacher My Account Request Route------------------//

    Route::get('teacher/account', [UserController::class, 'TeacherMyAccount']);
    
    Route::post('teacher/account', [UserController::class, 'TeacherMyUpdate']);
    
});



//-------------------------------------------------Student Account Route-----------------------------------------//

    Route::group(['middleware' => 'student'], function (){

    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('student/request/myrequest', [RequestFormController::class, 'my_request']); //as a list

    Route::get('student/request/add', [RequestFormController::class, 'add']); //Direct To add Page

    Route::post('student/request/add', [RequestFormController::class, 'insert']);

    //----------------Student Request Route------------------//
    Route::get('student/request/myrequest/remove{id}', [RequestFormController::class, 'remove_student_side']);

    Route::get('student/request/myrequest/canceled{id}', [RequestFormController::class, 'cancel']);
    
    Route::get('student/grades/mygrades', [TotalGradesController::class, 'MyGrades']);

    Route::get('student/subject/list', [ClassSubjectController::class, 'MySubject']);

    //----------------Student My Account Request Route------------------//

    Route::get('student/account', [UserController::class, 'MyAccount']);
    
    Route::post('student/account', [UserController::class, 'Update']);

   

});




//-------------------------------------------------Faculty as Admin Account Route-----------------------------------------//

    Route::group(['middleware' => 'faculty'], function (){

     
    Route::get('/faculty/dashboard', [DashboardController::class, 'dashboard']);
    Route::post('/faculty/setgrading', [DashboardController::class, 'setGrading']);

    // request Form
    Route::get('faculty/request/list', [RequestFormController::class, 'list']);
    Route::get('faculty/request/list{id}', [RequestFormController::class, 'remove']);
    Route::get('faculty/request/list/approved{form_id}', [RequestFormController::class, 'approved']);
    Route::get('faculty/request/list/decline{form_id}', [RequestFormController::class, 'decline']);


     // user student
    Route::get('faculty/student_user/list', [StudentController::class, 'list']);
    Route::get('faculty/student_user/add', [StudentController::class, 'add']); //Direct To add Page
    Route::post('faculty/student_user/add', [StudentController::class, 'insert']);
    Route::get('faculty/student_user/edit/{id}', [StudentController::class, 'edit']); //Direct To Edit Page
    Route::post('faculty/student_user/edit/{id}', [StudentController::class, 'update']);
    Route::get('faculty/student_user/list{id}', [StudentController::class, 'remove']);


     // user faculty as a Admin
     Route::get('faculty/create_schedule/index', [AssignClassController::class, 'show']);
     Route::get('faculty/faculty_user/list', [FacultyController::class, 'list']);
     Route::get('faculty/faculty_user/add', [FacultyController::class, 'add']); //Direct To add Page
     Route::post('faculty/faculty_user/add', [FacultyController::class, 'insert']);
     Route::get('faculty/faculty_user/edit/{id}', [FacultyController::class, 'edit']); //Direct To Edit Page
     Route::post('faculty/faculty_user/edit/{id}', [FacultyController::class, 'update']);
     Route::get('faculty/faculty_user/list{id}', [FacultyController::class, 'remove']);


     // user Teacher as a Admin
    Route::get('faculty/teacher_user/list', [TeacherController::class, 'list']);
    Route::get('faculty/teacher_user/add', [TeacherController::class, 'add']); //Direct To add Page
    Route::post('faculty/teacher_user/add', [TeacherController::class, 'insert']);
    Route::get('faculty/teacher_user/edit/{id}', [TeacherController::class, 'edit']); //Direct To Edit Page
    Route::post('faculty/teacher_user/edit/{id}', [TeacherController::class, 'update']);
    Route::get('faculty/teacher_user/list{id}', [TeacherController::class, 'remove']);


    // Subject
    Route::get('faculty/subject/list', [SubjectController::class, 'list']);
    Route::get('faculty/subject/list{id}', [SubjectController::class, 'remove']);
    Route::post('faculty/subject/list', [SubjectController::class, 'insert']);
    Route::get('faculty/subject/edit{subject_id}', [SubjectController::class, 'edit']);
    Route::post('faculty/subject/edit{subject_id}', [SubjectController::class, 'update']);

     // Enroll
    Route::get('faculty/enroll/list', [EnrollController::class, 'list']);
    Route::get('faculty/enroll/view{id}', [EnrollController::class, 'view']);
    Route::post('faculty/enroll/view{id}', [EnrollController::class, 'update']);
    Route::get('faculty/enroll/delete{id}', [EnrollController::class, 'delete']);
    Route::get('faculty/enroll/fileview{id}', [EnrollController::class, 'fileview']);
    
    //School Year
    Route::get('faculty/school_year/list', [SchoolYearController::class, 'list']);
    Route::post('faculty/school_year/list', [SchoolYearController::class, 'insert']); //In the list page but can you add directly add 
    Route::get('faculty/school_year/list{school_year_id}', [SchoolYearController::class, 'remove']);
    Route::get('faculty/school_year/edit{school_year_id}', [SchoolYearController::class, 'edit']); // Direct to edit page
    Route::post('faculty/school_year/edit{school_year_id}', [SchoolYearController::class, 'update']); // Direct to edit page

    Route::get('faculty/school_year/enable{school_year_id}', [SchoolYearController::class,'enable']);
    Route::get('faculty/school_year/disable{school_year_id}', [SchoolYearController::class,'disabled']);

    

    //Class
    Route::get('faculty/class/list', [ClassController::class, 'list']);
    Route::post('faculty/class/list', [ClassController::class, 'insert']); //In the list page but can you add directly add 
    Route::get('faculty/class/list{class_id}', [ClassController::class, 'remove']);
    Route::get('faculty/class/edit{class_id}', [ClassController::class, 'edit']); // Direct to edit page
    Route::post('faculty/class/edit{class_id}', [ClassController::class, 'update']); // Direct to edit page

     //Student List
    Route::get('faculty/student/list', [StudentController::class, 'liststudent']);

     //Accept Student Enrolles
    Route::get('faculty/enroll/accept{id}', [AcceptStudentCrontroller::class, 'accept']);


    //Create class or class room
    Route::get('faculty/create_class/list', [CreateClassRoomController::class, 'list']);
    Route::get('faculty/create_class/add',  [CreateClassRoomController::class, 'add']);
    Route::post('faculty/create_class/add', [CreateClassRoomController::class, 'insert']);

    //Assign Subject to Class
    Route::get('faculty/assign_subject_class/list', [ClassSubjectController::class, 'list']);
    Route::get('faculty/assign_subject_class/add',  [ClassSubjectController::class, 'add'])->name('store'); //add
    Route::post('faculty/assign_subject_class/add', [ClassSubjectController::class, 'AddClassSubjectAndTeacher']);
    Route::get('faculty/assign_subject_class/remove{id}', [ClassSubjectController::class, 'remove']);
    Route::get('faculty/assign_subject_class/edit{id}', [ClassSubjectController::class, 'edit'])->name('AssignEdit');
    Route::put('faculty/assign_subject_class/update/{id}', [ClassSubjectController::class, 'update'])->name('Update');


    

     //Set Date to Start Grading
    Route::get('faculty/Setdate/list', [GradesSetDateController::class, 'list']);
    Route::get('faculty/Setdate/add',  [GradesSetDateController::class, 'add']);
    Route::post('faculty/Setdate/add', [GradesSetDateController::class, 'insert']);
    Route::get('faculty/Setdate/remove{id}', [GradesSetDateController::class, 'remove']);
    Route::get('faculty/Setdate/edit{id}', [GradesSetDateController::class, 'edit']);

    Route::get('faculty/grades/list', [TotalGradesController::class, 'list']);
    Route::get('faculty/grades/list_grades{student_profile_id}', [TotalGradesController::class, 'grades_list']);

    // ClassListCount
    Route::get('faculty/class_total/list', [ClassListCountController::class, 'list']);
    Route::get('faculty/class_total/student{class_id}', [ClassListCountController::class, 'view']);

    //

    Route::get('faculty/grading', [GradingPeriod::class,'view']);
    Route::get('faculty/grading/enabled{class_period_id}', [GradingPeriod::class,'enable']);
    Route::get('faculty/grading/disabled{class_period_id}', [GradingPeriod::class,'disabled']);



});