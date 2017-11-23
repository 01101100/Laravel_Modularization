@extends('layouts.app')

@section('title')
	<title>Admin panel</title>
@endsection

@section('custom_css')
	<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endsection

@section('content')
@include('Admin::menu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

	<table id="dataTables-product" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr style="background: white;">
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Actor</th>
                <th>Price</th>
                <th>Special</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	@foreach ($products as $prod)
    		<tr>
                <td>{{ $prod->prod_id }}</td>
                <td>{{ $prod->title }}</td>
                <td>{{ $prod->category_->category_name }}</td>
                <td>{{ $prod->actor }}</td>
                <td>{{ $prod->price }}</td>
                <td>{{ $prod->special }}</td>
                <td>
                    <a href="{{ route('Product.edit', ['id' => $prod->prod_id]) }}"><i class="fa fa-fw fa-pencil" aria-hidden="true"></i>Edit</a>
                    <a href="{{ route('Product.delete', ['id' => $prod->prod_id]) }}"><i class="fa fa-fw fa-pencil" aria-hidden="true"></i>Delete</a>
                </td>
            </tr>
        	@endforeach
        </tbody>
	 </table>
	</div>
</div>
</div>
@endsection

@section('script')
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script>
	    $(document).ready(function () {
	        $('#dataTables-product').DataTable();
	    });
	</script>

@endsection
