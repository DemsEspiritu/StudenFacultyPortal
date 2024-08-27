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
                            <span style="color:black;font-weight:bold; margin-right:10px;">{{Auth::user()->name}} {{Auth::user()->last_name}}</span>
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
                        <h4>My Account</h4>
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
           
             <form action=" " method="post" >
              {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
        


                    <div class="parents mt-3 mb-3">
                        <h5>Student Information</h5>
                    </div>
        
                    <div class="form-group col-md-5">
                    <label>First Name</label>
                        <input type="text" name="name" class="form-control"  value="{{old('name',$getRecord->name)}}">
                          <span style="color:red; font-size:10px;">@error('name'){{ $message}} @enderror</span> 
                    </div>

                    
                    <div class="form-group col-md-5">
                    <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control"  value="{{ old ('last_name', $getRecord->last_name) }}">
                          <span style="color:red; font-size:10px;">@error('last_name'){{ $message}} @enderror</span> 
                    </div>

                    <div class="form-group col-md-5">
                    <label>Middle Name</label>
                        <input type="text" name="middle_name" class="form-control"  value="{{ old ('middle_name', $getRecord->middle_name) }}">
                          <span style="color:red; font-size:10px;">@error('middle_name'){{ $message}} @enderror</span> 
                    </div>

                    <div class="form-group col-md-5">
                    <label>Email</label>
                        <input type="text" name="email" class="form-control"  value="{{ old ('email', $getRecord->email) }}">
                          <span style="color:red; font-size:10px;">@error('email'){{ $message}} @enderror</span> 
                    </div>

                    <div class="form-group col-md-5">
                    <label>Phone</label>
                        <input type="text" name="phone_number" class="form-control"  value="{{ old ('phone_number', $getRecord->phone_number) }}">
                          <span style="color:red; font-size:10px;">@error('phone_number'){{ $message}} @enderror</span> 
                    </div>

                    <div class="form-group col-md-5">
                    <label>Address</label>
                        <input type="text" name="address" class="form-control"  value="{{ old ('address', $getRecord->address) }}">
                          <span style="color:red; font-size:10px;">@error('address'){{ $message}} @enderror</span> 
                    </div>

                    <div class="parents mt-3 mb-3">
                        <h5>Parents Information</h5>
                    </div>

                    <div class="form-group col-md-5">
                    <label>Father Name</label>
                        <input type="text" name="father_name" class="form-control"  value="{{ old ('father_name', $getRecord->father_name) }}">
                          <span style="color:red; font-size:10px;">@error('father_name'){{ $message}} @enderror</span> 
                    </div>

                    <div class="form-group col-md-5">
                    <label>Phone</label>
                        <input type="text" name="father_phone" class="form-control"  value="{{ old ('father_phone', $getRecord->father_phone) }}">
                          <span style="color:red; font-size:10px;">@error('father_phone'){{ $message}} @enderror</span> 
                    </div>

                    <div class="form-group col-md-5">
                    <label>Mother Name</label>
                        <input type="text" name="mother_name" class="form-control"  value="{{ old ('mother_name', $getRecord->mother_name) }}">
                          <span style="color:red; font-size:10px;">@error('mother_name'){{ $message}} @enderror</span> 
                    </div>

                    <div class="form-group col-md-5">
                    <label>Phone</label>
                        <input type="text" name="father_phone" class="form-control"  value="{{ old ('father_phone', $getRecord->father_phone) }}">
                          <span style="color:red; font-size:10px;">@error('father_phone'){{ $message}} @enderror</span> 
                    </div>

                    <div class="parents mt-3 mb-2">
                        <h5>Password</h5>
                    </div>


                    <div class="form-group col-md-5">
                    <label>Password</label>
                     <input type="text" name="password"  class="form-control" placeholder="Password">
                        <p>Do you want to change password. Please Add new Password</p>
                  </div>
                    <hr>



                
                    <div class="form-group col-md-3">
                
                      <button class="btn btn-primary" type="submit" style="margin-top:24px;">Update</button>
                    
                    </div>

                <!-- /.card-body -->
                </div>
              </form>
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
</body>

</html>