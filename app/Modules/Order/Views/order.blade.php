@extends('layouts.app')
@section('custom_css')
	<link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endsection
@section('content')
	@if(Session::has('cart'))
	<div class="container">
		<div class="row">
		  	<div class="col-md-1 col-md-offset-8 text-center">Price</div>
		  	<div class="col-md-1 text-center">Quantity</div>
		</div>
		<?php 
			$product_cart = (Session::get('cart'))->items;
			$total_price = (Session::get('cart'))->totalPrice;
			$total_qty = (Session::get('cart'))->totalQty;
		 ?>
		<div>
			@foreach($product_cart as $item)
            <div class="row item-cart">
				<div class="col-md-2">
					{{-- <img src="http://keithmackay.com/images/picture.jpg" alt="default product image" height="150px" width="150px"> --}}
					<a href="{{ url('product/' . $item['product']->prod_id) }}">
						<img src="{{ asset('img/'. $item['product']->img_name) }}" alt="default product image">
					</a>
				</div>
				<div class="col-md-6">
					<div class="caption">
						<h3>{{$item['product']['title']}}</h3>
						<p>Category : <b>{{ $item['product']->category_->category_name }}</b></p>
						<h5>Brand : <b>{{$item['product']->actor}}</b></h5>
						<h5>Price : <b>{{$item['product']->price}} $</b></h5>
					</div>
				</div>
				<div class="col-md-1 text-center">{{$item['price']}} $</div>
				<div class="col-md-1 text-center">{{$item['qty']}}</div>
				<div class="col-md-1 text-center"><a href="{{ route('product-deletefromcart', $item['product']->prod_id)}}"><button class="btn btn-default" type="button">delete</button></a></div>
			</div>
        	@endforeach
		</div>
        <div class="row">
		  	<div class="col-md-1 col-md-offset-7">Total:</div>
		  	<div class="col-md-1 text-center">{{$total_price}} $</div>
		  	<div class="col-md-1 text-center">{{$total_qty}} item(s)</div>
		  	<br><br>
		</div>
		<form action="{{ route('proceedtocheckout') }}" method="post">
			{{ csrf_field() }}
			<div>
				<select name="dropdown">
					<option value="Card" selected>Card</option>
					<option value="Bankking">Chuyen Khoan Ngan Hang</option>
					<option value="Shipping">Shipping</option>
				</select>
				<button class="add-to-cart btn btn-default">Proceed To Checkout</button>
			</div>
		</form>
		
	</div>
	@else
        <div class="container">
        {{--<div class="text-center" style="font-size: 30px ; margin-bottom: 200px"> </div>--}}
        <div class="alert alert-warning text-center" role="alert" style="font-size: 30px ; margin-bottom: 200px">Cart Is Empty</div>
        </div>
    @endif
@endsection