<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-28 23:03:38
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-28 23:59:06
 */
namespace App\Modules\Order\Models\States;

interface StateInterface {
	/**
	 * [next description]
	 * @param  [type]   $order [description]
	 * @return function        [description]
	 */
	public function next($order);

	/**
	 * [cancel description]
	 * @param  [type] $order [description]
	 * @return [type]        [description]
	 */
	public function cancel($order);
}