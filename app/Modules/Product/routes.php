<?php

$prefix = "product"; // URL prefix

$module    = basename(__DIR__);
$namespace = "App\Modules\\{$module}\Controllers";

Route::get('product/search', 'App\Modules\Search\Controllers\SearchController@searchProduct')
	->name('Search.product');

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

		Route::get('/{id}', [
			"as"   => "{$module}.show",
			"uses" => "{$module}Controller@show",
		]);
	}
);
