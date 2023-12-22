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
<div class="content">
  <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                        <h2 style="text-align:center;" >Danh sách sản phẩm truy xuất</h2>
                            <th scope="col">Tên nhà bán lẻ</th>
                            <th scope="col">Tên Đại lý</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá tiền</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($order_by_id as $order_by_id_item)
                        <tr>
                            <td>{{ $order_by_id_item -> shipping_name}}</td>
                            <td>Đại lý của tôi</td>
                            <td>{{ $order_by_id_item -> shipping_phone}}</td>
                            <td>{{ $order_by_id_item -> product_name}}</td>
                            <td>ảnh</td>
                            <td>{{ $order_by_id_item -> product_sales_quantity}}</td>
                            <td>{{ $order_by_id_item -> product_price}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-12">
               
            </div>      
        </div>
      </div>
    </div>
@endsection

