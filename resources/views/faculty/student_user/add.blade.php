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
                        <a href="/faculty/dashboard" class="sidebar-link">
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
                        <a href="/faculty/assign_class_teacher/list" class="sidebar-link">
                            <i class="fa-solid fa-chalkboard-user pe-2"></i>
                               Assign Teacher Class
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
                        <h4>Add Student</h4>
                    </div>
              
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
                    <form action="" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                <div class="m-2">
                  <div class="row g-3">
                      <div class="col-4">
                          <label>First Name<span style="color:red;font-weight:bold">*</span></label>
                          <input type="text" name="name" class="form-control" placeholder="First Name" value="{{old('name')}}">
                          <span style="color:red; font-size:10px;">@error('name'){{ $message}} @enderror</span> 
                      </div>
                      <div class="col-4">
                          <label>Last Name<span style="color:red;font-weight:bold">*</span></label>
                          <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{old('last_name')}}">
                          <span style="color:red; font-size:10px;">@error('last_name'){{ $message}} @enderror</span> 
                      </div>

                      <div class="col-4">
                          <label>Middle Name<span style="color:red;font-weight:bold">*</span></label>
                          <input type="text" name="middle_name" class="form-control" placeholder="Middle Name" value="{{old('middle_name')}}">
                          <span style="color:red; font-size:10px;">@error('middle_name'){{ $message}} @enderror</span> 
                      </div>
                      <hr>
                      <div class="col-2">
                          <label>Gender<span style="color:red;font-weight:bold">*</span></label>
                          <select class="form-select" name="gender" value="{{old('gender')}}">
                              <option></option>
                              <option value="M">Male</option>
                              <option value="F">Female</option>
                          </select>
                          <span style="color:red; font-size:10px;">@error('gender'){{ $message}} @enderror</span> 
                      </div>

                      <div class="col-3">
                          <label>Date of Birth<span style="color:red;font-weight:bold">*</span></label>
                          <input type="date" name="birthdate" class="form-control" placeholder="Date of Birth" value="{{old('birthdate')}}">
                          <span style="color:red; font-size:10px;">@error('birthdate'){{ $message}} @enderror</span> 
                      </div>

                      <div class="col-5">
                          <label>Place of Birth<span style="color:red;font-weight:bold">*</span></label>
                          <input type="text" class="form-control" name="place_bdate" placeholder="Address" value="{{old('place_bdate')}}">
                          <span style="color:red; font-size:10px;">@error('place_bdate'){{ $message}} @enderror</span> 
                        </div>

                        <div class="col-md-2">
                              <label>Age<span style="color:red;font-weight:bold">*</span></label>
                              <input type="number" name="age" class="form-control" placeholder="Age" value="{{old('age')}}">
                              <span style="color:red; font-size:10px;">@error('age'){{ $message}} @enderror</span> 
                      </div>

                      <div class="col-12">
                          <label>Address<span style="color:red;font-weight:bold">*</span></label>
                          <input type="text" class="form-control" name="address" placeholder="Address" value="{{old('address')}}">
                          <span style="color:red; font-size:10px;">@error('address'){{ $message}} @enderror</span> 
                        </div>
                      <div class="col-md-3">
                        <label>Phone Number<span style="color:red;font-weight:bold">*</span></label>
                          <input type="number" name="phone_number" class="form-control" placeholder="Phone Number" value="{{old('phone_number')}}">
                          <span style="color:red; font-size:10px;">@error('phone_number'){{ $message}} @enderror</span> 
                        </div>
                        <div class="col-md-4">
                          <label>Email<span style="color:red;font-weight:bold">*</span></label>
                          <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                          <span style="color:red; font-size:10px;">@error('email'){{ $message}} @enderror</span> 
                        </div>
                      <!-- <div class="col-3">
                          <label>Grade<span style="color:red;font-weight:bold">*</span></label>
                          <select class="form-select" name="grade" value="{{old('grade')}}">
                              <option></option>
                              <option value="Grade 7">7</option>
                              <option value="Grade 8">8</option>
                              <option value="Grade 9">9</option>
                              <option value="Grade 10">10</option>
                          </select>
                              <span style="color:red; font-size:10px;">@error('grade'){{ $message}} @enderror</span> 
                      </div> -->
                      
                  </div>

                    <hr>
                  <div class="form-group m-2">
                    <label>Password<span style="color:red;font-weight:bold">*</span></label>
                    <input type="password" name="password"  id="myPassword" class="form-control" placeholder="Password">
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ url('faculty/student_user/list') }}" class="btn btn-danger">Back</a>
                </div>
              </form>





            </main>

            <!-- ========= light and dark mode toggle button ======= -->

            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>

            <!-- ========= footer section of dashboard ======= -->
<!-- 
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6">
                            <p class="mb-0">
                                <a href="#" class="text-muted"></a>
                                <strong>Masoli High School Portal</strong>
                            </p>
                        </div>
                        <div class="col-6 text-muted">
                            <ul class="col-6 text-end">
                                <li class="list-inline-item">

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

    @notifyJs
    <script src="{{asset('assets/js/try.js')}}"></script>
   
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>