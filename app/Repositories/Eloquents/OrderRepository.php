<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-04 19:34:36
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-19 02:58:56
 */

namespace App\Repositories\Eloquents;

use App\Modules\Order\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository extends EloquentRepository implements OrderRepositoryInterface {
	/**
	 * get model
	 * @return string
	 */
	public function getModel() {
		return Order::class;
	}
}