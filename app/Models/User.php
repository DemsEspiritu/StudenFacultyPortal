<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;
use App\Models\StudentProfie;
use App\Models\StudentAttendance;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'middle_name',
        'email',
        'password',
        'birthdate',
        'address',
        'age',
        'gender',
        'phone_number',
        'place_bdate',
        'user_type',
        'lrn',
        'class_id',
        'school_year_id',
        'mother_name',
        'father_name',
        'mother_phone',
        'father_phone',
        'ext_name',
        'file'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    static public function getAdmin()
    {
       $return = User::select('users.*')
                         ->where('user_type','=',1);

                         if(!empty(Request::get('name')))
                         {
                                $return = $return->where('name','like','%'.Request::get('name').'%');
                         }

                         if(!empty(Request::get('email')))
                         {
                                $return = $return->where('email','like','%'.Request::get('email').'%');
                         }

                         if(!empty(Request::get('date')))
                         {
                                $return = $return->whereDate('created_at','=', Request::get('date'));
                         }
        $return = $return->orderBy('id','desc')
                         ->paginate(2);

        return $return;
    }




    static public function getStudent()
    {
       $return = User::select('users.*')
                         ->where('users.user_type','=',3);

                         if(!empty(Request::get('name')))
                         {
                                $return = $return->where('name','like','%'.Request::get('name').'%');
                         }

                         if(!empty(Request::get('email')))
                         {
                                $return = $return->where('email','like','%'.Request::get('email').'%');
                         }

                         if(!empty(Request::get('date')))
                         {
                                $return = $return->whereDate('created_at','=', Request::get('date'));
                         }

                       
        $return = $return->orderBy('users.id','desc')
                         ->paginate(10);

        return $return;
    }


    static public function getFaculty()
    {
       $return = User::select('users.*')
                         ->where('users.user_type','=',4);

                         if(!empty(Request::get('name')))
                         {
                                $return = $return->where('name','like','%'.Request::get('name').'%');
                         }

                         if(!empty(Request::get('email')))
                         {
                                $return = $return->where('email','like','%'.Request::get('email').'%');
                         }

                         if(!empty(Request::get('date')))
                         {
                                $return = $return->whereDate('created_at','=', Request::get('date'));
                         }

                       
        $return = $return->orderBy('users.id','desc')
                         ->paginate(5);

        return $return;
    }


    static public function getTeacher()
    {
       $return = User::select('users.*')
                         ->where('users.user_type','=',2);

                         if(!empty(Request::get('name')))
                         {
                                $return = $return->where('name','like','%'.Request::get('name').'%');
                         }

                         if(!empty(Request::get('email')))
                         {
                                $return = $return->where('email','like','%'.Request::get('email').'%');
                         }

                         if(!empty(Request::get('date')))
                         {
                                $return = $return->whereDate('created_at','=', Request::get('date'));
                         }

                       
        $return = $return->orderBy('users.id','desc')
                         ->paginate(5);

        return $return;
    }




    public function profile() {
       return $this->hasOne(Profile::class);
   }


//    Teacher Side Work


static public function getStudentTeacher($studentID,$teacher_id){
       $return = self::select('users.*', 'class.name as class_name', 'class.section as class_section')

              ->join('class_subject',)
           ->join('class', 'class.class_id', '=', 'users.class_id')
           ->join('assign_class_teacher', 'assign_class_teacher.class_id', '=', 'class.class_id') /////
           ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
           ->where('users.user_type', '=', 3)
           // ->groupBy('student_profile.student_profile_id')
           ->get();
           

       return $return;
}
   
   static public function getTeacherStudent($teacher_id){ 
       $return = self::select('users.*', 'class.name as class_name', 'class.section as class_section')
           ->join('class', 'class.class_id', '=', 'users.class_id')
           ->join('class_subject', 'class_subject.class_id', '=', 'users.class_id') /////
           ->where('class_subject.teacher_id', '=', $teacher_id)
           ->where('users.user_type', '=', 3)->distinct();
       //     ->get();
           // ->groupBy('student_profile.student_profile_id')
           
       if(!empty(Request::get('lrn')))
       {
              $return = $return->where('lrn','like','%'.Request::get('lrn').'%');
       }

       if(!empty(Request::get('name')))
       {      
              
              $return = $return->where('users.name','like','%'.Request::get('name').'%');
       }

       if(!empty(Request::get('class_name')))
       {      
              
              $return = $return->where('class.class_name','like','%'.Request::get('class_name').'%');
       }


       $return = $return->orderBy('users.id','desc')
       ->paginate(10);
           
       
       return $return;

   }

  
       static public function getSingle($id)
    {   
       
        return User::find($id);
    }



    ///ADMIN SIDE GET ALL STUDENT LIST

    static public function getAllStudent(){
       $return = User::select('users.*', 'class.name as class_name', 'class.section as class_section')
       ->join('class', 'class.class_id', '=', 'users.class_id')
       ->join('school_year', 'school_year.school_year_id', '=', 'users.school_year_id')
       ->where('users.user_type', '=', 3);

       if(!empty(Request::get('lrn')))
       {
              $return = $return->where('lrn','like','%'.Request::get('lrn').'%');
       }

       if(!empty(Request::get('name')))
       {      
              
              $return = $return->where('users.name','like','%'.Request::get('name').'%');
       }

                           
       $return = $return->orderBy('users.id','desc')
       ->paginate(10);
           // ->groupBy('student_profile.student_profile_id')
       return $return;
}

       public function class() 
       {
       return $this->belongsTo(ClassModel::class, 'class_id');
       
       }

      
   
 
}
