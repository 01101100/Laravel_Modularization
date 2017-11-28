<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 02:33:40
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-28 22:48:58
 */
namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use States\State;
class Order extends Model {
	protected $primaryKey = 'order_id';
    protected State state;
    protected $fillable = [
        'customer_id', 'total_amount',
    ];

	public function orderlines() {
		return $this->hasMany('App\Modules\Order\Models\Orderline', 'order_id');
	}

    public function 
}