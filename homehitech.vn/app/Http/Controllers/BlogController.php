<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use Cart;
class BlogController extends Controller
{
    public function getIndex(){  
    	$news               =   News::paginate(10);
        $menu               =   Category::where('parent_id',0)->get();
        $category           =   Category::all();
    	$total              =   Cart::getTotalQuantity();
    	return view('home.blog-content',compact('news','total','category','menu'));
    }

    public function showBlog($slug){
        $news               =   News::where('slug',$slug)->get()->first();
        $menu               =   Category::where('parent_id',0)->get();
    	$total              =   Cart::getTotalQuantity();
        $category           =   Category::all();
        // dd($news,$menu,$total,$category);
    	return view('home.blog-detail',compact('menu','news','category','total'));
    }

}