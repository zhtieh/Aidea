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

    <meta name="description" content="Aidea Group Solution">
    <meta name="website" content="<?php echo $currentURL; ?>">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Style -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Javascript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <style>
        body{
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: space-between;
        }

        .footer-license
        {
            flex-grow: 1;
            text-align: center;
            /* position: absolute;
            left: 50%;
            bottom: 02%;
            transform: translateX(-50%);
            width: 100%; */
        }

        .header-row
        {
            justify-content: space-between; 
            align-items: center;
            padding: 0 15px;
        }

        .logo-img
        {
            max-width: 150px;
            width: 100%;
            height: auto;
            padding: 15px 0;
        }

        .payment-pg-title
        {
            font-size: 2.5rem;
        }

        .payment-container
        {
            flex-grow: 8;
            /* position: relative;
            top: 25%; */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .order-detail-container
        {
            border: 1px solid #000;
            padding: 0 15px;
            height: 100%;
        }

        .form-check
        {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        @media(max-width: 767.9px)
        {
            .payment-container
            {
                top: 5%;
            }
        }

        @media(max-width: 576px)
        {
            .payment-pg-title
            {
                font-size: 1.85rem;
            }
        }

        @media(max-width: 420px)
        {
            .logo-img
            {
                max-width: 130px;

            }

            .payment-pg-title
            {
                font-size: 1.5rem;
            }
        }

        @media(max-width: 360px)
        {
            .logo-img
            {
                max-width: 110px;

            }

            .payment-pg-title
            {
                font-size: 1.25rem;
            }
        }
    </style>
</head>

<body>
<div class="container">
    <div class="row header-row">
        <img src="{{ asset('images/AIDEA_DESIGN_SOLUTIONS__1__logo.png') }}" class="logo-img"alt="Aidea Group Logo">
        <h1 class="payment-pg-title">Payment Detail</h1>
    </div>
</div>
<div class="container payment-container">
    <form action="https://app.senangpay.my/payment/294171328165594" method="POST" id="payment-form" class="pay-form">
        @crsf
        <div class="row">    
            <div class="col-12 col-md-6">
                <h2>Billing Details</h2>

                <div class="form-group">
                    <label for="form-name">Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" id="form-name" placeholder="Abu" name="name">
                </div>

                <div class="form-group">
                    <label for="form-email">Email <span style="color:red;">*</span></label>
                    <input type="email" class="form-control" id="form-email" placeholder="sample@gmail.com" name="email">
                </div>

                <div class="form-group">
                    <label for="form-contact">Contact <span style="color:red;">*</span></label>
                    <input type="number" class="form-control" id="form-contact" placeholder="0123456789" name="phone">
                </div>
                <button type="submit" class="btn btn-success w-100">Pay</button>
            </div>
            <div class="col-12 col-md-6">
                <div class="order-detail-container">
                    <div class="container">
                        <h2>Your order</h2>
                        <div class="row" style="border-bottom: 1px solid #000; padding: 15px 10px;">
                            <div class="col-6" style="font-weight: bold;">Product</div>
                            <div class="col-6" style="text-align: right; font-weight: bold;">Subtotal</div>
                        </div>

                        <div class="row" style="border-bottom: 1px solid #000; padding: 15px 10px;">
                            <div class="col-5" id="ProductDetails"></div>
                            <div class="col-1" style="padding: 0;">x1</div>
                            <div class="col-6" style="text-align: right;" id="Total">RM0.00</div>
                        </div>

                        <div class="row" style="border-bottom: 1px solid #000; padding: 15px 10px;">
                            <div class="col-6">Subtotal</div>
                            <div class="col-6" style="text-align: right;" id="Subtotal">RM0.00</div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="payment1" value="eWallet" checked>
                                <label class="form-check-label" for="payment1">
                                    Bayar Guna TnG E-wallet / Grab-Pay
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="payment2" value="fpx">
                                <label class="form-check-label" for="payment2">
                                    Bayar Guna FPX Online Banking 
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="payment3" value="debitCredit">
                                <label class="form-check-label" for="payment3">
                                    Bayar Guna Kad Kredit atau Kad Debit
                                    <!-- <br> -->
                                    <img src="{{ asset('images/payment/card.png') }}" width="100px" alt="card" style="margin-left: 15px;">
                                </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="footer-license">
    ©AIDEA DESIGN SOLUTION SDN BHD | CREATED BY VANGUARD BUFFLE
</div>
</body>
<script>
    $(document).ready(function()
    {
        var url = window.location.href;
        var productGUID = (url.split('/')).pop();
        console.log(productGUID);
        console.log($('meta[name="csrf-token"]').attr('content'));

        $.ajax({
          url: window.location.origin + "/GetProductForPayment/" + productGUID,
          method: 'GET',
          processData: false,
          contentType: false,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
            var data = JSON.parse(response);
            console.log(data);
            // if(data.product.length > 0)
            // {
            //     LoadProductDetails(data.product[0]);
            // }
            // else
            // {
            //     // alert("Invalid Product");
            //     // window.location.href = window.location.origin;
            // }
            
          },
          error: function(e)
          {
            // alert("Invalid Product");
            // window.location.href = window.location.origin;
          }
        });
    })

    function LoadProductDetails(product)
    {
        $('#ProductDetails').html(product.Name);
        $('#Total').html("RM" + product.Price);
        $('#Subtotal').html("RM" + product.Price);
    }

    // $('#payment-form').on('submit', function(e)
    // {
    //     e.preventDefault();
    //     // window.location.href = 'https://sandbox.senangpay.my/payment/555171357717256?order_id=' + uuidv4 + '&name=' + $('#form-name').val() + '&email=' +
    //     // $('#form-email').val()+'&phone='+$('#form-contact');

    //     // $.ajax({
    //     //   url: 'https://sandbox.senangpay.my/payment/555171357717256?order_id=' + uuidv4 + '&name=' + $('#form-name').val() + '&email=' +
    //     // $('#form-email').val()+'&phone='+$('#form-contact'),
    //     //   method: 'POST',
    //     //   processData: false,
    //     //   contentType: false,
    //     //   headers: {
    //     //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     //   },
    //     //   success: function(response){
    //     //     console.log(response)        
    //     // });
    // })

     function uuidv4() { 
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'
        .replace(/[xy]/g, function (c) { 
            const r = Math.random() * 16 | 0,  
                v = c == 'x' ? r : (r & 0x3 | 0x8); 
            return v.toString(16); 
        }); 
    }
</script>
</html>
