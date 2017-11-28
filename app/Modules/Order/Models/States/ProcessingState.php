<?php 

namespace App\Modules\Order\Models\States;

use App\Modules\Order\Models;

class ProcessingState implements State {

	public function next (Order $order) {
		$order->state = SHIPPING;
		$order->setState(new ShippingState());
	}

	public function cancel (Order $order) {
		$order->state = FAILED;
		$order->setState(new FailedState());
	}
}
?>