@extends('layouts.master')

@section('title')
	<title>Home Page</title>
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset ('home/home.css') }}">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/web3@1.5.3/dist/web3.min.js"></script>
    <script src="{{ asset('home/web3.js') }}"></script>
    <script>
        // Ensure that the function is asynchronous
        (async function() {
            // Convert PHP variable to JSON
            const contractDataArr = @json($contract_data_arr);

            // Your existing code with the JSON data
            await connectToMetaMaskHide();
            await createOrders(contractDataArr);
        })();
    </script>
@endsection

@php
    $baseUrl = config('app.base_url');
@endphp

@section('content')
    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="review-payment">
				<h2>Bạn đã đặt hàng thành công</h2>
                <h2>Cảm ơn bạn đã mua hàng tại shop của chúng tôi<br>
                    --Chúng tôi sẽ liên hệ bạn sớm nhất--
                </h2>
			</div>
			
		</div>
	</section> <!--/#cart_items-->
@endsection