<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-18 23:39:11
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-18 23:39:20
 */
$namespace = 'App\Modules\Category\Controllers';
Route::group(
	['module' => 'Category', 'namespace' => $namespace],
	function () {
		Route::get('category', [
			# middle here
			'as'   => 'index',
			'uses' => 'CategoryController@index',
		]);
	}
);