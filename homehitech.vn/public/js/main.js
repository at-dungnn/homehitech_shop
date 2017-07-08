/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
    
	$(document).on('click','.data_product',function(){
        try {
        	var id = $(this).attr('data-id');
            search(id);
        } catch (e) {
            alert('icons-list li a:' + e.message);
        }
    });

    $(document).on('click','.cart_quantity_delete',function(){
        try {
        	var _this 	= $(this);
        	var id 		= _this.data('id');
        	

            $.ajax({
            type        :   'POST',
            url         :   '/delete-cart',
            dataType    :   'json',
            data        :   {
                id      : id
            },
            success: function(res) {
				if(res.response==true){
					_this.closest('tr').remove();
				}
            }
        });
        } catch (e) {
            alert('icons-list li a:' + e.message);
        }
    });

    $(document).on('change','.cart_quantity_input',function(){
        try {
        	var _this 	= $(this);
        	var id 		= _this.data('id');
        	var val 	= _this.val();

            $.ajax({
            type        :   'POST',
            url         :   '/update-cart',
            dataType    :   'json',
            data        :   {
                id      : id,
                val 	: val
            },
            success: function(res) {
				if(res.response==true){
					// _this.closest('tr').remove();
					var price = parseInt(_this.closest('tr').find('.cart_price').text());
					var total = price * val;
					total = total.toFixed(3).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString().replace(".000","");
					console.log(total);
					_this.closest('tr').find('.cart_total_price').text(total);

				}
            }
        });
        } catch (e) {
            alert('icons-list li a:' + e.message);
        }
    });
	// click list product
        // $(document).on('click','.data_product',function(){
        //     try {
        //             var id = $(this).attr('data_id');
        //             search(id);
        //     } catch (e) {
        //         alert('data_product:' + e.message);
        //     }
        // });
    $(document).on("click",".add-to-cart",function(){
    	var id 			= $(this).data('id');
    	// var total_cart 	= parseInt($(".total-cart").text());
    	$.ajax({
            type        :   'POST',
            url         :   '/add-to-cart',
            dataType    :   'json',
            data        :   {
                id      : id
            },
            success: function(res) {
            	$(".total-cart").text(res.cartTotalQuantity);
            	var body = $("html, body");
				body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
				   $(".total-cart").addClass('shake');
				});
				
            }
        });
    });

});

/**
 * search
 *
 * @author      :   ANS803 - 2017/01/10 - create
 * @param       :
 * @return      :   null
 * @access      :   public
 * @see         :   init
 */
function search(id) {
    try {
        var html = '';
        //
        $.ajax({
            type        :   'POST',
            url         :   '/search-product',
            dataType    :   'json',
            data        :   {
                //_token        : CSRF_TOKEN,
                id      : id
            },
            beforeSend: function(){
                $("#list_product").html("");
                $("#list_product").html("<img src='images/giphy.gif' class = 'format_loading'>");
            },
            success: function(res) {
                $.each(res.product,function(key, value ){
				     var giam_gia = value['giam_gia']* value['gia']/100;
				     giam_gia = value['gia'] - value['giam_gia'];
				     html = html.concat('<div class="col-sm-4">'
							+'<div class="product-image-wrapper">'
								+'<div class="single-products">'
										+'<div class="productinfo text-center">'
											+'<img src="upload/product/'+value['img_path']+'" alt="" />'
											+'<h2>Mã : '+value['ma_sanpham']+'</h2>'
											+'<p>Công suất : '+value['cong_suat']+'</p>'
											+'<p>Kích thước : '+value['kich_thuoc']+'</p>'
											+'<p>Quang thông : '+value['quang_thong']+'</p>'
											+'<p>Giá '+value['gia']+'đ</p>'
											+'<p>Giảm giá : '+giam_gia+'đ</p>'
											+'<a class="btn btn-default add-to-cart" data-id="'+value['id']+'"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>'
										+'</div>'
								+'</div>'
								+'<div class="choose">'
									+'<ul class="nav nav-pills nav-justified">'
										+'<li><a href="#"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>'
									+'</ul>'
								+'</div>'
							+'</div>'
						+'</div>');
				});
				$("#list_product").html("");
				$("#list_product").html(html);
            }
        });
    } catch (e) {
         alert('search' + e.message);
    }
}
