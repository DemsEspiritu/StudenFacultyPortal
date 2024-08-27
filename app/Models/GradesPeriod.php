<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradesPeriod extends Model
{
    use HasFactory;

    protected $table = 'class_periods';

    protected $primaryKey = 'class_period_id';
}
