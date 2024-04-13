<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;

use File;

class BannerController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $banners = DB::select("SELECT b.BannerGUID, b.Title, b.Description, b.BannerURL, b.MobileBannerURL, b.Modified AS LastUpdate 
								FROM u859417454_Aidea.Banner b
								ORDER BY b.Sequence;");

        return view('bo.activebanners')->with('banners',$banners);
    }

    public function GetActiveBanner(Request $request)
    {
        try
        {
            $banners = DB::select("SELECT b.Title, b.Description, b.BannerURL, b.MobileBannerURL
                                FROM u859417454_Aidea.Banner b
                                ORDER BY b.Sequence;");

            return json_encode(['status' => 1, 'banners' => $banners]);
        }
        catch(Exception $e)
        {
            Log::debug($e);
        }
    }

    public function UpdateBanner(Request $request)
    {
        try
        {
            Log::debug($request);
            if($request->hasFile('UploadBannerImage'))
            {
                $file = $request->file('UploadBannerImage');
                $fileName = $request['BannerName'] .".jpg";

                Storage::disk('hostinger')->put('Banner/'.$fileName, fopen($request->file('UploadBannerImage'), 'r+'));
            }

            if($request->hasFile('UploadMobileBannerImage'))
            {
                $file = $request->file('UploadMobileBannerImage');
                $fileName = $request['BannerName'] ."Mobile.jpg";

                Storage::disk('hostinger')->put('Banner/'.$fileName, fopen($request->file('UploadMobileBannerImage'), 'r+'));
            }

            DB::insert("INSERT INTO u859417454_Aidea.Banner(BannerGUID, Title, Description) VALUES (?,?,?)
                        ON DUPLICATE KEY UPDATE
                        Title = ?, Description = ?, Modified = Now()", [$request["BannerGUID"], $request["BannerTitle"], $request["BannerDesc"],
                        $request["BannerTitle"], $request["BannerDesc"]]);

            return json_encode(['status' => 1]);
        }
        catch(Exception $e)
        {
            Log::debug($e);
        }
    }
}