<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="shorcut icon" href="{{asset('assets/img/school-logo.png')}}">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="{{asset('assets/css/try.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/notify.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>Masoli High School</title>
</head>

<body>
  <x-notify::notify />
    <!-- ======== Main wrapper for dashboard =========== -->

    <div class="wrapper">
        <!-- =========== Sidebar for admin dashboard =========== -->

        <aside id="sidebar">

            <!-- ======== Content For Sidebar ========-->
            <div class="h-100">
                    <div class="sidebar-logo">
                        <a href="#">Masoli High School</a>
                    </div>
                <!-- ======= Navigation links for sidebar ======== -->
                <div class="sidebar-img-logo">
                    <img src="{{asset('assets/img/school-logo.png')}}">
                </div>
                <!-- Start Ul -->
                <ul class="sidebar-nav">
                        <!-- SIDEBAR ITEM -->
                      

                    <li class="sidebar-header">
                        SCHOOL
                    </li>

                    <li class="sidebar-item">
                        <a href="/faculty/dashboard?schoolYear=2022-2023" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                               Dashboard
                         </a>   
                    </li>


                        <!-- start pages dropdown -->
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-solid fa-pager pe-2"></i>
                            Managed School
                        </a>

                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="/faculty/subject/list" class="sidebar-link">
                                    <i class="fa-solid fa-layer-group pe-2"></i>
                                 Subject
                                </a>
                            </li>

                             <li class="sidebar-item">
                                <a href="/faculty/school_year/list" class="sidebar-link">
                                    <i class="fa-solid fa-calendar-days pe-2"></i>
                                      School Year
                                 </a>
                            </li>

                             <li class="sidebar-item">
                                <a href="/faculty/class/list" class="sidebar-link">
                                    <i class="fa-solid fa-school pe-2"></i>
                                Class</a>
                            </li>
                            
                        </ul>

                    </li>
                    <!-- start pages dropdown -->

                    <li class="sidebar-header">
                        ASSIGN
                    </li> 

                    <li class="sidebar-item">
                        <a href="" class="sidebar-link collapsed" data-bs-target="#assign" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-solid fa-pager pe-2"></i>
                            Assign 
                        </a>

                        <ul id="assign" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

                             <li class="sidebar-item">
                        <a href="/faculty/assign_subject_class/list" class="sidebar-link">
                            <i class="fa-solid fa-book-open-reader pe-2"></i>
                               Assign Subject Class
                         </a>   
                    </li>
                            
                        </ul>

                    </li>

                    <li class="sidebar-header">
                        STUDENT CONCERN
                    </li>

                     <li class="sidebar-item">
                        <a href="/faculty/enroll/list" class="sidebar-link">
                            <i class="fa-solid fa-restroom pe-2"></i>
                                Request Enroll
                         </a>   
                    </li>

                     <li class="sidebar-item">
                        <a href="/faculty/request/list" class="sidebar-link">
                            <i class="fa-solid fa-book pe-2"></i>
                               Request Documents
                         </a>   
                    </li> 

                    <li class="sidebar-header">
                        RECORD
                    </li>


                    <li class="sidebar-item">
                        <a href="/faculty/student/list" class="sidebar-link">
                            <i class="fa-solid fa-school pe-2"></i>
                               Student List
                         </a>   
                    </li> 
                    
                    <li class="sidebar-item">
                        <a href="/faculty/class_total/list" class="sidebar-link">
                        <i class="fa-regular fa-rectangle-list pe-2"></i>
                               Class List
                         </a>   
                    </li> 

                    <li class="sidebar-header">
                        USER ACCOUNT
                    </li> 

                           <!-- start pages dropdown -->
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link collapsed" data-bs-target="#post" data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa-solid fa-users pe-2"></i>
                            Users Account
                        </a>

                        <ul id="post" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="/faculty/faculty_user/list" class="sidebar-link">Admin User</a>
                            </li>

                             <li class="sidebar-item">
                                <a href="/faculty/teacher_user/list" class="sidebar-link">Teacher User</a>
                            </li>

                             <li class="sidebar-item">
                                <a href="/faculty/student_user/list" class="sidebar-link">Student User</a>
                            </li>
                            
                        </ul>

                    </li>
                    <!-- end pages dropdown -->

                          

                </ul>
                <!-- EEND UL -->

            </div>
        </aside>

        <!-- ========= Main section of dashboard ======= -->

        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom ">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown ">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                            <span style="color:black;font-weight:bold; margin-right:10px;">{{Auth::user()->name}}</span>
                <img src="{{asset('assets/img/user.png')}}" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ url('logout') }}" class="dropdown-item">LogOut</a>
                            </div>

                        </li>
                    </ul>

                </div>
            </nav>

            <!-- ========= Main navbar section of dashboard ======= -->

            <!-- ========= Main content section of dashboard ======= -->

            <main class="content px-3 py-2">

                <div class="container-fluid"> <!--   this is form container fluid -->
                    <div class="mb-3">
                        <h4>Edit Assign Subject To Class</h4>
                    </div>
                    <!-- <a href="{{ url('faculty/assign_class_teacher/add') }}" style="margin:20px;" class="btn btn-primary"><i class="fa-solid fa-plus  p-1" style="color: #ffffff;"></i>Add New Assign Class Teacher</a> -->
                    <div class="row"><!--   this is form row fluid -->
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-9">
                                        
           

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--   this is form row fluid -->
                   

                    <div class="row">
          <div class="col-md-12">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
         
              <form action="{{ route('Update', $yourModel->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="card-body">
            <!-- ... Other form fields ... -->
            
            <div class="form-group m-2">
                <label>Class Name</label>
                <select class="form-select" name="class_id">
                    <option value="">Select Class</option>
                    @foreach($data['getRecord'] as $class)
                        <option value="{{ $class->class_id }}" {{ $yourModel->class_id == $class->class_id ? 'selected' : '' }}>
                            {{ $class->name }} Section-{{ $class->section }}
                        </option>
                    @endforeach
                </select>
                <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span>
            </div>
            <br>

            <!-- ... Other form fields ... -->

            <table class="table table-bordered" id="table-body">
                <tr>
                        <th>Subject</th>
                        <th>Teacher</th>
                        <th>Time</th>
                        <th>Schedule</th>
                 </tr>
                    <td>
                        <select class="form-control" name="subject_id[]">
                            <option value="">Select Subject</option>
                            @foreach($data['getSubject'] as $subject)
                                <option value="{{ $subject->subject_id }}" {{ $subject->subject_id == $yourModel->subject_id ? 'selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                        <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span>
                    </td>


                    <td>
                    <select class="form-control" name="teacher_id[]">
                        <option value="">Select Teacher</option>
                        @foreach($data['getTeacher'] as $teacher)
                            <option value="{{ $teacher->id }}" {{ $teacher->id == $yourModel->teacher_id ? 'selected' : '' }}>
                                {{ $teacher->name }} {{ $teacher->last_name }}
                            </option>
                        @endforeach
                    </select>
                    <span style="color:red; font-size:10px;">@error('teacher_id.*'){{ $message}} @enderror</span>
                </td>

                <td>
                    <div>
                        <label>From:</label>
                        <input type="time" name="from0" class="form-control" id="fromTime" value="{{ $yourModel->fromTime ?? old('fromTime') }}">
                    </div>
                    <div>
                        <label>To:</label>
                        <input type="time" name="to0" class="form-control" id="toTime" value="{{ $yourModel->toTime ?? old('toTime') }}">
                    </div>
                    <span style="color:red; font-size:10px;">
                        @error('from0')
                            {{ $message }}
                        @enderror
                    </span>
                </td>

                <td>
                    <div>
                        <label>Monday</label>
                        <input type="checkbox" value="M" name="schedule[]" {{ in_array('M', old('schedule', explode(',', $previousSchedule))) ? 'checked' : '' }}>
                    </div>
                    <div>
                        <label>Tuesday</label>
                        <input type="checkbox" value="T" name="schedule[]" {{ in_array('T', old('schedule', explode(',', $previousSchedule))) ? 'checked' : '' }}>
                    </div>
                    <div>
                        <label>Wednesday</label>
                        <input type="checkbox" value="W" name="schedule[]" {{ in_array('W', old('schedule', explode(',', $previousSchedule))) ? 'checked' : '' }}>
                    </div>
                    <div>
                        <label>Thursday</label>
                        <input type="checkbox" value="TH" name="schedule[]" {{ in_array('TH', old('schedule', explode(',', $previousSchedule))) ? 'checked' : '' }}>
                    </div>
                    <div>
                        <label>Friday</label>
                        <input type="checkbox" value="F" name="schedule[]" {{ in_array('F', old('schedule', explode(',', $previousSchedule))) ? 'checked' : '' }}>
                    </div>
                    <span style="color:red; font-size:10px;">@error('schedule'){{ $message }}@enderror</span>
                </td>
                                
            
                </tr>
            </table>

            <!-- ... Other form fields ... -->

            <div class="form-group m-2">
                <label>School Year</label>
                <select class="form-select" name="school_year_id" disabled>
                    <option value="">Select School Year</option>
                    @foreach($data['getSchoolYearForAssign'] as $schoolYear)
                        <option value="{{ $schoolYear->school_year_id }}" {{ $yourModel->school_year_id == $schoolYear->school_year_id ? 'selected' : '' }}>
                            {{ $schoolYear->year_name }}
                        </option>
                    @endforeach
                </select>
                <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span>
            </div>
            <br>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="updateButton" >Update</button>
                <a href="{{ url('faculty/assign_subject_class/list') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>

                <!-- pagination -->
                
                <!-- End of pagination -->
              </div>
            </div>
          </div>
        </div>
    </div>

            </div>
            </main>

            <!-- ========= light and dark mode toggle button ======= -->

            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>

          


        </div>
    </div>
    @notifyJs
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/js/try.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            // Add a new row when the "Add" button is clicked
            $(".add-row").click(function () {
                var lastRow = $("#data-table tr:last");
                var newRow = lastRow.clone();
                newRow.find('select').val(''); // Clear the selected values
                lastRow.after(newRow);
            });
        });
    </script> -->


    <script>
    let curIndex = 1;

    $('#addRow').click(() => {
        $('#table-body').append(`<tr>
            <td>
                <select class="form-control" name="subject_id[]">
                    <option value="">Select Subject</option>
                    @foreach($data['getSubject'] as $class)
                        <option value="{{ $class->subject_id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
                <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span>
            </td>
            <td>
                <select class="form-control" name="teacher_id[]">
                    <option value="">Select Teacher</option>
                    @foreach($data['getTeacher'] as $class)
                        <option value="{{ $class->id }}">{{ $class->name }} {{ $class->last_name }}</option>
                    @endforeach
                </select>
                <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span>
            </td>
            <td>
                <div>
                    <label>From:</label>
                    <input type="time" name="from${curIndex}" class="form-control" />
                </div>
                <div>
                    <label>To:</label>
                    <input type="time" name="to${curIndex}" class="form-control" />
                </div>
                <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span>
            </td>
            <td>
                <div>
                    <div>
                        <label>Monday</label>
                        <input type="checkbox" value="M" name="schedule${curIndex}[]" />
                    </div>
                    <div>
                        <label>Tuesday</label>
                        <input type="checkbox" value="T" name="schedule${curIndex}[]" />
                    </div>
                    <div>
                        <label>Wednesday</label>
                        <input type="checkbox" value="W" name="schedule${curIndex}[]" />
                    </div>
                    <div>
                        <label>Thursday</label>
                        <input type="checkbox" value="TH" name="schedule${curIndex}[]" />
                    </div>
                    <div>
                        <label>Friday</label>
                        <input type="checkbox" value="F" name="schedule${curIndex}[]" />
                    </div>
                </div>
                <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this)">X</button>
            </td>
        </tr>`)
        curIndex++;
    })

    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>
<script>
    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the 'fromTime' and 'toTime' input elements
        var fromTimeInput = document.getElementById('fromTime');
        var toTimeInput = document.getElementById('toTime');
        var updateButton = document.getElementById('updateButton'); // Replace 'updateButton' with the actual ID of your update button

        // Add event listener on change for 'fromTime'
        fromTimeInput.addEventListener('change', function () {
            checkClassTimes();
        });

        // Add event listener on change for 'toTime'
        toTimeInput.addEventListener('change', function () {
            checkClassTimes();
        });

        function checkClassTimes() {
            // Get the selected 'fromTime' and 'toTime'
            var fromTimeObj = new Date('2000-01-01T' + fromTimeInput.value);
            var toTimeObj = new Date('2000-01-01T' + toTimeInput.value);

            // Get the reference times for 7 am, 4:30 pm, and 12:01 pm
            var sevenAm = new Date('2000-01-01T07:00:00');
            var fourThirtyPm = new Date('2000-01-01T16:30:00');
            var lunchBreak = new Date('2000-01-01T12:01:00');

            // Check if the times are correct
            var isValid = fromTimeObj >= sevenAm && toTimeObj <= fourThirtyPm && !(fromTimeObj.getHours() >= 12 && toTimeObj.getHours() < 12) && !(fromTimeObj.getTime() === lunchBreak.getTime());

            // Enable/disable the update button based on the validity
            updateButton.disabled = !isValid;

            // Show alert messages for incorrect times
            if (fromTimeObj < sevenAm) {
                alert('Class starts at 7 am!');
            }

            if (toTimeObj > fourThirtyPm) {
                alert('Class ends at 4:30 pm!');
            }

            if (fromTimeObj.getHours() >= 12 && toTimeObj.getHours() < 12) {
                alert('The selected times are not correct!');
            }

            if (fromTimeObj.getTime() === lunchBreak.getTime()) {
                alert('This time is a lunch break!');
            }
        }
    });
</script>
<!-- <script>
        function setTimeMeridian(inputId) {
            var inputElement = document.getElementById(inputId);
            var selectedTime = inputElement.value;
            var meridian = "AM";

            // Check if the selected time is in the PM range
            if (parseInt(selectedTime.split(':')[0]) >= 12) {
                meridian = "PM";
            }

            // Update the value with the selected time and meridian
            inputElement.value = selectedTime + " " + meridian;
        }
    </script>
 

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the input elements
        var fromTimeInput = document.getElementById("fromTime");
        var toTimeInput = document.getElementById("toTime");

        // Set the minimum and maximum time values
        fromTimeInput.setAttribute("min", "07:00");
        fromTimeInput.setAttribute("max", "17:00");

        toTimeInput.setAttribute("min", "07:00");
        toTimeInput.setAttribute("max", "17:00");
    });
</script> -->
<!-- 
<script>
        $(document).ready(function () {
            // Initial values
            var amOptions = ["7", "8", "9", "10", "11", "12"];
            var pmOptions = ["1", "2", "3", "4", "5"];

            // Update options based on the selected value in "From" dropdown
            $("#fromTime").change(function () {
                var selectedValue = $(this).val();
                var toTimeOptions = (selectedValue >= 1 && selectedValue <= 5) ? pmOptions : amOptions;

                // Clear existing options
                $("#toTime").empty();

                // Add new options
                $.each(toTimeOptions, function (index, value) {
                    $("#toTime").append('<option value="' + value + '">' + value + ':00 PM</option>');
                });
            });

            // Trigger change event to initialize "To" dropdown based on the default "From" value
            $("#fromTime").change();
        });
    </script> -->
    

</body>
</html>