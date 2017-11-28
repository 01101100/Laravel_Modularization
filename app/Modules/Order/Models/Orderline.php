<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 02:52:40
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-19 02:54:43
 */
namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;

class Orderline extends Model {
	protected $primaryKey = 'orderline_id';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'order_id', 'prod_id', 'quantity',
    ];
	public function order() {
		return $this->belongsTo('App\Modules\Order\Models\Order', 'order_id', 'order_id');
	}

	public function product() {
		return $this->belongsTo('App\Modules\Product\Models\Product', 'prod_id', 'prod_id');
	}

	
}
