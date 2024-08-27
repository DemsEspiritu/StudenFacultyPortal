<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{    

     // ADMIN FUNCTION SHOW ALL DATA 
   public function list()
   {    
     $data['getRecord'] = User::getAdmin();
     return view('admin.list',compact("data"));
        
   }
   public function add()
   {    
        return view('admin.add');

   }


     // Show All Data for Evroll Request
   function list_enroll()
   {    
          $data = array(
               'list' => DB::table('enroll_request')->get()
          );

        return view('admin.enroll', $data);

   }


   public function enroll_view ($id){

          $row = DB::table('enroll_request')
           ->where('id', $id)
           ->first();

           $data = [
               'Info' => $row
           ];

           return view('admin.view',compact("data"));

   }


     // ADMIN FUNCTION INSERT or ADD DATA TO DATABASE
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
    $user->email = trim($request->email);
    $user->password = Hash::make($request->password);
    $user->user_type = 1;
    $user->save();

    notify()->success('Admin Successfully Create!');
    return redirect('admin/list');
   }



     // ADMIN FUNCTION EDIT To Admin
   public function edit($id)
   {    
     $data['getRecord'] = User::getSingle($id);
     if(!empty($data['getRecord']))
     {
          return view('admin.edit',compact("data"));
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

          notify()->success('Admin Successfully Updated!');
          return redirect('admin/list');
     }


     public function remove($id)
     {
 
             $post = User::where('id',$id);
             $post->delete();

             notify()->success('Successfully Deleted!');
             return redirect('admin/list');
 
     }

}
