<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shorcut icon" href="{{asset('assets/img/school-logo.png')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <title>Masoli High School</title>
    <style>
    body {
            background-image:  url('{{ asset('assets/img/ba3.jpg') }}');
            /* Other CSS properties for the background */
            background-size:cover; /* Adjust this as needed */
            background-repeat: no-repeat;
            /* Add other styling for your content as needed */
        }

        @media only screen and (max-width: 767px) {
        .box-login {
         background-color: aliceblue;
         width: 80%;

         border-radius: 5%;
         margin-bottom: 90%;
         margin-top:40%;
         }
         .box-login .logo-image img {
                height: 60px; /* Adjust the logo height for smaller screens */
            }

            .box-login span {
                font-size: 12px; /* Adjust the font size for smaller screens */
            }

            .box-login input{
                width: 50%;
            }
            .box-login button {
                width: 20%; /* Make the input and button full width on smaller screens */
                font-size: small;
            }

            .box-login .eye-toggle {
                margin-left: 0;
                margin-right: 2%; /* Adjust the margin for the eye-toggle on smaller screens */
            }
        }

    
   

    
    </style>
</head>
<body>  

       
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img class="m-2" src="{{asset('assets/img/school-logo.png')}}" alt="logo" style="height:45px;">
            <span class="name-school">Masoli High School</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Nav-Bar Code --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active m-3 link-style" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active m-3 link-style" href="#About">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active m-3 link-style" href="#Contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active m-3 link-style" href="/home/enroll">Enroll</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active m-3 link-style" href="/login">Log in</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container-fluid login-body">


              
        <div class="box-login">
                    
             
                    <form action="{{ url('login') }}" method="post"  autocomplete="off">
                        {{csrf_field() }}
                        <div class="logo-image">
                            <img class="m-2" src="{{asset('assets/img/school-logo.png')}}"alt="logo" style="height:80px;">
                        </div>
                        <span style="font-weight: bold; font-size:15px;">Masoli High School</span>
                        <br>
                        <span style="font-weight: bold; font-size:10px;">Bato, Camarines Sur</span>
                      
                         <div id="pwede">
                            <span class="message">@include('_message')</span>
                        </div>
                        <div class="mb-3 mt-3">
                                <input  type="text"  placeholder="Email" name="email">
                            </div>

                            <div class="mb-3" >
                                <input type="password" class="ms-4" placeholder="Password" name="password" id="password">
                                <span toggle="#password"   class="eye-toggle" onclick="togglePasswordVisibility(this)">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                    </form>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var messageElement = document.querySelector('.message');

            setTimeout(function() {
                messageElement.style.display = 'none';
            }, 3000); // 2 seconds
        });
    </script>

<script>
    function togglePasswordVisibility(icon) {
        var passwordField = $($(icon).attr("toggle"));
        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
            $(icon).html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
        } else {
            passwordField.attr("type", "password");
            $(icon).html('<i class="fa fa-eye" aria-hidden="true"></i>');
        }
    }
</script>

    
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



</html>a