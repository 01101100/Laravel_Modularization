<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 02:33:40
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-28 22:59:36
 */
namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use States\*;
class Order extends Model {
	protected $primaryKey = 'order_id';
    protected StateInterface state;
    protected $fillable = [
        'customer_id', 'total_amount', 'state'
    ];

	public function orderlines() {
		return $this->hasMany('App\Modules\Order\Models\Orderline', 'order_id');
	}

    public function initState()
    {
        switch ($this->state) {
            case PENDING:
                
                break;
            case :
            case :
            case :
            case :
            default:
                break;
        }
    }
}