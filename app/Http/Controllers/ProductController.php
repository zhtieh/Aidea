<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;

use File;

/**
 * 
 */
class ProductController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
	function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
    {
    	$products = DB::select("SELECT p.ProductGUID, p.Name, p.Description, p.Price, p.Quantity, p.Sold, p.CoverPhotoURL 
								FROM u859417454_Aidea.Product p;");

    	return view('bo.products')->with('products',$products);
    }

	public function GetProductDetails($productGUID)
	{
		try
        {
            $products = DB::select("SELECT p.ProductGUID, p.Name, p.Description, p.Price, p.Quantity, p.Sold, p.CoverPhotoURL,
											p.Photo1URL, p.Photo2URL, p.Photo3URL, p.Photo4URL, p.FileURL
                                FROM u859417454_Aidea.Product p
                                LIMIT 1;");

            return json_encode(['status' => 1, 'product' => $products[0]]);
        }
        catch(Exception $e)
        {
            Log::debug($e);
        }
	}
}