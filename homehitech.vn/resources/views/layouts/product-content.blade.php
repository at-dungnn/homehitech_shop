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
						@foreach($banner as $key=>$val)
							<div class="item @if($key==0) active @endif">
							<div class="col-sm-12">
								<img class="img-responsive" src="{{asset('upload/banner/'.$val->img_path.'')}}" alt="" />
							</div>
						</div>
						@endforeach
						
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
									<li><a href="/blog/detail/{{$val->slug}}" ><i class="fa fa-angle-right" aria-hidden="true"></i>  {{$val->title}}</a></li>
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
							<?php 
								if($val->giam_gia != ''){
									$gia = $val->giam_gia * $val->gia / 100;
								}									
							?>
							<div class="col-sm-4">
							   <div class="product-image-wrapper">
							      <div class="single-products">
							         <div class="productinfo text-center" title="{{$val->ten_sanpham}}" >
							         	@if($val->giam_gia != '')
							         	<div class="sale absolute left top z-1">
							         		<div class="sale-left">-{{$val->giam_gia}}%</div>
							         	</div>
							         	@endif
							            <img src="upload/product/{{$val->img_path}}" alt="">
							            <span class="productDetail" data-id="{{$val->id}}" data-toggle="modal" data-target="#myModal">
							            	<h2>Mã : {{$val->ma_sanpham}}</h2>
							            </span>

										<div class="divTable">
										   <div class="divTableBody">
										   	   @if($val->cong_suat != '')
										      <div class="divTableRow">										      	
										         <div class="divTableCell">Công suất:</div>
										         <div class="divTableCellRight">{{$val->cong_suat}}</div>										        
										      </div>
										      @endif
										      @if($val->kich_thuoc != '')
										      <div class="divTableRow">										      	
										         <div class="divTableCell">Kích thước:</div>
										         <div class="divTableCellRight">{{$val->kich_thuoc}}</div>										        
										      </div>
										     	@endif
										      @if($val->quang_thong != '')
										      <div class="divTableRow">										      	
										         <div class="divTableCell">Quang thông: </div>
										         <div class="divTableCellRight">{{$val->quang_thong}}</div>										        
										      </div>
										      @endif
										      <div class="divTableRow">
										         <div class="divTableCell">Giá:</div>
										         <div class="divTableCellRight">
													@if($val->giam_gia != '')
														<strike>{{number_format($val->gia)}}</strike>
													@else 
													{{number_format($val->gia)}} 
													@endif 
													VNĐ
										         </div>
										      </div>
										      @if($val->giam_gia != '')
										      <div class="divTableRow">
										         <div class="divTableCell">Giảm còn:</div>
										         <div class="divTableCellRight">{{number_format($val->gia-$gia)}} VNĐ</div>
										      </div>
										      @endif
										   </div>
										</div>
										<a class="btn btn-default add-to-cart" data-id="{{$val->id}}"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
							        </div>
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
<!-- Modal -->

  <div class="modal fade col-md-12" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        	<div class="row">
	          <div class="col-md-6">
	          		<img src="" alt="" class="img-detail">
	          </div>
	          <div class="col-md-6">
	          		<h3><p class="title-detail"></p></h3>
					<div class="is-divider small"></div>
					<p class="price-detail"></p>
					<p class="content-detail"></p>
					<div class="">
				  		<div class="buttons_added">
		    				<input type="number" class="input-text qty text quantity" step="1" min="1" max="9999" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
		    				<button type="button"  class="add_to_cart_button button">Thêm vào giỏ hàng</button>
		    			</div>	  
					</div>
	          </div>
	        </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
        </div>
      </div>
    </div>
  </div>
 <!-- End Modal -->

@endsection

