<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-22 23:53:02
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-23 01:44:51
 */
namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class AdminController extends Controller {
	/**
	 * [__construct description]
	 * @param ProductRepositoryInterface $product [description]
	 */
	public function __construct(ProductRepositoryInterface $product) {
		$this->productRepo = $product;
	}

	public function index() {
		$products = $this->productRepo->getAll();
		return view('Admin::index', ['products' => $products]);
	}
}