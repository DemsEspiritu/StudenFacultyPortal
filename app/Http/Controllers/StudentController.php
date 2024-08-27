<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;
use Auth;
use App\Models\ClassSubjectModel;
use App\Models\TotalGrades;



class StudentController extends Controller
{
    public function request(){
        
        return view('student.list');
        
    }

  
    public function list()
    {    
      $data['getStudent'] = User::getStudent();
      
      return view('faculty.student_user.list',compact("data"));
         
    }

    public function add()
    {    
         return view('faculty.student_user.add');
 
    }


    public function insert(Request $request)
    {
      $request->validate([
           'email' => 'required|email|unique:users',
           'name' => 'required|max:50',
           'password' => 'required|max:50'
      ], 
      [
          'email.unique' => 'this email has already been used.'
      ]);
 
     $user = new User;
     $user->name = trim($request->name);
     $user->last_name = trim($request->last_name);
     $user->middle_name = trim($request->middle_name);
     $user->email = trim($request->email);
     $user->birthdate = trim($request->birthdate);
     $user->age = trim($request->age);
     $user->gender = trim($request->gender);
     $user->place_bdate = trim($request->place_bdate);
     $user->address = trim($request->address);
     $user->phone_number = trim($request->phone_number);
     $user->password = Hash::make($request->password);
     $user->user_type = 3;
     $user->save();
 

     notify()->success('Student Successfully Create!');
     return redirect('faculty/student_user/list');
    }



    public function edit($id)
    {    
      $data['getRecord'] = User::getSingle($id);
      if(!empty($data['getRecord']))
      {
           return view('faculty.student_user.edit',compact("data"));
      }
      else
      {
           abort(404);
      }
    }
  
      // ADMIN FUNCTION UPDATE To Admin
      public function update($id, Request $request)
      {    
           request()->validate([
                'email' => 'required|email|unique:users,email,'.$id ,
                'name' => 'required',
 
 
           ],[
                'email.unique' => 'email has already been taken.'
           ]);
 
           $user = User::getSingle($id);
           $user->name = trim($request->name);
           $user->email = trim($request->email);
           if(!empty($request->password))
           {
                $user->password = Hash::make($request->password);
           }
           $user->save();
           notify()->success('Student Successfully Updated!');
           return redirect('faculty/student_user/list');
      }
 


    public function remove($id)
    {

            $post = User::where('id',$id);
            $post->delete();

            notify()->success('Successfully Deleted!');
            return redirect('faculty/student_user/list');

    }


    public function grades_list($id)
    {    

      $data['getStudentProfile'] = User::getUser($id);
      if(!empty($data['getStudentProfile']))
      {
        return view('faculty.grades.list_grades', compact('data'));
      }
      else
      {
           abort(404);
      }

    }
 /////////////////////

          
          // public function MySubject()
          // {
          //      $data['getRecord'] = ClassSubjectModel::MySubject(Auth::user()->id);

          // // dd($data['getRecord']->toArray());

          //      return view('student.subject.list', $data);
          // }

          public function MySubject()
          {
              $data['getRecord'] = TotalGrades::getMyGrades(Auth::user()->id);
      
             // dd($data['getRecord']->toArray());
      
              return view('student.subject.list', $data);
          }


          public function liststudent()
          {    
            $data['getStudentProfile'] = User::getAllStudent();
      
            return view('faculty.student.list',compact("data"));
               
          }

          ///teacher side my student list
          
               public function MyStudent()
               { 

                    
                    $data['getTeacherStudent'] = User::getTeacherStudent(Auth::user()->id);
                    
                    
                    return view('teacher.my_student.list', $data);
               }
}
