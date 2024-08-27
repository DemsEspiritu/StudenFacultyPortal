<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Facades\DB;

class ClassListCountController extends Controller
{
    public function list(){


        $classes = ClassModel::withCount('students')->get();

        


         return view('faculty.class_list.list', compact('classes'));
    }
}
