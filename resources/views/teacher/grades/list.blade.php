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
                    <a href="">Masoli High School</a>
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
                        <h4>Student Record</h4>
                    </div>

                    <div class="row"><!--   this is form row fluid -->
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">

                                </div>
                            </div>
                        </div>
                    </div><!--   this is form row fluid -->

                    <div class="col-12">
                        <hr>
                        <div class="form-group col-md-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add New Record
                            </button>
                        </div>
                        <hr>
                        <span class="bold" >Name: {{$data['getStudentProfile']->name}} {{$data['getStudentProfile']->last_name}} {{$data['getStudentProfile']->middle_name}}.</span>
                        <br>
                        <span class="bold" >LRN: {{$data['getStudentProfile']->lrn}}</span>
                        <br>
                        <!-- <span>Class: {{$data['getStudentProfile']->class_name}}</span>
                        <br>
                        <span>Section: {{$data['getStudentProfile']->class_section}}</span> -->

                        <hr>
                    </div>

                    <div class="container-fluid">
                        <form action="{{url('teacher/addgrades')}}" method="post">
                            {{ csrf_field() }}
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Subject</th>
                                        <th class="text-center">1st Grading</th>
                                        <th class="text-center">2nd Grading</th>
                                        <th class="text-center">3rd Grading</th>
                                        <th class="text-center">4th Grading</th>
                                        <th class="text-center">Final</th>
                                        <th class="text-center"> Passed Or Fail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($grades as $grade)
                                        <tr>
                                            <td class="text-center">{{$grade->name}}</td>
                                             <input
                                                    name="ids[]"
                                                    value="{{$grade->tgs_id}}"
                                                    hidden
                                                />
                                                <td class="text-center">
                                                    <input type="text" class="form-control text-center  grade{{$grade->tgs_id}}" onchange="computeForGrades({{$grade->tgs_id}})" name="first_grading[]" value="{{$grade->first_grading}}"
                                                        @if(is_countable($gradingFilter)&&!is_string($gradingFilter))
                                                            disabled
                                                        @endif
                                                        @if(!str_contains($gradingFilter, 'first'))
                                                            disabled
                                                        @endif
                                                    >
                                                </td>
                                                <td class="text-center">
                                                    <input type="text"  class="form-control text-center  grade{{$grade->tgs_id}}" onchange="computeForGrades({{$grade->tgs_id}})" name="second_grading[]"value="{{$grade->second_grading}}"
                                                        @if(is_countable($gradingFilter)&&!is_string($gradingFilter))
                                                            disabled
                                                        @endif
                                                        @if(!str_contains($gradingFilter, 'second'))
                                                            disabled
                                                        @endif
                                                    >
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" class="form-control text-center  grade{{$grade->tgs_id}}" onchange="computeForGrades({{$grade->tgs_id}})" name="third_grading[]"value="{{$grade->third_grading}}"
                                                    @if(is_countable($gradingFilter)&&!is_string($gradingFilter))
                                                            disabled
                                                        @endif
                                                        @if(!str_contains($gradingFilter, 'third'))
                                                            disabled
                                                        @endif
                                                    >
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" class="form-control text-center grade{{$grade->tgs_id}}" onchange="computeForGrades({{$grade->tgs_id}})" name="fourth_grading[]"value="{{$grade->fourth_grading}}"
                                                    @if(is_countable($gradingFilter)&&!is_string($gradingFilter))
                                                            disabled
                                                        @endif
                                                        @if(!str_contains($gradingFilter, 'fourth'))
                                                            disabled
                                                        @endif
                                                    >
                                                </td>
                                                <td class="text-center"><input type="text" class="form-control text-center" id="grade{{$grade->tgs_id}}" value="{{$grade->final_grades}}" readonly></td>
                                                <td class="text-center" id="passFailed{{$grade->tgs_id}}">{{$grade->passed_failed}}</td>
                                        </tr>
                                 @endforeach

                                </tbody>

                            </table>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

            </main>

            <!-- ========= light and dark mode toggle button ======= -->

            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>


        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('teacher/addrecord')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        
                        
                        @foreach($subjects as $subj)
                            
                            <div>
                                <label> {{$subj['subject_name']}}</label>
                                <input name="users_id" value="{{$data['getStudentProfile']->id}}" hidden/>         
                                <input name="school_year_id" value="{{$data['getStudentProfile']->school_year_id}}" hidden/>         
                                <input
                                        class="form-check-input" type="checkbox"  

                                        
                                        name="subjects[]" value="{{$subj['subject_id']}}"



                                    @foreach($grades as $grade)
                                        @if($grade->name==$subj['subject_name'])
                                            checked
                                        @endif
                                    @endforeach
                                />

                                
                            </div>
                        @endforeach
                    </div>

                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Stotal changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>



    @notifyJs
    <script src="{{asset('assets/js/try.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>

    <script>

        function computeForGrades(data){
            let arr = document.getElementsByClassName(`grade${data}`);
            let total = 0;
            for (let index = 0; index < arr.length; index++) {
                const element = arr[index];

                
                if(element.value!=null&&element.value!=undefined&&element.value!=""){
                    
                    total+=parseInt(element.value);
                }
            }
            let average = total/4;
            document.getElementById(`grade${data}`).value = average;
            document.getElementById(`passFailed${data}`).textContent = average >= 75 ? "PASSED":"FAILED";
        }

    </script>
</body>

</html>