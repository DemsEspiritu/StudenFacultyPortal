<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ClassSubjectModel extends Model
{
    use HasFactory;

    protected $table = 'class_subject';


    static public function getRecord()
    {
        $return = self::select('class_subject.*',
         'class.name as class_name',
         'subject.name as subject_name', 
         'users.name as teacher_name', 
         'school_year.year_name as school_year_name' ,
         'class.section as section_of_class')


                ->join('subject', 'subject.subject_id', '=', 'class_subject.subject_id')
                ->join('school_year', 'school_year.school_year_id', '=', 'class_subject.school_year_id')
                ->join('class', 'class.class_id', '=', 'class_subject.class_id')
                ->join('users', 'users.id', '=', 'class_subject.teacher_id')->distinct();

                //This is for Search
            if (!empty(Request::get('class_name')))
            {
                   $return = $return->where('class.name','like','%'.Request::get('class_name').'%');          
            }

            if (!empty(Request::get('class_section')))
            {
                   $return = $return->where('class.section','like','%'.Request::get('class_section').'%');          
            }

            if (!empty(Request::get('subject_name')))
            {
                   $return = $return->where('subject.name','like','%'.Request::get('subject_name').'%');
            }

            if (!empty(Request::get('year_name')))
            {
                   $return = $return->where('school_year.year_name','like','%'.Request::get('year_name').'%');
            }


            if (!empty(Request::get('teacher_name')))
            {
                   $return = $return->where('users.name','like','%'.Request::get('teacher_name').'%');
            }

  
                  //End Search

        $return = $return->orderBy('class_subject.id', 'desc')
                ->paginate(10);

        return $return;
    }


    static public function getAlreadyFirst($class_id, $subject_id, $school_year_id)
    {
        return self::where('class_id', '=', $class_id)->where('subject_id', '=', $subject_id)->where('school_year_id', '=', $school_year_id)->first();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getAssignSubjectId($class_id)
    {
        return self::where('class_id', '=', $class_id)->get();
    }




    /////stduent side

    static public function MySubject($id)
    {
        return self::select('class_subject.*','subject.subject_id as subject_id', 'subject.name as subject_name' , 'subject.description as subject_type')
                ->join('subject', 'subject.subject_id', '=', 'class_subject.subject_id')
                ->join('users','users.class_id', '=', 'class_subject.class_id')
                ->where('class_subject.class_id', '=' , $id)
                ->get();

    }

    static public function getStudentSubject($teacher_id,$classid){
        return self::select('class_subject.*', 'class.name as class_name', 'subject.name as subject_name' , 'subject.description as subject_type'  ,'class.section as section_of_class')
        ->join('class', 'class.class_id', '=', 'class_subject.class_id')
        ->join('subject', 'subject.subject_id', '=', 'class_subject.subject_id')
        ->where([['class_subject.teacher_id', '=' , $teacher_id],['class_subject.class_id','=',$classid]])   
        ->get();
    }


    //teacher my class subject
    static public function getMyClassSubject($teacher_id)
    {
        return self::select('class_subject.*', 'class.name as class_name', 'subject.name as subject_name' , 'subject.description as subject_type'  ,'class.section as section_of_class')
                ->join('class', 'class.class_id', '=', 'class_subject.class_id')
                ->join('subject', 'subject.subject_id', '=', 'class_subject.subject_id')
                ->where('class_subject.teacher_id', '=' , $teacher_id)->distinct()
                ->get();

    }

    static public function getMySubject($class_id){

        return self::select('class_subject.*',
        'class.name as class_name',
        'subject.name as subject_name', 
        'users.name as teacher_name',
        'school_year.year_name as year_name',  
        'class.section as section_of_class')


               ->join('subject', 'subject.subject_id', '=', 'class_subject.subject_id')
               ->join('class', 'class.class_id', '=', 'class_subject.class_id')
               ->join('users', 'users.id', '=', 'class_subject.teacher_id')
               ->join('school_year', 'school_year.school_year_id', '=', 'class_subject.school_year_id')
               ->where('class_subject.class_id', '=', $class_id)
               ->orderBy('class_subject.id', 'desc')
               ->get();

    }


 
}
