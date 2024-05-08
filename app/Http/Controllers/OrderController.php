<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
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
		$orders = DB::select("SELECT o.OrderGUID, o.name, o.email, o.phone, o.detail, o.amount, o.transaction_id, 
									CASE WHEN o.Status = 'S' THEN
										'Successful'
								        WHEN o.Status = 'P' THEN
								        'Pending'
								        ELSE
								        'Failed'
									END AS Status, o.Created AS DateTime
								FROM u859417454_Aidea.Order o
								ORDER BY o.Created DESC;");

		return view('bo.orders')->with('orders',$orders);
	}
}