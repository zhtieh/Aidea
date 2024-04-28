<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;

use GuzzleHttp\Client;

use File;

/**
 * 
 */
class SenangPayController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */

	function __construct()
	{

	}

	public function GetProductForPayment($productGUID)
    {
        try
        {
            $products = DB::select("SELECT p.Name, CASE WHEN p.PromotionPrice IS NOT NULL AND p.PromotionPrice > 0.00  AND p.PromotionPrice <= p.Price THEN
                                        p.PromotionPrice
                                        ELSE 
                                         p.Price 
                                         END AS Price
                                FROM u859417454_Aidea.Product p
                                WHERE p.ProductGUID = ?
                                LIMIT 1;",[$productGUID]);

            return json_encode(['status' => 1, 'product' => $products]);
        }
        catch(Exception $e)
        {
            Log::debug($e);
        }
    }

	public function CreatePayment(Request $request)
	{
		try
		{
			Log::debug($request);

			$products = DB::select("SELECT p.Name, CASE WHEN p.PromotionPrice IS NOT NULL AND p.PromotionPrice > 0.00  AND p.PromotionPrice <= p.Price THEN
                                        p.PromotionPrice
                                        ELSE 
                                         p.Price 
                                         END AS Price
                                FROM u859417454_Aidea.Product p
                                WHERE p.ProductGUID = ?
                                LIMIT 1;",[$request['ProductGUID']]);

			if(is_null($products))
			{
				return response()->json(['status' => 0, 'error' => 'Invalid Product.'], 500);
			}
			else
			{
				$secretKey = '294171328165594';
				$merchantId = '41440-511';

				$client = new Client();

				

				$data = [
					'detail' => $products[0]->Name,
				    'amount' => $products[0]->Price,
				    'order_id' => $this->GUIDv4(),
				    'name' => $request['name'],
				    'email' => $request['email'],
				    'phone' => $request['phone']
				    // ... other required parameters
				];

				$signature = hash_hmac('sha256', json_encode($data), $secretKey);

				$response = $client->post('https://api.senangpay.my/v3/payment', [
							    'headers' => [
							        'Authorization' => 'Basic ' . base64_encode($merchantId . ':' . $secretKey),
							        'Content-Type' => 'application/json',
							    ],
							    'json' => $data,
							    'query' => ['signature' => $signature],
							]);

				// Get payment URL from response
				$responseBody = (string) $response->getBody();

				// Decode JSON string into a PHP array or object
				$data = json_decode($responseBody, true); // Use true for associative array

				console.log($response);

				// Access data from the decoded array
				$paymentUrl = $data['data']['payment_url'];

				// Redirect user to payment URL
				return redirect()->away($paymentUrl);
			}
			
		}
		catch(Exception $e)
		{
			Log::debug($e);

            return json_encode(['status' => 0]);
		}
	}

	public function GUIDv4 ($trim = true)
	{
	    // Windows
	    if (function_exists('com_create_guid') === true) {
	        if ($trim === true)
	            return trim(com_create_guid(), '{}');
	        else
	            return com_create_guid();
	    }

	    // OSX/Linux
	    if (function_exists('openssl_random_pseudo_bytes') === true) {
	        $data = openssl_random_pseudo_bytes(16);
	        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);    // set version to 0100
	        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);    // set bits 6-7 to 10
	        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
	    }

	    // Fallback (PHP 4.2+)
	    mt_srand((double)microtime() * 10000);
	    $charid = strtolower(md5(uniqid(rand(), true)));
	    $hyphen = chr(45);                  // "-"
	    $lbrace = $trim ? "" : chr(123);    // "{"
	    $rbrace = $trim ? "" : chr(125);    // "}"
	    $guidv4 = $lbrace.
	              substr($charid,  0,  8).$hyphen.
	              substr($charid,  8,  4).$hyphen.
	              substr($charid, 12,  4).$hyphen.
	              substr($charid, 16,  4).$hyphen.
	              substr($charid, 20, 12).
	              $rbrace;
	    return $guidv4;
	}
}