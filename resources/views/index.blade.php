<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AIDEA DESIGN SOLUTION</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

  <!-- Link OwlCarousel's CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Main CSS File -->
  <link href="css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="img/AIDEA_DESIGN_SOLUTIONS__1__logo.png" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="">HOME</a></li>
          <li><a href="#about">ABOUT</a></li>
          <li><a href="#services">SERVICE</a></li>
          <li><a href="#product">PRODUCT</a></li>
          <li><a href="#testimonials">REVIEW</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="swiper mySwiper banner-swiper">
            <div class="swiper-wrapper">
                @if(isset($banners))
                    @foreach($banners as $banner)
                    <div class="swiper-slide">
                        <img src="{{ $banner->BannerURL}}" class="d-none d-md-block" />
                        <img src="{{ $banner->MobileBannerURL}}" class="d-block d-md-none" />
                        <div class="banner-floating-content" data-aos="fade-up">
                            <h1>{{ $banner->Title }}</h1>
                            <span>{{ $banner->Description }}</span>
                            <div class="banner-btn-row">
                                <a href="#product" class="linkProduct-btn linkProduct-btn1" style="text-decoration: none;">
                                        SHOP NOW
                                </a>
                                <a href="#find-us" class="linkProduct-btn linkProduct-btn2" style="text-decoration: none;">
                                        ENQUIRY
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="product" class="section" style="background-color: #cbae8e;">

        <div class="container-custom" data-aos="fade-up">
            <div class="product-carousel owl-carousel owl-theme">
                @if(isset($products))
                    @foreach($products as $index => $product)
                    <div class="item">
                        <div class="product-frame">
                            <div class="product-image">
                                <div class="overlay project-content-box">
                                    <div class="content-container">
                                        <div class="d-flex" style="justify-content:center;">
                                            <div class="more-img-btn" onclick="openModal({{ $index + 1 }});"><i
                                                    class="fa fa-ellipsis-h fa-icon"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ $product->CoverPhotoURL }}" alt="Product {{ $index + 1 }}">
                            </div>
                            <div class="product-content">
                                <div class="product-title">{{ $product->Name }}</div>
                                @if($product->PromotionPrice == 0)
                                    <div class="product-price">RM {{ $product->Price }}</div>
                                @else
                                    <div class="d-flex">
                                        <div class="product-price" style="display: flex;">RM <div class="promotion default-price">{{ $product->Price }}</div></div>
                                        <div class="product-price"><i class="fa fa-arrow-right" aria-hidden="true" style="margin: 0 10px;"></i>{{ $product->PromotionPrice }}</div>
                                    </div>
                                @endif
                                <div class="d-flex">
                                    <button class="product-desc-btn btn btn-read-more" data-bs-toggle="modal" data-bs-target="#product{{ $index + 1 }}">INFORMATION <i class="fa fa-info-circle"></i></button>
                                    <a href="/payment/{{ $product->ProductGUID }}"><button class="purchase-btn btn btn-buy">BUY NOW <i class="fa fa-shopping-cart"></i></button></a>
                                </div>
                            </div>
                        </div> 
                    </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="container-custom hot-sales" data-aos="fade-up" style="margin-top: 2rem;">
            <div class="row">
            @if(isset($hotsale) && isset($hotsale[0]))
                <div class="col-12 col-lg-4 promo-content-center">
                    <div class="promo-content-container">
                        <h1 class="promo-word">HOT</h1>
                        <br>
                        <h1 class="promo-word-2"><span class="space-pro"></span>SALES</h1>
                    </div>
                </div>
                <div class="col-12 col-lg-4" style="padding: 10px;">
                    <div class="item">  
                        <div class="product-frame">
                            <div class="product-image">
                                <div class="overlay project-content-box">
                                    <div class="content-container">
                                        <div class="d-flex" style="justify-content:center;">
                                            <div class="more-img-btn" onclick="openModal( {{ $hotsale[0]->ProductID }} );"><i
                                                    class="fa fa-ellipsis-h fa-icon"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ $hotsale[0]->CoverPhotoURL }}" class="hot-sale-img" alt="{{ $hotsale[0]->Name }}">
                            </div>
                            <div class="product-content">
                                <div class="product-title"><h3>{{ $hotsale[0]->Name }}</h3></div>
                                @if($hotsale[0]->PromotionPrice == 0)
                                    <div class="product-price">RM {{ $hotsale[0]->Price }}</div>
                                @else
                                    <div class="d-flex">
                                        <div class="product-price" style="display: flex;">RM <div class="promotion default-price">{{ $hotsale[0]->Price }}</div></div>
                                        <div class="product-price"><i class="fa fa-arrow-right" aria-hidden="true" style="margin: 0 10px;"></i>{{ $hotsale[0]->PromotionPrice }}</div>
                                    </div>
                                @endif
                                <div class="d-flex">
                                    <button class="product-desc-btn btn btn-read-more" data-bs-toggle="modal" data-bs-target="#hotSales1">INFORMATION <i class="fa fa-info-circle"></i></button>
                                    <button class="purchase-btn btn btn-buy"><a href="/payment/{{ $hotsale[0]->ProductGUID }}">BUY NOW <i class="fa fa-shopping-cart"></i></a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 promo-content-center2">
                    <div class="promo-list-content">
                        <div class="tick">
                            &#x2713;
                        </div>
                        <div class="benf">
                            <p>Harga yang sangat berpatutan</p>
                        </div>
                        <div class="tick">
                            &#x2713;
                        </div>
                        <div class="benf">
                            <p>Rekabentuk yang moden dan terkini</p>
                        </div>
                        <div class="tick">
                            &#x2713;
                        </div>
                        <div class="benf">
                            <p>Kualiti kerja ID yang terbaik</p>
                        </div>
                    </div>
                </div>
            @endif 
            </div> 
        </div>

    </section><!-- /Featured Services Section -->

    @if(isset($products))
        @foreach($products as $index => $product)
        <div id="lightbox-modal{{ $index + 1 }}" class="modalImg">
            <span class="close cursor" onclick="closeModal({{ $index + 1 }})">&times;</span>
            <div class="modal-img-content">
                <div class="modalFrame">
                    <img src="{{ $product->Photo1URL }}" class="lightbox-img" alt="Image 1">
                </div>
                <div class="modalFrame">
                    <img src="{{ $product->Photo2URL }}" class="lightbox-img" alt="Image 2">
                </div>
            </div>
            <a class="prev" onclick="plusSlides(-1, {{ $index + 1 }})">&#10094;</a>
            <a class="next" onclick="plusSlides(1, {{ $index + 1 }})">&#10095;</a>
        </div>

        <div class="modal fade" id="product{{ $index + 1 }}" tabindex="-1" aria-labelledby="product{{ $index + 1 }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="product{{ $index + 1 }}">{{ $product->Name }}</h5>
                    <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>{{ $product->Description }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif

    @if(isset($hotsale) && isset($hotsale[0]))
        <div id="lightbox-modal{{ $hotsale[0]->ProductID }}" class="modalImg">
            <span class="close cursor" onclick="closeModal({{ $hotsale[0]->ProductID }})">&times;</span>
            <div class="modal-img-content">
                <div class="modalFrame">
                    <img src="{{ $hotsale[0]->Photo1URL }}" class="lightbox-img" alt="Image 1">
                </div>
                <div class="modalFrame">
                    <img src="{{ $hotsale[0]->Photo2URL }}" class="lightbox-img" alt="Image 2">
                </div>
            </div>
            <a class="prev" onclick="plusSlides(-1, {{ $hotsale[0]->ProductID }})">&#10094;</a>
            <a class="next" onclick="plusSlides(1, {{ $hotsale[0]->ProductID }})">&#10095;</a>
        </div>

        <div class="modal fade" id="hotSales1" tabindex="-1" aria-labelledby="hotSales1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="hotSales1">{{ $hotsale[0]->Name }}</h5>
                    <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>{{ $hotsale[0]->Description }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- About Section -->
    <section id="about" class="about section" style="background-color: #e2e4d0;">

        <div class="container">

            <div class="row" style="justify-content: center;" data-aos="fade-up">
                <h1 style="text-align: center; color: #775841; font-weight: bold;">About Us</h1>
            </div>
            <div class="row py-5">
                <div class="col-12 col-md-4 about-col-left" data-aos="fade-right">
                    <img src="img/about/about-1.jpg" class="about-img" alt="about1">
                </div>
                <div class="col-12 col-md-8 about-col-right" data-aos="fade-left"  data-aos-delay="300">
                    <h3 class="about-desc">Established in 2009, Aidea Group Sdn Bhd (AGSB) is a CIDB, PKK G4, and MOF registered company specializing in interior design and ID construction/renovation works for residential properties, offices, hotels, resorts, retail, corporate, and government offices. AGSB offers interior design solutions, project management services, and ID renovation/construction to meet client needs. We also provide related services such as built-in furniture, loose furniture, signage, and landscaping.</h3>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-12" data-aos="fade-right" data-aos-delay="300">
                    <h3 class="about-desc about-2">IDr. Mohamad Azam Hadi was appointed as the Managing Director of Aidea Group Sdn. Bhd. on May 25, 2009. He graduated with a Diploma in Interior Design from ITM, Shah Alam, and later obtained a Bachelor of Arts (Hons) in Business from the University of Wales, UK. With almost 20 years of experience in Interior Design and Project Management, he began his career path in 1995 with Intext Design Team Sdn. Bhd. as an ID Coordinator. His notable projects included the State Assembly Hall for the Perak State Government and Wisma Putra, Putrajaya (Ministry of Foreign Affairs). In 1999, he supervised the development of the Malacca State Assembly Hall. Subsequently, he joined Probil Industries (M) Sdn. Bhd. in 2000 as the Head of Project and Business Development. In 2005, he became a part of Triumphant Gallery Sdn Bhd, holding the position of Project Director. His significant projects included the ID works of New Istana Syarqiyah, Kuala Terengganu, and ID Works for KLIA2. He is also a Member of the Malaysian Institute of Interior Designers (MIID) and a Registered Interior Designer from the Lembaga Arkitek Malaysia (LAM).</h3>
                </div>
            </div>

        </div>
    </section><!-- /About Section -->

    <section id="sub-banner" style="padding: 0;">
        <div class="fix-background">
            <div class="container" style="padding: 0 40px;">
                <div class="extra-container">
                    <h1 class="extra-content" data-aos="fade-up">MY DESIGN PHILOSOPHY</h1>
                    <h2 class="extra-subcontent" data-aos="fade-up" data-aos-delay="300">“Interior design is about people’s space. It evolves time to time, moving and dynamic. It is one of the creative art branches created by an interior designer who love and enjoy in designing and to ensure and to fulfil people needs, tastes and satisfaction. People needs, tastes and satisfaction are the core in designing in addition to the knowledge in design and history of art. My design favorite concept is minimalist with elegant and modern contemporary. I do love a few architects and designer such as, Frank Lloyd Wright, Philippe Starck, Le Corbusier, their designs are timeless and still being used worldwide, and the 21st century architect, Zaha Hadid. My overall objectives are every space needs to be warm, inviting, luxurious and comfortable, and reflect the heart and soul of the client.” <br><br> IDr. AzamHadi</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services section" style="background-color: #cbae8e;">

        <div class="container">

            <div class="row mb-5" data-aos="fade-up">
                <div class="text-center">
                    <h1 style="color: #775841; font-weight: bold;">Our Services</h1>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 col-sm-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-info-wrap">
                        <img src="img/service/DESIGN_CONTRACTOR.png" alt="service 1">
                        <p style="color: #775841;"><b>DESIGN AND BUILT CONTRACTOR</b></p>

                        <span style="color: #775841;">We specialize in providing end-to-end services, handling everything from the initial design phase to the meticulous execution of renovation works, ensuring a seamless and hassle-free experience for our clients from start to finish.</span>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-info-wrap">
                        <img src="img/service/INTERIOR_DESIGN_CONSULTATION.png" alt="service 2">
                        <p style="color: #775841;"><b>INTERIOR DESIGN CONSULTATION</b></p>

                        <span style="color: #775841;">We extend our commitment to excellence by providing design consultation services at remarkably affordable rates, ensuring accessibility to premium design expertise without compromising quality or value.</span>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-info-wrap">
                        <img src="img/service/CERTIFIED_CONTRACTOR.png" alt="service 3">
                        <p style="color: #775841;"><b>CERTIFIED CONTRACTOR</b></p>

                        <span style="color: #775841;">We are honored to be officially registered with CIDB, holding the esteemed PKK G4 certification, and certified by MOF, showcasing our dedication to upholding exemplary standards while fostering trust and reliability in every facet of our operations.</span>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3" data-aos="fade-up" data-aos-delay="800">
                    <div class="service-info-wrap">
                        <img src="img/service/PROJECT_MANAGEMENTS.png" alt="service 4">
                        <p style="color: #775841;"><b>PROJECT MANAGEMENTS</b></p>

                        <span style="color: #775841;">We specialize in providing comprehensive project management services for interior design and renovation projects, ensuring seamless coordination, efficient execution, and impeccable results tailored to meet our clients' exacting standards and specifications.</span>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Contact Section -->
    <section id="find-us" style="padding: 0;">
        <div class="find-us-background">
            <video autoplay muted loop>
                <source src="img/contact/contact-video-bg.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="container" style="text-align: center; position: relative; z-index: 3;" data-aos="zoom-out-up">
                <h2 class="find-title">Our Mission</h2>
                <p class="find-content">To ensure client satisfaction and always provide the best ideas, solutions, and quality.</p>
                <a href="https://api.whatsapp.com/send?phone=60196554800" target="_blank">
                    <button class="btn find-button">FIND US NOW</button>
                </a>
            </div>
        </div>
    </section>
     <!-- /Contact Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section" style="background-color: #cbae8e;">
        <div class="container">
            <h1 class="review-title" style="color: #775841;">Client Review</h1>
        </div>

        <div class="container" data-aos="fade-up">
            <div class="review-carousel owl-carousel owl-theme">
                <div class="item">
                    <figure class="snip1359">
                        <figcaption><img src="img/review/amirah-fotor-2024041119424.png" alt="profile-sample6" class="profile" style="padding: unset;"/>
                            <blockquote>My renovation was done smoothly with projected timeline and it was delivered on time. Excellent service and great design. I love every part of the design and the renovation. Keep it the good work, Aidea group </blockquote>
                        </figcaption>
                        <h3>Amirah</h3>
                    </figure>
                </div>

                <div class="item">
                <figure class="snip1359">
                    <figcaption><img src="img/review/avatarM-fotor-20240411194454.png" alt="profile-sample7" class="profile" style="padding: unset;"/>
                        <blockquote>They are very responsive and helpful. Able to give advice and suggestion on the house design, the material selection and cost saving. Hope to work with them again in future.</blockquote>
                    </figcaption>
                    <h3>Mohamad</h3>
                </figure>
                </div>

                <div class="item">
                    <figure class="snip1359">
                        <figcaption><img src="img/review/Lieza-fotor-2024041119458.png" alt="profile-sample9" class="profile" style="padding: unset;"/>
                            <blockquote>First timer house renovation would be a mess if without a plan or big picture. We were lucky to get the great deal from them. We would like to thank their team to make this happen.</blockquote>
                        </figcaption>
                        <h3>Leiza</h3>
                    </figure>
                </div>

                <div class="item">
                    <figure class="snip1359">
                        <figcaption><img src="img/review/Naky-fotor-20240411194337.png" alt="profile-sample6" class="profile" style="padding: unset;"/>
                            <blockquote>I really appreciate Aidea group service; as it really ease and bring peace and less worry to those in need but have no time to waste.</blockquote>
                        </figcaption>
                        <h3>Naky</h3>
                    </figure>
                </div>

                <div class="item">
                    <figure class="snip1359">
                        <figcaption><img src="img/review/Roslan-fotor-2024041119449.png" alt="profile-sample6" class="profile" style="padding: unset;"/>
                            <blockquote>Design Aidea group sangat istimewa, dan juga harganya memang murah.</blockquote>
                        </figcaption>
                        <h3>Roslan</h3>
                    </figure>
                </div>

            </div>
        </div>
    </section><!-- /Testimonials Section -->

    <div class="footer" style="border-top: 1px solid #fff;">
        <div class="row">
            <div class="col-12 col-md-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="footer-logo">
                    <img src="img/AIDEA_DESIGN_SOLUTIONS__1__logo.png" alt="Aidea Logo" class="footer-logo-img">
                </div>
                <p class="footer-content1">
                Established in 2009, Aidea Group Sdn Bhd (AGSB) is a CIDB, PKK G4, and MOF registered company specializing in interior design and ID construction/renovation works for residential properties, offices, hotels, resorts, retail, corporate, and government offices.
                </p>
                <div class="map-container">
                    <a href="https://waze.com/ul/hw2866jpvb" target="_blank" style="margin-right:0.5rem">
                        <img src="img/waze.png" style="height: 50px; width: 50px;">
                    </a>
                    <a href="https://maps.app.goo.gl/UuqHGhq113FcMLAd6" target="_blank" style="margin-right:0.5rem">
                        <img src="img/google-maps.png" style="height: 50px; width: 50px;">
                    </a>
                    <a href="https://www.facebook.com/AideaDesignSolution?mibextid=LQQJ4d&rdid=xvbmXphgyylKb89H" target="_blank" style="margin-right:0.5rem">
                        <img src="img/facebook-icon.png" style="height: 50px; width: 50px;">
                    </a>
                </div>      
            </div>

            <div class="col-12 col-md-4 mb-5" style="margin: auto 0;" data-aos="fade-up" data-aos-delay="200">
                <!-- <div class="footer-title">
                    Get In Touch
                </div>
                <p class="footer-content1">
                    Everyone are encourage come and visit our store.
                </p> -->
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

            <div class="col-12 col-md-4 mb-5" data-aos="fade-up" data-aos-delay="300">
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
        ©AIDEA GROUP SDN BHD | CREATED BY VANGUARD BUFFLE
    </div>
  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <img src="img/spinning.gif" class="loader-spin" alt="Loader">
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

  <!-- Main JS File -->
  <script src="/js/main.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('.product-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        })

        $('.review-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            autoplayTimeout:8000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        })
    });

    function openModal(modalId) {
        var modal = document.getElementById(`lightbox-modal${modalId}`);
        if (modal) {
            modal.style.display = "block";
            slideIndex = 1;
            showSlides(slideIndex, modalId);
        }
    }

    function closeModal(modalId) {
        var modal = document.getElementById(`lightbox-modal${modalId}`);
        if (modal) {
            modal.style.display = "none";
        }
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n, modalId) {
        showSlides((slideIndex += n), modalId);
    }

    function showSlides(n, modalId) {
        var modal = document.getElementById(`lightbox-modal${modalId}`);
        if (modal) {
            var slides = modal.getElementsByClassName("modalFrame");
            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }
    }
  </script>

</body>

</html>