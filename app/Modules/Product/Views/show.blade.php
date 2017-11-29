@extends('layouts.app')

@section('title')
	<title>Details of {{ $product->title }}</title>
@endsection

@section('custom_css')
	<link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endsection

@section('content')
<body>
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">

						{{-- <div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="" /></div>
						  <div class="tab-pane" id="pic-2"><img src="" /></div>
						  <div class="tab-pane" id="pic-3"><img src="" /></div>
						  <div class="tab-pane" id="pic-4"><img src="" /></div>
						  <div class="tab-pane" id="pic-5"><img src="" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://keithmackay.com/images/picture.jpg" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="http://keithmackay.com/images/picture.jpg" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="http://keithmackay.com/images/picture.jpg" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://keithmackay.com/images/picture.jpg" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://keithmackay.com/images/picture.jpg" /></a></li>
						</ul> --}}
						<a href="{{ url('product/' . $product->prod_id) }}">
							<img src="{{ asset('img/'. $product->img_name) }}" alt="default product image">
						</a>

					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{ $product->title }}</h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span><br>
							<span class="review-no">Category : {{ $product->category_->category_name }}</span>
						</div>
						<p class="product-description">{{ $product->title }} 's discription will be written here.</p>
						<h4 class="price">current price: <span>${{ $product->price }}</span></h4>
						<h5 class="sizes">sizes:
							<span class="size" data-toggle="tooltip" title="small">s</span>
							<span class="size" data-toggle="tooltip" title="medium">m</span>
							<span class="size" data-toggle="tooltip" title="large">l</span>
							<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
						</h5>
						<h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5>
						<div class="action">
							<a class="a-add-to-cart" href="{{ route('product-addtocart',$product->prod_id)}}"><button class="add-to-cart btn btn-default" type="button">add to cart</button></a>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
 @endsection