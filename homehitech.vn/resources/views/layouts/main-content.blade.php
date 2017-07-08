@extends('layouts.master')
@section('main-content')

<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>H</span>-OME ONLINE</h1>
									<h2>Đèn Âm Trần</h2>
									<p>Sản phẩm chất lượng, mẫu mả đa dạng phong phú, có bảo hành</p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/slide.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>H</span>-OME ONLINE</h1>
									<h2>Đèn Trang Trí</h2>
									<p>Sản phẩm chất lượng, mẫu mả đa dạng phong phú, có bảo hành</p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/slide1.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>H</span>-OME ONLINE</h1>
									<h2>Đèn chiếu sáng</h2>
									<p>Sản phẩm chất lượng, mẫu mả đa dạng phong phú, có bảo hành</p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/slide2.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục</h2>
						<div class="panel-group category-products" id="accordian">
							@foreach($menu as $menu_value)
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordian" href="#{{$menu_value['id']}}">
												<span class="badge pull-right"><i class="fa fa-plus"></i></span>
												{{$menu_value['name']}}
											</a>
										</h4>
									</div>
									<div id="{{$menu_value['id']}}" class="panel-collapse collapse">
										<div class="panel-body">
											<ul>
												@foreach($category as $category_value)
													@if ($menu_value['id'] == $category_value['parent_id'])
														<li class="data_product" data-id ="{{$category_value['id']}}" style="cursor:pointer;">{{$category_value['name']}}</li>
													@endif
												@endforeach
											</ul>
										</div>
									</div>
								</div>
							@endforeach
						</div><!--/category-products-->


						<div class="brands_products"><!--brands_products-->
							<h2>Tin Tức</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($news as $key => $val)
										<li><a href="/blog/detail/{{$val->slug}}" >{{$val->title}}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Danh sách sản phẩm</h2>
						<div id="list_product">
							@foreach($product as $key=>$val)
								<?php $gia = $val->giam_gia*$val->gia/100;?>
								<div class="col-sm-4">
								   <div class="product-image-wrapper">
								      <div class="single-products">
								         <div class="productinfo text-center" title="{{$val->ten_sanpham}}">
								            <img src="upload/product/{{$val->img_path}}" alt="">
								            <h2>Mã : {{$val->ma_sanpham}}</h2>
								            <p>Công suất : {{$val->cong_suat}}</p>
								            <p>Kích thước : {{$val->kich_thuoc}}</p>
								            <p>Quang thông : {{$val->quang_thong}}</p>
								            <p>Giá {{$val->gia}}</p>
								            <p>Giảm giá : {{$val->gia-$gia}}</p>
								            <a class="btn btn-default add-to-cart" data-id="{{$val->id}}"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
								         </div>
								      </div>
								      <div class="choose">
								         <ul class="nav nav-pills nav-justified">
								            <li><a href="#"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>
								         </ul>
								      </div>
								   </div>
								</div>
							@endforeach
						</div>
						
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
@endsection

