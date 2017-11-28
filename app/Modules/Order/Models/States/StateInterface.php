<?php 

namespace App\Modules\Order\Models\States;

use App\Modules\Order\Models;

interface State {

	public function next(Order $order);
	public function cancel(Order $order);
}

?>