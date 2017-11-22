<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-22 23:53:02
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-22 23:55:54
 */
namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller {
	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		# parent::__construct();
	}
	public function index() {
		return view('Admin::index');
	}
}