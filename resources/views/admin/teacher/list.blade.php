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
    <link rel="stylesheet" href="{{asset('assets/css/notify.css')}}">
    <title>Masoli High School</title>
  </head>
  <body>
  <x-notify::notify />
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

            <a href="/admin/list" class="nav-link  px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-users me-2 "></i></span>
                <span>Admin List</span></a>

            <a href="/admin/teacher/list" class="nav-link px-3 active pt-3">
                <span class="me-2"><i class="fa-solid fa-chalkboard-user me-2"></i></span>
                <span>Teacher List</span></a>

            <a href="/admin/student/list" class="nav-link  px-3 pt-3">
                <span class="me-2"><i class="fa-solid fa-people-group"></i></span>
                <span>Student List</span></a>

            <a href="/admin/faculty/list" class="nav-link px-3  pt-3">
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
    <!-- Body Admin List Page -->

    <main class="mt-5 pt-5">
      <div class="container-fluid">
          <div class="row">
            
            <div class="form-group col-md-9">
              <h4>Teacher List  (Total : {{ $data['getTeacher']->total() }} )</h4> 
            </div>
          
            <div class="form-group col-md-3">
              <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary"><i class="fa-solid fa-plus  p-1" style="color: #ffffff;"></i>Add New Teacher</a>
            </div>

          
   

          </div>
        @include('_message')
      <div class="container-fluid mt-2">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h6 class="card-title">Search Teacher</h6>
              </div>
              <form action="" method="get">
                <div class="card-body">

                    <div class="row">

                    <div class="form-group col-md-3">
                      <label>Name</label>
                      <input type="text" name="name" value="{{ Request::get('name') }}" class="form-control" placeholder="Name">
                    </div>

                    <div class="form-group col-md-3">
                      <label>Email address</label>
                      <input type="email" name="email" value="{{ Request::get('email') }}" class="form-control" placeholder="Enter email">
                    </div>

                    <div class="form-group col-md-3">
                      <label>Date</label>
                      <input type="date" name="date" value="{{ Request::get('date') }}" class="form-control">
                    </div>

                    <div class="form-group col-md-3">
                
                      <button class="btn btn-primary" type="submit" style="margin-top:24px;">Search</button>
                      <a href="{{ url('admin/teacher/list')}}" class="btn btn-success" style="margin-top:24px;">Reset</a>
                    </div>

                  </div>
                <!-- /.card-body -->
                </div>
              </form>
            </div>
            <!-- end -->
          </div>
        </div>
      </div>

        <!-- Admin Table List -->
        <div class="container-fluid mt-2">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Teacher List</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data['getTeacher'] as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td>
                      <a href="#" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalView{{$value->id}}"><i class="fa-regular fa-eye p-1" style="color: #fafafa;"></i>View</a>
                      <a href="{{ url('admin/teacher/edit/'.$value->id) }}" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square p-1" style="color: #fafafa;"></i>Edit</a>
                      <a href="{{ url('admin/teacher/list'.$value->id) }}" class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can p-1" style="color: #fafafa;"></i>Delete</a>
                      </td>    
                    </tr>
                    @include('/admin/teacher/viewmodal')
                    @endforeach
                  </tbody>
                </table>

                <!-- pagination -->
                <div style="float:right;">
                {!! $data['getTeacher']->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
                </div>
                <!-- End of pagination -->
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
    @notifyJs
  </body>
</html>
