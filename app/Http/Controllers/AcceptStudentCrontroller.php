<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\StudentProfile;
use App\Models\EnrollModel;


class AcceptStudentCrontroller extends Controller
{
    public function accept($id){

        $sourceData = EnrollModel::find($id);
        $quickpass = substr( str_shuffle( str_repeat( 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789', 10 ) ), 0, 10 );

        
        $firstName = $sourceData->name;
        $lastName = $sourceData->last_name;

        $email = $this->generateEmail($firstName, $lastName);

        // $sourceData->update(['email' => $email]);

        

        if ($sourceData) {
            // Remove the data from the source table
            $sourceData->delete();
    
            // Create a new record in the destination table with the same data
            User::create([
      
                'name' => $sourceData->name,
                'last_name' => $sourceData->last_name,
                'middle_name' => $sourceData->middle_name,
                'email' => ($email),
                'password' => Hash::make($quickpass),
                'birthdate' => $sourceData->birthdate,
                'address' => $sourceData->address,
                'age' => $sourceData->age,
                'gender' => $sourceData->gender,
                'phone_number' => $sourceData->phone_number,
                'place_bdate' => $sourceData->place_bdate,
                'user_type' => $sourceData->user_type,
                'lrn' => $sourceData->lrn, 
                'class_id' => $sourceData->class_id,
                'school_year_id' => $sourceData->school_year_id,
                'mother_name' => $sourceData->mother_name,
                'father_name' => $sourceData->father_name,
                'mother_phone' => $sourceData->mother_phone,
                'father_phone' => $sourceData->father_phone,
                'file' => $sourceData->file,
                'ext_name' => $sourceData->ext_name,
    

            ]);

            $ch = curl_init();
            $parameters = array(
                'apikey' => 'd87d7a78783f4ea53fbc6b11682d0a79', //Your API KEY
                'number' => $sourceData->phone_number,
                'message' => "Hello, {$sourceData->last_name}, {$sourceData->name} {$sourceData->middle_name}. You are enrolled successfully. To log in, use {$email} as your email and password ({$quickpass}).",
                'sendername' => 'SEMAPHORE'
            );
            curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
            curl_setopt( $ch, CURLOPT_POST, 1 );
            
            //Send the parameters set above with the request
            curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
            
            // Receive response from server
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            $output = curl_exec( $ch );
            curl_close ($ch);
            
            //Show the server response
            echo $output;

            notify()->success('Successfully Accept the New Incoming Student !');
            return redirect('faculty/enroll/list');
        } else {
            return "Data not found in the source table.";
        }
    }

    private function generateEmail($firstName, $lastName)
    {
        return strtolower(substr($firstName, 0, 3) . $lastName . "@masoli.edu.ph");
    }

}
