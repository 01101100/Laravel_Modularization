<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-28 23:03:38
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-28 23:55:39
 */
namespace App\Modules\Order\Models\States;

class ProcessingState implements StateInterface {
	public function next($order) {
		echo "processing state next() funtion";
	}

	public function cancel($order) {
		echo "close";
	}
}