<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYearModel extends Model
{
    use HasFactory;

    protected $table = 'school_year';

    protected $primaryKey = 'school_year_id';
    
    static public function getSchoolYear($school_year_id)
    {
        return self::find($school_year_id);
    }
    

    static public function getSchoolYearForAssign()
    {
        $return = SchoolYearModel::select('school_year.*');

             $return = $return->orderBy('school_year.school_year_id');

            return $return;
    }

    public function totalGrades()
    {
        return $this->hasMany(TotalGrades::class, 'school_year_id');
    }
}
