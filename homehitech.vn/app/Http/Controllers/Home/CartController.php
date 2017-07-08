<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Cart;
class CartController extends Controller
{
	public function getAddCart(){
    	return view('home.cart',['isActive'=>'main']);
    }
	//https://github.com/darryldecode/laravelshoppingcart
    //Add cart
    public function postAddCart(Request $request){
    	
    	$product  = Product::where('id',$request->id)->get()->first();
    	
    	if($product){
    		$add = Cart::add(array(
				    'id' 		=> $product->id,
				    'name' 		=> $product->ten_sanpham,
				    'price' 	=> $product->gia,
				    'quantity' 	=> 1
				));
	    	$isEmpty 				= 	Cart::isEmpty();
	    	$cartCollection 		= 	Cart::getContent();
	    	$cartTotalQuantity 		= 	Cart::getTotalQuantity();

	    	$count					=	$cartCollection->count();
	    	$subTotal 				= 	Cart::getSubTotal();
	    	$total 					= 	Cart::getTotal();
	    	return response()->json(array(
	    			'response'				=>	true,
	    			'isEmpty'				=>	$isEmpty,
	    			'cartCollection'		=>	$cartCollection,
	    			'cartTotalQuantity'		=>	$cartTotalQuantity,
	    			'count'					=>	$count,
	    			'total'					=>	$total,
	    		));	
    	}else{
    		return response()->json(array(
    				'response'				=>	true,
	    			));
    	}
    	
    }

    //Remove Cart
    public function postRemoveCart(Request $request){

    	$product  = Product::where('id',$request->id)->get()->first();
    	if($product){
    		Cart::remove($product->id);

    		$isEmpty 				= 	Cart::isEmpty();
	    	$cartCollection 		= 	Cart::getContent();
	    	$cartTotalQuantity 		= 	Cart::getTotalQuantity();

	    	$count					=	$cartCollection->count();
	    	$subTotal 				= 	Cart::getSubTotal();
	    	$total 					= 	Cart::getTotal();
	    	
	    	return response()->json(array(
	    			'response'				=>	true,
	    			'isEmpty'				=>	$isEmpty,
	    			'cartCollection'		=>	$cartCollection,
	    			'cartTotalQuantity'		=>	$cartTotalQuantity,
	    			'count'					=>	$count,
	    			'total'					=>	$total,
	    		));	
    	}else{
    		return response()->json(array(
    				'response'				=>	true,
	    			));
    	}
    }

    // Remove all cart
    public function postClearCart(Request $request){

    	if($request->ajax()){
    		Cart::clear();
			$isEmpty 				= 	Cart::isEmpty();
	    	$cartCollection 		= 	Cart::getContent();
	    	$cartTotalQuantity 		= 	Cart::getTotalQuantity();

	    	$count					=	$cartCollection->count();
	    	$subTotal 				= 	Cart::getSubTotal();
	    	$total 					= 	Cart::getTotal();
	    	
	    	return response()->json(array(
	    			'response'				=>	true,
	    			'isEmpty'				=>	$isEmpty,
	    			'cartCollection'		=>	$cartCollection,
	    			'cartTotalQuantity'		=>	$cartTotalQuantity,
	    			'count'					=>	$count,
	    			'total'					=>	$total,
	    		));
    	}else{
    		return response()->json(array(
    				'response'				=>	true,
	    			));   		
    	}
    }
    
}
