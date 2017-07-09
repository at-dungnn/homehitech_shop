@extends('layouts.master')
@section('cart-content')
		<section id="cart_items">
		<div class="container">
			<!-- <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#"></a></li>
				  <li class="active"></li>
				</ol>
			</div> -->
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description">Mô tả sản phẩm</td>
							<td class="price">Giá tiền</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($cartCollection as $key=>$val)
						<tr>
							<td class="cart_product">
								<a href=""><img src="../upload/product/{{ $val->attributes->img_path }}" alt="" width="110px" height="110px"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $val->name }}</a></h4>
								<p>Mã Sản Phẩm: {{ $val->attributes->ma_sanpham }}</p>
							</td>
							<td class="cart_price">
								<p>{{ number_format($val->price) }} VNĐ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" data-id="{{ $val->id }}" type="text" name="quantity" value="{{ $val->quantity }}" autocomplete="off" size="2">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ number_format($val->quantity * $val->price) }} VNĐ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" data-id="{{ $val->id }}"><i class="fa fa-times" style="cursor: pointer;"></i></a>
							</td>
						</tr>
						@endforeach
						<tr><td colspan="4"></td><td><b>Tổng tiền: <span class="tong_tien">{{number_format($totalMoney)}}</span> VNĐ</b></td></tr>
					</tbody>
				</table>
				<div class="row pull-right" style="margin: 20px;">
					<a href='{{route('gio-hang.checkout')}}' class="btn btn-default check_out" href="">Thanh toán</a>
				</div><br>
			</div>
			
		</div>
	</section> <!--/#cart_items-->
@endsection