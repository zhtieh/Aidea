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

<?php
/**
 * This is a sample code for manual integration with senangPay
 * It is so simple that you can do it in a single file
 * Make sure that in senangPay Dashboard you have key in the return URL referring to this file for example http://myserver.com/senangpay_sample.php
 */

# please fill in the required info as below
$merchant_id = '555171357717256';
$secretkey = '6670-927';


# this part is to process data from the form that user key in, make sure that all of the info is passed so that we can process the payment
if(isset($_POST['detail']) && isset($_POST['amount']) && isset($_POST['order_id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']))
{
    # assuming all of the data passed is correct and no validation required. Preferably you will need to validate the data passed
    $hashed_string = hash_hmac('sha256', $secretkey.urldecode($_POST['detail']).urldecode($_POST['amount']).urldecode($_POST['order_id']), $secretkey);
    
    # now we send the data to senangPay by using post method
    ?>
    <html>
    <head>
    <title>senangPay Sample Code</title>
    </head>
    <body onload="document.order.submit()">
        <form name="order" method="post" action="https://sandbox.senangpay.my/payment/555171357717256">
            <input type="hidden" name="detail" value="<?php echo $_POST['detail']; ?>">
            <input type="hidden" name="amount" value="<?php echo $_POST['amount']; ?>">
            <input type="hidden" name="order_id" value="<?php echo $_POST['order_id']; ?>">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
            <input type="hidden" name="phone" value="<?php echo $_POST['phone']; ?>">
            <input type="hidden" name="hash" value="<?php echo $hashed_string; ?>">
        </form>
    </body>
    </html>
    <?php
}
# this part is to process the response received from senangPay, make sure we receive all required info
else if(isset($_GET['status_id']) && isset($_GET['order_id']) && isset($_GET['msg']) && isset($_GET['transaction_id']) && isset($_GET['hash']))
{
    # verify that the data was not tempered, verify the hash
    $hashed_string = hash_hmac('sha256', $secretkey.urldecode($_GET['status_id']).urldecode($_GET['order_id']).urldecode($_GET['transaction_id']).urldecode($_GET['msg']), $secretkey);
    
    # if hash is the same then we know the data is valid
    if($hashed_string == urldecode($_GET['hash']))
    {
        # this is a simple result page showing either the payment was successful or failed. In real life you will need to process the order made by the customer
        if(urldecode($_GET['status_id']) == '1')
            echo 'Payment was successful with message: '.urldecode($_GET['msg']);
        else
            echo 'Payment failed with message: '.urldecode($_GET['msg']);
    }
    else
        echo 'Hashed value is not correct';
}
# this part is to show the form where customer can key in their information
else
{
    # by right the detail, amount and order ID must be populated by the system, in this example you can key in the value yourself
?>
    <html>
    <head>
    <title>senangPay Sample Code</title>
    </head>
    <body>
        <form method="get" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <table>
                <tr>
                    <td colspan="2">Please fill up the detail below in order to test the payment. Order ID is defaulted to timestamp.</td>
                </tr>
                <tr>
                    <td>Detail</td>
                    <td>: <input type="text" name="detail" value="" placeholder="Description of the transaction" size="30"></td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td>: <input type="text" name="amount" value="" placeholder="Amount to pay, for example 12.20" size="30"></td>
                </tr>
                <tr>
                    <td>Order ID</td>
                    <td>: <input type="text" name="order_id" value="<?php echo time(); ?>" placeholder="Unique id to reference the transaction or order" size="30"></td>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td>: <input type="text" name="name" value="" placeholder="Name of the customer" size="30"></td>
                </tr>
                <tr>
                    <td>Customer Email</td>
                    <td>: <input type="text" name="email" value="" placeholder="Email of the customer" size="30"></td>
                </tr>
                <tr>
                    <td>Customer Contact No</td>
                    <td>: <input type="text" name="phone" value="" placeholder="Contact number of customer" size="30"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </body>
    </html>
<?php
}
?>

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

        $.ajax({
          url: window.location.origin + "/GetProductDetails/" + productGUID,
          method: 'GET',
          processData: false,
          contentType: false,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
            var data = JSON.parse(response);
            console.log(data);
            if(data.product.length > 0)
            {
                LoadProductDetails(data.product[0]);
            }
            else
            {
                alert("Invalid Product");
                window.location.href = window.location.origin;
            }
            
          }
        });
    })

    function LoadProductDetails(product)
    {
        $('#ProductDetails').html(product.Name);
        $('#Total').html("RM" + product.Price);
        $('#Subtotal').html("RM" + product.Price);
    }

    $('#payment-form').on('submit', function(e)
    {
        e.preventDefault();
        // window.location.href = 'https://sandbox.senangpay.my/payment/555171357717256?order_id=' + uuidv4 + '&name=' + $('#form-name').val() + '&email=' +
        // $('#form-email').val()+'&phone='+$('#form-contact');

        // $.ajax({
        //   url: 'https://sandbox.senangpay.my/payment/555171357717256?order_id=' + uuidv4 + '&name=' + $('#form-name').val() + '&email=' +
        // $('#form-email').val()+'&phone='+$('#form-contact'),
        //   method: 'POST',
        //   processData: false,
        //   contentType: false,
        //   headers: {
        //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //   },
        //   success: function(response){
        //     console.log(response)        
        // });
    })

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
