<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;
use App\Models\EnrollModel;
use Dotenv\Validator;
use App\Models\ClassModel;
use App\Models\SchoolYearModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class EnrollController extends Controller
{
    private function getStrandValidationRule($grade)
    {
        // If grade is 7-10, the strand is not required; otherwise, it is required
        return ($grade >= 7 && $grade <= 10) ? '' : 'required';
    }


  public function enroll(Request $request)
{
  $request->validate([
    'lrn' => 'required|max:11|unique:users,lrn',
    'name' => 'required',
    'last_name' => 'required',
    'middle_name' => 'required',
    'email' => 'required|email|unique:users,email',
    'birthdate' => 'required',
    'address' => 'required',
    'age' => 'required',
    'gender' => 'required',
    // 'phone_number' => [
    //     'required',
    //     Rule::unique('users', 'phone_number'),
    //     Rule::unique('enroll_request', 'phone_number'),
    // ],
    'place_bdate' => 'required',
    'mother_name' => 'required',
    'father_name' => 'required',
    'mother_phone' => 'required',
    'father_phone' => 'required',
    'grade' => 'required',
    'file' => 'required',
    'strand' => $this->getStrandValidationRule($request->input('grade')),
], [
    'sex' => 'Please select gender.',
    'lrn.required' => 'The LRN field is required.',
    'lrn.max' => 'The LRN must not exceed 11 characters.',
    'lrn.unique' => 'This LRN is already in use.',
    'email.unique' => 'This Email is already used.',
    // 'phone_number.unique' => 'This Phone Number is already used.',
    'file' => 'please include the following requirements',
]);

    // Generate OTP
    $otp = mt_rand(100000, 999999);

    // Store OTP temporarily (you can use a database or session)
    $request->session()->put('otp', Hash::make($otp));

    // Store enrollment data in the session
    $enrollmentData = $request->except(['_token', 'file']); // Exclude unnecessary fields
    $enrollmentData['file_path'] = $this->uploadFile($request->file); // Add file path to enrollment data
    $request->session()->put('enrollment_data', $enrollmentData);

    // Send OTP to the provided phone number
    $this->sendOtpToPhoneNumber($request->phone_number, $otp);

    // Redirect to OTP verification form
    return view('home.verify_otp');
}
private function uploadFile($file)
{
    $filename = time().'.'.$file->getClientOriginalExtension();
    $file->move('assets', $filename);

    return $filename;
}

public function verifyOtp(Request $request)
{
    $request->validate([
        'otp' => 'required|digits:6',
    ], [
        'otp.required' => 'Please enter the OTP code.',
        'otp.digits' => 'Incorrect OTP code.',
    ]);

    $savedOtp = $request->session()->get('otp');
    $enteredOtp = $request->otp;

    if (Hash::check($enteredOtp, $savedOtp)) {
        // OTP is correct, proceed to save the data

        // Retrieve data from the session (assuming you stored it during the initial enrollment)
        $enrollmentData = $request->session()->get('enrollment_data');

        // Save the enrollment data to the database or perform other actions
        $this->saveEnrollmentData($enrollmentData);

        $request->session()->forget(['otp', 'enrollment_data']); // Remove OTP and enrollment data from the session

        notify()->success('Submit Form Success!');
        return redirect('home/enroll');
    } else {
        // Incorrect OTP, redirect back with an error message
        return redirect()->route('verify_otp_form')->withErrors(['otp' => 'Incorrect OTP code']);
    }
}

public function showOtpForm()
{
    return view('home.verify_otp');
}

private function sendOtpToPhoneNumber($phoneNumber, $otp)
{
    // ... Your existing code for sending OTP ...
    $ch = curl_init();
    $apiKey = 'd87d7a78783f4ea53fbc6b11682d0a79'; //Semaphore API key

    $parameters = [
        'apikey' => $apiKey,
        'number' => $phoneNumber,
        'message' => "Your OTP is: $otp",
        'sendername' => 'SEMAPHORE'
    ];

    curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session and get the response
    $output = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Log or handle the response as needed
    // echo $output;
}

private function saveEnrollmentData($enrollmentData)
{
    $user = new EnrollModel;
    // Map the enrollment data to the user model fields and save
    $user->lrn = $enrollmentData['lrn'];
    $user->name = $enrollmentData['name'];
    $user->last_name = $enrollmentData['last_name'];
    $user->middle_name  = $enrollmentData['middle_name'];
    $user->email = $enrollmentData['email'];
    $user->birthdate = $enrollmentData['birthdate'];
    $user->address = $enrollmentData['address'];
    $user->age = $enrollmentData['age'];
    $user->gender = $enrollmentData['gender'];
    $user->phone_number = $enrollmentData['phone_number'];
    $user->place_bdate = $enrollmentData['place_bdate'];
    $user->user_type = 3;
    $user->grade = $enrollmentData['grade'];
    $user->status = 'Unofficial';
    $user->mother_name = $enrollmentData['mother_name'];
    $user->mother_phone = $enrollmentData['mother_phone'];
    $user->father_name = $enrollmentData['father_name'];
    $user->father_phone = $enrollmentData['father_phone'];
    $user->ext_name = $enrollmentData['ext_name'];
    $user->strand = $enrollmentData['strand'];
    $user->file = $enrollmentData['file_path'];
    
    $user->save();


    $ch = curl_init();
        $parameters = array(
            'apikey' => 'd87d7a78783f4ea53fbc6b11682d0a79', //Your API KEY d87d7a78783f4ea53fbc6b11682d0a79
            'number' => $user->phone_number,
            'message' => 'Your enrollment has been successfully submitted. Wait for further update regarding your enrollment status.',
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
        
        echo $output;
}
  











































    // public function enroll(Request $request)
    // {
    //     $request->validate([
    //         'lrn' => 'required|max:11',
    //         'name' => 'required',
    //         'last_name' => 'required',
    //         'middle_name' => 'required',
    //         'email' => 'required',
    //         'birthdate' => 'required',
    //         'address' => 'required',
    //         'age' => 'required',
    //         'gender' => 'required',
    //         'phone_number' => 'required',
    //         'place_bdate' => 'required',
    //         'mother_name' => 'required',
    //         'father_name' => 'required',
    //         'mother_phone' => 'required',
    //         'father_phone' => 'required',
    //         'grade' => 'required',
           

    //       ],[

    //         'sex' => 'Please select gender.',
    //         'lrn' => 'This LRN number is already used.',
    //         'email' => 'This Email is already used.',
            
    //    ]);



    //   $user = new EnrollModel;

    //     //file handling
    //    $file = $request->file;
    //    $filename = time().'.'.$file->getClientOriginalExtension();
    //    $request->file->move('assets',$filename);
    //    $user->file=$filename;

    //    //student side handling
    //     $user->lrn = trim($request->lrn);
    //     $user->name = trim($request->name);
    //     $user->last_name = trim($request->last_name);
    //     $user->middle_name = trim($request->middle_name);
    //     $user->email = trim($request->email);
    //     $user->birthdate = trim($request->birthdate);
    //     $user->address = trim($request->address);
    //     $user->age = trim($request->age);
    //     $user->gender = trim($request->gender);
    //     $user->phone_number = trim($request->phone_number);
    //     $user->place_bdate = trim($request->place_bdate);
    //     $user->user_type = 3;
    //     $user->grade = trim($request->grade);
    //     $user->status = 'Unofficial';
    //     //parents side 
    //     $user->mother_name = trim($request->mother_name);
    //     $user->mother_phone = trim($request->mother_phone);
    //     $user->father_name = trim($request->father_name);
    //     $user->father_phone = trim($request->father_phone);
    //     $user->ext_name = trim($request->ext_name);
    //     $user->save();



    //     $ch = curl_init();
    //     $parameters = array(
    //         'apikey' => 'd87d7a78783f4ea53fbc6b11682d0a79', //Your API KEY d87d7a78783f4ea53fbc6b11682d0a79
    //         'number' => $user->phone_number,
    //         'message' => 'Your enrollment has been successfully submitted. Wait for further update regarding your enrollment status.',
    //         'sendername' => 'SEMAPHORE'
    //     );
    //     curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
    //     curl_setopt( $ch, CURLOPT_POST, 1 );
        
    //     //Send the parameters set above with the request
    //     curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
        
    //     // Receive response from server
    //     curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    //     $output = curl_exec( $ch );
    //     curl_close ($ch);
        
    //     //Show the server response
    //     echo $output;
        
    //     notify()->success('Submit Form Success!');
    //  return redirect('home/enroll');
    // }



    public function list()
    {    
      
      $enrolls = EnrollModel::all();

      return view('faculty.enroll.list',compact("enrolls"));
         
    }

    public function view($id)
    {
    $enroll = EnrollModel::findOrFail($id); // Retrieve the product by its ID
    $enroll['getClass'] = ClassModel::getClass();
    $enroll['getSchoolYearForAssign'] = SchoolYearModel::all();

    return view('faculty.enroll.view', compact('enroll'));
    }




    public function update($id, Request $request)
    {
        try {
            $user = EnrollModel::findOrFail($id);
    
            $dataToUpdate = [
                'lrn' => trim($request->lrn),
                'name' => trim($request->name),
                'last_name' => trim($request->last_name),
                'middle_name' => trim($request->middle_name),
                'email' => trim($request->email),
                'address' => trim($request->address),
                'age' => trim($request->age),
                'gender' => trim($request->gender),
                'phone_number' => trim($request->phone_number),
                'place_bdate' => trim($request->place_bdate),
                'grade' => trim($request->grade),
                'mother_name' => trim($request->mother_name),
                'father_name' => trim($request->father_name),
                'mother_phone' => trim($request->mother_phone),
                'father_phone' => trim($request->father_phone),
                'status' => 'Ready to Accept',
                'class_id' => $request->class_id,
                'school_year_id' => $request->school_year_id,
            ];
    
            // Dump the data before updating
            // dd($dataToUpdate);
    
            $user->update($dataToUpdate);
    
            notify()->success('Update Form Success!');
            return redirect('faculty/enroll/list');
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            notify()->error('Error updating form. Please try again.');
            return redirect()->back();
        }
    }





    public function fileview($id)
    {
      $data = EnrollModel::find($id);

      return view('faculty.enroll.fileview', compact('data'));
    }

    public function delete($id)
    {
            
            $post = EnrollModel::where('id',$id);
            $post->delete();

            
            notify()->success('Successfully Deleted!');
            return redirect('faculty/enroll/list');

    }


    
}
