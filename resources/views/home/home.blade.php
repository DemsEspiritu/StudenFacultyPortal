<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- bootstrap css llink -->
   
        <link rel="shorcut icon" href="{{asset('assets/img/school-logo.png')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <title>Masoli High School</title>
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


    

<style>
    .carousel-item {
        height: 32rem;
        background: #777;
        height: 100vh;
        background-position: center;
        position: relative;
        background-size: cover;
        color: white;
    }

    .carousel-item h1 {
        font-size: 50px;
        color: white;
    }

    .carousel-item p {
        font-size: 20px;
    }

    .container {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding-bottom: 50px;
    }

    .about {
        text-align: center;
    }
    .about h5 {
        font-size: 50px;
        padding-bottom: 5%;
        color: white;
    }

    .about h2 {
        font-style: italic;
        font-size: 40px;
        color: white;
    }

    .about p {
        text-align: center;
        padding: 15px;
        font-size: 25px;
        font-style: italic;
        color: white;
    }

    .c-carousel {
        padding-top: 0;
    }

    .c-about {
        padding-top: 100px;
        padding-bottom: 10%;
        margin-top: 0;
        height: 32rem;
        height: 95vh;
        background-position: center;
        position: relative;
        background-size: cover;
    }

    .c-about h5 {
        font-size: 50px;
        padding-bottom: 5%;
        color: white;
    }

    .c-contact {
        background: #404957;
        padding-bottom: 20%;
    }

    .c-contact h1 {
        color: white;
    }

    /* Media query for smaller screens (e.g., phones) */
    @media only screen and (max-width: 767px) {
        .container-fluid.c-about {
            padding-top: 50px;
            padding-bottom: 5%;
        }

        .about h5 {
            font-size: 24px;
            color: white;
        }

        .about h2 {
            font-size: 24px;
            color: white;
        }

        .about p {
            font-size: 14px;
            padding: 10px;
            color: white;
        }
    }
</style>


       


    <div class="c-carousel" id="Home">
<div class="carousel slide" id="MyCarousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="2"></button>
        </div>
    <div class="carousel-inner">

            <div class="carousel-item active" style="background-image :url('{{ asset('assets/img/slide1.jpg')}}'); ">
                <div class="container">
                    <h1>Welcome to Masoli High School</h1>
                    <p>Be Part of our School</p>
                    <a href="/home/enroll" class="btn btn-lg btn-primary">Enroll Now</a>
            </div>
            </div>

            <div class="carousel-item" style="background-image :url('{{ asset('assets/img/slide2.jpg')}}'); ">
                <div class="container">
                <h1>Welcome to Masoli High School</h1>
                    <p>Be Part of our School</p>
                    <a href="/home/enroll" class="btn btn-lg btn-primary">Enroll Now</a>
            </div>
            </div>

            
            <div class="carousel-item" style="background-image :url('{{ asset('assets/img/slide3.jpg')}}'); ">
                <div class="container">
                <h1>Welcome to Masoli High School</h1>
                    <p>Be Part of our School</p>
                    <a href="/home/enroll" class="btn btn-lg btn-primary">Enroll Now</a>
            </div>
            </div>

    </div>
</div>
    </div>

        <div class="container-fluid c-about" style="background-image :url('{{ asset('assets/img/ba2.jpg')}}'); ">
            <div class="about"  id="About">
                <h5 class="text-center forabout">About Us</h5>

                    <h2>--Vision--</h2>
                        <p>We dream of Filipinos who passionately love their country and whose values and competencies enable them to realize their full potential and contribute meaningfully to building the nation. As a learner-centered public institution, the Department of Education continously improves itself to better serve its stakeholders.</p>

                    <h2>--Mission--</h2>
                        <p>To protect and to promote the right of every Filipino to quality, equitable, culture-based and complete basic education where students learn in a child friendly, gender-sensitive, safe and motivating environment.</p>
            
                        <h2>--Goal--</h2>
                        <p>To provide access to quality pre-school, elementary and secondary education to school-aged children; to provide out-of-school youth and adults the oppotunity to become functionally literate.</p>
            
            </div>
        </div>

        <div class="container-fluid c-contact">
                <h1 class="text-center p-5 mb-5 " id="Contact">Contact Us</h1>

                <div class="row row-cols-1 row-cols-md-3 g-3 card-row">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center bg-light">
                    <i class="fa-solid fa-phone"></i>
                      <h5 class="card-title">Phone Number</h5>
                      <p class="card-text">+639456842746</p>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center bg-light">
                    <i class="fa-solid fa-location-dot"></i>
                      <h5 class="card-title">Location</h5>
                      <p class="card-text">Bato Camarines Sur</p>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center bg-light">
                    <i class="fa-solid fa-envelope"></i>
                      <h5 class="card-title">Mail</h5>
                      <p class="card-text">301997@deped.gov.ph</p>
                    </div>
                  </div>
            </div>
        </div>
                </div>
         
        </div>



          

    

    <!-- Script  Link-->
    <script src="{{asset('assets/js/script.js')}}"></script>
    <!-- bootstrap  Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>