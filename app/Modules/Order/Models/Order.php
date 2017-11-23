<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 02:33:40
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-19 02:40:36
 */
namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	protected $primaryKey = 'order_id';

	public function orderlines() {
		return $this->hasMany('App\Modules\Order\Models\Orderline', 'order_id');
	}
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'total_amount',
    ];
}