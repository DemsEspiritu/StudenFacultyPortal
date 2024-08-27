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
                        <a href="/faculty/dashboard?schoolYear=2022-2024" class="sidebar-link">
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
                            
                            <li class="sidebar-item">
                                <a href="/faculty/grading" class="sidebar-link">
                                <i class="fa-solid fa-shield-halved pe-2"></i>
                                Grading Period </a>
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
                    <span style="margin:15px;"><a href="#"><i class="fa-regular fa-bell fa-2xl"></i></a></span>
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

    <main class=" pt-2">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-3 mb-3">
            <div class="card bg-warning text-dark h-100">
              <div class="card-body py-5">
                <h4>Teacher</h4>
                <h1 class="total text-center">{{ $totalTeacher}} <i class="fa-solid fa-chalkboard-user"></i></h1>
                </div>
              <div class="card-footer d-flex">
             
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-success text-white h-100">
              <div class="card-body py-5">
                <h4>Admin</h4>
                <h1 class="total text-center">{{ $totalFaculty}} <i class="fa-solid fa-people-line "></i></h1>
              </div>
              <div class="card-footer d-flex">
                
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-danger text-white h-100">
              <div class="card-body py-5">
                <h4>Student</h4>
                <h1 class="total text-center">{{$totalStudent}} <i class="fa-solid fa-users"></i></h1>
              </div>
              <div class="card-footer d-flex">
           
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-info text-white h-100">
              <div class="card-body py-5">
                <h4>Active School Year</h4>
                @foreach($sy as $schoolYear)
                <h1 class="total text-center">{{ $schoolYear->year_name }} <i class="fa-solid fa-calendar-days"></i></h1>
                @endforeach
              </div>
              <div class="card-footer d-flex">
           
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

    @notifyJs
    <script src="{{asset('assets/js/try.js')}}"></script>
   
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script>

      function setQuery(elem){
        
        document.location.href=document.location.href.replace(/=[A-Za-z0-9]+-[A-Za-z0-9]+/,`=${elem.options[elem.selectedIndex].text}`);
         
      }
    </script>

    
</body>

</html>