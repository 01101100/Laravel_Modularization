<?php

namespace App\Modules\Order\Models\States;

use App\Modules\Order\Models\Order;

class ReceiveState implements StateInterface {

	public function next(Order $order) {

	}

	public function cancel(Order $order) {

	}
}
