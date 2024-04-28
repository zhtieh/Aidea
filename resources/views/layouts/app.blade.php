<?php
$currentURL = url()->current();
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AIDEA GROUP SOLUTION</title>
    <link rel="icon" href="{{ asset('/images/uz-favicon.png') }}" />

    <meta name="description" content="Vanguard Buffle">
    <meta name="website" content="<?php echo $currentURL; ?>">

    <!-- meta global -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $currentURL; ?>">
    <meta property="og:title" content="Vanguard Buffle">
    <meta property="og:description" content="Since 2016, AIDEA DESIGN SOLUTION (M) Sdn Bhd Seri Kembangan has achieved high achievements in the construction industry with its experienced and professional construction team. They specialize in steel structure fabrication and erection for industrial and commercial buildings to meet customer requirements.">
    <meta property="og:image" content="{{ asset('/images/uz-construction-metacover.jpg') }}">
    <meta property="og:image:url" content="{{ asset('/images/uz-construction-metacover.jpg') }}">

    <!-- meta twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="<?php echo $currentURL; ?>">
    <meta name="twitter:title" content="Vanguard Buffle">
    <meta name="twitter:description" content="Since 2016, AIDEA DESIGN SOLUTION (M) Sdn Bhd Seri Kembangan has achieved high achievements in the construction industry with its experienced and professional construction team. They specialize in steel structure fabrication and erection for industrial and commercial buildings to meet customer requirements.">
    <meta name="twitter:image" content="{{ asset('/images/uz-construction-metacover.jpg') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Style -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Javascript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- CSS -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('head')
</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container nav-container">
            <a class="navbar-brand" href="#">
                <img src="images/AIDEA_DESIGN_SOLUTIONS__1__logo.png" class="nav-logo" alt="Aidea Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#review">Review</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('content')

<!-- Footer -->
<div class="footer" style="border-top: 1px solid #fff;">
    <div class="row">
        <div class="col-12 col-md-4 mb-5">
            <div class="footer-logo">
                <img src="images/AIDEA_DESIGN_SOLUTIONS__1__logo.png" alt="Aidea Logo" class="footer-logo-img">
            </div>
            <p class="footer-content1">
                We started on years 2018 and with more than 10 years of experience in the industry, we've built a reputation for excellence in vehicle window tinting, train window tinting, building window tinting, ceramic coating, PPF and etc.
            </p>
            <div class="map-container">
                <a href="https://waze.com/ul/hw2866jpvb" target="_blank" style="margin-right:0.5rem">
                    <img src="images/waze.png" style="height: 50px; width: 50px;">
                </a>
                <a href="https://maps.app.goo.gl/UuqHGhq113FcMLAd6" target="_blank" style="margin-right:0.5rem">
                    <img src="images/google-maps.png" style="height: 50px; width: 50px;">
                </a>
                <a href="https://www.facebook.com/AideaDesignSolution?mibextid=LQQJ4d&rdid=xvbmXphgyylKb89H" target="_blank" style="margin-right:0.5rem">
                    <img src="images/facebook-icon.png" style="height: 50px; width: 50px;">
                </a>
            </div>      
        </div>

        <div class="col-12 col-md-4 mb-5">
            <div class="footer-title">
                Get In Touch
            </div>
            <p class="footer-content1">
                Everyone are encourage come and visit our store.
            </p>
            <div class="shop-contact">
                <i class="fa fa-map-marker footer-icon"></i>
                <p style="margin-left: 1%; font-family: 'Inter';">121-2, Jalan Prima SG 5,<br>Prima Seri Gombak,<br>68100 Batu Caves, Selangor</p>
            </div>
            <div class="shop-contact">
                <i class="fa fa-clock-o footer-icon"></i>
                <p style="font-family: 'Inter';">Monday - Friday 9am-6pm / Saturday & Sunday Close</p>
            </div>
            <div class="shop-contact">
                <i class="fa fa-phone footer-icon"></i>
                <p style="font-family: 'Inter';">019-6554800 / 03-6177 6888(office)</p>
            </div>
            <div class="shop-contact">
                <i class="fa fa-envelope footer-icon"></i>
                <p style="font-family: 'Inter';">aideagroup717@gmail.com</p>
            </div>
        </div>

        <div class="col-12 col-md-4 mb-5">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=Aidea%20Group%20Sdn%20Bhd+(Aidea%20Group%20Sdn%20Bhd)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        <a href="https://connectionsgame.org/">Connections Puzzle</a>
                    </div>
                    <style>
                    .mapouter
                    {
                        position:relative;
                        text-align:right;
                        width:100%;
                        max-width: 600px;
                        height:100%;
                        max-height: 400px
                    }

                    .gmap_canvas 
                    {
                        overflow:hidden;
                        background:none!important;
                        width:100%;
                        height:100%;
                    }
                    
                    .gmap_iframe 
                    {
                        width:100%;
                        height:100%;
                        }
                    </style>
                </div>
        </div>
    </div>
</div>

<div class="footer-license">
    ©AIDEA DESIGN SOLUTION SDN BHD | CREATED BY VANGUARD BUFFLE
</div>

@yield('script')
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
