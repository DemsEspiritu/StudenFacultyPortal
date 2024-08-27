<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ClassModel;


class StudentAttendance extends Model
{
    use HasFactory;

    
    protected $dates = ['attendance_date'];

    
    protected $table = 'student_attendances';

    protected $fillable = [
        'class_id', 
        'teacher_id', 
        'school_year_id', 
        'attendance_date', 
        'student_id', 
        'status', 
        'subject_id'
    ];



}
