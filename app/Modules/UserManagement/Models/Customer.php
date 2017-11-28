<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 02:55:36
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-23 16:57:13
 */

namespace App\Modules\UserManagement\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
	protected $primaryKey = 'customer_id';
	protected $fillable   = [
		'customer_id',
	];
	public $timestamps = false;
	public function orders() {
		return $this->hasMany('App\Modules\Order\Models\Order', 'customer_id', 'customer_id');
	}

	public function user() {
		return $this->belongsTo('App\User', 'customer_id', 'id');
	}

}
