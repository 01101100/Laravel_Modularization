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

	}
);


Route::get('addtocart/{prod_id}', 'App\Modules\Order\Controllers\CartController@addToCart')->name('product-addtocart')->middleware(['web']);

Route::get('deletefromcart/{prod_id}', 'App\Modules\Order\Controllers\CartController@deleteFromCart')->name('product-deletefromcart')->middleware(['web']);

Route::post('proceedtocheckout', 'App\Modules\Order\Controllers\OrderController@store')->name('proceedtocheckout')->middleware(['web', 'auth']);