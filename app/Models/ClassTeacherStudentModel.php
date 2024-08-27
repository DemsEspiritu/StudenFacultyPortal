<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTeacherStudentModel extends Model
{
    use HasFactory;

    protected $table = 'class_teacher_student';

    protected $fillable = [
        'class_id',
        'school_year_id',
        'subject_id',
        'student_profile_id',
        'teacher_id',
        // 'created_by'
    ];



    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public function schoolyear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function subject()
    {
        return $this->hasMany(SubjectModel::class);
    }

    public function student_profile()
    {
        return $this->hasMany(StudentProfile::class);
    }

    public function teacher()
    {
        return $this->hasMany(User::class);
    }

}











    // static public function getAlreadyFirst($class_id,$teacher_id,$school_year_id,$subject_id,$student_profile_id)
    // {
    //     return self::where('class_id', '=', $class_id)
    //     ->where('teacher_id', '=', $teacher_id)
    //     ->where('school_year_id', '=', $school_year_id)
    //     ->where('subject_id', '=', $subject_id)
    //     ->where('student_profile_id', '=', $student_profile_id);

    //     return $return;

    // }

    // static public function getAll(){
     
    //         $return = ClassTeacherStudentModel::select('class_teacher_student.*', 'users.name as requested_by_name')
    //             ->join('users', 'users.id', 'form_request.request_by');
    
    
    //         $return = $return->orderBy('form_request.form_id', 'desc')
    //             ->paginate(10);
    
    //             return $return;
        
    
    // }