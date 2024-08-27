<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradingLogModel extends Model
{
    use HasFactory;

    protected $table = 'grading_logs';

    protected $primaryKey = 'gradinglogs_id';
    public $timestamps = false;
}
