<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<!-- <li><a href="index.html"><img src="images/home/logo.png" alt="" /></a></li> -->
								<li><a href="#"><i class="fa fa-phone"></i>090 88 68 8888</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> thao-np@homehitech.vn</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-skype"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="shop-menu pull-right">
							<img class="img-responsive" src=" {{ asset('images/infor.jpg')}}" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row" style="background-color: #f0f0e9;">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href='/' class="active"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a></li>
								<li><a href="/blog">Tin tức</a></li> 
								<li><a href="/lienhe-homepage">Liên Hệ</a></li>
								<li><a href="/cart-homepage"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<li><span class="total-cart animated ">{{ $total }}</span></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
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
	
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/price-range.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
    	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</body>
</html>