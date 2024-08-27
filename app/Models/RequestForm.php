<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class RequestForm extends Model
{
    use HasFactory;


    protected $table = 'form_request';

    protected $primaryKey = 'form_id';
    

    



    static public function getSingle($id)
    {
        return self::find($id);
    }
    


    static public function getRecord()
    {
        $return = RequestForm::select('form_request.*', 'users.name as requested_by_name' ,'users.last_name as requested_by_last_name')
            ->join('users', 'users.id', 'form_request.request_by');
            
          


        $return = $return->orderBy('form_request.form_id', 'desc')
            ->paginate(10);

            return $return;
    }



    
    // static public function getOwnRecord(){

    //     $return = RequestForm::select('form_request.*', )
    //         ->where('request_by','=',Auth::user()->id);

    //     $return = $return->orderBy('desc');
    //     return $return;
    // }






}
