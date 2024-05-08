<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;

use File;

use Mail;

use ZipArchive;

use App\Mail\WelcomeMail;

class DownloadController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */

	function __construct()
	{

	}

	public function DownloadFile($orderGUID)
	{
		return view('download');
	}

	public function DownloadOrderProductFiles($orderGUID)
	{
		try
		{
			$products = DB::select("SELECT p.ProductGUID, IFNULL(p.FileURL,'') AS FileURL, IFNULL(p.File1URL,'') AS File1URL, IFNULL(p.File2URL,'') AS File2URL, 
										IFNULL(p.File3URL,'') AS File3URL, IFNULL(p.File4URL,'') AS File4URL
									FROM u859417454_Aidea.Order o
									INNER JOIN u859417454_Aidea.Product p ON o.ProductGUID = p.ProductGUID
									WHERE o.OrderGUID = ? AND o.Status = 'S';",[$orderGUID]);

			Log::debug($products[0]->ProductGUID);

			$folderPath = '/Product/File/'.$products[0]->ProductGUID;
            $files = Storage::disk('hostinger')->files($folderPath); 

            Log::debug($files);

            $tempDir = sys_get_temp_dir() . '/' . uniqid();
            mkdir($tempDir);

            $zipFileName = 'ftp_folder.zip';
            $zipFilePath = $tempDir . '/' . $zipFileName;

            $zip = new ZipArchive();
            $zip->open($zipFilePath, ZipArchive::CREATE);

            foreach ($files as $file) {
                $fileContent = Storage::disk('hostinger')->get($file);
                $zip->addFromString(basename($file), $fileContent);
            }

            $zip->close();

            return response()->download($zipFilePath, $zipFileName)->deleteFileAfterSend(true);
		}
		catch(Exception $e)
		{
			Log::debug($e);

			return response()->json(['status' => 0, 'error' => 'An error occurred.'], 500);
		}
	}
}