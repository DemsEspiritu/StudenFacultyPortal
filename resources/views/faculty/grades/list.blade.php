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
                    <li class="sidebar-header">SCHOOL</li>
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
                            Managed School</a>

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

                    <li class="sidebar-header">ASSIGN</li> 

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

                    <li class="sidebar-header">STUDENT CONCERN</li>

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

                    <li class="sidebar-header">RECORD</li>



                    <li class="sidebar-item">
                        <a href="/faculty/student/list" class="sidebar-link">
                            <i class="fa-solid fa-school pe-2"></i>
                               Student List
                         </a>   
                    </li> 

                    <li class="sidebar-header">USER ACCOUNT</li> 

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
                <!-- EEND UL OF SIDEBAR MENU-->
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
                        <h4>Student Grades Record</h4>
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
                    <form action="" method="get" >
                <div class="card-body">
                    <div class="row">

                    <div class="form-group col-md-3">
                      <label>LRN</label>
                      <input type="text" name="lrn" value="{{ Request::get('lrn') }}" class="form-control" placeholder="LRN Number">
                    </div>

                    <div class="form-group col-md-3">
                      <label>Name</label>
                      <input type="text" name="name" value="{{ Request::get('name') }}" class="form-control" placeholder="Name">
                    </div>

                    <div class="form-group col-md-3">
                      <label>Grade</label>
                      <select class="form-select" name="grade" placeholder="Select Grade" value="{{ Request::get('grade') }}">
                              <option></option>
                              <option value=7>7</option>
                              <option value=8>8</option>
                              <option value=9>9</option>
                              <option value=10>10</option>
                          </select>

                    </div>

                
                    <div class="form-group col-md-3">
                
                      <button class="btn btn-primary" type="submit" style="margin-top:24px;">Search</button>
                      <a href="{{ url('faculty/student/list')}}" class="btn btn-success" style="margin-top:24px;">Reset</a>
                    </div>

                  </div>
                <!-- /.card-body -->
                </div>
              </form>
                </div> <!--   this is form container fluid -->

                <div class="container-fluid m-3">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th  class="text-center">LRN</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Grade</th>
                            <th class="text-center">Email</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data['getStudentProfile'] as $student)
                        <tr>
                            <td class="text-center">{{$student->lrn}}</td>
                            <td class="text-center">{{$student->last_name}} {{$student->name}}   {{$student->middle_name}}.</td>
                            <td class="text-center">{{$student->grade}}</td>
                            <td class="text-center">{{$student->email}}</td>
                            <td class="text-center"> 
                        <a href="{{ url('faculty/grades/list_grades'.$student->student_profile_id) }}" class="btn btn-success btn-sm" style="color:white;"><i class="fa-regular fa-eye p-1" style="color: #fafafa;"></i>View Records</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="float:right;">
                {!! $data['getStudentProfile']->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
                </div>
                <!-- End of pagination -->
              </div>
            <!-- End Of table -->
            </main>

            <!-- ========= light and dark mode toggle button ======= -->
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <!-- =========END light and dark mode toggle button ======= -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

    @notifyJs
    <script src="{{asset('assets/js/try.js')}}"></script>
   
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>