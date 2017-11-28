<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 02:33:40
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-29 00:13:16
 */
namespace App\Modules\Order\Models;

use App\Modules\Order\Models\States\ProcessingState;
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
		case 1:
			$this->setState(new PendingState());
			break;
		case 2:
			$this->setState(new ProcessingState());
			break;
		case 3:
			$this->setState(new ShippingState());
			break;
		case 4:
			$this->setState(new ReceivedState());
			break;
		case 5:
			$this->setState(new FailedState());
			break;
		default:
			echo "default";
			break;
		}
	}

	public function next($flag = 0) {
		if ($flag != 0) {
			$this.save();
		}
		$this->stateI->next($this);
	}

	public function cancel() {
		$this->stateI->cancel($this);
	}

}