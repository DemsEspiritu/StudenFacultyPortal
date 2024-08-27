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
                        <h4>Assign Subject To Class</h4>
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
              <form action="" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                 

                  <div class="form-group m-2">
                        <label>Class Name</label>
                            <select class="form-select" name="class_id" >
                            <option value="">Select Class</option>
                                @foreach($data ['getRecord'] as $class)
                                <option value="{{ $class->class_id }}">{{ $class->name }} Section-{{ $class->section }}</option>
                                @endforeach
                             </select>
                    <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span> 
                    </div>
                    <br>

                    <table class="table table-bordered" id="table-body">
                    
                    <tr>
                        <th>Subject</th>
                        <th>Teacher</th>
                        <th>Time</th>
                        <th>Schedule</th>
                    </tr>
                    <tr>
                
                        <td>         
                            <select class="form-control" name="subject_id[]" >
                                <option value="">Select Subject</option>
                                @foreach($data['getSubject'] as $class)
                                    <option value="{{ $class->subject_id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span> 
                        </td>


                        <td>          
                            <select class="form-control" name="teacher_id[]" >
                                <option value="">Select Teacher</option>
                                @foreach($data['getTeacher']  as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }} {{ $class->last_name }}</option>
                                    @endforeach
                                </select>
                            <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span> 
                        </td>
                        <td>
                            <div>
                                <label>From:</label>
                                <input type="time"
                                    name="from0"
                                    class="form-control"
                                    id="fromTime"
                                />
                            </div>
                            <div>
                                <label>To:</label>
                                <input type="time"
                                    name="to0"
                                    class="form-control"
                                    id="toTime"
                                />
                            </div>
                            <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span> 
                        </td>
                        <td>
                            <div>
                                <div>
                                    <label>Monday</label>
                                    <input type="checkbox"
                                        value="M"
                                        name="schedule0[]"
                                    />
                                </div>
                                <div>
                                    <label>Tuesday</label>
                                    <input type="checkbox"
                                        value="T"
                                        name="schedule0[]"
                                    />
                                </div>
                                <div>
                                    <label>Wednesday</label>
                                    <input type="checkbox"
                                        value="W"  
                                        name="schedule0[]"
                                    />
                                </div>
                                <div>
                                    <label>Thursday</label>
                                    <input type="checkbox"
                                        value="TH"
                                        name="schedule0[]"
                                    />
                                </div>
                                <div>
                                    <label>Friday</label>
                                    <input type="checkbox"
                                        value="F"
                                        name="schedule0[]"
                                    />
                                </div>

                                
                            </div>
                            <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span> 
                        </td>
                   

                        <!-- <button type="button" id="addRow" class="btn btn-primary">Add</button> -->
                        
                       

                    </tr>
                    </table>
                    <div>
                        <button type="button" id="addRow" class="btn btn-primary">Add</button>
                    </div>



                    <div class="form-group m-2" id="schoolYearDiv" style="display: none;">
                        <label>Class Name</label>
                        <select class="form-select" name="school_year_id" id="schoolYearSelect">
                            <option value="">Select School Year</option>
                            @foreach($data['getSchoolYearForAssign'] as $class)
                                @if($class->status == 1)
                                    <option value="{{ $class->school_year_id }}">{{ $class->year_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span>
                    </div>

                    
                   

                    <br>

                
            
             
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ url('faculty/assign_subject_class/list') }}" class="btn btn-danger">Cancel</a>
                  
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
        
        $('#addRow').click(()=>{
            
            
            $('#table-body').append(`   <tr>
            
                
                <td>         
                    <select class="form-control" name="subject_id[]" >
                        <option value="">Select Subject</option>
                        @foreach($data['getSubject'] as $class)
                            <option value="{{ $class->subject_id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span> 
                </td>


                <td>          
                    <select class="form-control" name="teacher_id[]" >
                        <option value="">Select Teacher</option>
                        @foreach($data['getTeacher']  as $class)
                            <option value="{{ $class->id }}">{{ $class->name }} {{ $class->last_name }}</option>
                            @endforeach
                        </select>
                    <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span> 
                </td>
                <td>
                    <div>
                        <label>From:</label>
                        <input type="time"
                            name="from${curIndex}"
                            class="form-control"
                        />
                    </div>
                    <div>
                        <label>To:</label>
                        <input type="time"
                            name="to${curIndex}"
                            class="form-control"
                        />
                    </div>
                    <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span> 
                </td>
                <td>
                    <div>
                        <div>
                            <label>Monday</label>
                            <input type="checkbox"
                                value="M"
                                name="schedule${curIndex}[]"
                            />
                        </div>
                        <div>
                            <label>Tuesday</label>
                            <input type="checkbox"
                                value="T"
                                name="schedule${curIndex}[]"
                            />
                        </div>
                        <div>
                            <label>Wednesday</label>
                            <input type="checkbox"
                                value="W"  
                                name="schedule${curIndex}[]"
                            />
                        </div>
                        <div>
                            <label>Thursday</label>
                            <input type="checkbox"
                                value="TH"
                                name="schedule${curIndex}[]"
                            />
                        </div>
                        <div>
                            <label>Friday</label>
                            <input type="checkbox"
                                value="F"
                                name="schedule${curIndex}[]"
                            />
                        </div>

                        
                    </div>
                    <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span> 
                </td></tr>`)
                curIndex ++;
        })
        
        
       /*
                         document.addEventListener('DOMContentLoaded', function () {
                            document.getElementById('addRow').addEventListener('click', function () {
                                 // Clone the last row
                                const lastRow = document.getElementById('table-body').lastElementChild.cloneNode(true);
                                
                                 // Reset the select inputs in the new row
                                 lastRow.querySelectorAll('select').forEach(select => {
                                     select.selectedIndex = 0;
                                 });

                                // Append the new row to the table
                                 document.getElementById('table-body').appendChild(lastRow);
                             });
                        });
                        */
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
</script>
    

</body>
</html>