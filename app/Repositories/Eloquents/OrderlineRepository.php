
<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-06 11:23:42
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-19 02:59:16
 */

namespace App\Repositories\Eloquents;

use App\Modules\Order\Models\Orderline;
use App\Repositories\Interfaces\OrderlineRepositoryInterface;

class OrderlineRepository extends EloquentRepository implements OrderlineRepositoryInterface {
	/**
	 * get model
	 * @return string
	 */
	public function getModel() {
		return Orderline::class;
	}
}