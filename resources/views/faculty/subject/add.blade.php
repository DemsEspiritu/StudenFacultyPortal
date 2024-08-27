







        <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shorcut icon" href="{{asset('assets/img/school-logo.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>Masoli High School</title>
  </head>
  <body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
 data-bs-target="#sidebar"
          aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"
          ><img class="m-2" src="{{asset('assets/img/school-logo.png')}}" alt="logo" style="height:40px;">MASOLI PORTAL</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
              <span style="color:white;font-weight:bold; margin-right:10px;">{{Auth::user()->name}}</span>
              <i class="fa-solid fa-user"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">


                     <!-- SIDE BAR MENU -->
                     <li>
            <a href="/faculty/dashboard" class="nav-link active px-3 pt-3 mt-2">
                <span class="me-2"><i class="fa-solid fa-chart-pie"></i></span>
                <span>Dashboard</span></a>

        

              <a href="/faculty/subject/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-layer-group  me-2"></i></span>
                <span>Subject</span></a>

           

            <a href="/faculty/school_year/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-calendar-days me-2"></i></span>
                <span>School Year</span></a>
            
            <a href="/faculty/class/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-school me-2"></i></span>
                <span>Class</span></a>


            <a href="/faculty/assign_subject_class/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-book-open-reader me-2"></i></span>
                <span>Assign Subject Class</span></a>

   



                <!-- Student Concern -->
                <hr style="color:white;">
                <li class="menu-header small text-uppercase">
                   <span class="menu-header-text" style="padding-left:50px; padding-top:20px; color:white;">Student Concern</span>
              </li>

              <a href="/faculty/enroll/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-restroom me-2"></i></span>
                <span>Request Enroll</span>
              </a>

              <a href="/faculty/request/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-book me-2"></i></span>
                <span>Request Documents</span>
              </a>

                      <!-- Records -->
              <hr style="color:white;">
              
                <li class="menu-header small text-uppercase">
                   <span class="menu-header-text" style="padding-left:80px; padding-top:20px; color:white;">Records</span>
              </li>

              

           

                          <!-- second item -->
                        <a href="/faculty/student/list" class="nav-link  px-3 pt-3">
                          <span class="me-2"><i class="fa-solid fa-school me-2"></i></span>
                              <span>Student List</span></i>
                        </a>
              

              <hr style="color:white;">
              
                <li class="menu-header small text-uppercase">
                   <span class="menu-header-text" style="padding-left:55px; padding-top:20px; color:white;">Users Account</span>
              </li>

              <a href="/faculty/faculty_user/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-people-line"></i></span>
                <span>Admin List</span></a>


            <a href="/faculty/teacher_user/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-chalkboard-user me-2"></i></span>
                <span>Teacher List</span></a>

            <a href="/faculty/student_user/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-people-group"></i></span>
                <span>Student List</span></a>




            </li>
             <!--END SIDE BAR MENU -->
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Add Subject</h4>
                <div class="row">
          <div class="col-md-12">
            <!-- //Content of Admin List Page -->
            <div class="card card-primary mt-3">
              <div class="card-header bg-secondary">
                <h6 class="card-title">Subject</h6>
              </div>
              <!-- form start for adding new admin -->
              <form action="" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                <div class="form-group m-2">
                    <label>Subject Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
                    <span style="color:red; font-size:10px;">@error('name'){{ $message}} @enderror</span> 
                </div>
                <div class="form-group m-2">
                    <label>Description</label>
                    <input type="text" name="description"  class="form-control" placeholder="Description">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('faculty/subject/list') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
            </div>
            <!-- end -->
        </div>
        </div>
            
        </div>
</div>
</div>
    </main>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{asset('assets/js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
  </body>
</html>
