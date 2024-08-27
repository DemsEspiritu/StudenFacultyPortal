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
                  <!-- Start Ul -->
                  <ul class="sidebar-nav">
                        <!-- SIDEBAR ITEM -->
                      

                        <li class="sidebar-header">
                        TEACHER SIDEBAR
                    </li>

                    <li class="sidebar-item">
                        <a href="/teacher/dashboard" class="sidebar-link">
                        <i class="fa-solid fa-chalkboard-user pe-2"></i>
                               Main Page
                         </a>   
                    </li>

                     <li class="sidebar-item">
                        <a href="/teacher/MyClassAndSubject/list" class="sidebar-link">
                        <i class="fa-solid fa-chalkboard-user pe-2"></i>
                                My Class and Subject
                         </a>   
                    </li>

                     <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                        <span class="me-2"><i class="fa-solid fa-people-group pe-2"></i>
                               My Account
                         </a>   
                    </li> 

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
                        <h4>Attendance Archives</h4>
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
                    
                <div class="container-fluid">

                <!-- <div class="col-md-12">
                    <div class="alert alert-info mb-0" role="alert">
                        <p class="mb-0">You are currently editing on  </b></p>
                   </div>
               </div> -->

               <div class="card card-attendance">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Attendance Archives</b></h6>
        </div>

        <div class="card-body">

       

            <table class="table datatable-button-html5-columns">
                <thead>
                <tr>
                    <th class="text-center">S/N</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Actions</th>
                 
                </tr>
                </thead>
                <tbody>
                    @foreach($attendanceDates as $key=> $attendanceDate)
                        <tr>
                            <td class="text-center" style="width: 5%">{{ $loop->iteration }}</td>

                            <td class="text-center" style="color:red;">
                           
                                                           
                              

                                   {{$attendanceDate->attendance_date}}
                           
                            </td>

                            <td class="text-center">
                                    <a href="{{ route('attendances-edit',
                                        [
                                        'class_id' => $attendanceDate->class_id,
                                        'subject_id' => $attendanceDate->subject_id ,
                                        'school_year_id' => $attendanceDate->school_year_id,
                                        'attendance_date' => $attendanceDate->attendance_date
                                        ])
                                        }}" class="btn btn-sm btn-primary">View</a>
                             </td>

                    
                        </tr>
                    @endforeach
                </tbody>
            </table>

            
        </div>
    </div>

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

    <script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    function checkAllRadioAttendance(attendance) {
        const list = document.querySelectorAll(`tbody .${attendance}`)
        for (const checkbox of list) {
            checkbox.checked = true;
        }
    }

    const radios = document.querySelectorAll('input[name="select_all_attendances"]')
        for (const radio of radios) {
        radio.onclick = (e) => {
            checkAllRadioAttendance(e.target.dataset.value);
        }
    }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

    @notifyJs
    <script src="{{asset('assets/js/try.js')}}"></script>
   
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>