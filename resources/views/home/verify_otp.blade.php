<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500&display=swap" rel="stylesheet">
    <link rel="shorcut icon" href="{{asset('assets/img/school-logo.png')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/notify.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
    body {
            background-image:  url('{{ asset('assets/img/slide1.jpg') }}');
            /* Other CSS properties for the background */
            background-size: cover; /* Adjust this as needed */
            background-repeat: no-repeat;
            /* Add other styling for your content as needed */
            font-family: 'Roboto', sans-serif;
        }



.card {
    margin-top: 20%; /* Adjust the margin according to your design */
}

.error-message {
    color: red;
    font-size: 10px;
    /* Add more styles as needed */
}

    </style>
    <title>Masoli High School</title>
</head>
<body>  
<x-notify::notify />
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

     

<div class="container-fluid enroll-body">
    <div class="card">
        <h5 class="card-header"></h5>
        <div class="card-body">
            <form method="POST" action="{{ route('verify_otp') }}">
                @csrf

                <div class="form-group row">
                    <label for="otp" class="col-md-4 col-form-label text-md-right">{{ __('Enter OTP') }}</label>

                    <div class="col-md-6">
                        <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" required autofocus>
                    
                        @error('otp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row m-3">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Verify OTP') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>     
          


  @notifyJs
</body>
</html>