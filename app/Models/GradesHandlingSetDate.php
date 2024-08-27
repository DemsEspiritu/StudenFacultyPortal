<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradesHandlingSetDate extends Model
{
    use HasFactory;

    protected $table = 'setdate';

    protected $primaryKey = 'id';

    protected $fillable  = ['start_date','end_date'];
}
