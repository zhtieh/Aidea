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
            text-align: center;
            position: relative;
            bottom: 0;
            background-color: #cbae8e;
            color: #fff;
            padding: 1rem;
        }

        .header-row
        {
            /* justify-content: space-between;  */
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
            margin-bottom: 1.5rem;
        }

        .order-detail-container
        {
            /* border: 1px solid #000; */
            padding: 15px;
            height: 100%;
            background-color: #f9f9f9;
        }

        .form-check
        {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .tncLabel
        {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .tncContent
        {
            display: flex;
        }

        .btn-tnc
        {
            cursor: pointer;
            color: #0000ff;
            text-decoration: underline;
        }

        .btn-tnc:hover
        {
            color: #0975b4;
        }

        .btn-tnc:active, .btn-tnc:focus
        {
            border: 0;
        }

        .product-img-box
        {
            text-align: right;
            margin-bottom: 1rem;
        }

        .product-img
        {
            max-width: 330px;
            border: 1px solid #000;
            padding: 15px;

        }

        @media(min-width: 576px)
        {
            .modal-dialog
            {
                max-width: 500px !important;
            }  
        }

        @media(min-width: 768px)
        {
            .modal-dialog
            {
                max-width: 750px !important;
            }  
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
    <div class="header-row d-flex">
        <img src="{{ asset('img/AIDEA_DESIGN_SOLUTIONS__1__logo.png') }}" class="logo-img"alt="Aidea Group Logo">
        <h1 class="payment-pg-title" style="padding-left: 0; margin: 0 auto;">Order Summary</h1>
    </div>
</div>
<div class="container payment-container">
    <div class="row">
        <div class="product-img-box">
            <img src="" class="product-img" id="product-pix" alt="Product img">
        </div>
    </div>
    <form action="" method="POST" id="payment-form" class="pay-form">
        <div class="row">    
            <div class="col-12 col-md-6">
                <input type="hidden" id="ProductGUID" name="ProductGUID" value="">
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
                <button type="submit" class="btn btn-success w-100" style="margin-top: 2rem;" disabled>Pay</button>
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

                        <!-- <div class="form-check">
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
                                    <img src="{{ asset('images/payment/card.png') }}" width="100px" alt="card" style="margin-left: 15px;">
                                </label>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="container">
        <div class="row">
            <div class="mt-5">
                <label class="tncLabel">
                    <input type="checkbox" id="agreeTnC" style="margin-right: 15px;"> I have read and agree&nbsp;
                    <div class="btn-tnc" data-bs-toggle="modal" data-bs-target="#tncModal">Terms & Condition</div>
                </label>
            </div>
        </div>
        <div class="row text-center">
            <small style="color: red;">Please tick here to proceed payment</small>
        </div>
    </div>

    <div class="modal fade" id="tncModal" tabindex="-1" aria-labelledby="tncModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Terms & Condition
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <b>Terms & Conditions</b><br>
                                Welcome to AIDEA GROUP SDN BHD for online store. Terms and conditions stated below applies to all visitors and users of https://aidea-group.com/. You are bound by these terms and conditions as long as you're on https://aidea-group.com/
                                <br><br>
                                <b>General</b><br>
                                The content of terms and conditions may be change, move or delete at any time. Please note that https://aidea-group.com/ have the rights to change the contents of the terms and conditions without any notice. Any violation of rules and regulations of these terms and conditions, https://aidea-group.com/ will take immediate actions against the offender(s).
                                <br><br>
                                <b>Site Contents & Copyrights</b><br>
                                Unless otherwise noted, all materials, including images, illustrations, designs, icons, photographs, video clips, and written and other materials that appear as part of this Site, in other words “Contents of the Site” are copyrights, trademarks, trade dress and/or other intellectual properties owned, controlled or licensed by AIDEA GROUP SDN BHD.
                                <br><br>
                                <b>Comments and Feedbacks</b><br>
                                All comments and feedbacks to AIDEA GROUP SDN BHD will be remain aideadesignsolution@gmail.com. 
                                <br><br>
                                User shall agree that there will be no comment(s) submitted to the https://aidea-group.com/ will violate any rights of any third party, including copyrights, trademarks, privacy of other personal or proprietary right(s). Furthermore, the user shall agree there will not be content of unlawful, abusive, or obscene material(s) submitted to the site. User will be the only one responsible for any comment's content made.
                                <br><br>
                                <b>Product Information</b><br>
                                We cannot guarantee all actual products will be exactly the same shown on the monitor as that is depending on the user monitor.<br>
                                All measurement stated in the drawings are estimated only. Customer need to consult with their own contractor to get exact size and measurement at exact location. Aidea group sdn bhd not responsible to any discrepancies between drawings and actual site size and condition.
                                <br><br>
                                <b>Newsletter</b><br>
                                User shall agree that https://aidea-group.com/ may send newsletter regarding the latest news/products/promotions etc through email to the user.
                                <br><br>
                                <b>Indemnification</b><br>
                                The user shall agree to defend, indemnify and hold https://aidea-group.com/ harmless from and against any and all claims, damages, costs and expenses, including attorneys' fees, arising from or related to your use of the Site.
                                <br><br>
                                <b>Link to other sites</b><br>
                                Any access link to third party sites is at your own https://aidea-group.com/ will not be related or involve to any such website if the user's content/product(s) got damaged or loss have any connection with third party site.
                                <br><br>
                                <b>Inaccuracy Information</b><br>
                                From time to time, there may be information on https://aidea-group.com/ that contains typographical error, inaccuracies, omissions, that may relate to product description, pricing, availability and article contents. We reserve the rights to correct any errors, inaccuracies, change or edit information without prior notice to the customers. If you are not satisfy with your purchased product(s), please return it back to us with the invoice.
                                <br><br>
                                <b>Termination</b><br>
                                This agreement is effective unless and until either by the customer or https://aidea-group.com/. Customer may terminate this agreement at any time. However, https://aidea-group.com/ may also terminate the agreement with the customer without any prior notice and will be denying the access of the customer who is unable to comply the terms and conditions above.
                                <br><br>
                                <b>Shipping and Delivery Policy</b><br>
                                Items in stock: 2-5 working days for Standard Delivery items. Items that are out of stock: Please email or call us for assistance.
                                <br><br>
                                <b>Payments</b><br>
                                All Goods purchased are subject to a one-time payment. Payment can be made through various payment methods we have available, such as Visa, MasterCard or online payment methods. <br>
                                All item purchased and paid are not refundable. 
                                <br><br>
                                Payments cards (credit cards or debit cards) are subject to validation checks and authorization by Your card issuer. If we do not receive the required authorization, we will not be liable for any delay or non-delivery of Your Order.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                SHIPPING, CANCELLATION, AND REFUND POLICY
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <b>Cancellation Prior to Shipment</b><br>
                                If you cancel your order(s) before it ships from our warehouse, you will not be charged any additional fees. We require a cancellation request to be submitted by emailing us at aideadesignsolution@gmail.com<br>

                                Once the cancellation request is received, a full refund will be initiated. We would advise a cancellation request within 12 hours upon your order submission in order for a cancellation prior to goods shipment
                                <br><br>

                                <b>Return Policy</b><br>
                                The following are the policies to be eligible for return requests after shipment/ receipt of goods:<br><br>

                                All goods sold are non-refundable except (i) Failed Delivery (ii) Wrong Delivery and (iii) Damaged good during delivery.<br>
                                Only items that have been purchased directly from aideadesignsolution@gmail.com Online Store can be eligible for a return.<br>
                                Any aideadesignsolution@gmail.com Online Store product purchased through other retailers is not eligible for this policy and must be in accordance to the respective retailers’ returns and refunds policy.<br>
                                Goods are eligible for a return if the following are applied:<br><br>
                                <b>Incorrect:</b><br>
                                The item is not the item you ordered. Wrong size or the colour is different from what is indicated on the order summary, or there are missing items inside the packaging.<br>
                                <b>Damaged:</b><br>
                                The items is found to be damaged upon receipt. Items has been tampered/refurbished or modified. Customers will be responsible for all shipping charges to return goods. Returns are applicable only for a complete aideadesignsolution@gmail.com Online Store product.<br>
                                Returned items must meet the following requirements:<br>
                                The item must be shipped back to us within 7 working days upon receipt. (as proved by the postal or courier receipt).<br>
                                You have proof of purchase (order invoice number and receipt).<br>
                                Item must be in new condition and returned in its original packaging and free gifts received with it. All packaging must be unused, unmarked and not defaced in any manner.<br>
                                Item must be returned in the original box (or with, at least, suitable packaging) to protect the Product from damage during return delivery.<br>
                                Change of order and cancellation of order will not be permitted once payment has been confirmed. Any cancellations due to a change of mind will not be accepted.<br>
                                We reserve the right to reject any cancellation, refund that deemed unfit or unreasonable.<br>
                                <br><br>

                                <b>REFUND POLICY</b><br>
                                Your full refund will be issued once we have received and examined the returned goods at our return center. Once the returned goods fulfil our return policy, the full refund will be initiated. The method of refund will be processed depending on your original payment method:<br>

                                Online Bank Transfer, full refunds will be credited into your bank account via online bank transfer, which should be posted within 3-5 working days.<br>
                                Credit card refunds services, refunds will be sent to the card-issuing bank.<br>

                                Kindly contact your card-issuing bank with regards to the duration of the credit refunds.SHIPPING POLICY
                                <br><br>

                                <b>Shipping Address</b><br>

                                We will only ship to addresses provided in the billing address or shipment address provided during your purchase.<br>

                                Please ensure correct addresses and reachable phone number are provided when completing your order. We do not ship to P.O Boxes (Post-Office Box) and only to valid legitimate shipping addresses.<br>

                                We will not be liable in the event of an incorrect shipping address is provided and goods are returned to us.<br>

                                All re-delivery of goods to you will be charged for a associated shipping charges which will be disclosed upon request for a second delivery attempt.
                                <br><br>

                                <b>Change In Shipping Address</b><br>

                                If you have any request for change of shipping address, please email us at aideadesignsolution@gmail.com within 12 hours upon your order submission.<br>
                                If request of change in shipping address is made after 24 hours upon order confirmation, customers will be responsible for any associated shipping charges.
                                <br><br>

                                <b>Shipping Time</b><br>
                                It typically takes between 2-5 working days (Monday to Friday) for goods to arrive at your destination. The shipment will be delivered during office hours between 9:00 am to 6:00 pm weekdays only.
                                <br><br>

                                <b>Tracking Number</b><br>
                                Once goods is picked up by our shipping partner, the tracking ID for the package will be available. Any communication is to be via email/mobile app/sms.<br>
                                For non-tangible products or services, confirmation of order and receipt will be communicated via email/mobile app/sms.Proof of purchase, invoice or delivery order will be available.
                                <br><br>

                                We reserve the right to amend this policy from time to time if deemed necessary, in which no prior notification or approval from the customer is required.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                PRIVACY POLICY
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <b>Your Privacy</b>
                                <br><br>
                                We respect the privacy of your personal information and we strive to maintain the confidentiality of your personal information given by you. The objective of collecting your personal data is to deliver products and services, future marketing purposes and to improve our services to you. Only our authorized employees have access to your personal information. We will not disclose information about our customers to third parties except where it is part of providing a service to you - e.g. arranging for a product to be sent to you, carrying out credit and other security checks and for the purposes of customer research and profiling or where we have your express permission to do so. We may also be required to disclose such information to regulators, lawyers, auditors, other companies in the same group, third party service providers and appointed marketing agency.
                                <br><br>
                                <b>Your Consent</b><br>
                                We will not sell your name, address, e-mail address, credit card information or personal information to any third party (excluding partners from whom you may have linked to our site) without your permission.
                                <br><br>
                                <b>Communication & Marketing</b><br>
                                If you have made a purchase from our store we may occasionally update you on our latest products, news and special offers via e-mail, post & telephone. You will also be given the opportunity to receive such communications from us and selected third parties when you become a member of AIDEA GROUP SDN BHD.
                                <br><br>
                                All AIDEA GROUP SDN BHD members have the option to opt-out of receiving marketing communications from us and/or selected third parties. If you do not wish to continue to receive marketing from us and/or selected third parties you should opt-out by visiting 'Your Details' in 'Your Account' on the AIDEA GROUP SDN BHD website. You can access 'Your Account' once you register and login. Or click on the 'unsubscribe' link in any email communications which might we send you.
                                <br><br>
                                <b>What are Cookies?</b><br>
                                A cookie is a small information file that is sent to your computer and is stored on your hard drive. If you have registered with us then your computer will store an identifying cookie which will save you time each time you re-visit AIDEA GROUP SDN BHD, by remembering your email address for you. You can change the settings on your browser to prevent cookies being stored on your computer without your explicit consent.
                                <br><br>
                                <b>Site Statistics</b><br>
                                We may disclose aggregate, anonymised statistics about the number of visitors to this Website or number of purchases made as required by our investors. We use an independent measurement and research company to gather data regarding the visitors to this Website on our behalf using cookies and code which is embedded in the site. Both the cookies and the embedded code provide statistical information about visits to pages on the site, the duration of individual page view, paths taken by visitors through the site, data on visitors' screen settings and other general information. AIDEA GROUP SDN BHD uses and stores this type of information, as with that obtained from other cookies used on the site, to help it improve the services to its users. Further information regarding the way in which this information is obtained and used can be obtained by contacting us.
                                <br><br>
                                <b>Disclosures of your information</b><br>
                                We may disclose your personal information to any of our group of companies. We may also disclose your personal information to third parties:
                                <br><br>
                                In the event that AIDEA GROUP SDN BHD sells or buys any business or assets;<br>
                                If AIDEA GROUP SDN BHD or substantially all of its assets are acquired by a third party, in which case personal data which we hold about our customers may be one of the transferred assets; or<br>
                                If we are under a duty to disclose or share your personal data in order to comply with any legal obligation, or in order to enforce or apply our terms of; or to protect the rights, property, or safety of FVSB, our customers, or others. This includes exchanging information with other companies and organisations for the purposes of fraud protection and credit risk reduction.
                                <br><br>
                                <b>Third Party Sites</b><br>
                                Our site may contain links to and from the websites of our partner networks, advertisers and other third parties. If you follow a link to any of these websites, please note that they have their own privacy policies and that we do not accept any responsibility or liability for these policies. Please check these policies before you submit any personal data to these websites.
                                <br><br>
                                <b>Checking Your Details</b><br>
                                If you wish to verify the details you have submitted to AIDEA GROUP SDN BHD you may do so by contacting us via the e-mail address or address given below. Our security procedures mean that we may request proof of identity before we reveal information. This proof of identity will take the form of your e-mail address and password submitted upon registration. You must therefore keep this information safe as you will be responsible for any action which we take in response to a request from someone using your e-mail and password. We would strongly recommend that you do not use the browser's password memory function as that would permit other people using your terminal to access your personal information.
                                <br><br>
                                <b>Contacting Us</b><br>
                                We are always pleased to hear from our customers (even if it is a complaint!). We are always grateful for any time you spend providing us with the knowledge we need to ensure our customers are completely satisfied - we want you to return to the site and to recommend us to your friends and family. If you have any questions or feedback about this statement, or if you would like us to stop processing your information, please do not hesitate to contact a member of the AIDEA GROUP SDN BHD team, who will be delighted to answer any questions you may have.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-license">
    ©AIDEA GROUP SDN BHD | CREATED BY VANGUARD BUFFLE
</div>
</body>
<script>
    $(document).ready(function()
    {
        var url = window.location.href;
        var productGUID = (url.split('/')).pop();
        $('#ProductGUID').val(productGUID);
        

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

            console.log(data.product[0])
            if(data.product.length > 0)
            {
                LoadProductDetails(data.product[0]);
            }
            else
            {
                alert("Invalid Product");
                window.location.href = window.location.origin;
            }
          },
          error: function(e)
          {
            alert("Invalid Product");
            window.location.href = window.location.origin;
          }
        });
    })

    function LoadProductDetails(product)
    {
        $('#ProductDetails').html(product.Name);
        $('#Total').html("RM" + product.Price);
        $('#Subtotal').html("RM" + product.Price);
        $('#product-pix').attr('src', product.CoverPhotoURL);
    }

    $('#payment-form').on('submit', function(e)
    {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
          url:"{{ route('CreatePayment') }}",
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
            console.log(response);
            var res = JSON.parse(response);
            ProceedPayment(res);
          },
          error: function(e)
          {
            alert("Fail to proceed");
            window.location.href = window.location.origin;
          }
        })
    })

    function ProceedPayment(res)
    {
         var form = $('<form>', {
            'action': 'https://sandbox.senangpay.my/payment/555171357717256',
            'method': 'GET'
        });

        // Add hidden input fields for POST data
        form.append($('<input>', {
            'type': 'hidden',
            'name': 'detail',
            'value': res.data.detail
        }));

        form.append($('<input>', {
            'type': 'hidden',
            'name': 'amount',
            'value': res.data.amount
        }));

        form.append($('<input>', {
            'type': 'hidden',
            'name': 'order_id',
            'value': res.data.order_id
        }));
        form.append($('<input>', {
            'type': 'hidden',
            'name': 'name',
            'value': res.data.name
        }));
        form.append($('<input>', {
            'type': 'hidden',
            'name': 'email',
            'value': res.data.email
        }));
        form.append($('<input>', {
            'type': 'hidden',
            'name': 'phone',
            'value': res.data.phone
        }));
        form.append($('<input>', {
            'type': 'hidden',
            'name': 'hash',
            'value': res.signature
        }));

        // Append the form to the body and submit
        $('body').append(form);
        form.submit();
        form.remove();
    }

     function uuidv4() { 
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'
        .replace(/[xy]/g, function (c) { 
            const r = Math.random() * 16 | 0,  
                v = c == 'x' ? r : (r & 0x3 | 0x8); 
            return v.toString(16); 
        }); 
    }

    document.addEventListener("DOMContentLoaded", function() {
        var agreeCheckbox = document.getElementById('agreeTnC');
        var payButton = document.querySelector('.btn.btn-success');

        agreeCheckbox.addEventListener('change', function() {
            payButton.disabled = !this.checked;
        });
    });
</script>
</html>
