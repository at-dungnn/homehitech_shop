@extends('layouts.master')
@section('blog-content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="blog-post-area">
						<div class="single-blog-post">
							<h3>{{$news->title}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-clock-o"></i> {{substr($news->created_at,11,5)}}</li>
									<li><i class="fa fa-calendar"></i> {{substr($news->created_at,0,10)}}</li>
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
								<img src="../../upload/news/{{$news->img_path}}" alt="">
							</a>
							<p>{!!$news->content!!}</p>
						</div>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection