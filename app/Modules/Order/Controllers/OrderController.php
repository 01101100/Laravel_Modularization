<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 02:36:55
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-29 00:30:38
 */

namespace App\Modules\Order\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Order\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Auth;
use Illuminate\Http\Request;
use Session;

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

	public function order() {
		return view('Order::order');
	}

	public function store() {
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

	public function test() {
		// $order = new Order();
		$order = Order::find(1);
		// dd($order);
		$order->initState();
		// dd($order->stateI);
		$order->next();
		$order->save();
	}
}