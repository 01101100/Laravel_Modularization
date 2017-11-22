<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-06 11:24:03
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-07 01:01:40
 */

namespace App\Repositories\Eloquents;

use App\Modules\Category\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface {
	/**
	 * get model
	 * @return string
	 */
	public function getModel() {
		return Category::class;
	}

}