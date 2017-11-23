<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $primaryKey = 'prod_id';
  protected $fillable = ['category', 'title', 'actor', 'price'];

	public function category_() {
		return $this->belongsTo('App\Modules\Category\Models\Category', 'category', 'category');
	}

	public function orderlines() {
		return $this->hasMany('App\Modules\Orderline\Models\Orderline', 'prod_id', 'prod_id');
	}
}
