<?php

$prefix = "product"; // URL prefix

$module    = basename(__DIR__);
$namespace = "App\Modules\\{$module}\Controllers";

Route::get('product/search', 'App\Modules\Search\Controllers\SearchController@searchProduct')
	->name('Search.product')->middleware(['web']);

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

		Route::get('/create', [
			"middleware" => ['admin'],
			"as"         => "{$module}.create",
			"uses"       => "{$module}Controller@create",
		]);

		Route::post('/', 'ProductController@store')->name('product.store')->middleware(['admin']); //ok minh xem lai

		Route::get('/permission', function () {
			return view('Product::permission'); // dung roi day thay run di
		})->name('permission');

		Route::get('/{id}', [
			"as"   => "{$module}.show",
			"uses" => "{$module}Controller@show",
		]);
	}
);
