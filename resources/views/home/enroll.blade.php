<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500&display=swap" rel="stylesheet">
    <link rel="shorcut icon" href="{{asset('assets/img/school-logo.png')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/notify.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
    body {
            background-image:  url('{{ asset('assets/img/slide1.jpg') }}');
            /* Other CSS properties for the background */
            background-size: cover; /* Adjust this as needed */
            background-repeat: no-repeat;
            /* Add other styling for your content as needed */
            font-family: 'Roboto', sans-serif;
        }

  .card {
    margin-top: 20px;
 
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


/* Style for the card header */
.card-header {
    background-color: #52527a;
    color: #fff;
}

/* Style for the card title */
.card-title {
    display: flex;
    align-items: center;
}

/* Style for the form elements */
.card-body {
    padding: 20px;
}

/* Style for form labels */
label {
    font-weight: bold;
}

/* Style for input fields */
.form-control {
    margin-bottom: 10px;
}

/* Style for the submit button */
.btn-primary {
    background-color: #007bff;
    color: #fff;
}

/* Style for error messages */
span.error {
    color: red;
    font-size: 10px;
    padding: 0;
    margin: 0;
}

/* Style for the footer */
.card-footer {
    background-color: #f8f9fa;
    padding: 10px;
    text-align: left;
    margin-top:20px;
}
label {
    font-size: 12px; /* Adjust the font size as needed */
  }

  /* Style for placeholders */
  ::placeholder {
    font-size: 12px; /* Adjust the font size as needed */
  }
  .col-md-6{
    margin-bottom: -15px;
  }
  .col-12{
    margin-bottom: -15px;
  }

  .col-6{
    margin-bottom: -15px;
  }

  .enroll-form{
  width: 70%;
  margin-top: 10%;
  margin-bottom: 10%;
}
.file-div{
  margin-top: 40px;
}
#file{
  margin-top:2%;
}
@media screen and (max-width: 414px) {

    .enroll-body{
        margin-top: 65px;
    }
    
    .enroll-form{
        width: 100%;
    }
}

@media screen and (max-width: 430px) {

.enroll-body{
    margin-top: 65px;
}

.enroll-form{
    width: 100%;
}
}


    </style>
    <title>Masoli High School</title>
</head>
<body>  
<x-notify::notify />
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img class="m-2" src="{{asset('assets/img/school-logo.png')}}" alt="logo" style="height:45px;">
            <span class="name-school">Masoli High School</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Nav-Bar Code --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active m-3 link-style" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active m-3 link-style" href="#About">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active m-3 link-style" href="#Contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active m-3 link-style" href="/home/enroll">Enroll</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active m-3 link-style" href="/login">Log in</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

     

    <div class="container-fluid enroll-body">
 
        <div class="card card-primary enroll-form">
              <div class="card-header enroll-head">
                <h5 class="card-title "><img class="m-2" src="{{asset('assets/img/school-logo.png')}}" alt="logo" style="height:50px; padding-bottom: 5px;">Masoli High School</h5>
              </div>
              <!-- >
              <!-- form start -->
            <form action="" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="card-body">

              <div class="m-0">
                  <div class="row g-3">
                  <h6>STUDENT INFORMATION</h6>
                  <div class="col-12">
                      <label>LRN #</label>
                      <input type="text" name="lrn" id="lrnInput" class="form-control" placeholder="LRN number" value="{{ old('lrn') }}">
                      <span style="color: red; font-size: 10px; padding: 0; margin: 0;" id="lrnError">@error('lrn'){{ $message }} @enderror</span>
                  </div>
                      <div class="col-6">
                          <label>First Name</label>
                          <input type="text" name="name" class="form-control" placeholder="First Name" value="{{old('name')}}">
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('name'){{ $message}} @enderror</span> 
                      </div>
                      <div class="col-6">
                          <label>Last Name</label>
                          <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{old('last_name')}}">
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('last_name'){{ $message}} @enderror</span> 
                      </div>
                      <div class="col-6">
                          <label>Middle Name</label>
                          <input type="text" name="middle_name" class="form-control" placeholder="Middle Name" value="{{old('middle_name')}}">
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('middle_name'){{ $message}} @enderror</span> 
                      </div>

                      <div class="col-6">
                          <label>Extension Name</label>
                          <input type="text" name="ext_name" class="form-control" placeholder="e.g. Jr., III (if applicable)" value="{{old('ext_name')}}">
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('ext_name'){{ $message}} @enderror</span> 
                      </div>


                      <div class="col-12">
                          <label>Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Address" value="{{old('address')}}">
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('address'){{ $message}} @enderror</span> 
                        </div>

                        <div class="col-md-12">
                              <label>Place of Birth</label>
                              <input type="text" name="place_bdate" class="form-control" placeholder="Place of Birth" value="{{old('place_bdate')}}">
                              <span style="color:red; font-size:10px; padding:0; margin:0;">@error('place_bdate'){{ $message}} @enderror</span> 
                      </div>


                      <div class="col-md-6">
                          <label>Phone Number</label>
                          <input type="text" name="phone_number" id="phoneNumberInput" class="form-control" placeholder="Phone Number" value="{{ old('phone_number') }}">
                          <span style="color:red; font-size:10px; padding:0; margin:0;" id="phoneNumberError">@error('phone_number'){{ $message }} @enderror</span>
                      </div>
                        <div class="col-md-6">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('email'){{ $message}} @enderror</span> 
                        </div>
                   
                      <div class="col-5">
                          <label>Birthdate</label>
                          <input type="date" id="birthdate" name="birthdate" class="form-control" placeholder="Birthdate" value="{{ old('birthdate') }}">
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('birthdate'){{ $message }} @enderror</span>
                      </div>
                      <div class="col-3">
                          <label>Age</label>
                          <input type="number" id="age" name="age" class="form-control"  value="{{ old('age') }}" disabled>
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('age'){{ $message }} @enderror</span>
                      </div>

                      <div class="col-3">
                          <label>Gender</label>
                          <select class="form-select" name="gender">
                              <option></option>
                              <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                              <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                          </select>
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('gender'){{ $message }} @enderror</span> 
                      </div>

                      <div class="col-6">
                          <label>Grade</label>
                          <select class="form-select" id="gradeSelect" name="grade" placeholder="Select Grade">
                              <option></option>
                              <option value="7" {{ old('grade') == '7' ? 'selected' : '' }}>7</option>
                              <option value="8" {{ old('grade') == '8' ? 'selected' : '' }}>8</option>
                              <option value="9" {{ old('grade') == '9' ? 'selected' : '' }}>9</option>
                              <option value="10" {{ old('grade') == '10' ? 'selected' : '' }}>10</option>
                              <option value="11" {{ old('grade') == '11' ? 'selected' : '' }}>11</option>
                              <option value="12" {{ old('grade') == '12' ? 'selected' : '' }}>12</option>
                          </select>
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('grade'){{ $message }} @enderror</span>
                      </div>

                      <div class="col-6">
                          <label>Strand</label>
                          <select class="form-select" id="strandSelect" name="strand" placeholder="Select Strand" disabled>
                              <option></option>
                              <option value="HUMS" {{ old('strand') == 'HUMS' ? 'selected' : '' }}>HUMS</option>
                              <option value="GAS" {{ old('strand') == 'GAS' ? 'selected' : '' }}>GAS</option>
                              <option value="STEM" {{ old('strand') == 'STEM' ? 'selected' : '' }}>STEM</option>
                              <option value="ABM" {{ old('strand') == 'ABM' ? 'selected' : '' }}>ABM</option>
                              <option value="ICT" {{ old('strand') == 'ICT' ? 'selected' : '' }}>ICT</option>
                          </select>
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('strand'){{ $message }} @enderror</span>
                      </div>

                      <div class="col-10">
                          <div>
                            <label>Please Attach the Files ( <i class="text-info">Form 138/Report Card, Form 137/TOR, PSA, 2X2 ID picture, Good Moral Certificate</i> )</label>
                          </div>
                          <label for="myfile mt-2">Select a file:</label> <input type="file" id="file" name="file" accept=".pdf">
                          <div>
                                <span style="color:red; font-size:10px; padding:0; margin:0;">@error('file'){{ $message }} @enderror</span>
                          </div>
                      </div>

                      <hr>
                      <h6>PARENT'S/GUARDIAN'S INFORMATION</h6>

                      <div class="col-md-6">
                        <label>Father’s Name</label>
                          <input type="text" name="father_name" class="form-control" placeholder="Father’s Name" value="{{old('father_name')}}">
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('father_name'){{ $message}} @enderror</span> 
                        </div>

                        <div class="col-md-6">
                            <label>Contact Number</label>
                            <input type="text" name="father_phone" id="fatherPhoneNumberInput" class="form-control" placeholder="Contact Number" value="{{ old('father_phone') }}">
                            <span style="color:red; font-size:10px; padding:0; margin:0;" id="fatherPhoneNumberError">@error('father_phone'){{ $message }} @enderror</span>
                        </div>

                      <div class="col-md-6">
                        <label>Mother’s Maiden Name</label>
                          <input type="text" name="mother_name" class="form-control" placeholder="Mother’s Maiden Name" value="{{old('mother_name')}}">
                          <span style="color:red; font-size:10px; padding:0; margin:0;">@error('mother_name'){{ $message}} @enderror</span> 
                        </div>

                        <div class="col-md-6">
                          <label>Contact Number</label>
                          <input type="text" name="mother_phone" id="motherPhoneNumberInput" class="form-control" placeholder="Contact Number" value="{{ old('mother_phone') }}">
                          <span style="color:red; font-size:10px; padding:0; margin:0;" id="motherPhoneNumberError">@error('mother_phone'){{ $message }} @enderror</span>
                      </div>
                                          

                    



                  </div>
               </div>
                <!-- /.end card-body -->
                <!-- /.card-footer -->
                      <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
            </form>
          </div>
  </div>

  @notifyJs


  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $('#birthdate').on('change', function () {
            var birthdate = new Date($(this).val());
            var today = new Date();
            var age = today.getFullYear() - birthdate.getFullYear();

            // Adjust age if the birthday hasn't occurred yet this year
            if (today.getMonth() < birthdate.getMonth() || (today.getMonth() === birthdate.getMonth() && today.getDate() < birthdate.getDate())) {
                age--;
            }

            // Enable the Age input field and update the value
            $('#age').prop('disabled', false).val(age);
        });

</script>

<script>
    $(document).ready(function () {
        $('#gradeSelect').on('change', function () {
            var selectedGrade = $(this).val();
            var strandSelect = $('#strandSelect');

            // Enable or disable the Strand select based on the Grade selected
            if (selectedGrade >= 7 && selectedGrade <= 10) {
                strandSelect.prop('disabled', true);
            } else {
                strandSelect.prop('disabled', false);
            }
        });
    });
</script>

<script>
    // Add an event listener to the input for restricting input to 11 numbers
    document.getElementById('lrnInput').addEventListener('input', function () {
        this.value = this.value.replace(/[^0-9]/g, ''); // Allow only numeric input
        if (this.value.length > 11) {
            this.value = this.value.slice(0, 11); // Limit input to 11 characters
        }

        // Display an error message if the input is not exactly 11 characters
        document.getElementById('lrnError').innerText = this.value.length !== 11 ? 'LRN should be exactly 11 numbers' : '';
    });
</script>
<script>
    // Add an event listener to the input for restricting input to numbers and limiting to 11 digits
    document.getElementById('phoneNumberInput').addEventListener('input', function () {
        this.value = this.value.replace(/[^0-9]/g, ''); // Allow only numeric input
        if (this.value.length > 11) {
            this.value = this.value.slice(0, 11); // Limit input to 11 digits
        }

        // Display an error message if the input is not exactly 11 digits
        document.getElementById('phoneNumberError').innerText = this.value.length !== 11 ? 'Phone number should be exactly 11 digits' : '';
    });
</script>

<script>

    document.getElementById('motherPhoneNumberInput').addEventListener('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
        if (this.value.length > 11) {
            this.value = this.value.slice(0, 11); 
        }
        document.getElementById('motherPhoneNumberError').innerText = this.value.length !== 11 ? 'Contact number should be exactly 11 digits' : '';
    });
</script>

<script>
    document.getElementById('fatherPhoneNumberInput').addEventListener('input', function () {
        this.value = this.value.replace(/[^0-9]/g, ''); 
        if (this.value.length > 11) {
            this.value = this.value.slice(0, 11); 
        }
        document.getElementById('fatherPhoneNumberError').innerText = this.value.length !== 11 ? 'Contact number should be exactly 11 digits' : '';
    });
</script>
</body>
</html>