@extends('layouts.app')

@section('meta_title')
AIDEA Home
@endsection

@section('meta_website', url("/"))

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

<style>
.swiper {
    width: 100%;
    height: 100vh;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    background-position: center;
    background-size: cover;
    position: relative;
}

.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.swiper-pagination-bullet
{
    cursor: pointer;
}

.swiper-pagination-bullet-active
{
    background-color: transparent;
    border: 1px solid #fff;
    transform: scale(1.5);
    transition: transform .5s;
}

.banner-floating-content
{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 1600px;
    display: grid;
}

.banner-floating-content h1
{
    color: #fff;
    font-family: 'Questrial', sans-serif;
    text-transform: capitalize;
    font-size: 3.438rem;
    line-height: 65px;
    font-weight: 400;
}

.banner-floating-content span
{
    color: #fff;
    font-family: 'Questrial', sans-serif;
    text-transform: capitalize;
    letter-spacing: .3px;
    font-size: 1.25rem;
    line-height: 39px;
    font-weight: 400;
}

.banner-btn-row
{
    display: flex;
    width: 100%;
}

.linkProduct-btn
{
    width: 20%;
    margin: 1rem auto;
    background: linear-gradient(to right, #c69261, #a2a2a2);
    outline: none;
    border: 1px solid #fff;
    padding: 15px 30px;

    color: #fff;
    text-transform: uppercase;
    font-weight: 700;
    cursor: pointer;
}

.linkProduct-btn1
{
    background: linear-gradient(to right, #b93737, #cdce2d);
    margin-right: 20px;
}

.linkProduct-btn:hover
{
    color: #fff;
}

.linkProduct-btn2
{
    margin-left: 20px;
}

.product-carousel.owl-carousel.owl-loaded
{
    position: relative;
}

.product-carousel.owl-carousel .item
{
    width: 100%;
    max-width: 565.3px;
    height: auto;
    /* background-color: #e8e8e8;  */
    background-color: rgba(255, 255, 255, 0.6) !important;
    backdrop-filter: blur(10px);
}

.product-content
{
    padding: 1rem 1.25rem;
    background-color: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(10px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.product-title
{
    font-size: 1.75rem;
    font-weight: 500;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: unset;
}

.owl-nav
{
    font-size: 2rem;
}

.product-carousel.owl-carousel .owl-nav button.owl-prev
{
    position: absolute;
    top: 50%;
    left: -20px;
    transform: translateY(-50%);
    padding: 0px 10px 10px!important;
    background-color: rgba(0, 0, 0, .2);
    color: #fff;
}

.product-carousel.owl-carousel .owl-nav button.owl-next
{
    position: absolute;
    top: 50%;
    right: -20px;
    transform: translateY(-50%);
    padding: 0px 10px 10px!important;
    background-color: rgba(0, 0, 0, .2);
    color: #fff;
}

.product-carousel.owl-carousel .owl-item img
{
    width: 90%;
    height: 500px;
    margin: 0 auto;
    padding: 15px 10px;
    border-top-right-radius: 50%;
    border-bottom-left-radius: 50%;
}

.product-image
{
    position: relative;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 2;
}

.product-image:hover .overlay {
    opacity: 1;
}

.more-img-btn {
    color: #fff;
    background-color: transparent;
    border-radius: 15px;
    /* width: 50%; */
    width: 56px;
    margin-top: 0.5rem;
    cursor: pointer;
}

.more-img-btn:hover {
    color: #df5353;
}

.fa-icon {
    font-size: 42px;
    position: static;
    padding: 5px 10px;
    cursor: pointer;
}

.product-price
{
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.promotion
{
    position: relative;
    width: fit-content;
}

.promotion:after
{
    content:"";
    position: absolute;
    bottom: 50%;
    left: 0;
    right: 0;
    border-bottom: 3px solid #000;
}

.purchase-btn 
{
    margin-left: 15px;
}

.btn-read-more
{
    color: #fff;
    background-color: #c2a182;
}

.btn-buy
{
    background: linear-gradient(to right, #b93737, #cdce2d);
    color: #fff;
    border: 0;
}

.btn-buy a
{
    color: #fff;
}

.btn-read-more:hover, .btn-buy:hover
{
    color: #fff;
    background-color: #89735e;
    text-decoration: none;
}

.btn-buy a:hover
{
    text-decoration: none;
}

.promo-list-content
{
    margin-left: 15px;
    display: grid;
    grid-template-columns: 45px 1fr;
    grid-template-rows: repeat(5, 1fr);
    grid-column-gap: 10px;
    grid-row-gap: 0px;   
}

.tick
{
    color: green;
    font-size: 26px;
    font-weight: bold;
}

.benf
{
    font-size: 26px;
    font-weight: bold;
    color: #fff;
}

.modalImg {
    display: none;
    position: fixed;
    z-index: 999;
    padding-top: 30px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-img-content {
    position: relative;
    background-color: transparent;
    margin: auto;
    top: 50%;
    transform: translateY(-50%);
    padding: 0;
    width: 80%;
    max-width: 1200px;
}

.modal
{
    top: 10%;
}

.modal-content
{
    background-color: rgba(255, 255, 255, 0.6) !important;
    backdrop-filter: blur(10px);
    border: 0;
}

.close {
    color: white;
    position: absolute;
    top: 10px;
    right: 25px;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #999;
    text-decoration: none;
    cursor: pointer;
}

.modalFrame {
    display: none;
    text-align: center;
    background-color: transparent;
}

.prev,
.next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -50px;
    color: white;
    font-weight: bold;
    font-size: 20px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
}

.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

.prev:hover,
.next:hover {
    background-color: rgba(0, 0, 0, 0.8);
    color: red;
    text-decoration: none;
}

.lightbox-img {
    width: 100%;
    max-width: 800px;
    max-height: 800px;
}


.hot-sale-img
{
    /* width: 100%; */
    width: 90%;
    height: 500px;
    margin: 0 auto;
    padding: 15px 10px;
    border-top-right-radius: 50%;
    border-bottom-left-radius: 50%;
    display: block;
}

.hot-sales .product-frame
{
    background-color: rgba(255, 255, 255, 0.6) !important;
    backdrop-filter: blur(10px);
}

.promo-content-center2
{
    display: flex;
    /* justify-content: center; */
    align-items: center;
}

.promo-content-container
{
    position: absolute;
}

.promo-word
{
    font-size: 11.875rem;
    font-weight: bold;
    background: linear-gradient(to right, #ff8a00, #da1b60);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    text-fill-color: transparent;
}

.promo-word-2
{
    font-size: 11.875rem;
    font-weight: bold;
    background: linear-gradient(to left, #ff8a00, #da1b60);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    text-fill-color: transparent;
}

@media(max-width: 1700px)
{
    .promo-word
    {
        font-size: 170px;
    }

    .promo-word-2
    {
        font-size: 170px;
    }
}

@media(max-width: 1500px)
{
    .promo-word
    {
        font-size: 160px;
    }

    .promo-word-2
    {
        font-size: 160px;
    }
}

@media(max-width: 1400px)
{
    .product-carousel.owl-carousel .owl-item img, .hot-sale-img
    {
        height: 450px;
    }

    .promo-word
    {
        font-size: 120px;
    }

    .promo-word-2
    {
        font-size: 120px;
    }
}

@media(max-width: 1200px)
{
    .product-carousel.owl-carousel .owl-item img, .hot-sale-img
    {
        height: 380px;
    }

    .benf
    {
        font-size: 20px;
    }
}

@media(max-width: 1100px)
{
    .promo-word
    {
        font-size: 110px;
    }

    .promo-word-2
    {
        font-size: 110px;
    }
}

@media(max-width: 992px)
{
    .product-carousel.owl-carousel .owl-item img
    {
        height: 450px;
    }

    .hot-sale-img
    {
        height: 400px;
    }

    .promo-content-container
    {
        position: relative;
        display: flex;
        justify-content: center;
    }

    .hot-sales .item
    {
        max-width: 500px;
        margin: 0 auto;
    }

    .promo-word
    {
        font-size: 80px;
    }

    .promo-word-2
    {
        font-size: 80px;
    }

    .promo-list-content
    {
        margin: 2rem auto 0;
    }
    
    .benf
    {
        font-size: 18px;
    }
}

@media(max-width: 767.8px)
{
    .product-carousel.owl-carousel .owl-item img, .hot-sale-img
    {
        height: 380px;
    }

    .btn
    {
        font-size: 1.5rem;
    }

    .hot-sales .product-frame
    {
        max-width: 500px;
        margin: 0 auto;
    }

    .space-pro
    {
        margin-left: 3rem;
    }
}

@media(max-width: 600.8px)
{
    .product-carousel.owl-carousel .item
    {
        max-width: 350px;
        margin: 0 auto;
    }
}

@media(max-width: 575.8px)
{
    .product-carousel.owl-carousel .item
    {
        background-color: transparent;
    }

    .hot-sales .product-frame
    {
        max-width: 385px;
    }

    .promo-word, .promo-word-2
    {
        font-size: 55px;
    }

    .prev,
    .next {
        top: 55%;
    }

}

@media(max-width: 320px)
{
    .promo-word, .promo-word-2
    {
        font-size: 45px;
    }
}
/* About */

.about-col-left
{
    padding-left: 55px;

}

.about-col-right
{
    padding-right: 55px;

}

.about-img
{
    width: 100%;
}

.about-desc
{
    font-size: 1.45rem;
    font-weight: 500;
    line-height: 32.5px;
    color: #775841;
    letter-spacing: normal;   
}

.service-info-wrap img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 1.5rem;
    max-width: 134px;
    width: 100%;
    height: auto;
}

.service-info-wrap p
{
    text-align: center;
}

/* Find us */
.find-us-background
{
    background-image: url(images/contact/aidea-contact-bg.png);
    background-repeat: no-repeat;
    background-size: cover;
    padding: 240px 0;
}

.find-title
{
    text-align: center;
    color: #fff;
}

.find-content
{
    text-align: center;
    color: #fff;
}

.btn.find-button
{
    margin-top: 1.5rem;
    color: #fff;
    border: 1px solid #fff;
    padding: 10px 40px;
}


.review-title
{
    text-align: center;
}

/* Review */

.review-carousel.owl-carousel.owl-loaded
{
    position: relative;
}

.review-carousel.owl-carousel .item
{
    width: 100%;
    height: auto;
    background-color: transparent; 
    position: relative;
}

.review-carousel .owl-nav
{
    /* font-size: 2rem; */
    display: none;
}

/* .review-frame
{
    position: relative;
    background-color: green;
    width: 100%;
    max-height: 560px;
    height: 100%;
} */

.snip1359 {
  font-family: 'Roboto', Arial, sans-serif;
  position: relative;
  overflow: hidden;
  min-width: 230px;
  width: 100%;
  color: #ffffff;
  text-align: left;
  line-height: 1.4em;
  /* background-color: #78b18f; */
  background-color: rgba(255,255,255,.5);
  backdrop-filter: blur(10px);
  padding-top: 120px;
  height: 300px;
}
.snip1359 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.snip1359 img {
  max-width: 100%;
  vertical-align: top;
  opacity: 0.85;
}
.snip1359 figcaption {
  width: 100%;
  background-color: #e2e4d0;
  padding: 25px;
  position: relative;
  height: 100%;
}
.snip1359 figcaption:before {
  position: absolute;
  content: '';
  bottom: 100%;
  left: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 55px 0 0 400px;
  border-color: transparent transparent transparent #e2e4d0;
}
.snip1359 .profile {
  border-radius: 50%;
  position: absolute;
  bottom: 100%;
  left: 25px;
  z-index: 1;
  max-width: 90px;
  opacity: 1;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
}
.snip1359 h3 {
  font-size: 1.3em;
  margin: 25px;
  font-weight: 300;
  position: absolute;
  top: 0;
  right: 0;
  text-align: right;
  color: #775841;
}
.snip1359 h3 span {
  display: block;
  font-size: 0.65em;
  color: #d1a8a6;
}
.snip1359 blockquote {
  margin: 0 0 10px;
  padding: 0 0 30px;
  letter-spacing: 1px;
  opacity: 0.8;
  font-style: italic;
  font-weight: 300;
  color: #775841;
}
.snip1359 blockquote:after {
  font-family: 'FontAwesome';
  content: "\f10e";
  position: absolute;
  font-size: 50px;
  line-height: 1em;
  color: #7e6c6c;
  font-style: normal;
  right: 20px;
  bottom: -0;
  z-index: 999;
}

.review-carousel.owl-carousel .owl-dots
{
    display: flex;
    justify-content: center;
    align-items: center;
}

.review-carousel.owl-carousel .owl-dot
{
    background-color: #ababab;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    margin: 1rem 10px !important;
}

.review-carousel.owl-carousel .owl-dot.active
{
    background-color: transparent;
    border: 1px solid #969696;
    transform: scale(1.2);
    transition: transform .5s;
}

@media(max-width: 1200px)
{
    .about-col-left
    {
        padding: 0 15px;
    }

    .about-col-right
    {
        padding: 0 15px;
    }
}

@media(max-width: 992px)
{
    .banner-floating-content
    {
        width: 800px;
    }

    .linkProduct-btn
    {
        width: 30%;
    }
}

@media(max-width: 767.9px)
{
    .about-col-left
    {
        padding: 0;
        text-align: center;
    }

    .about-col-right
    {
        padding: 0;
        text-align: center;
    }

    .about-img
    {
        max-width: 320px;
    }

    .about-desc
    {
        margin-top: 3rem;
        padding: 0 20px;
    }

    .service-info-wrap
    {
        margin: 2rem 0;
    }

    .service-info-wrap p
    {
        margin-top: 15px;
    }
}

@media(max-width: 576px)
{
    .banner-floating-content {
        width: 350px;
    }

    .banner-btn-row
    {
        flex-direction: column;
    }

    .banner-floating-content h1
    {
        font-size: 3.2rem;
    }

    .banner-floating-content span
    {
        font-size: 14px;
    }

    .linkProduct-btn {
        width: 60%;
    }

    .linkProduct-btn1
    {
        margin: 10px auto;
    }

    .linkProduct-btn2
    {
        margin: 10px auto;
    }
}

@media(max-width: 420px)
{
    .about-img
    {
        max-width: 280px;
    }
}
</style>
@endsection

@section('content')

<section id="banner">
    <div class="swiper mySwiper banner-swiper">
        <div class="swiper-wrapper">
            @if(isset($banners))
                @foreach($banners as $banner)
                <div class="swiper-slide">
                    <img src="{{ $banner->BannerURL}}" class="d-none d-md-block" />
                    <img src="{{ $banner->MobileBannerURL}}" class="d-block d-md-none" />
                    <div class="banner-floating-content">
                        <h1>{{ $banner->Title }}</h1>
                        <span>{{ $banner->Description }}</span>
                        <div class="banner-btn-row">
                            <a href="#product" class="linkProduct-btn linkProduct-btn1" style="text-decoration: none;">
                                    Shop Now
                            </a>
                            <a href="#product" class="linkProduct-btn linkProduct-btn2" style="text-decoration: none;">
                                    Enquiry More
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<section id="product">
    <div class="container-custom">
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
                                    <div class="product-price" style="display: flex;">RM <div class="promotion">{{ $product->Price }}</div></div>
                                    <div class="product-price"><i class="fa fa-arrow-right" aria-hidden="true" style="margin: 0 10px;"></i>{{ $product->PromotionPrice }}</div>
                                </div>
                            @endif
                            <div class="d-flex">
                                <button class="product-desc-btn btn btn-read-more" data-toggle="modal" data-target="#product{{ $index + 1 }}">Read More <i class="fa fa-info-circle"></i></button>
                                <button class="purchase-btn btn btn-buy"><a href="/payment/{{ $product->ProductGUID }}">Click to buy <i class="fa fa-shopping-cart"></i></a></button>
                            </div>
                        </div>
                    </div> 
                </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="container-custom hot-sales">
        <div class="row">
        @if(isset($hotsale) && isset($hotsale[0]))
            <div class="col-md-12 col-lg-4 promo-content-center">
                <div class="promo-content-container">
                    <h1 class="promo-word">HOT</h1>
                    <br>
                    <h1 class="promo-word-2"><span class="space-pro"></span>SALES</h1>
                </div>
            </div>
            <div class="col-md-12 col-lg-4" style="padding: 10px;">
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
                                    <div class="product-price" style="display: flex;">RM <div class="promotion">{{ $hotsale[0]->Price }}</div></div>
                                    <div class="product-price"><i class="fa fa-arrow-right" aria-hidden="true" style="margin: 0 10px;"></i>{{ $hotsale[0]->PromotionPrice }}</div>
                                </div>
                            @endif
                            <div class="d-flex">
                                <button class="product-desc-btn btn btn-read-more" data-toggle="modal" data-target="#hotSales1">Read More <i class="fa fa-info-circle"></i></button>
                                <button class="purchase-btn btn btn-buy"><a href="/payment/{{ $hotsale[0]->ProductGUID }}">Click to buy <i class="fa fa-shopping-cart"></i></a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 promo-content-center2">
                <div class="promo-list-content">
                    <div class="tick">
                        &#x2713;
                    </div>
                    <div class="benf">
                        <p>Good</p>
                    </div>
                    <div class="tick">
                        &#x2713;
                    </div>
                    <div class="benf">
                        <p>Excellent</p>
                    </div>
                    <div class="tick">
                        &#x2713;
                    </div>
                    <div class="benf">
                        <p>This product is of the highest quality.</p>
                    </div>
                    <div class="tick">
                        &#x2713;
                    </div>
                    <div class="benf">
                        <p>The craftsmanship on this product is top-notch.</p>
                    </div>
                    <div class="tick">
                        &#x2713;
                    </div>
                    <div class="benf">
                        <p>The quality of materials used is superior.</p>
                    </div>
                </div>
            </div>
        @endif 
        </div> 
    </div>
</section>

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
            <div class="modalFrame">
                <img src="{{ $product->Photo3URL }}" class="lightbox-img" alt="Image 3">
            </div>
            <div class="modalFrame">
                <img src="{{ $product->Photo4URL }}" class="lightbox-img" alt="Image 4">
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <p>{{ $product->Description }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        <div class="modalFrame">
            <img src="{{ $hotsale[0]->Photo3URL }}" class="lightbox-img" alt="Image 3">
        </div>
        <div class="modalFrame">
            <img src="{{ $hotsale[0]->Photo4URL }}" class="lightbox-img" alt="Image 4">
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

<section id="about">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <h1 style="text-align: center; color: #775841;">About Us</h1>
        </div>
        <div class="row py-5">
            <div class="col-12 col-md-4 about-col-left">
                <img src="images/about/about-1.jpg" class="about-img" alt="about1">
            </div>
            <div class="col-12 col-md-8 about-col-right">
                <h3 class="about-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-12 col-md-8 about-col-left order-2 order-md-1">
                <h3 class="about-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
            </div>
            <div class="col-12 col-md-4 about-col-right order-1 order-md-2">
                <img src="images/about/about-2.jpg" class="about-img" alt="about1">
            </div>
        </div>
    </div>
</section>

<section id="service">
    <div class="container">
        <div class="row mb-5">
            <div class="offset-md-2"></div>
            <div class="col-md-8">
                <div class="text-center">
                    <h1>Forward Thinking Design</h1>
                    <p>We are a design & build firm that specializes in workspace design & fit-out. We believe that a great office design can inspire businesses and promote a great work culture among employees. Our A-to-Z approach and services includes interior design, space planning as well as project management.</p>
                </div>
            </div>
            <div class="offset-md-2"></div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="service-info-wrap">
                    <img src="images/service/Kerja-kerja-Renovasi.png" alt="service 1">
                    <p style="color: #775841;"><b>Interior Design & Space Planning</b></p>

                    <span style="color: #775841;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-info-wrap">
                    <img src="images/service/Konsultan-hiasan-dalaman.png" alt="service 2">
                    <p style="color: #775841;"><b>Interior Design & Space Planning</b></p>

                    <span style="color: #775841;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-info-wrap">
                    <img src="images/service/Pembinaan -hiasan-dalaman.png" alt="service 3">
                    <p style="color: #775841;"><b>Interior Design & Space Planning</b></p>

                    <span style="color: #775841;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-info-wrap">
                    <img src="images/service/Pengurusan-Projek.png" alt="service 4">
                    <p style="color: #775841;"><b>Interior Design & Space Planning</b></p>

                    <span style="color: #775841;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="find-us">
    <div class="find-us-background">
        <div class="container" style="text-align: center;">
            <h2 class="find-title">The Most Comprehensive 360% Protection</h2>
            <p class="find-content">New Car: Protect the original car paint from beginning, maintaining its value with worry-free. Used Car: Restore the pesky scratches and faded paint, give your car a fresh new look!</p>
            <a href="https://api.whatsapp.com/send?phone=601128289731" target="_blank">
                <button class="btn find-button">FIND US NOW</button>
            </a>
        </div>
    </div>
</section>

<section id="review">
    <div class="container">
        <h1 class="review-title">Client Review</h1>
    </div>

    <div class="container">
        <div class="review-carousel owl-carousel owl-theme">
            <div class="item">
                <figure class="snip1359">
                    <figcaption><img src="images/review/amirah-fotor-2024041119424.png" alt="profile-sample6" class="profile" style="padding: unset;"/>
                        <blockquote>I'm looking for something that can deliver a 50-pound payload of snow on a small feminine target. Can you suggest something? Hello...? </blockquote>
                    </figcaption>
                    <h3>Hans Down<span>Engineer</span></h3>
                </figure>
            </div>

            <div class="item">
            <figure class="snip1359">
                <figcaption><img src="images/review/avatarM-fotor-20240411194454.png" alt="profile-sample7" class="profile" style="padding: unset;"/>
                    <blockquote>Calvin: I'm a genius, but I'm a misunderstood genius. Hobbes: What's misunderstood about you? Calvin: Nobody thinks I'm a genius.</blockquote>
                </figcaption>
                <h3>Wisteria Widget<span>Photographer</span></h3>
            </figure>
            </div>

            <div class="item">
                <figure class="snip1359">
                    <figcaption><img src="images/review/Lieza-fotor-2024041119458.png" alt="profile-sample9" class="profile" style="padding: unset;"/>
                        <blockquote>Sorry to say but if you want to stay dad you've got to polish your image. I think the image we need to create for you is "repentant but learning".</blockquote>
                    </figcaption>
                    <h3>Desmond Eagle<span>Accountant</span></h3>
                </figure>
            </div>

            <div class="item">
                <figure class="snip1359">
                    <figcaption><img src="images/review/Naky-fotor-20240411194337.png" alt="profile-sample6" class="profile" style="padding: unset;"/>
                        <blockquote>I'm looking for something that can deliver a 50-pound payload of snow on a small feminine target. Can you suggest something? Hello...? </blockquote>
                    </figcaption>
                    <h3>Hans Down<span>Engineer</span></h3>
                </figure>
            </div>

            <div class="item">
                <figure class="snip1359">
                    <figcaption><img src="images/review/Roslan-fotor-2024041119449.png" alt="profile-sample6" class="profile" style="padding: unset;"/>
                        <blockquote>I'm looking for something that can deliver a 50-pound payload of snow on a small feminine target. Can you suggest something? Hello...? </blockquote>
                    </figcaption>
                    <h3>Hans Down<span>Engineer</span></h3>
                </figure>
            </div>

        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
<script type="text/javascript">

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

var swiper = new Swiper(".banner-swiper", {
    spaceBetween: 30,
    effect: "fade",

    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

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
@endsection