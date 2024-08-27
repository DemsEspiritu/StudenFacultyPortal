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
<style>
#myTable {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#myTable th, #myTable td {
    border: 1px solid #000000;
    padding: 8px;
    text-align: left;
}

#myTable th {
    background-color: #52527a;
    color: #FFFFFF;
    text-align: center;
}

#search{
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #000000;
    box-shadow: 1px 2px #888888;
    width: 35%;
    
}
.basta-top {
    /* Add any additional styles you need for the parent container */
}

.flex-container {
    display: flex;
    justify-content: space-between;
}

.search-container {
    display: flex;
    align-items: center;
}
</style>

<body>
  <x-notify::notify />
    <!-- ======== Main wrapper for dashboard =========== -->

    <div class="wrapper">
        <!-- =========== Sidebar for admin dashboard =========== -->

        <aside id="sidebar">

            <!-- ======== Content For Sidebar ========-->
            <div class="h-100">
                    <div class="sidebar-logo">
                        <a href="#" class="titles" >Masoli High School</a>
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
                        <a href="/teacher/account" class="sidebar-link">
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
                        <h4>My Class Subject</h4>
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

                <input type="text" id="search" placeholder="Search">

                            <table id="myTable">
                            <thead>
                            <tr>
                                <th class="text-center" scope="col">Class Name</th>
                                <th class="text-center" scope="col">Class Section</th>
                                <th class="text-center" scope="col">Subject Name</th>
                                <th class="text-center" scope="col">Description</th>
                                <th class="text-center" scope="col">Schedule</th>
                                <th class="text-center" scope="col">Day</th>
                                <th class="text-center" scope="col">Action</th>
                          
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getRecord as $value)
                            <tr>
                    
                                <td class="text-center">{{ $value->class_name }}</td>
                                <td class="text-center">{{ $value->section_of_class }}</td>
                                <td class="text-center">{{ $value->subject_name }}</td>
                                <td class="text-center">{{ $value->subject_type }}</td>
                                <td class="text-center">{{ date('h:i A', strtotime($value->fromTime)) }}--{{ date('h:i A', strtotime($value->toTime)) }}</td>
                                <td class="text-center">{{ $value->schedule}}</td>

                                <td class="text-center">
                                <div class="dropdown dropdown-hover">
                                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-bars"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" target="_blank"  href="{{ route('student-class', [$value->class_id , $value->school_year_id]) }}"><i class="fa-solid fa-users pe-2"></i>View Class</a></li>
                                        <li><a class="dropdown-item" target="_blank"  href="{{ route('downloadStudentList', [$value->class_id, $value->school_year_id]) }}"><i class="fa-solid fa-download ms-1 pe-2"></i>Download Class</a></li>
                                        <li><a class="dropdown-item" target="_blank"  href="{{ route('student', [$value->class_id ,$value->subject_id, $value->school_year_id]) }}"><i class="fa-solid fa-clipboard-user ms-1 pe-2"></i>Class Attendance</a></li>
                                        <li><a class="dropdown-item" target="_blank"  href="{{ route('attendance_archives', [$value->class_id ,$value->subject_id, $value->school_year_id]) }}"><i class="fa-solid fa-clock-rotate-left ms-1 pe-2"></i>Attendance Archives</a></li>
                                        <li><a class="dropdown-item" target="_blank"  href="{{ route('attendance_summary', [$value->class_id ,$value->subject_id, $value->school_year_id]) }}"><i class="fa-solid fa-clipboard-list ms-1 pe-2"></i>Attendance Summary</a></li>
                                        <li><a class="dropdown-item" target="_blank"  href="{{ route('class-grades', [$value->class_id ,$value->subject_id, $value->school_year_id, $value->subject_name]) }}"><i class="fa-solid fa-file-lines ms-1 pe-2"></i>Class Grades</a></li>
                                    
                                       
                                    </ul>
                                    </div>
                                                            
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>

                    






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

    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#search").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tbody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
</body>

</html>