<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-28 23:03:38
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-28 23:57:55
 */

namespace App\Modules\Order\Models\States;

use App\Modules\Order\Models\Order;

class ProcessingState implements StateInterface {

	public function next(Order $order) {
		$order->state = SHIPPING;
		$order->setState(new ShippingState());
	}

	public function cancel(Order $order) {
		$order->state = FAILED;
		$order->setState(new FailedState());
	}
}
