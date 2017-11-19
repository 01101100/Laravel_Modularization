<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-18 23:36:52
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-19 00:48:09
 */
namespace App\Modules\Category\Controllers;

use App\Http\Controllers\Controller;

class CategoryController extends Controller {
	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		# parent::__construct();
	}
	public function index() {
		return view('Category::index');
	}
}