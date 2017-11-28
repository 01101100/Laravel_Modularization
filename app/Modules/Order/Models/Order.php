<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 02:33:40
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-29 00:29:36
 */
namespace App\Modules\Order\Models;

use App\Modules\Order\Models\States\FailedState;
use App\Modules\Order\Models\States\PendingState;
use App\Modules\Order\Models\States\ProcessingState;
use App\Modules\Order\Models\States\ReceivedState;
use App\Modules\Order\Models\States\ShippingState;
use App\Modules\Order\Models\States\StateInterface;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	protected $primaryKey = 'order_id';
	protected $stateI;
	protected $fillable = [
		'customer_id', 'total_amount', 'state',
	];

	public function orderlines() {
		return $this->hasMany('App\Modules\Order\Models\Orderline', 'order_id');
	}

	public function setState(StateInterface $state) {
		$this->stateI = $state;
	}

	public function initState() {
		switch ($this->state) {
		case PENDING:
			$this->setState(new PendingState());
			break;
		case PROCESSING:
			$this->setState(new ProcessingState());
			break;
		case SHIPPING:
			$this->setState(new ShippingState());
			break;
		case RECEIVED:
			$this->setState(new ReceivedState());
			break;
		case FAILED:
			$this->setState(new FailedState());
			break;
		default:
			echo "default";
			break;
		}
	}

	public function next($flag = 0) {
		$this->stateI->next($this);
		if ($flag != 0) {
			$this->save();
		}
	}

	public function cancel() {
		$this->stateI->cancel($this);
	}

}