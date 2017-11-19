<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 02:36:55
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-19 02:38:16
 */

namespace App\Modules\Order\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller {
	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		# parent::__construct();
	}
	public function index(Request $request) {
		return view('Order::index');
	}
}