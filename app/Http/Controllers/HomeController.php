<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        try {
            // Get banners and products
            $banners = DB::select("SELECT b.Title, b.Description, b.BannerURL, b.MobileBannerURL
                                FROM u859417454_Aidea.Banner b
                                ORDER BY b.Sequence;");
            
            $products = DB::select("SELECT p.ProductGUID, p.Name, p.Description, p.Price, p.PromotionPrice, p.Quantity, p.Sold, IFNULL(p.CoverPhotoURL,'') AS CoverPhotoURL,
                                    IFNULL(p.Photo1URL,'') AS Photo1URL, IFNULL(p.Photo2URL,'') AS Photo2URL, IFNULL(p.Photo3URL,'') AS Photo3URL, 
                                    IFNULL(p.Photo4URL, '') AS Photo4URL, IFNULL(p.FileURL,'') AS FileURL
                                FROM u859417454_Aidea.Product p;");
            
            $hotsales = DB::SELECt("SELECT p.ProductID, p.ProductGUID, p.Name, p.Description, p.Price, p.PromotionPrice, p.Quantity, p.Sold, p.HotSales, IFNULL(p.CoverPhotoURL,'') AS CoverPhotoURL,
                                    IFNULL(p.Photo1URL,'') AS Photo1URL, IFNULL(p.Photo2URL,'') AS Photo2URL, IFNULL(p.Photo3URL,'') AS Photo3URL, 
                                    IFNULL(p.Photo4URL, '') AS Photo4URL, IFNULL(p.FileURL,'') AS FileURL
                                    FROM u859417454_Aidea.Product p WHERE p.HotSales = 1");

            Log::info($products);

            return view('index', [
                'banners' => $banners,
                'products' => $products,
                'hotsale' => $hotsales
            ]);

        } catch (Exception $e) {
            Log::debug($e);
            return response()->json(['status' => 0, 'error' => 'An error occurred.'], 500);
        }
    }

    public function payment()
    {
        return view('payment');
    }
}
