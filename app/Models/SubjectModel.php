<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubjectModel;


use App\Models\ClassModel;


class SubjectModel extends Model
{
    use HasFactory;


    protected $table = 'subject';

    protected $primaryKey = 'subject_id';

    protected $fillable  = [
        'name',
        'description',
        'type',
        ];
    

    public function showData() {
        $data = SubjectModel::all(); // Replace with your actual query to fetch data
        return view('faculty.subject.list', compact('data'));
    }

    static public function getSubject()
    {
        $return = SubjectModel::select('subject.*')
         ->orderBy('subject.name', 'desc')


         ->get();

         return $return;
      
    }

    static public function getSingle($subject_id)
    {   
       
        return SubjectModel::find($subject_id);
    }

    // static public function MySubject($class_id)
    // {
    //     return self::select('class_subject.*', 'class.name as class_name','subject.subject_id as subject_id', 'subject.name as subject_name' , 'subject.description as subject_type'  ,'class.section as section_of_class')
    //             ->join('class', 'class.class_id', '=', 'class_subject.class_id')
    //             ->join('users', 'users.class_id', '=', 'class_subject.class_id')
    //             ->where('users.class_id', '=' , $class_id)
    //             ->get();

    // }

//    public function classes()
//     {
//         return $this->belongsToMany(ClassModel::class, 'class_subject', 'subject_id', 'class_id');
//     }

    public function totalGrades()
    {
        return $this->hasMany(TotalGrades::class, 'subject_id');
    }

    public function subject()
    {
        return $this->belongsTo(SubjectModel::class, 'subject_id');
    }

 
}
