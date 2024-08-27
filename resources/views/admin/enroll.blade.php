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
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">

          <li>
            <a href="/admin/dashboard" class="nav-link  px-3 pt-3 mt-2">
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

                
            <a href="#" class="nav-link px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-paperclip"></i></span>
                <span>Request Form</span>
              </a>

                <a href="#" class="nav-link active px-3  pt-3">
                <span class="me-2"><i class="fa-solid fa-people-line"></i></span>
                <span>Enroll Request</span></a>

            
                <hr>
                  <a href="/admin/class/list" class="nav-link px-3  pt-3">
                  <span class="me-2"><i class="fa-solid fa-book-open-reader"></i></span>
                   <span>Class</span></a>
              <hr>

              <a href="{{ url('logout') }}" class="nav-link px-3 bg-danger pt-3">
                <span class="me-2"><i class="fas fa-power-off me-2"></i></span>
                <span>Logout</span>
              </a>
            </li>    
          </ul>
        </nav>
      </div>
    </div>
    <!-- Body Admin List Page -->
    
    <main class="mt-5 pt-5">
    <div class="container-fluid mt-2">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-light">
                <h5 class="card-title">Enroll Request</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th class="info" style=" text-align:center">Name</th>
                      <th class="info" style=" text-align:center">Last Name</th>
                      <th class="info" style=" text-align:center">Address</th>
                      <th class="info" style=" text-align:center">Email</th>
                      <th class="info" style=" text-align:center">Type</th>
                      <th class="info" style=" text-align:center">Grade</th>
                      <th class="info" style=" text-align:center">Date Submit</th>
                      <th class="info" style=" text-align:center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($list as $info)
                    <tr>
                      <td class="info" style="font-size: 10px;">{{$info->id}}</td>
                      <td  class="info" style="font-size: 10px;">{{$info->name}}</td>
                      <td  class="info" style="font-size: 10px;">{{$info->last_name}}</td>
                      <td  class="info" style="font-size: 10px;">{{$info->address}}</td>
                      <td  class="info" style="font-size: 10px;">{{$info->email}}</td>

                      <td  class="info" style="font-size: 10px;"> 
                      @if ( $info->user_type == 3 )
                      Student
                      @else
                      None
                      @endif

                    </td>

                      <td  class="info" style="font-size: 10px;">{{$info->grade}}</td>
                      <td  class="info" style="font-size: 10px;">{{$info->created_at}}</td>
                      <td>
                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#ModalView{{$info->id}}"><i class="fa-regular fa-eye pl-1" style="color: #fafafa;"></i></a>
                      
                        <a href="#" class="btn btn-danger btn-sm" ><i class="fa-regular fa-trash-can pl-1" style="color: #fafafa;"></i></a>
                      </td>
                       @include('admin.enroll_view')
                    </tr>
                    @endforeach
                  </tbody>
                 
                </table>

                <!--Modal -->
                
                <!-- End of pagination -->
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
