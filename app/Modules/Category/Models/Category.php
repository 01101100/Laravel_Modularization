<?php

namespace App\Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $table = 'categories';

	protected $primaryKey = 'category';

	public function products() {
		return $this->hasMany('App\Modules\Product\Models\Product', 'category');
	}
}