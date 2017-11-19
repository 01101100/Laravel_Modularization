<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-06 11:24:03
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-19 02:59:31
 */

namespace App\Repositories\Eloquents;

use App\Modules\Product\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository extends EloquentRepository implements ProductRepositoryInterface {
	/**
	 * get model
	 * @return string
	 */
	public function getModel() {
		return Product::class;
	}

	/**
	 * [findByAttr description]
	 * @param  [type] $field     [description]
	 * @param  string $operation [description]
	 * @param  string $value     [description]
	 * @return [type]            [description]
	 */
	public function findByAttr($field, $operation = '=', $value = '') {
		$products = Product::where($field, $operation, $value)->get();
		return $products;
	}

	/**
	 * search by product title
	 * @param  string $keyword [description]
	 * @return [type]          [description]
	 */
	public function search($keyword = '') {
		return $this->findByAttr('title', 'like', '%' . $keyword . '%');
	}
}