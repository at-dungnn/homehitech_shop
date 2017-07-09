<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Contact;
use App\Category;
use Cart;

class CartController extends Controller
{
    public function getIndex(){  
    	$total              	=   Cart::getTotalQuantity();
    	$cartCollection 		= 	Cart::getContent();
    	$contact				=	Contact::all()->first();
    	$category           	=   Category::all();
    	$totalMoney				= 	Cart::getTotal();
    	// dd($cartCollection);
    	return view('layouts.cart-content',compact('total','totalMoney','cartCollection','contact','category'));
    }

    public function postAddCart(Request $request){
    	
    	$product  = Product::where('id',$request->id)->get()->first();
    	
    	if($product){
    		$add = Cart::add(array(
				    'id' 		=> $product->id,
				    'name' 		=> $product->ten_sanpham,
				    'price' 	=> $product->gia,
				    'quantity' 	=> $request->quantity,
				    'attributes'=> array(
				    	'ma_sanpham'=> $product->ma_sanpham,
				        'img_path'	=> $product->img_path
				     )				    
				));
	    	$isEmpty 				= 	Cart::isEmpty();
	    	$cartCollection 		= 	Cart::getContent();
	    	$cartTotalQuantity 		= 	Cart::getTotalQuantity();

	    	$count					=	$cartCollection->count();
	    	$subTotal 				= 	Cart::getSubTotal();
	    	$total 					= 	Cart::getTotal();
	    	return response()->json(array(
	    			'response'				=>	true,
	    			'cartTotalQuantity'		=>	$cartTotalQuantity
	    		));	
    	}else{
    		return response()->json(array(
    				'response'				=>	true,
	    			));
    	}    	
    }

    //Remove Cart
    public function postDelete(Request $request){

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

    //Update Cart
    public function postUpdate(Request $request){

    	$product  = Product::where('id',$request->id)->get()->first();
    	if($product){
    		Cart::update($product->id, array(
			  'quantity' => array(
						      'relative' => false,
						      'value' => $request->val
						  ),
			));
    		$idProduct 				=	Cart::get($product->id);
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
	    			'idProduct'				=>	$idProduct,
	    		));	
    	}else{
    		return response()->json(array(
    				'response'				=>	true,
	    			));
    	}
    }
    public function getCheckOut(){
    	$contact				=	Contact::all()->first();
    	$category           	=   Category::all();
    	$total              	=   Cart::getTotalQuantity();
    	return view('layouts.cart-checkout',compact('contact','category','total'));
    }
}