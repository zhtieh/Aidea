<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;

use GuzzleHttp\Client;

use SenangPay\SenangPay;

use File;

use Mail;

use ZipArchive;

use App\Mail\WelcomeMail;

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
            $products = DB::select("SELECT p.Name, p.CoverPhotoURL, CASE WHEN p.PromotionPrice IS NOT NULL AND p.PromotionPrice > 0.00  AND p.PromotionPrice <= p.Price THEN
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
			$products = DB::select("SELECT p.Name, CASE WHEN p.PromotionPrice IS NOT NULL AND p.PromotionPrice > 0.00  AND p.PromotionPrice <= p.Price THEN
                                        p.PromotionPrice
                                        ELSE 
                                         p.Price 
                                         END AS Price
                                FROM u859417454_Aidea.Product p
                                WHERE p.ProductGUID = ?
                                LIMIT 1;",[$request['ProductGUID']]);

			if(is_null($products) || !isset($products))
			{
				return response()->json(['status' => 0, 'error' => 'Invalid Product.'], 500);
			}
			else
			{
				$secretKey = '6670-927';

				$OrderGUID = $this->GUIDv4();

				$data = [
					'detail' => str_replace(" ", "_", $products[0]->Name),
				    'amount' => $products[0]->Price,
				    'order_id' => $OrderGUID,
				    'name' => $request['name'],
				    'email' => $request['email'],
				    'phone' => $request['phone']
				    // ... other required parameters
				];


				$signature = hash_hmac('sha256', $secretKey.str_replace(" ", "_", $products[0]->Name).$products[0]->Price.$OrderGUID, $secretKey);


				DB::insert("INSERT INTO u859417454_Aidea.Order (OrderGUID, detail, amount, name, email, phone, hash, ProductGUID) VALUES 
					(?,?,?,?,?,?,?,?)",[$OrderGUID,str_replace(" ", "_", $products[0]->Name),$products[0]->Price,$request['name'],$request['email'],
					$request['phone'],$signature,$request['ProductGUID']]);

				return json_encode(['status' => 1, 'data' => $data, 'signature' => $signature], 200);
			}
			
		}
		catch(Exception $e)
		{
			Log::debug($e);

            return json_encode(['status' => 0]);
		}
	}

	public function ReturnCall(Request $request)
	{
		try
		{
			Log::debug($request);

			$exist = DB::select("SELECT EXISTS(SELECT * FROM u859417454_Aidea.Order WHERE OrderGUID = ?) AS Number;", [$request["order_id"]]);

			Log::debug($exist);

			$secretKey = '6670-927';

			$signature = hash_hmac('sha256', $secretKey.$request["status_id"].$request["order_id"].$request["transaction_id"].$request["msg"], $secretKey);

			if(($exist[0]->Number > 0) && ($signature == $request["hash"]))
			{
				if($request["status_id"] == '1' AND $request["msg"] == 'Payment_was_successful')
				{
					DB::insert("UPDATE u859417454_Aidea.Order SET status_id = 1, msg = 'Payment_was_successful', Status = 'S', transaction_id = ? WHERE OrderGUID = ?", [$request["transaction_id"],$request["order_id"]]);

					$orders = DB::select("SELECT o.OrderGUID, o.detail, o.amount, o.name, o.transaction_id 
											FROM u859417454_Aidea.Order o
											WHERE o.OrderGUID = ?;", [$request["order_id"]]);

					Mail::to("zhtieh13@gmail.com")->send(new WelcomeMail($orders[0]));

					return view('paymentresult')->with('result','S');
				}
				else if($request["status_id"] == '2')
				{
					DB::insert("UPDATE u859417454_Aidea.Order SET status_id = 2, msg = ?, Status = 'P', transaction_id = ? WHERE OrderGUID = ?", [$request["msg"],$request["transaction_id"],$request["order_id"]]);

					return view('paymentresult')->with('result','P');
				}
				else
				{
					DB::insert("UPDATE u859417454_Aidea.Order SET status_id = 3, msg = ?, Status = 'F', transaction_id = ? WHERE OrderGUID = ?", [$request["msg"],$request["transaction_id"],$request["order_id"]]);

					return view('paymentresult')->with('result','F');
				}
			}
			else
			{
				return json_encode(['status' => 0, 'error' => 'An error occurred.'], 500);
			}
		}
		catch(Exception $e)
		{
			Log::debug($e);

            return json_encode(['status' => 0, 'error' => 'An error occurred.'], 500);
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