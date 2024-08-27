<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradesHandlingSetDate;

class GradesSetDateController extends Controller
{
    public function list(Request $request){

        // $data['getRecord'] = AssignClassTeacherModel::getRecord();

        return view('faculty.setdate.list');

    }

    public function add(Request $request)
    {
       

        return view('faculty.setdate.add');
    }


    public function insert(Request $request){

        // dd($request->all()); 

       
      
                GradesHandlingSetDate::create([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                ]);

            
            notify()->success('Start Grading Successfully Added!');

            return redirect('/faculty/Setdate/list');
    
         }
    
}
