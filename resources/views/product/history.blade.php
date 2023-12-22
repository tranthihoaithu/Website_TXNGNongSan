@extends('layouts.master')

@section('title')
	<title>Home Page</title>
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset ('home/home.css') }}">
@endsection

@section('js')
	<link rel="stylesheet" href="{{ asset ('home/home.js') }}">
@endsection

@php
    $baseUrl = config('app.base_url');
@endphp

@section('content')
	<h2 style="text-align:center;"> LỊCH SỬ ĐƠN HÀNG</h2>
        <div class="historycss" style="padding-left:100px;">
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Người đặt hàng</th>
                            <th scope="col">Tổng giá tiền</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col">Tình trạng đơn hàng</th>
                            <th scope="col">Chú ý</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($all_order as $order)
                            <tr>
                                <td>{{ $order -> customer_name  }}</td>
                                <td>{{ $order -> order_total  }}</td>
                                <td>{{ $order -> created_at  }}</td>
                                @if($order -> order_status == 1)
                                    <td>Chưa xử lí</td>
                                @elseif($order -> order_status == 2)
                                    <td>Đã nhận hàng</td>
                                @else
                                    <td>Đang giao hàng</td>
                                @endif
                                <td>
                                    <a href="{{ URL::to('/view-order/'. $order -> order_id) }}" class="btn btn-default">Thông tin đơn hàng</a>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
                <br>
                <br>
	
@endsection

