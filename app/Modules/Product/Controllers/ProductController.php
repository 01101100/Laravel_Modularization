<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-18 23:36:52
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-19 04:08:28
 */
namespace App\Modules\Product\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Modules\Product\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller {
	/**
	 * [__construct description]
	 * @param ProductRepositoryInterface $product [description]
	 */
	public function __construct(ProductRepositoryInterface $product, 
								CategoryRepositoryInterface $category) {
		$this->product = $product;
		$this->category = $category;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$products = $this->product->getAll();
		return view('Product::index', ['products' => $products]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		if (Auth::check() && Auth::user()->role == 2) {  // admin's role = 2
			$categories = $this->category->getAll();
			return view('Product::create', ['categories' => $categories]);
		} else {
			return ;
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
		if (Auth::check() && Auth::user()->role == 2) {
			$title = $request->input('inputTitle');
			$actor = $request->input('inputActor');
			$price = $request->input('inputPrice');

			$product = ['category' => 1, 'title' => $title, 'actor' => $actor, 'price' => $price];

			$result = $this->product->create($product);
			return redirect('product/'.$result->prod_id);
		} else {
			return redirect('permission');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function show($id = '') {
		$product = Product::find($id);
		return view('Product::show', ['product' => $product]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Product $product) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product) {
		//
	}
}
