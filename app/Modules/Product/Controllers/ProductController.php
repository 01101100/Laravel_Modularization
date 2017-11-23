<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-18 23:36:52
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-23 13:04:54
 */
namespace App\Modules\Product\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Product\Models\Product;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
		$categories = $this->category->getAll();
		return view('Product::create', ['categories' => $categories]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$category = $request->input('category');
		$title    = $request->input('inputTitle');
		$actor    = $request->input('inputActor');
		$price    = $request->input('inputPrice');

		$product = ['category' => $category, 'title' => $title, 'actor' => $actor, 'price' => $price];

		$result = $this->product->create($product);
		return redirect('product/' . $result->prod_id);
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
	public function edit($id) {
		$prod = $this->product->find($id);
		$categories = $this->category->getAll();
		return view('Product::edit', ['product' => $prod, 'categories' => $categories]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->validate($request, [
		 	'title' => 'required',
		 	'category' => 'required',
		 	'actor' => 'required',
		 	'price' => 'required|numeric',
		 ]);
		$prod = $this->product->find($id);
		if($prod){
			$prod->update($request->all());
		}
		$products = $this->product->getAll();
		return view('Admin::index', ['products' => $products]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$prod = $this->product->find($id);
		$prod->delete();
		$products = $this->product->getAll();
		return view('Admin::index', ['products' => $products]);
	}
}
