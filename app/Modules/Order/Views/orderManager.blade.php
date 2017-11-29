@extends('layouts.app')

@section('title')
    <title>Admin panel</title>
@endsection

@section('custom_css')
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/order.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endsection

@section('content')
@include('Admin::menu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 table_size">

    <table id="dataTables-product" class="table table-striped table-bordered table-hover " cellspacing="0" width="100%">
        <thead>
            <tr style="background: white;">
                <th>Order_ID</th>
                <th>Cusomer_ID</th>
                <th>Total Amount</th>
                <th>Update At</th>
                <th>State</th>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->customer_id }}</td>
                <td>{{ $order->total_amount }}</td>
                <td>{{ $order->updated_at }}</td>
                <td><?php 
                    switch ($order->state) {
                        case PENDING:
                            echo "PENDING";
                            break;
                        case PROCESSING:
                            echo "PROCESSING";
                            break;
                        case SHIPPING:
                            echo "SHIPPING";
                            break;
                        case RECEIVED:
                            echo "RECEIVED";
                            break;
                        case FAILED:
                            echo "FAILED";
                            break;
                        default:
                            echo "default";
                            break;
                    } 
                ?></td>
                <td>
                    <a href="{{ route('Order.next', ['order_id' => $order->order_id]) }}"><i class="fa fa-fw fa-pencil" aria-hidden="true"></i>Next</a>
                    <a href="{{ route('Order.cancel', ['order_id' => $order->order_id]) }}"><i class="fa fa-fw fa-pencil" aria-hidden="true"></i>Cancel</a>
                    <a href="{{ route('Order.reset', ['order_id' => $order->order_id]) }}"><i class="fa fa-fw fa-pencil" aria-hidden="true"></i>Reset</a>
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