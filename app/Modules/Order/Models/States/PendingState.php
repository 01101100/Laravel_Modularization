<?php 

namespace App\Modules\Order\Models\States;

use App\Modules\Order\Models;

class PendingState implements State {

	public function next (Order $order) {
		$order->state = PROCESSING;
		$order->setState(new ProcessingState());
	}

	public function cancel (Order $order) {
		$order->state = FAILED;
		$order->setState(new FailedState());
	}
}
?>