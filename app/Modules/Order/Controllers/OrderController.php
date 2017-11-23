<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 02:36:55
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-19 02:38:16
 */

namespace App\Modules\Order\Controllers;
use App\Modules\Product\Models\Order;

use Session;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\OrderlineRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller {
	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct(OrderRepositoryInterface $order) {
		$this->order = $order;
	}
	public function index(Request $request) {
		return view('Order::index');
	}

	public function order()
    {
        return view('Order::order');
    }

    public function store(){
		$cart = Session::get('cart');
		$user = Auth::user();
		//dd($cart->totalPrice);
		$currentOrder = $this->order->create(array('customer_id' => $user->id, 'total_amount' => $cart->totalPrice));
		Session::forget('cart');
		// foreach ($cart->items as $item) {
		// 	$orderline = array('order_id' => $currentOrder->order_id, 'prod_id' =>$item['product']->prod_id, 'quantity' => $item['qty']);
		// 	$this->orderline->create($orderline);
		// }
		// 
		return redirect()->back();
	}
}