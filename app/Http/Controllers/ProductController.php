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
    	$products = DB::select("SELECT p.ProductGUID, p.Name, p.Description, p.PromotionPrice, p.Price, p.Quantity, p.Sold, p.HotSales, p.CoverPhotoURL 
								FROM u859417454_Aidea.Product p;");

    	return view('bo.products')->with('products',$products);
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

    public function GetActiveProduct()
    {
        try
        {
            $products = DB::select("SELECT p.ProductGUID, p.Name, p.Description, p.PromotionPrice, p.Price, p.Quantity, p.Sold, IFNULL(p.CoverPhotoURL,'') AS CoverPhotoURL,
                                            IFNULL(p.Photo1URL,'') AS Photo1URL, IFNULL(p.Photo2URL,'') AS Photo2URL, IFNULL(p.Photo3URL,'') AS Photo3URL, 
                                            IFNULL(p.Photo4URL, '') AS Photo4URL, IFNULL(p.Photo5URL, '') AS Photo5URL, IFNULL(p.FileURL,'') AS FileURL
                                FROM u859417454_Aidea.Product p;");

            return json_encode(['status' => 1, 'products' => $products]);
        }
        catch(Exception $e)
        {
            Log::debug($e);
        }
    }

	public function GetProductDetails($productGUID)
	{
		try
        {
            $products = DB::select("SELECT p.ProductGUID, p.Name, p.Description, p.PromotionPrice, p.Price, p.Quantity, p.Sold, IFNULL(p.CoverPhotoURL,'') AS CoverPhotoURL,
											IFNULL(p.Photo1URL,'') AS Photo1URL, IFNULL(p.Photo2URL,'') AS Photo2URL, IFNULL(p.Photo3URL,'') AS Photo3URL, 
                                            IFNULL(p.Photo4URL, '') AS Photo4URL, IFNULL(p.Photo5URL, '') AS Photo5URL, IFNULL(p.FileURL,'') AS FileURL, IFNULL(p.File1URL,'') AS File1URL, IFNULL(p.File2URL,'') AS File2URL, IFNULL(p.File3URL,'') AS File3URL, IFNULL(p.File4URL,'') AS File4URL
                                FROM u859417454_Aidea.Product p
                                WHERE p.ProductGUID = ?
                                LIMIT 1;",[$productGUID]);

            //$order = DB::select("SELECT o.name FROM u859417454_Aidea.Order o WHERE OrderID = 9");

            //$this->sendMail();

            // $folderPath = '/Product/File/'.$products[0]->ProductGUID;
            // $files = Storage::disk('hostinger')->files($folderPath); 

            // $tempDir = sys_get_temp_dir() . '/' . uniqid();
            // mkdir($tempDir);

            // $zipFileName = 'ftp_folder.zip';
            // $zipFilePath = $tempDir . '/' . $zipFileName;

            // $zip = new ZipArchive();
            // $zip->open($zipFilePath, ZipArchive::CREATE);

            // foreach ($files as $file) {
            //     $fileContent = Storage::disk('hostinger')->get($file);
            //     $zip->addFromString(basename($file), $fileContent);
            // }

            // $zip->close();

            // return response()->download($zipFilePath, $zipFileName)->deleteFileAfterSend(true);


            // Mail::to("zhtieh13@gmail.com")->send(new WelcomeMail($products[0],$order[0]->name));

            return json_encode(['status' => 1, 'product' => $products[0]]);
        }
        catch(Exception $e)
        {
            Log::debug($e);
        }
	}

    public function AddNewProduct(Request $request)
    {
        try
        {
            Log::debug($request);

            $CoverPhotoURL = "";
            $ProductPhoto1URL = "";
            $ProductPhoto2URL = "";
            $ProductPhoto3URL = "";
            $ProductPhoto4URL = "";
            $ProductPhoto5URL = "";
            $FileURL = "";
            $File1URL = "";
            $File2URL = "";
            $File3URL = "";
            $File4URL = "";
            $count = 0;
            $fileCount = 0;

            if($request->hasFile('UploadCoverImage'))
            {
                $file = $request->file('UploadCoverImage');
                $fileName = $request['ProductGUID'] ."_Cover.jpg";
                $CoverPhotoURL = "https://images.vanguardbuffle.com/Aidea/Product/Cover/".$fileName;

                Storage::disk('hostinger')->put('Product/Cover/'.$fileName, fopen($request->file('UploadCoverImage'), 'r+'));
            }

            if($request->hasFile('UploadProductPhotoImage'))
            {
                $reverse = array_reverse($request->file('UploadProductPhotoImage'));
                foreach ($reverse as $image) {
                   $imageName = $request['ProductGUID'] ."_Photo".($count + 1).".jpg";
                   if($count == 0)
                   {
                        $ProductPhoto1URL = "https://images.vanguardbuffle.com/Aidea/Product/".$imageName;
                   }
                   else if($count == 1)
                   {
                        $ProductPhoto2URL = "https://images.vanguardbuffle.com/Aidea/Product/".$imageName;
                   }
                   else if($count == 2)
                   {
                        $ProductPhoto3URL = "https://images.vanguardbuffle.com/Aidea/Product/".$imageName;
                   }
                   else if($count == 3)
                   {
                        $ProductPhoto4URL = "https://images.vanguardbuffle.com/Aidea/Product/".$imageName;
                   }
                   else
                   {
                        $ProductPhoto5URL = "https://images.vanguardbuffle.com/Aidea/Product/".$imageName;;
                   }

                   $count++;

                   Storage::disk('hostinger')->put('Product/'.$imageName, fopen($image, 'r+'));
                }
            }

            if($request->hasFile('ProductFile'))
            {
                $fileReverse = array_reverse($request->file('ProductFile'));
                foreach($fileReverse as $file)
                {
                    $fileName = $file->getClientOriginalName();
                    $gFileURL = "https://images.vanguardbuffle.com/Aidea/Product/File/".$request['ProductGUID']."/".$fileName;
                    Storage::disk('hostinger')->put('Product/File/'.$request['ProductGUID']."/".$fileName, fopen($file, 'r+'));
                    if($fileCount == 0)
                   {
                        $FileURL = $gFileURL;
                   }
                   else if($fileCount == 1)
                   {
                        $File1URL = $gFileURL;
                   }
                   else if($fileCount == 2)
                   {
                        $File2URL = $gFileURL;
                   }
                   else if($fileCount == 3)
                   {
                        $File3URL = $gFileURL;
                   }
                   else
                   {
                        $File4URL = $gFileURL;
                   }

                   $fileCount++;
                }
            }

            // if($request->hasFile('ProductFile'))
            // {
            //     $file = $request->file('ProductFile');
            //     $name = $file->getClientOriginalName();
            //     $extension = explode('.', $name);
            //     $fileName = $request['ProductGUID'] ."_File.".end($extension);
            //     $FileURL = "https://images.vanguardbuffle.com/Aidea/Product/File/".$fileName;

            //     Storage::disk('hostinger')->put('Product/File/'.$fileName, fopen($request->file('ProductFile'), 'r+'));
            // }

            DB::insert("INSERT INTO u859417454_Aidea.Product (ProductGUID,Name,Description,PromotionPrice,Price,Quantity,CoverPhotoURL,Photo1URL,Photo2URL,Photo3URL,Photo4URL,Photo5URL,FileURL,File1URL,File2URL,File3URL,File4URL) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);", [$request['ProductGUID'],$request['Name'],$request['Description'],$request['PromoPrice'],$request['Price'],$request['Quantity'],
                $CoverPhotoURL,$ProductPhoto1URL,$ProductPhoto2URL,$ProductPhoto3URL,$ProductPhoto4URL,$ProductPhoto5URL,$FileURL,$File1URL,$File2URL,$File3URL,$File4URL]);

            return json_encode(['status' => 1]);
        }
        catch(Exception $e)
        {
            Log::debug($e);

            return json_encode(['status' => 0]);
        }
    }

    public function EditProduct(Request $request)
    {
        try
        {
            $product = DB::select("SELECT IFNULL(p.CoverPhotoURL,'') AS CoverPhotoURL, IFNULL(p.Photo1URL,'') AS Photo1URL , IFNULL(p.Photo2URL,'') AS Photo2URL, 
                                    IFNULL(p.Photo3URL,'') AS Photo3URL, IFNULL(p.Photo4URL,'') AS Photo4URL, IFNULL(p.Photo5URL,'') AS Photo5URL, IFNULL(p.FileURL,'') AS FileURL, IFNULL(p.File1URL,'') AS File1URL, IFNULL(p.File2URL,'') AS File2URL, IFNULL(p.File3URL,'') AS File3URL, IFNULL(p.File4URL,'') AS File4URL
                                FROM u859417454_Aidea.Product p
                                WHERE p.ProductGUID = ? LIMIT 1;", [$request['ProductGUID']]);

            $CoverPhotoURL = $product[0]->CoverPhotoURL;
            $ProductPhoto1URL = $product[0]->Photo1URL;
            $ProductPhoto2URL = $product[0]->Photo2URL;
            $ProductPhoto3URL = $product[0]->Photo3URL;
            $ProductPhoto4URL = $product[0]->Photo4URL;
            $ProductPhoto5URL = $product[0]->Photo5URL;
            $FileURL = $product[0]->FileURL;
            $File1URL = $product[0]->File1URL;
            $File2URL = $product[0]->File2URL;
            $File3URL = $product[0]->File3URL;
            $File4URL = $product[0]->File4URL;
            $count = 0;
            $fileCount = 0;

            if($request['CoverAction'] == "Yes")
            {
                DB::insert("UPDATE u859417454_Aidea.Product SET CoverPhotoURL = '' WHERE ProductGUID = ?;",[$request['ProductGUID']]);
                $CoverPhotoURL = "";

                if($request->hasFile('UploadCoverImage'))
                {
                    $file = $request->file('UploadCoverImage');
                    $fileName = $request['ProductGUID'] ."_Cover.jpg";
                    $CoverPhotoURL = "https://images.vanguardbuffle.com/Aidea/Product/Cover/".$fileName;

                    Storage::disk('hostinger')->put('Product/Cover/'.$fileName, fopen($request->file('UploadCoverImage'), 'r+'));
                }
                else
                {
                    Storage::disk('hostinger')->delete('Product/Cover/'.$request['ProductGUID'] ."_Cover.jpg");
                }
            }

            if($request['PhotoAction'] == "Yes")
            {
                DB::insert("UPDATE u859417454_Aidea.Product SET Photo1URL = '',Photo2URL = '',Photo3URL = '',Photo4URL = '',Photo5URL = '' WHERE ProductGUID = ?;",[$request['ProductGUID']]);

                $ProductPhoto1URL = "";
                $ProductPhoto2URL = "";
                $ProductPhoto3URL = "";
                $ProductPhoto4URL = "";
                $ProductPhoto5URL = "";

                if(Storage::disk('hostinger')->exists('Product/'.$request['ProductGUID'] ."_Photo1.jpg"))
                {
                   Storage::disk('hostinger')->delete('Product/'.$request['ProductGUID'] ."_Photo1.jpg");
                }

                if(Storage::disk('hostinger')->exists('Product/'.$request['ProductGUID'] ."_Photo2.jpg"))
                {
                     Storage::disk('hostinger')->delete('Product/'.$request['ProductGUID'] ."_Photo2.jpg");
                }

                if(Storage::disk('hostinger')->exists('Product/'.$request['ProductGUID'] ."_Photo3.jpg"))
                {
                    Storage::disk('hostinger')->delete('Product/'.$request['ProductGUID'] ."_Photo3.jpg");
                }

                if(Storage::disk('hostinger')->exists('Product/'.$request['ProductGUID'] ."_Photo4.jpg"))
                {
                    Storage::disk('hostinger')->delete('Product/'.$request['ProductGUID'] ."_Photo4.jpg");
                }

                if(Storage::disk('hostinger')->exists('Product/'.$request['ProductGUID'] ."_Photo5.jpg"))
                {
                    Storage::disk('hostinger')->delete('Product/'.$request['ProductGUID'] ."_Photo5.jpg");
                }

                if($request->hasFile('UploadProductPhotoImage'))
                {
                    $reverse = array_reverse($request->file('UploadProductPhotoImage'));
                    foreach ($reverse as $image) {
                       $imageName = $request['ProductGUID'] ."_Photo".($count + 1).".jpg";
                       if($count == 0)
                       {
                            $ProductPhoto1URL = "https://images.vanguardbuffle.com/Aidea/Product/".$imageName;
                       }
                       else if($count == 1)
                       {
                            $ProductPhoto2URL = "https://images.vanguardbuffle.com/Aidea/Product/".$imageName;
                       }
                       else if($count == 2)
                       {
                            $ProductPhoto3URL = "https://images.vanguardbuffle.com/Aidea/Product/".$imageName;
                       }
                       else if($count == 3)
                       {
                            $ProductPhoto4URL = "https://images.vanguardbuffle.com/Aidea/Product/".$imageName;
                       }
                       else
                       {
                            $ProductPhoto5URL = "https://images.vanguardbuffle.com/Aidea/Product/".$imageName;;
                       }

                       $count++;

                       Storage::disk('hostinger')->put('Product/'.$imageName, fopen($image, 'r+'));
                    }
                }
            }

            if($request['FileAction'] == "Yes")
            {
                DB::insert("UPDATE u859417454_Aidea.Product SET FileURL = '', File1URL = '', File2URL = '', File3URL = '', File4URL = '' WHERE ProductGUID = ?;",[$request['ProductGUID']]);

                $FileURL = "";
                $File1URL = "";
                $File2URL = "";
                $File3URL = "";
                $File4URL = "";

                if(Storage::disk('hostinger')->exists("Product/File/".$request['ProductGUID']))
                {
                   Storage::disk('hostinger')->delete("Product/File/".$request['ProductGUID']);
                }

                if($request->hasFile('ProductFile'))
                {
                    $fileReverse = array_reverse($request->file('ProductFile'));
                    foreach($fileReverse as $file)
                    {
                        $fileName = $file->getClientOriginalName();
                        $gFileURL = "https://images.vanguardbuffle.com/Aidea/Product/File/".$request['ProductGUID']."/".$fileName;
                        Storage::disk('hostinger')->put('Product/File/'.$request['ProductGUID']."/".$fileName, fopen($file, 'r+'));
                        if($fileCount == 0)
                       {
                            $FileURL = $gFileURL;
                       }
                       else if($fileCount == 1)
                       {
                            $File1URL = $gFileURL;
                       }
                       else if($fileCount == 2)
                       {
                            $File2URL = $gFileURL;
                       }
                       else if($fileCount == 3)
                       {
                            $File3URL = $gFileURL;
                       }
                       else
                       {
                            $File4URL = $gFileURL;
                       }

                       $fileCount++;
                    }
                }

                // $FileNameArray = explode("/",$FileURL);
                // $FileName = end($FileNameArray);

                // if($FileName != "" && Storage::disk('hostinger')->exists('Product/File/'.$FileName))
                // {
                //     Storage::disk('hostinger')->delete('Product/File/'.$FileName);
                // }

                // $FileURL = '';

                // if($request->hasFile('ProductFile'))
                // {
                //     $file = $request->file('ProductFile');
                //     $name = $file->getClientOriginalName();
                //     $extension = explode('.', $name);
                //     $fileName = $request['ProductGUID'] ."_File.".end($extension);
                //     $FileURL = "https://images.vanguardbuffle.com/Aidea/Product/File/".$fileName;

                //     Storage::disk('hostinger')->put('Product/File/'.$fileName, fopen($request->file('ProductFile'), 'r+'));
                // }
            }

            DB::insert("UPDATE u859417454_Aidea.Product SET Name = ?, Description =?, PromotionPrice = ?, Price = ?, Quantity = ?, CoverPhotoURL = ?, Photo1URL = ?, Photo2URL = ?, Photo3URL =?,Photo4URL = ?,Photo5URL = ?,FileURL = ?,File1URL = ?,File2URL = ?,File3URL = ?,File4URL = ?
                WHERE ProductGUID = ?;", [$request['Name'],$request['Description'],$request['PromoPrice'],$request['Price'],$request['Quantity'],
                $CoverPhotoURL,$ProductPhoto1URL,$ProductPhoto2URL,$ProductPhoto3URL,$ProductPhoto4URL,$ProductPhoto5URL,$FileURL,$File1URL,$File2URL,$File3URL,$File4URL,$request['ProductGUID']]);

            return json_encode(['status' => 1]);
        }
        catch(Exception $e)
        {
            Log::debug($e);

            return json_encode(['status' => 0]);
        }
    }

    public function DeleteProduct(Request $request)
    {
        try
        {
            $pGUID = $request["ProductGUID"];

            $product = DB::select("SELECT IFNULL(p.CoverPhotoURL,'') AS CoverPhotoURL, IFNULL(p.Photo1URL,'') AS Photo1URL , IFNULL(p.Photo2URL,'') AS Photo2URL, 
                                    IFNULL(p.Photo3URL,'') AS Photo3URL, IFNULL(p.Photo4URL,'') AS Photo4URL, IFNULL(p.Photo5URL,'') AS Photo5URL, IFNULL(p.FileURL,'') AS FileURL
                                FROM u859417454_Aidea.Product p
                                WHERE p.ProductGUID = ? LIMIT 1;", [$pGUID]);

            $product[0]->CoverFileName = explode("/",$product[0]->CoverPhotoURL);
            $product[0]->Photo1FileName = explode("/",$product[0]->Photo1URL);
            $product[0]->Photo2FileName = explode("/",$product[0]->Photo2URL);
            $product[0]->Photo3FileName = explode("/",$product[0]->Photo3URL);
            $product[0]->Photo4FileName = explode("/",$product[0]->Photo4URL);
            $product[0]->Photo5FileName = explode("/",$product[0]->Photo5URL);
            $product[0]->FileName = explode("/",$product[0]->FileURL);

            $CoverFileName = end($product[0]->CoverFileName);
            $Photo1FileName = end($product[0]->Photo1FileName);
            $Photo2FileName = end($product[0]->Photo2FileName);
            $Photo3FileName = end($product[0]->Photo3FileName);
            $Photo4FileName = end($product[0]->Photo4FileName);
            $Photo5FileName = end($product[0]->Photo5FileName);
            $FileName = end($product[0]->FileName);

            if($CoverFileName != "" && Storage::disk('hostinger')->exists('Product/Cover/'.$CoverFileName))
            {
                Storage::disk('hostinger')->delete('Product/Cover/'.$CoverFileName);
            }

            if($Photo1FileName != "" && Storage::disk('hostinger')->exists('Product/'.$Photo1FileName))
            {
                Storage::disk('hostinger')->delete('Product/'.$Photo1FileName);
            }

            if($Photo2FileName != "" && Storage::disk('hostinger')->exists('Product/'.$Photo2FileName))
            {
                Storage::disk('hostinger')->delete('Product/'.$Photo2FileName);
            }

            if($Photo3FileName != "" && Storage::disk('hostinger')->exists('Product/'.$Photo3FileName))
            {
                Storage::disk('hostinger')->delete('Product/'.$Photo3FileName);
            }

            if($Photo4FileName != "" && Storage::disk('hostinger')->exists('Product/'.$Photo4FileName))
            {
                Storage::disk('hostinger')->delete('Product/'.$Photo4FileName);
            }
            if($Photo5FileName != "" && Storage::disk('hostinger')->exists('Product/'.$Photo5FileName))
            {
                Storage::disk('hostinger')->delete('Product/'.$Photo5FileName);
            }

            Log::debug(Storage::disk('hostinger')->exists('Product/File/'.$pGUID));

            if(Storage::disk('hostinger')->exists('Product/File/'.$pGUID))
            {
                Storage::disk('hostinger')->deleteDirectory('Product/File/'.$pGUID);
            }

            DB::delete("DELETE FROM u859417454_Aidea.Product WHERE ProductGUID = ?;", [$pGUID]);

            return json_encode(['status' => 1]);
        }
        catch(Exception $e)
        {
            Log::debug($e);

            return json_encode(['status' => 0]);
        }
        
    }

    public function SetHotSales(Request $request)
    {
        try
        {
            if($request['HotSales'] == 1)
            {
                DB::insert("UPDATE u859417454_Aidea.Product SET HotSales = 0");
            }

            DB::insert("UPDATE u859417454_Aidea.Product SET HotSales = ? WHERE ProductGUID = ?", [$request['HotSales'],$request['ProductGUID']]);

            return json_encode(['status' => 1]);
        }
        catch(Exception $e)
        {
            Log::debug($e);

            return json_encode(['status' => 0]);
        }
    }

    // public function sendMail()
    // {
    //     $name = "Tieh Zu Han";
    //     $email = "zhtieh13@gmail.com";
 
    //     $body = [
    //         'name'=>$name,
    //         'url_a'=>'https://www.bacancytechnology.com/',
    //        'url_b'=>'https://www.bacancytechnology.com/tutorials/laravel',
    //     ];
 
    //     Mail::to($email)->send(new WelcomeMail($body));
    //     return back()->with('status','Mail sent successfully');;
    // }
}