<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollModel extends Model
{
    use HasFactory;


    protected $table = 'enroll_request';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'last_name',
        'middle_name',
        'email',
        'birthdate',
        'address',
        'age',
        'gender',
        'phone_number',
        'place_bdate', 
        'user_type', 
        'grade', 
        'status', 
        'mother_name', 
        'mother_phone', 
        'father_name', 
        'father_phone', 
        'strand', 
        'file',
        'lrn',
        'school_year_id',
        'class_id'
    ];



    //sholl all the data
    static public function getSubject($id)
    {
        return self::find($id);
    }


    static public function getAlreadyFirst($class_id, $school_year_id)
    {
        return self::where('class_id', '=', '$class_id')->where('school_year_id', '=', $school_year_id)->first();
    }

}
