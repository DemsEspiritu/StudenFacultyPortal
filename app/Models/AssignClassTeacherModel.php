<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClassTeacherModel extends Model
{
    use HasFactory;



    protected $table = 'assign_class_teacher';




    static public function getRecord()
    {
        $return = self::select('assign_class_teacher.*', 'class.name as class_name', 'teacher.name as teacher_name', 'users.name as created_by_name', 'school_year.year_name as school_year_name' ,'class.section as section_of_class')
                ->join('users as teacher', 'teacher.id', '=', 'assign_class_teacher.teacher_id')
                ->join('school_year', 'school_year.school_year_id', '=', 'assign_class_teacher.school_year_id')
                ->join('class', 'class.class_id', '=', 'assign_class_teacher.class_id')
                ->join('users', 'users.id', '=', 'assign_class_teacher.created_by');
        $return = $return->orderBy('assign_class_teacher.id', 'desc')
                ->paginate(15);

        return $return;
    }

    static public function getMyClassSubject($teacher_id)
    {
        return self::select('class_subject.*', 'class.name as class_name','subject.subject_id as subject_id', 'subject.name as subject_name' , 'subject.description as subject_type'  ,'class.section as section_of_class')
                ->join('class', 'class.class_id', '=', 'assign_class_teacher.class_id')
                ->join('subject', 'subject.subject_id', '=', 'class_subject.subject_id')
                ->where('class_subject.teacher_id', '=' , $teacher_id)
                ->get();

    }

    
}
