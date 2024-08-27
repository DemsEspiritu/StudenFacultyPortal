<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\StudentProfile;
use Request;
use Auth;



class StudentProfile extends Model
{
    use HasFactory;

    
    protected $table = 'student_profile';

    protected $primaryKey = 'student_profile_id';


    protected $fillable = [
        'name',
        'last_name',
        'middle_name',
        'email',
        'birthdate',
        'address',
        'grade',
        'age',
        'gender',
        'phone_number',
        'lrn',
        'class_id',
        'school_year_id',
        'mother_name',
        'father_name',
        'mother_phone',
        'father_phone',
        'ext_name',
        'file'
    ];
    

    public function user() {
        return $this->belongsTo(User::class);
    }


    static public function getSubject($subject_id)
    {
        return self::find($subject_id);
    }



    static public function getStudentProfile()
    {
       $return = StudentProfile::select('student_profile.*');
                 

                         if(!empty(Request::get('lrn')))
                         {
                                $return = $return->where('lrn','like','%'.Request::get('lrn').'%');
                         }

                         if(!empty(Request::get('name')))
                         {
                                $return = $return->where('name','like','%'.Request::get('name').'%');
                         }

                         if(!empty(Request::get('grade')))
                         {
                                $return = $return->where('grade','like','%' .Request::get('grade'));
                         }

                       
        $return = $return->orderBy('student_profile.student_profile_id','desc')
                         ->paginate(10);

        return $return;
    }

    static public function getSingle($student_profile_id)
    {
        return StudentProfile::find($student_profile_id);
    }



    // static public function getTeacherStudent($teacher_id)
    // {   

    //     $return = self::select('student_profile.*', 'class.name as class_name')
    //         ->join('class', 'class.class_id', '=', 'student_profile.class_id')
    //         ->join('assign_class_teacher', 'assign_class_teacher.class_id', '=', 'class.class_id') /////
    //         ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
    //         // ->groupBy('student_profile.student_profile_id')
    //         ->get();
            

    //     return $return;

    // }



}
