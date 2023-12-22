@extends('layouts.master')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/web3@1.5.3/dist/web3.min.js"></script>
    <script src="{{ asset('home/web3.js') }}"></script>
    <script src="{{ asset('home/home.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
			document.getElementById('connectWalletBtn').addEventListener('click', function (event) {
				event.preventDefault();
				connectToMetaMask();
			});

			document.getElementById('placeOrderBtn').addEventListener('click', function (event) {
				event.preventDefault();
				// Kiểm tra xem MetaMask có được kết nối không trước khi đặt hàng
				checkMetaMaskConnection();
			});

			function checkMetaMaskConnection() {
				// Kiểm tra xem MetaMask có được kết nối không
				if (isMetaMaskConnected()) {
					// MetaMask được kết nối, tiếp tục với việc đặt hàng
					document.getElementById('orderForm').submit();
				} else {
					// MetaMask không được kết nối, hiển thị một thông báo hoặc xử lý theo cách cần thiết
					alert('Vui lòng kết nối ví MetaMask trước khi đặt hàng.');
				}
			}
			
		});
    </script>
@endsection

@php
    $baseUrl = config('app.base_url');
@endphp

@section('content')
    <section id="cart_items">
        <div class="container">

			<button id="connectWalletBtn" class="btn btn-primary btn-sm">Kết nối ví MetaMask</button>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                    <li class="active">Thanh toán giỏ hàng</li>
                    <li id="tenViMetaMark">Ví MetaMask</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="review-payment">
                <h2>Thông tin của bạn đã được ghi nhận</h2><br>
            </div>

            <form id="orderForm" action="{{ URL::to('/order-place') }}" method="POST">
                {{ csrf_field() }}
                <div class="payment-options">
                    <h2>Vui lòng chọn hình thức thanh toán: </h2>

                    <span>
                        <label><input name="payment_option" value="2" type="checkbox"> Thanh toán khi nhận hàng</label>
                    </span>

                    <input id="placeOrderBtn" type="button" value="Đặt hàng" name="send_order_place"
                           class="btn btn-primary btn-sm">
                    
                </div>
            </form>
        </div>
    </section> <!--/#cart_items-->

@endsection
