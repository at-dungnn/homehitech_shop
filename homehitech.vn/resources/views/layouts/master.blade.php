<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:url"           content="http://homehitech.vn" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="HomeHiTech" />
    <meta property="og:description"   content="Nhà Phân Phối Đèn LED Chiếu Sáng Cao Cấp - Uy Tín Hàng Đầu" />
    <meta property="og:site_name"     content="Nhà Phân Phối Đèn LED Chiếu Sáng Cao Cấp" />
    <title>HomeShop | HomeHiTech</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
	<link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
	<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
	<link href="{{ asset('css/dev_dung.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dev_viet.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       


    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head><!--/head-->
<script>
    var SESSION_LIFE_TIME = "{{ config('session.lifetime') }}"; 
    var url = '{{(!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/'}}'
</script>
<body>
	<header id="header"><!--header-->	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="tel:09088688888"><i class="fa fa-phone"></i>090 88 68 8888</a></li>
								<li><a href="mailto:thao-np@homehitech.vn"><i class="fa fa-envelope"></i> thao-np@homehitech.vn</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{$contact->facebook}}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="skype:{{$contact->skype}}?chat"><i class="fa fa-skype"></i></a></li>
								<li><a href="mailto:{{$contact->email}}"><i class="fa fa-envelope"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row" style="background-color: #f0f0e9;">
					<div class="logo pull-left">						
						<a href="{{route('index')}}"><img src="{{ asset('images/home/logo.png') }}" alt="" /></a>
					</div>
					<div class="pull-right">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href='/' class="active"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a></li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Sản Phẩm
						        <span class="caret"></span></a>
						        <ul class="dropdown-menu">
							          @foreach($category as $key=>$val)
							          	@if($val->parent_id == 0)
							          		<li class="dropdown-header">
							          			{{$val->name}}
							          		</li>
							          		@foreach($category as $key2=>$val2)
							          			@if($val2->parent_id == $val->id)
							          			<li>
								          			<a href="{{route('san-pham',$val2->slug)}}">{{$val2->name}}</a>
								          		</li>
								          		@endif
							          		@endforeach
							          	@endif
							          @endforeach
								</ul>
							</li>
							<li><a href="{{route('tin-tuc')}}">Tin tức</a></li> 
							<li><a href="{{route('lienhe')}}">Liên Hệ</a></li>
							<li><a href="{{route('gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
							<li><span class="btn btn-sm btn-danger total-cart ">{{ $total }}</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header>

	@yield('main-content')
	@yield('blog-content')
	@yield('cart-content')
	@yield('lienhe-content')
	
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>h</span>-ome - Online</h2>
							<p>Chuyên cung cấp sản phẩm đèn, thiết bị viễn thông, camera</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img class="img-responsive" src=" {{ asset('images/home/frame1.png')}}" alt="" />
										
										<!-- <img src="images/home/frame1.png" alt="" /> -->
									</div>
								</a>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img class="img-responsive" src=" {{ asset('images/home/frame2.png')}}" alt="" />
										<!-- <img src="images/home/frame2.png" alt="" /> -->
									</div>
								</a>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img class="img-responsive" src=" {{ asset('images/home/frame3.png')}}" alt="" />
										<!-- <img src="images/home/frame3.png" alt="" /> -->
									</div>
								</a>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img class="img-responsive" src=" {{ asset('images/home/frame4.png')}}" alt="" />
										<!-- <img src="images/home/frame4.png" alt="" /> -->
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img class="img-responsive" src=" {{ asset('images/home/map.png')}}" alt="" />
							<!-- <img src="images/home/map.png" alt="" /> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row footer-contact">
					<div class="col-sm-4">
						<div class="single-widget" style="text-align: justify;line-height: 26px;">
							<h2>HomeHiTech - Giới thiệu</h2>
							<p>
								Đại lý phân phối chính hãng của các loại đèn led chiếu sáng chất lượng tốt, có danh tiếng trên thị trường Việt Nam như: Kingled, TLC, ...
								Các sản phẩm Đèn led được bày bán tại website luôn là các sản phẩm chính hãng, bảo hành chính hãng.
								Hình ảnh và nội dung về các sản phẩm bóng đèn led chiếu sáng rõ ràng, mạch lạc, chuẩn với thực tế sản phẩm, luôn cập nhật bảng báo giá liên tục, và các hỗ trợ của nhà sản xuất
							</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="single-widget" style="text-align: justify;line-height: 26px;">
							<h2>Giải pháp</h2>
							<p>Gói lắp rắp hệ thống đèn điện cho ngôi nhà của bạn</p>
							<p>Gói lắp rắp thiết bị viễn thông</p>
							<p>Gói lắp rắp thiết bị chống trộm</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="single-widget" style="text-align: justify;line-height: 26px;">
							<h2>Thông tin liên hệ</h2>
							<div class="contact">
								Địa chỉ: {{$contact->address}}<br>
								Email: {{$contact->email}}<br>								
								Số điện thoại: {{$contact->phone_congty}}<br>
								Hotline: {{$contact->phone_canhan}}<br>
								Skype: {{$contact->skype}}<br>
								Facebook: {{$contact->facebook}}<br>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2017 HOME HITECT Inc. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->
	<div class="call">
		<a href="tel:{{$contact->phone_canhan}}" mypage="" class="call-now" rel="nofollow">
			<div class="mypage-alo-phone">
			<div class="animated infinite zoomIn mypage-alo-ph-circle"></div>
			<div class="animated infinite pulse mypage-alo-ph-circle-fill"></div>
			<div class="animated infinite tada mypage-alo-ph-img-circle"></div>
		</a>
	</div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/price-range.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/blockUI/jquery.blockUI.js') }}"></script>
    <script src="{{asset('backend/js/bootstrap-notify-master/bootstrap-notify.min.js')}}"></script>
    <script src='{{ asset('common/common.js') }}'></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <div id="fb-root"></div>

      <script>
	      (function(d, s, id) {

	      var js, fjs = d.getElementsByTagName(s)[0];

	      if (d.getElementById(id)) return;

	      js = d.createElement(s); js.id = id;

	      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";

	      fjs.parentNode.insertBefore(js, fjs);

	      }(document, 'script', 'facebook-jssdk'));
      </script>

      <style>
       #cfacebook{
       		position:fixed;
       		bottom:0px;
       		right:10px;
       		z-index:2;
       		width:250px;
       		height:auto;
       		box-shadow:6px 6px 6px 10px rgba(0,0,0,0.2);
       		overflow:hidden;
       		margin-right: 50px;
       	}

        #cfacebook .fchat{
        	float:left;
        	width:100%;
        	height:270px;
        	overflow:hidden;
        	display:none;
        	background-color:#fff;
        }

        #cfacebook .fchat .fb-page{
        	margin-top:-130px;
        	float:left;
        }

        #cfacebook a.chat_fb{float:left;padding:0 25px;width:250px;color:#fff;text-decoration:none;height:40px;line-height:40px;text-shadow:0 1px 0 rgba(0,0,0,0.1);background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAqCAMAAABFoMFOAAAAWlBMV…8/UxBxQDQuFwlpqgBZBq6+P+unVY1GnDgwqbD2zGz5e1lBdwvGGPE6OgAAAABJRU5ErkJggg==);background-repeat:repeat-x;background-size:auto;background-position:0 0;background-color:#3a5795;border:0;border-bottom:1px solid #133783;z-index:9999999;margin-right:12px;font-size:15px;}

        #cfacebook a.chat_fb:hover{
        	color:yellow;
        	text-decoration:none;
        }

      </style>

      <script>

	      jQuery(document).ready(function () {

	      jQuery(".chat_fb").click(function() {

	      jQuery('.fchat').toggle('slow');

	      });

	      });

  	</script>

  <div id="cfacebook">

       <a href="javascript:;" class="chat_fb" onclick="return:false;"><i class="fa fa-facebook-square"></i> CHAT LIVE FACEBOOK</a>

      <div class="fchat">

        <div class="fb-page" data-tabs="messages" data-href="{{$contact->facebook}}" data-width="250" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>

      </div>

  </div>
</body>
</html>