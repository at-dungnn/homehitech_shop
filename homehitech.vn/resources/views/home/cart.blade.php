<!DOCTYPE html>
<html lang="en" class="app">

<head>
    <meta charset="utf-8" />
    <title>Demo Add Card</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<div class="container">
<h3>Bật F12 lên xem tab Console và Network</h3>
	<form action="" method="POST" class="form-horizontal" role="form">		
		<div class="form-group">
            <label class="col-sm-2 control-label">
                ID Product
            <span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="text" name="cart" class="product-id form-control col-md-4" placeholder="Nhập ID của sản phẩm">
            </div>
        </div>

		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="button" class="add-cart btn btn-primary">Add Cart</button>
				<button type="button" class="remove-cart btn btn-danger">Remove Cart</button>
				<button type="button" class="remove-all-cart btn btn-danger">Remove All Cart</button>
			</div>
		</div>
	</form>


<div class="details"></div>
</div>

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
</script>
<script type="text/javascript">
	$( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
	$(".add-cart").click(function(){
		var id = $(".product-id").val();
		$.ajax({
			url: '{{ route('home.cart.add') }}',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
		})
		.done(function(res) {
			$(".details").text(JSON.stringify(res));
			console.log(res);
		})
		.fail(function(e) {
			console.log(e.message);
		})		
	});

	$(".remove-cart").click(function(){
		var id = $(".product-id").val();
		$.ajax({
			url: '{{ route('home.cart.remove-add') }}',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
		})
		.done(function(res) {
			$(".details").text(JSON.stringify(res));
			console.log(res);
		})
		.fail(function(e) {
			console.log(e.message);
		})		
	});

	$(".remove-all-cart").click(function(){
		var id = $(".product-id").val();
		$.ajax({
			url: '{{ route('home.cart.clear-add') }}',
			type: 'POST',
			dataType: 'json',
			data: {clear: 'all'},
		})
		.done(function(res) {
			$(".details").text(JSON.stringify(res));
			console.log(res);
		})
		.fail(function(e) {
			console.log(e.message);
		})		
	});

});
</script>
</body>

