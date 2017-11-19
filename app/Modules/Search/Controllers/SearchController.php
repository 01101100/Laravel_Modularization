<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 03:01:16
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-19 03:33:44
 */
namespace App\Modules\Search\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class SearchController extends Controller {
	/**
	 * [__construct description]
	 * @param ProductRepositoryInterface $product [description]
	 */
	public function __construct(ProductRepositoryInterface $product) {
		$this->product = $product;
	}

	/**
	 * Search for products by title
	 * @param  Request $request include keyword field
	 * @return \Illuminate\Http\Response
	 */
	public function searchProduct(Request $request) {
		$products = $this->product->search($request->input('keyword'));
		return view('Product::index', ['products' => $products]);
	}
}
