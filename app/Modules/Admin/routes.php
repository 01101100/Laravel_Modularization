<?php

/**
 * @Author: 01101100
 * @Date:   2017-11-22 23:51:19
 * @Last Modified by:   01101100
 * @Last Modified time: 2017-11-22 23:58:03
 */

$prefix = "admin"; // URL prefix

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
		Route::get('/', [
			# middle here
			"as"   => "{$module}.index",
			"uses" => "{$module}Controller@index",
		]);
	}
);
