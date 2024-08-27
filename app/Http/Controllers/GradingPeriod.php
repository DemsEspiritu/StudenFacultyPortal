<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradesPeriod;

class GradingPeriod extends Controller
{
    public function view(){


        $gradesPeriods = GradesPeriod::all();

        return view('faculty.grading-period.view', ['gradesPeriods' => $gradesPeriods]);
    }

    
    public function enable($class_period_id)
    {
        $data = GradesPeriod::find($class_period_id);
        $data->status = 1;
        $data->save();

        notify()->success('Successfully Enabled!');
        return redirect()->back();
    }

      
    public function disabled($class_period_id)
    {
        $data = GradesPeriod::find($class_period_id);
        $data->status = 0;
        $data->save();

        notify()->success('Successfully Disabled!');
        return redirect()->back();
    }
}
