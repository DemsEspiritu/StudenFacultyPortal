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
    width: 100%;
    
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
                        <h4>Subject Class </h4>
                    </div>
                    

                <div class="container-fluid mt-1">

                <div class="basta-top">
    <div class="flex-container">
        <div class="search-container">
            <input type="text" id="search" placeholder="Search">
            <i class="fa-solid fa-magnifying-glass p-2"></i>
        </div>
        <a href="{{ url('faculty/assign_subject_class/add') }}" class="btn btn-primary m-3">New Assign</a>
    </div>
</div>

            <table id="myTable">
                        <thead>
                    <tr>
                      <th class="text-center">Class Name</th>
                      <th class="text-center">Section</th>
                      <th class="text-center">Subject</th>
                      <th class="text-center">Teacher</th>
                      <th class="text-center">Schedule</th>
                      <th class="text-center">Time</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($classes as $value)  
                    <tr> 
                      <td class="text-center">{{ $value->class_name}}</td>
                      <td class="text-center">{{ $value->section_of_class}}</td>
                      <td class="text-center">{{ $value->subject_name}}</td>
                      <td class="text-center">{{ $value->teacher_name}}</td>
                      <td class="text-center">{{ $value->schedule}}</td>
                      <td class="text-center">{{ date('h:i A', strtotime($value->fromTime)) }}--{{ date('h:i A', strtotime($value->toTime)) }}</td>
                      <td class="text-center">
                        <a href="{{ url('faculty/assign_subject_class/edit'.$value->id ) }}" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square p-1" style="color: #fafafa;"></i>Edit</a>
                        <a href="{{ url('faculty/assign_subject_class/remove'.$value->id ) }}" class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can p-1" style="color: #fafafa;"></i>Delete</a>
                      </td>    
                    </tr>
                      @endforeach
                  </tbody>
                </table>

               <!-- pagination -->
               <div style="float:right;">
                {!! $classes->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
                </div>
                <!-- End of pagination -->
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