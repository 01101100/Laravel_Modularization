<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-04 19:24:53
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-22 23:08:43
 */

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface {
	// interface will be written here
	/**
	 * [findByAttr description]
	 * @param  [type] $field     [description]
	 * @param  string $operation [description]
	 * @param  string $value     [description]
	 * @return [type]            [description]
	 */
	public function findByAttr($field, $operation = '=', $value = '');

	/**
	 * [search description]
	 * @param  string $keyword [description]
	 * @return [type]          [description]
	 */
	public function search($keyword = '');
}