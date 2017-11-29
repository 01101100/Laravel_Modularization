<?php

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
		Route::get('cart', [
			# middle here
			"as"   => "cart",
			"uses" => "{$module}Controller@order",
		]);

		Route::get('test', [
			"as"   => "test",
			"uses" => "{$module}Controller@test",
		]);

		Route::get('/next/{order_id}', [
			"as"   => "{$module}.next",
			"uses" => "{$module}Controller@next",
		]);

		Route::get('/cancel/{order_id}', [
			"as"   => "{$module}.cancel",
			"uses" => "{$module}Controller@cancel",
		]);

		Route::get('/reset/{order_id}', [
			"as"   => "{$module}.reset",
			"uses" => "{$module}Controller@reset",
		]);

		Route::get('/ordermanager', [
			"middleware" => ['admin'],
			"as"         => "{$module}.ordermanager",
			"uses"       => "{$module}Controller@orderManager",
		]);

	}
);

Route::get('addtocart/{prod_id}', 'App\Modules\Order\Controllers\CartController@addToCart')->name('product-addtocart')->middleware(['web']);

Route::get('deletefromcart/{prod_id}', 'App\Modules\Order\Controllers\CartController@deleteFromCart')->name('product-deletefromcart')->middleware(['web']);

Route::post('proceedtocheckout', 'App\Modules\Order\Controllers\OrderController@store')->name('proceedtocheckout')->middleware(['web', 'auth']);