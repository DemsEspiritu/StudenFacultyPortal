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
                        <h4>Class Attendace</h4>
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
            <h6 class="card-title">Manage Class Attendances</b></h6>
        </div>

        <div class="card-body">

            <div class="row mb-4">

           

               <div class="col-md-12 d-flex mt-4 justify-content-between align-items-center">
                
                    <div class="d-flex justify-content-end mb-0" role="alert">
                       
                        <div class="p-3">
                            <input checked class="present" type="radio" >
                            <b>Present</b>
                        </div>
                        <div class="p-3">
                            <input checked class="absent" type="radio" >
                            <b>Absent</b>
                        </div>
                        <div class="p-3">
                            <input checked class="tardy" type="radio" >
                            <b>Late</b>
                        </div>
                   </div>

                   <div>
                        <a href=""
                            type="submit" class="btn btn-primary" style="font-size: 12px"><i style="font-size: 12px" class="icon-archive mr-1"></i> Attendance Archives </a>
                    </div>
                </div>

            </div>

            <form action="" method="post">
            {{ csrf_field() }}

            <div class="form-control mb-2">

            <label for="attendance_date">Select Attendance Date:</label>
            <input type="date" name="attendance_date" id="attendance_date" required>
            </div>
          
 

                <table class="table table-attendance">
                    
                    <thead>
                    <tr>
                        <th class="text-center">S/N</th>
                        <th class="w-25 text-center">Name</th>
                        <th class="text-center bg-light"> 
                            <input class="present mr-2" data-value="present" type="radio" name="select_all_attendances" id="select_all_attendances_1">
                            <input class="absent mr-2"  data-value="absent" type="radio" name="select_all_attendances" id="select_all_attendances_2">
                            <input class="tardy mr-2" data-value="late"  type="radio" name="select_all_attendances" id="select_all_attendances_3">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $key=> $student)
                           
                            <tr>
                                <td style="width: 5%" class="text-center">{{ $loop->iteration }}</td>

                                <td  class="text-center">
                                    {{ $student->last_name }}  {{ $student->name }} {{ $student->middle_name }}.
                                </td>

                                <td class="text-center bg-light">
                                    <input type="hidden" name="attendances[{{$key}}][student_id]" value="{{ $student->id }}">
                                    <input type="hidden" name="attendances[{{$key}}][attendance_date]" value="{{ $student->attendance_date }}">


                                 

                                    <input {{ $student->status === 'present' ? 'checked' : '' }}  value="present"
                                        class="present mr-2" type="radio" name="attendances[{{$key}}][status]" id="{{$student->id}}_1">
                                    <input {{ $student->status === 'absent' ? 'checked' : '' }}  value="absent"
                                        class="absent mr-2" type="radio" name="attendances[{{$key}}][status]" id="{{$student->id}}_2">
                                    <input {{ $student->status === 'tardy' ? 'checked' : '' }} value="tardy"
                                        class="tardy mr-2" type="radio" name="attendances[{{$key}}][status]" id="{{$student->id}}_3">
                                </td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk mr-1"></i> Save Record </button>
                </div>
            </form>

            
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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