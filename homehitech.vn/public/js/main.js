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
        	if(confirm("Bạn chắc chắn muốn xóa sản phẩm này không?")){
                $.ajax({
                type        :   'POST',
                url         :   '/delete-cart',
                dataType    :   'json',
                data        :   {
                    id      : id
                },
                success: function(res) {
    				if(res.response==true){
                        showNotification("Xóa sản phẩm trong giỏ hàng thành công!","success");
                        $(".total-cart").text(res.cartTotalQuantity);
                        $(".tong_tien").text(formatMoney(res.total));
    					_this.closest('tr').remove();
    				}
                }
            });
        }
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
                    var price = _this.closest('tr').find('.cart_price').text().replace(/,/gi,'');
					var price = parseInt(price);
					var total = price * val;
					_this.closest('tr').find('.cart_total_price').text(formatMoney(total)+" VNĐ");
                    $(".tong_tien").text(formatMoney(res.total));

				}
            }
        });
        } catch (e) {
            alert('icons-list li a:' + e.message);
        }
    });

    $(document).on("click",".add-to-cart",function(){
    	var id 			= $(this).data('id');
    	// var total_cart 	= parseInt($(".total-cart").text());
    	addToCart(id,1);
    });

    $(document).on("click",".productDetail",function(){        
        var id = $(this).data('id');
        searchProduct(id);
    });

    $(document).on("click",".add_to_cart_button",function(){        
        var id       = $(this).data('id');
        var quantity = $(this).closest('.buttons_added').find('.quantity').val();
        addToCart(id,quantity);
    });

    $(document).on("click",".cart-checkout",function(){
        var data = $(".form-checkout").serialize();  
        showNotification("Đặ hàng thành công!","success");   
        window.location.href = '/';   
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
            success: function(res) {
                if(res.response == true){
                    $.each(res.product,function(key, value ){
    				     var giam_gia = value['giam_gia']* value['gia']/100;
                         var cong_suat;
                         var kich_thuoc;
                         var quang_thong;
                         var giam_gia;
                         gia      = '<div class="divTableRow">'                                             
                                        +'<div class="divTableCell">Giảm còn:</div>'
                                        +'<div class="divTableCellRight">'+value['gia']+' VNĐ</div>'                                            
                                    +'</div>';
                         giam_gia = value['gia'] - value['giam_gia'];
                         if(value['cong_suat'] != ''){
                            cong_suat = '<div class="divTableRow">'                                             
                                            +'<div class="divTableCell">Công suất:</div>'
                                            +'<div class="divTableCellRight">'+value['cong_suat']+'</div>'                                            
                                        +'</div>';
                         }
                         if(value['kich_thuoc'] != ''){
                            kich_thuoc = '<div class="divTableRow">'                                             
                                            +'<div class="divTableCell">Kích thước:</div>'
                                            +'<div class="divTableCellRight">'+value['kich_thuoc']+'</div>'                                            
                                        +'</div>';
                         }
                         if(value['quang_thong'] != ''){
                            quang_thong = '<div class="divTableRow">'                                             
                                            +'<div class="divTableCell">Quang thông:</div>'
                                            +'<div class="divTableCellRight">'+value['quang_thong']+'</div>'                                            
                                        +'</div>';
                         }
                         if(value['giam_gia'] != ''){
                            giam_gia = '<div class="divTableRow">'                                             
                                            +'<div class="divTableCell">Giảm còn:</div>'
                                            +'<div class="divTableCellRight">'+giam_gia+' VNĐ</div>'                                            
                                        +'</div>';
                            gia      = '<div class="divTableRow">'                                             
                                            +'<div class="divTableCell">Giảm còn:</div>'
                                            +'<div class="divTableCellRight"><strike>'+value['gia']+'</strike> VNĐ</div>'                                            
                                        +'</div>';
                         }
    				     
    				     html = html.concat('<div class="col-sm-4">'
    							+'<div class="product-image-wrapper">'
    								+'<div class="single-products">'
    										+'<div class="productinfo text-center">'
    											+'<img src="'+url+'upload/product/'+value['img_path']+'" alt="" />'
    											+'<span class="productDetail" data-id="'+value['img_path']+'" data-toggle="modal" data-target="#myModal"><h2>Mã : '+value['ma_sanpham']+'</h2></span>'
    											+'<div class="divTable">'
    											+ cong_suat
    											+ kich_thuoc
    											+ quang_thong
    											+ gia
                                                + giam_gia
                                                +'</div>'
    											+'<a class="btn btn-default add-to-cart" data-id="'+value['id']+'"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>'
    										+'</div>'
    								+'</div>'
    							+'</div>'
    						+'</div>');
    				});
    				$("#list_product").html("");
    				$("#list_product").html(html);
                }else{
                    $("#list_product").html("kHÔNG CÓ SẢN PHẨM NÀO!");
                }
            }
        });
    } catch (e) {
         console.log('search: ' + e.message);
    }
}

function searchProduct(id){
    try {
        $.ajax({
            type        :   'POST',
            url         :   '/search-product-detail',
            dataType    :   'json',
            data        :   {
                id      : id
            },
            success: function(res) {
                if(res.response == true){
                    var giam_gia;
                    var gia;
                    var html;
                    if(res.product['giam_gia'] != ''){
                        giam_gia    = res.product['giam_gia'] * res.product['gia'] / 100;
                        gia         = formatMoney(parseInt(res.product['gia']) - parseInt(giam_gia));
                        html        = '<b>Giá gốc:</b> <strike>'+formatMoney(res.product['gia'])+'</strike> VNĐ | <b>Giảm còn:</b> '+gia+' VNĐ';
                    }else{
                        html        = '<b>Giá:</b> '+ formatMoney(res.product['gia']) +' VNĐ';
                    }
                    $(".img-detail").attr('src',url+'upload/product/'+res.product['img_path']);
                    $(".title-detail").text(res.product['ten_sanpham']);
                    $(".price-detail").html(html);
                    $(".content-detail").html(res.product['thong_so']);
                    $(".add_to_cart_button").attr('data-id',res.product['id']);
                }else{

                }
            }
        });
    } catch (e) {
        console.log('searchProduct: '+e.message);
    }
}

function addToCart(id,quantity){
    try{
        $.ajax({
            type        :   'POST',
            url         :   '/add-to-cart',
            dataType    :   'json',
            data        :   {
                id      : id,
                quantity: quantity
            },
            success: function(res) {
                $(".total-cart").text(res.cartTotalQuantity);
                $(".close").trigger("click");
                showNotification("Thêm sản phẩm vào giỏ hàng thành công!","success");
                var body = $("html, body");
                body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
                   $(".total-cart").addClass('shake');
                });

                
            }
        });
    } catch (e) {
        console.log('searchProduct: '+e.message);
    }
}
