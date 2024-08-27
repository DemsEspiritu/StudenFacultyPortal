<?php

namespace App\Models;
use App\Models\SubjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;


class TotalGrades extends Model
{
    use HasFactory;


    protected $primaryKey = "tgs_id";
    protected $table = 'total_grades_sbujects';

    protected $fillable  = [
    'class_id',
    'student_id',
    'school_year_id',
    'subject_id',
    'teacher_id',
    '1_grading',
    '2_grading',
    '3_grading',
    '4_grading',
    'final_grades',
    'passed_failed',
    'subject_name',
    ];

    

    // public function subject()
    // {
    //     return $this->belongsTo(SubjectModel::class, 'subject_id');
    // }


    static public function getMyGrades()
    {      
        $userId =  Auth::id();

        return self::select('total_grades_sbujects.*',
         'subject.subject_id as subject_id',
         'subject.name as subject_name')


                ->join('subject', 'subject.subject_id', '=', 'total_grades_sbujects.subject_id')
                ->where('total_grades_sbujects.student_id', '=' , $userId)
                ->get();

    }
 

    
}
