<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-28 23:03:38
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-29 00:14:40
 */
namespace App\Modules\Order\Models\States;
use App\Modules\Order\Models\Order;

interface StateInterface {
	/**
	 * [next description]
	 * @param  [type]   $order [description]
	 * @return function        [description]
	 */
	public function next(Order $order);

	/**
	 * [cancel description]
	 * @param  [type] $order [description]
	 * @return [type]        [description]
	 */
	public function cancel(Order $order);
}