@extends('layouts.master')
@section('blog-content')
		<section>
		<div class="container">
			<div class="row" style="margin-bottom: 3%;">
				<img src="images/blog/blog_banner.jpg" alt="" />
			</div>
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
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Danh mục bài viết</h2>
						@foreach($news as $key => $val)
						<div class="single-blog-post">
							<h3><a href="/blog/detail/{{$val->slug}}" >{{$val->title}}</a></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-clock-o"></i> {{substr($val->created_at,11,5)}}</li>
									<li><i class="fa fa-calendar"></i> {{substr($val->created_at,0,10)}}</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="../upload/news/{{$val->img_path}}" alt="">
							</a>
							<p>{!!$val->intro!!}</p>
							<a  class="btn btn-primary" href="/blog/detail/{{$val->slug}}">Xem chi tiết</a>
						</div>
						@endforeach
						<hr>
						{{ $news->render() }}
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection