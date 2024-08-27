<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\GradingLogModel;
use App\Models\SchoolYearModel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(Request $schoolYearValue){
        if(Auth::user()->user_type == 4 ){
            
            if(!empty($schoolYearValue->query()["schoolYear"])){
                $syData = DB::table("vw_gl_sy")->where("year_name","LIKE",'%'.$schoolYearValue->query()["schoolYear"].'%')->get()->toArray();
                $newData = array_map( function ($data){
                    return [$data->fromdate,$data->enddate];
                  },$syData);
                  
            }

            $totalAllUser = User::count(); 
            $totalTeacher = User::where('user_type', '2')->count(); //teacher
            $totalStudent = User::where('user_type', '3')->count(); //student
            $totalFaculty = User::where('user_type', '4')->count(); //faculty as a admin
            
            $gradingFilter = GradingLogModel::where('description','LIKE','%CURRENT%')->first();
            $sy = SchoolYearModel::where('status', 1)->get(); // Filter by status 1
            
            if($gradingFilter!=null){
              $gradingFilter = $gradingFilter->description;
            }
       
            return view('faculty.dashboard',compact('totalTeacher','totalStudent','totalFaculty','sy',));
        }

        if(Auth::user()->user_type == 2 ){
            $sy = SchoolYearModel::where('status', 1)->get(); // Filter by status 1
            return view('teacher.dashboard',compact('sy'));
        }

        if(Auth::user()->user_type == 3 ){
            return view('student.dashboard');
        }

        if(Auth::user()->user_type == 4 ){

            return view('faculty.dashboard');
        }
    }


    public function setGrading(Request $req){

        $grading = GradingLogModel::where('school_year_id','=',$req->all()['school_year'])->get();
        
        if(count($grading)!=0){
            $res = $req->all();
            
            foreach ($grading as $key => $value) {
                
                if($res[$value->description][0]!=null&&$res[$value->description][1]!=null){
                    $value->fromdate= $res[$value->description][0];
                    $value->enddate = $res[$value->description][1];
                    $value->save();
                }
            }
        }else{

            foreach ($req->all() as $key => $newReq) {
    
                if(str_contains($key,"grading")){
                    $newGrading = new GradingLogModel();
                    $newGrading->description = $key;
                    
                    if($newReq[0]!=null){
                        $newGrading->fromdate=$newReq[0];
                        $newGrading->enddate=$newReq[1];
                        $newGrading->care_of=Auth::user()->id;
                        $newGrading->school_year_id=$req->all()['school_year'];
                        $newGrading->save();    
                    }
    
                }
            } 
        }

        
        return redirect()->back();
    }

    
}






