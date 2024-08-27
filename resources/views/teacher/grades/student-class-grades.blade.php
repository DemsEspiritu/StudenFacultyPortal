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
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

#myTable th {
    background-color: #52527a;
    color: #FFFFFF;
    text-align: center;
}

#search {
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #000000;
    box-shadow: 1px 2px #888888;
    width: 50%;
    
}
.payo{
    background-color: #3498db; /* Background color */
    color: #fff; /* Text color */
    padding: 10px; /* Padding for better spacing */

    width: 40px; /* Border radius for rounded corners */
    /* Add more styles as needed */
}

.ulo{
    width: 35%; 
}
.pangalan{
    font-weight: bold;
    
}
.red-text {
        color: red;
    }

.h-100{
    position: fixed;
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
                        <h4>Student Grades</h4>
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

    <form action="{{ route('save.grades', [
        'class_id' => $class_id, 
        'subject_id' => $subject_id, 
        'school_year_id' => $school_year_id, 
        'subject_name' => $subject_name,
        ]) }}"
         method="post">
    {{ csrf_field() }}

    <div class="card card-attendance">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Student List</h6>
        </div>

        <div class="card-body">
            <input type="text" id="search" placeholder="Search"><i class="fa-solid fa-magnifying-glass p-2"></i>

            <table id="myTable">
                <thead>
                    <tr>
                        <th class="text-center">S/N</th>
                        <th class="text-center ulo">Name</th>
                        <th class="text-center payo">1st Grading</th>
                        <th class="text-center payo">2nd Grading</th>
                        <th class="text-center payo">3rd Grading</th>
                        <th class="text-center payo">4th Grading</th>
                        <th class="text-center">Final</th>
                        <th class="text-center">Passed Or Fail</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($students as $key=> $student)
                    <tr>
                        <td class="text-center" style="width: 5%">{{ $loop->iteration }}</td>
                        <td class="pangalan">{{ $student->last_name }} {{ $student->name }} {{ $student->middle_name }}.</td>
                        <input type="hidden" name="grades[{{$key}}][student_id]" value="{{$student->id }}">

                        
                        
                        @foreach($gradingFilter as $filter)
                            <td class="text-center">
                                @if($filter->status == 1)
                                <input type="text" class="form-control text-center 
                                        {{ isset($grades[$student->id][0][$filter->short_name.'_grading']) && $grades[$student->id][0][$filter->short_name.'_grading'] < 75 ? 'text-danger' : '' }}" 
                                        oninput="limitToTwoDigitsAndLessThan100(this)" 
                                        name="grades[{{$key}}][{{$filter->short_name}}_grading]" 
                                        value="{{ isset($grades[$student->id][0][$filter->short_name.'_grading']) ? $grades[$student->id][0][$filter->short_name.'_grading'] : '' }}" 
                                    >
                                @else
                                <span class="text-center {{ isset($grades[$student->id][0][$filter->short_name.'_grading']) && $grades[$student->id][0][$filter->short_name.'_grading'] < 75 ? 'text-danger' : '' }}">
                                    {{ isset($grades[$student->id][0][$filter->short_name.'_grading']) ? $grades[$student->id][0][$filter->short_name.'_grading'] : '' }}
                                </span>
                                @endif
                            </td>
                        @endforeach
                        <td class="text-center">{{ isset($grades[$student->id][0]['final_grades']) ? $grades[$student->id][0]['final_grades']  : '' }}%</td>
                        <td class="text-center {{
    isset($grades[$student->id][0]['final_grades']) && $grades[$student->id][0]['final_grades'] < 75
    ? 'text-danger'
    : (
        isset($grades[$student->id][0]['final_grades']) && $grades[$student->id][0]['final_grades'] > 76
        ? 'text-success'
        : ''
    )
}}">
                            {{ isset($grades[$student->id][0]['passed_failed']) ? $grades[$student->id][0]['passed_failed'] : '' }}
                        </td>
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <div class="m-1">
                <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk m-2"></i>Save Record</button>
            </div>
        </div>
    </div>
</form>

       


            
        </div>
    </div>

            <!-- ========= light and dark mode toggle button ======= -->

            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

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
    @notifyJs
    <script src="{{asset('assets/js/try.js')}}"></script>
   
    <script src="{{asset('assets/js/script.js')}}"></script>

  
    <script>

        function computeForGrades(data){
            let arr = document.getElementsByClassName(`student${data}`);
            let total = 0;
            for (let index = 0; index < arr.length; index++) {
                const element = arr[index];

                
                if(element.value!=null&&element.value!=undefined&&element.value!=""){
                    
                    total+=parseInt(element.value);
                }
            }
            let average = total/4;
            document.getElementById(`student${data}`).value = average;
            document.getElementById(`passFailed${data}`).textContent = average >= 75 ? "PASSED":"FAILED";
        }

    </script>

<script>
    // Function to restrict input to two digits and values less than 100
    function limitToTwoDigitsAndLessThan100(input) {
        input.value = input.value.replace(/\D/g, ''); // Remove non-numeric characters

        // Keep only the first two digits
        if (input.value.length > 2) {
            input.value = input.value.slice(0, 2);
        }

        // Ensure the value is less than 100
        if (parseInt(input.value, 10) > 99) {
            input.value = '99';
        }
    }
</script>
</body>

</html>