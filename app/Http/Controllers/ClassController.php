<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use Auth;
use Illuminate\Validation\Rule;

class ClassController extends Controller
{



    public function list()
    {

        $data['getClass'] = ClassModel::getClass();

        return view('faculty.class.list',compact("data"));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('class')->where(function ($query) {
                    return $query->where('section', request('section'));
                }),
            ],
            'section' => [
                'required',
                Rule::unique('class')->where(function ($query) {
                    return $query->where('name', request('name'));
                }),
            ],
           
        ]);
    
        $save = new ClassModel;
        $save->name = $request->name;
        $save->section = $request->section;
        $save->type = $request->type;
        $save->created_by = Auth::user()->id;
        $save->save();
    
        notify()->success('Class Successfully Created!');
        return redirect('faculty/class/list');
    }

    public function edit($class_id)
    {
        $data['getSingle'] = ClassModel::getSingle($class_id);

        if(!empty($data['getSingle']))
        {
            return view('faculty.class.edit',compact("data"));
        }

        else
        {
            abort(404);
        }
    }



    public function update($class_id, Request $request)
    {    
      $request->validate([
        'name' => 'required|unique:class',
      ], 
      [
          'name.unique' => 'this class has already created.'
      ]);

         $user = ClassModel::getSingle($class_id);
         $user->name = trim($request->name);
         $user->section = trim($request->section);
         $user->type = trim($request->type);
         $user->save();

         notify()->success('Class Successfully Updated!');

         return redirect('faculty/class/list');
    }




    public function remove($class_id)
    {
            
            $post = ClassModel::where('class_id',$class_id);
            $post->delete();
            notify()->success('Class Successfully Deleted!');
            return redirect('faculty/class/list');

    }









}
