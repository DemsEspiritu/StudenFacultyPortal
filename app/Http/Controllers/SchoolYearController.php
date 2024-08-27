<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYearModel;

class SchoolYearController extends Controller
{
    public function list()
    {    
      $school_year = SchoolYearModel::all();
      
      return view('faculty.school_year.list',compact("school_year"));
         
    }

    public function insert(Request $request)
    {
      $request->validate([
        'year_name' => 'required|unique:school_year',
      ], 
      [
          'year_name.unique' => 'this year has already created.'
      ]);
 
     $user = new SchoolYearModel;
     $user->year_name = trim($request->year_name);
     $user->status = 0;
     $user->save();

     notify()->success('School Year Successfully Create!');
     return redirect('faculty/school_year/list');
    }


    public function remove($school_year_id)
    {

        $post = SchoolYearModel::where('school_year_id',$school_year_id);
        $post->delete();
        notify()->success('Year Successfully Deleted!');
        return redirect('faculty/school_year/list');
    }


    
    public function edit($subject_year_id)
    {
    $school_year = SchoolYearModel::findOrFail($subject_year_id); // Retrieve the product by its ID

    return view('faculty.school_year.edit', compact('school_year'));
    }






    public function update($subject_year_id, Request $request)
    {    
      $request->validate([
        'year_name' => 'required|unique:school_year',
      ], 
      [
        'year_name.unique' => 'this year has already created.'
      ]);

         $user = SchoolYearModel::getSchoolYear($subject_year_id);
         $user->year_name = trim($request->year_name);
         $user->save();

         notify()->success('School Year Successfully Updated!');

         return redirect('faculty/school_year/list');
    }

    public function enable($school_year_id)
    {
        // Check if any other year is already enabled
        $existingEnabledYear = SchoolYearModel::where('status', 1)->first();
    
        if ($existingEnabledYear) {
            // If there's already an enabled year, return with a message
            notify()->error('Please disable the currently enabled year before enabling a new one.');
            return redirect()->back();
        }
    
        // Enable the selected school year
        $data = SchoolYearModel::find($school_year_id);
        $data->status = 1;
        $data->save();
    
        notify()->success('Successfully Enabled!');
        return redirect()->back();
    }
    
    public function disabled($school_year_id)
    {
        // Disable the selected school year
        $data = SchoolYearModel::find($school_year_id);
        $data->status = 0;
        $data->save();
    
        notify()->success('Successfully Disabled!');
        return redirect()->back();
    }


    
}
