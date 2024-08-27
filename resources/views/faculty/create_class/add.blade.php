<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shorcut icon" href="{{asset('assets/img/school-logo.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

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
          <ul class="navbar-nav ms-auto ml-1"">
            <li class="nav-item dropdown"">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
              <span style="color:white;font-weight:bold; margin-right:10px;">{{Auth::user()->name}}</span>

              <i class="fa-solid fa-circle-user fa-2xl" style="color: #ffffff;"></i>
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
            <a href="/faculty/dashboard?schoolYear=2022-2023" class="nav-link active px-3 pt-3 mt-2">
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

              

              <a href="/faculty/grades/list" class="nav-link  px-3 pt-3">
                          <span class="me-2"><i class="fa-solid fa-file-lines me-2"></i></span>
                              <span>Academic Records</span></i>
                        </a>

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
          <div class="col-md-12">
            <h4>Create a New Class</h4>
          </div>


          <form action=" " method="post">
                {{ csrf_field() }}
                <div class="card-body body-assign">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Select Class</label>
                            <select class="form-select" name="class_id[]" value="">
                                <option></option>
                                @foreach($data ['getClass'] as $class)
                                <option value="{{ $class->class_id }}">{{ $class->name }} section {{ $class->section }}</option>
                                @endforeach
                             </select>
                    <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span> 
                </div>

                <div class="form-group col-md-3">
                     <label>Select Teacher</label>
                            <select class="form-select" name="teacher_id[]" value="">
                                <option></option>
                                @foreach($data ['getTeacher'] as $class)
                        
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                    <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span> 
                </div>

                <div class="form-group col-md-3">
                     <label>Select School Year</label>
                            <select class="form-select" name="school_year_id[]" value="{{old('school_year_id')}}">
                                <option></option>
                                @foreach($data ['getSchoolYearForAssign'] as $class)
                             
                                <option value="{{ $class->school_year_id }}">{{ $class->year_name }}</option>
                                @endforeach
                            </select>
                    <span style="color:red; font-size:10px;">@error('type'){{ $message}} @enderror</span>
                </div>
            
                <!-- end try -->
                <div class="pt-2 suject">
                    <!-- <label>Subject</label> -->
                    @foreach($data['getSubject'] as $subject)
                 
                        <label style ="font-weight:normal;">
                            <input type="checkbox" value="{{ $subject->subject_id }}"  name="subject_id[]" {{ old('subject_id') == $class->subject_id ? 'selected' : '' }}> {{ $subject->name}}
                        </label>
        
                    @endforeach
                </div>



                <div class="card-body">
                <table class="table table-sm table-bordered">
                  <thead>
                    <tr>
                    <th></th>
                      <th>LRN</th>
                      <th>Name</th>
                      <th>Grade</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($data['getStudentProfile'] as $student)
                    <tr>
                      <td class="text-center"><input type="checkbox" value="{{$student->student_profile_id}}" name="student_profile_id[]" ></td>
                      
                      <td class="text-center">{{$student->lrn}}</td>
                      <td class="text-center">{{$student->last_name}} {{$student->name}}   {{$student->middle_name}}.</td>
                      <td class="text-center">{{$student->grade}}</td>
                      <td class="text-center"> 
                      <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$student->student_profile_id}}"><i class="fa-regular fa-eye p-1" style="color: #fafafa;"></i>View</a>
                      </td>
                    </tr>
                    @include('faculty/student/modal_view')
                    @endforeach
                  </tbody>   
              </table>
            </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>



      </div>
    </main>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{asset('assets/js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
  </body>
</html>
