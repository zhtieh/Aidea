<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Purchase Successful</title>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        h1 {
            color: #333;
        }
        p {
            line-height: 1.5;
        }
        .order-details {
            margin-bottom: 20px;
        }
        .download-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div style="background-color: #f8f9fa; padding: 20px; font-family: Arial, sans-serif;">
        <h2 style="color: #343a40; margin-bottom: 15px;">Purchase Successful!</h2>
        <p style="margin-bottom: 10px;">Hi {{ $order->name }},</p>
        <p style="margin-bottom: 20px;">Thank you for your purchase! We're thrilled to confirm that your order is complete. Please click the link below to download the design files.</p>

        <div style="background-color: #fff; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            <h4 style="color: #343a40; margin-bottom: 10px;">Order Details:</h4>
            <ul style="list-style: none; padding: 0;">
                <li>Transaction ID: {{ $order->transaction_id }}</li>
                <li>Product: {{ $order->detail }}</li>
                <li>Price: RM{{ $order->amount }}</li>
                <li id="downloadLink">Download Link: https://aidea-group.com/DownloadFile/{{ $order->OrderGUID }}</li>
            </ul>
        </div>
        <p style="margin-top: 20px;">We hope you enjoy your purchase! If you have any questions or need assistance, please don't hesitate to contact our support team.</p>
        <p style="margin-bottom: 0;">Sincerely,</p>
        <p>The Aidea Design Solution Team</p>
    </div>
</body>
</html>