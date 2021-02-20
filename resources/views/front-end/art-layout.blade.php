<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B2GRTJYWFY"></script>
    
    <script>
    
      window.dataLayer = window.dataLayer || [];
    
      function gtag(){dataLayer.push(arguments);}
    
      gtag('js', new Date());
    
    
    
      gtag('config', 'G-B2GRTJYWFY');
    
    </script>
    
    <!--Other Ads-->
    <script data-ad-client="ca-pub-7683492974181822" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    
    <script data-ad-client="ca-pub-7683492974181822" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->
    <title>{{ $article->title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Exola" name="keywords">
    <meta content="Exola" name="description">

    <!-- Favicon -->
    <!--<link href="img/favicon.ico" rel="icon">-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.jpeg') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    
</head>

<body>
    <!-- Nav Bar Start -->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">

                <button type="button" class="navbar-toggler" style="background-color: black" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <!-- <a href="#" class="navbar-brand" style="text-align: center">EXOLA</a> -->
                <img src="{{url('')}}/img/logo.jpeg" alt="" style="width:25%;margin-right:30%;" class="d-block d-sm-none">

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="/" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link">About Exola</a>
                        <a href="#" class="nav-item nav-link">Music</a>
                        <a href="#" class="nav-item nav-link">Archives</a>
                    </div>
                    <div class="social ml-auto">
                        <a href="https://twitter.com/chrisexola"><i class="fab fa-twitter"></i></a>
                        <a href="https://web.facebook.com/exola.official"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/exola.tv/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UCgMXEdvKEUizMfXDrK1oc3g"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="#" style="background-color:#1d31ad;height:32px;">
    </div>
    <!-- Footer End -->

    <!-- Footer Menu Start -->
    <div class="footer-menu">
        <div class="container">
            <div class="f-menu">
                <a href="">Home</a>
                <a href="">About Exola</a>
                <a href="">Music</a>
                <a href="">Archives</a>
            </div>
        </div>
    </div>
    <!-- Footer Menu End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 copyright" style="text-align: center;">
                    <p>Copyright &copy; <a href="#">Exola Inc</a>. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    
    
</body>

</html>