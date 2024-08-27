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
                        STUDENT SIDEBAR
                    </li>

                    <li class="sidebar-item">
                        <a href="/student/request/myrequest" class="sidebar-link">
                        <i class="fa-solid fa-file pe-2"></i>
                                Request Documents
                         </a>   
                    </li>

                     <li class="sidebar-item">
                        <a href="/student/grades/mygrades" class="sidebar-link">
                
                      
                        <span class="me-2">
                        <i class="fa-solid fa-newspaper pe-2"></i>
                            My Grades
                         </a>   
                    </li> 

                    </li>

                    <li class="sidebar-item">
                    <a href="/student/subject/list" class="sidebar-link">
                    <span class="me-2">
                    <i class="fa-solid fa-address-book pe-2"></i>
                            My Subject
                        </a>   
                    </li> 

                    <li class="sidebar-item">
                    <a href="/student/account" class="sidebar-link">
                    <span class="me-2">
                    <i class="fa-solid fa-user pe-2"></i>
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
                        <h4>Request Documents</h4>
                        <a href="{{ url('/student/request/add') }}" class="btn btn-primary"><i class="fa-solid fa-plus  p-1" style="color: #ffffff;"></i>Add Request</a>
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
                  
                </div> <!--   this is form container fluid -->

                <div class="container-fluid">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Type</th>
                            <th class="text-center">Submit Date</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($val as $ownRec)
                            <tr>
                                <td class="text-center">{{ $ownRec->type }}</td>
                                
                                <td class="text-center">{{ \Carbon\Carbon::parse($ownRec->created_at)->format('F j, Y h:i A') }}</td>
                                <td class="text-center">{{ $ownRec->status }}</td>
                                <td class="text-center">
                                    @if($ownRec->status != 'File Release' && $ownRec->status != 'Canceled')
                                        <a href="{{ url('student/request/myrequest/canceled'.$ownRec->form_id) }}" class="btn btn-danger btn-sm">
                                            <i class="fa-regular fa-trash-can p-1" style="color: #fafafa;"></i>Canceled
                                        </a>
                                    @endif
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


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

    @notifyJs
    <script src="{{asset('assets/js/try.js')}}"></script>
   
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>