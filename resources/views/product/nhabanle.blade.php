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
	<h2 style="text-align:center;">DANH SÁCH NHÀ BÁN LẺ</h2>
        <div class="historycss" style="padding-left:400px;padding-right:220px;">
            <table class="table" style ="width:700px;text-align:center; border:3px solid black;">
                    <thead>
                        <tr >
                            <th scope="col" 
                            style ="text-align:center; font-size:25px;background: #F68B92;"
                                >Nhà bán lẻ</th>       
                                         
                            <th scope="col" 
                            style ="text-align:center;font-size:25px;background: #F68B92;"
                                >Chi tiết</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($all_order as $order)
                            <tr>
                                <td>{{ $order -> customer_name  }}</td>                           
                                <td>
                                    <a href="{{ URL::to('/view-truyxuat/'. $order -> order_id) }}" class="btn btn-default">Xem sản phẩm</a>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
                <br>
                <br>
	
@endsection

