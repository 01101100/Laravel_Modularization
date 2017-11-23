<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 03:06:44
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-23 13:28:51
 */
$prefix = ""; // URL prefix

$module    = basename(__DIR__);
$namespace = "App\Modules\\{$module}\Controllers";

Route::group(
	[
		"prefix"     => $prefix,
		"module"     => $module,
		"namespace"  => $namespace,
		"middleware" => ['web'],
	],
	function () use ($module) {
		// Route::get('product/search', [
		// 	# middle here
		// 	"as"   => "{$module}.product",
		// 	"uses" => "{$module}Controller@searchProduct",
		// ]);
	}
);