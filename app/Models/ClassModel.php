<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\TabCompletion\Matcher\FunctionsMatcher;
use Request;
//this for attendace
use App\Models\User;
use App\Models\StudentAttendance;
use App\Models\SubjectModel;
use App\Models\SchoolYearModel;


class ClassModel extends Model
{
    use HasFactory;


    protected $table = 'class';

    protected $primaryKey = 'class_id';


    static public function getSingle($class_id)
    {
        return self::find($class_id);
    }

    public function students() {
        return $this->hasMany(User::class, 'class_id');
    }


    static public function getClass()
    {
        $return = ClassModel::select('class.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'class.created_by');

            //This is for Search
            if (!empty(Request::get('name')))
                         {
                                $return = $return->where('class.name','like','%'.Request::get('name').'%');
                         }

            if (!empty(Request::get('date')))
                         {
                                $return = $return->whereDate('class.created_at','=', Request::get('date'));
                         }
            //End Search

             $return = $return->orderBy('class.class_id', 'desc')
            ->paginate(7);

            return $return;
    }

    static public function getRecord()
    {
        $return = ClassModel::select('class.*')
        ->join('users', 'users.id', 'class.created_by')
         ->orderBy('class.name', 'desc')->distinct()
        ->get();

        return $return;
    }

    //tryyy

    // public function subjects()
    // {
    //     return $this->hasMany(SubjectModel::class);
    // }

    public function subjects()
    {
        return $this->belongsToMany(SubjectModel::class, 'class_subject', 'class_id', 'subject_id',);
    }





}
