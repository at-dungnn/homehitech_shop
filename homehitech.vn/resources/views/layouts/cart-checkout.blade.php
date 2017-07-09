@extends('layouts.master')
@section('cart-content')
<div class="container">
	<section id="do_action">
		<div class="container">
			<div class="row form-horizontal">
				<div class="col-md-12">
					<div class="chose_area">
						<form action="" method="POST" class="form-horizontal" role="form">												
								<div class="form-group">
									<label class="control-label col-md-2 ">Họ và tên</label>
									<div class="col-md-6">
										<input type="text" name="fullname" class="form-control fullname">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 ">Số điện thoại</label>
									<div class="col-md-6">
										<input type="text" name="phone" class="form-control phone">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 ">Email</label>
									<div class="col-md-6">
										<input type="text" name="email" class="form-control email">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 ">Ghi chú</label>
									<div class="col-md-6">
										<textarea name="note" id="note" class="note form-control col-md-6" rows="10"></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-2">
										<button type="submit" class="btn btn-primary">Đặt hàng</button>
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
</div>
@endsection