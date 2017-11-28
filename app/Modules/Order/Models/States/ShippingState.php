<?php 

namespace App\Modules\Order\Models\States;

use App\Modules\Order\Models;

class ShippingState implements State {

	public function next (Order order) {
		order.state = RECEIVED;
		order.setState(new ReceivedState());
	}

	public function cancel (Order order) {
		order.state = FAILED;
		order.setState(new FailedState());
	}
}
?>