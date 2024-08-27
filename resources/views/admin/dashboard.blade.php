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
              <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">


            <li>
            <a href="/admin/dashboard" class="nav-link active px-3 pt-3 mt-2">
                <span class="me-2"><i class="fa-solid fa-chart-pie"></i></span>
                <span>Dashboard</span></a>

            <a href="/admin/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-users me-2 "></i></span>
                <span>Admin List</span></a>

            <a href="/admin/teacher/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-chalkboard-user me-2"></i></span>
                <span>Teacher List</span></a>

            <a href="/admin/student/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-people-group"></i></span>
                <span>Student List</span></a>

            <a href="/admin/faculty/list" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-people-line"></i></span>
                <span>Faculty List</span></a>


              <a href="{{ url('logout') }}" class="nav-link px-3 bg-danger pt-3">
                <span class="me-2"><i class="fas fa-power-off me-2"></i></span>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white h-100">
              <div class="card-body py-5">
                <h4>Admin</h4>
                <h1 class="total text-center">{{ $totalAdmin}} <i class="fa-solid fa-users"></i> </h1>
              </div>
              <div class="card-footer d-flex">
             
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
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
                <h4>Faculty</h4>
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
                <h1 class="total text-center">{{ $totalStudent}} <i class="fa-solid fa-users"></i></h1>
              </div>
              <div class="card-footer d-flex">
                
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>

        </div>
          <hr>
        
     
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
