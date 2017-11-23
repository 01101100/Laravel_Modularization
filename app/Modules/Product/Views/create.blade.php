@extends('layouts.app')

@section('title')
<title>Create Product</title>
@endsection

@section('custom_css')
<link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container" style="width: 500px; margin: auto">
	<h3>Create a new Product:</h3><br>
	<form method="POST" action="{{ route('product.store') }}">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="inputTitle">Category</label><br>
			<select class="custom-select" name="category">
				<option selected>Open this select menu</option>
				@foreach($categories as $category)
				<option value="{{$category->category}}"> {{$category->category_name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="inputTitle">Title</label>
			<input type="text" class="form-control" name="inputTitle" placeholder="Enter Title">
		</div>
		<div class="form-group">
			<label for="inputActor">Maker</label>
			<input type="text" class="form-control" name="inputActor" placeholder="Enter Maker">
		</div>
		<div class="form-group">
			<label for="inputPrice">Price</label>
			<input type="text" class="form-control" name="inputPrice" placeholder="Enter Price">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>


@endsection