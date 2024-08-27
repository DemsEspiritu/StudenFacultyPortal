<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        {{-- <link rel="stylesheet"  href="css/app.css" type="text/css"> --}}
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <title>Masoli High School</title>

    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
          <div class="container-fluid">
              <a class="navbar-brand" href="#"><img class="m-2" src="{{asset('assets/img/school-logo.png')}}" alt="logo" style="height:70px;">Masoli High School</a>
                  
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"           aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                          {{-- Nav-Bar Code --}}

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="nav-link active m-3 link-style" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active m-3 link-style "  href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active m-3 link-style"  href="/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active m-3 link-style"  href="#">Enroll</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active m-3 link-style"  href="/chooselog">Log in</a>
                      </li>
                    </ul>
          </div>
    </div>
</nav>

<div class="container-fluid body-container">

    <div class="box">
        <div class="logo-image">
          <img class="m-2" src="{{asset('assets/img/school-logo.png')}}"alt="logo" style="height:100px;">
        </div>
        <h1>Student Faculty Portal</h1>
        <p>Masoli High School, Bato, Camarines Sur</p>
            <div class="choose">
                <div class="chsbtn">
                    <a href="/adminlogin" class="button"  target="_self">Admin</a>
                </div>
                <div class="chsbtn">
                    <a href="#" class="button" target="_self">Faculty</a>
                </div>
                <div class="chsbtn">
                    <a href="#" class="button" target="_self">Student</a>
                </div>

            </div>

      </div>
    
</div>




</body>
</html>














