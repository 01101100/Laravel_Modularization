<?php

/**
 * @Author: longdragon
 * @Date:   2017-11-19 03:06:44
 * @Last Modified by:   longdragon
 * @Last Modified time: 2017-11-19 03:24:33
 */
$prefix = ""; // URL prefix

$module    = basename(__DIR__);
$namespace = "App\Modules\\{$module}\Controllers";

Route::group(
	["prefix" => $prefix, "module" => $module, "namespace" => $namespace],
	function () use ($module) {
		// Route::get('product/search', [
		// 	# middle here
		// 	"as"   => "{$module}.product",
		// 	"uses" => "{$module}Controller@searchProduct",
		// ]);
	}
);