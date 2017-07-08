<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;
use Session, Auth;
class NewsController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
    
    public function Index(){
    	return view('backend.news.news',['isActive'=>'news']);
    }

    public function getAdd(){
    	$category 	=	Category::where([['parent_id',0],['delete',0]])
    							->select('id','name')
    							->get();
    	return view('backend.news.news-add',['isActive'=>'news','category'=>$category]);
    }

    public function postAdd(Request $request){
    	$messages = [
                'title.required' 	   	=>'Tiêu đề không được để trống',
                'img_path.required'    	=>'Hình ảnh không được để trống',
                'intro.required'    	=>'Nội dung ngắn không được để trống',
                'content.required'    	=>'Nội dung không được để trống',
                'category_id.required'  =>'Danh mục không được để trống',
            ];
        $this->validate($request, [
                    'title'			=>'required',
                    'img_path'  	=>'required',
                    'intro'  		=>'required',
                    'content'  		=>'required',
                    'category_id' 	=>'required'
                    ], $messages);

        $filename='';
        if($request->hasFile('img_path')){
            $filename	=	time()."-".$request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->move('upload/news',$filename);
        }

    	$news 				=	New News;
    	$news->title 		=	$request->title;
    	$news->slug 		=	str_slug(trim($request->title));
    	$news->intro 		=	$request->intro;
    	$news->content 		=	$request->content;
    	$news->category_id 	=	$request->category_id;
    	$news->created_by 	=	Auth::user()->id;
    	$news->img_path		=	$filename;
    	$save				=	$news->save();

    	if($save){
            Session::flash('status', 'Thêm tin tức mới thành công!');
            return redirect()->route('admin.news');
        }else{
            return redirect()->back()->withErrors();
        } 
    }

    public function getList(){
        $news = News::where('news.title','!=','')
        			->leftJoin('users', function($join) {$join->on('news.created_by','=','users.id');})
                    ->leftJoin('category', function($join) {$join->on('category.id','=','news.category_id');})
                    ->select('news.id as id','news.title as title','news.intro as intro','category.name as category','users.name as created_by','news.created_at as created_at','news.updated_at')
                    ->orderBy('news.id', 'desc') 
                    ->get();
        return response()->json(array('data'=>$news));
    }

    public function postDelete(Request $request){

        $delete = News::where('id',$request->id)->delete();

        if ($delete) {
            return response()->json(array('status'=>'ok'));
        }else{
            return response()->json(array('status'=>'ng'));
        }
    }

    public function getEdit(Request $request){

    	$category 	=	Category::where([['parent_id',0],['delete',0]])
    							->select('id','name')
    							->get();
    	$news 		= 	News::where('id',$request->id)->get();

    	return view('backend.news.news-edit',['isActive'=>'news','category'=>$category,'data'=>$news]); 
    }

    public function postEdit(Request $request){
    	$messages = [
                'title.required' 	   	=>'Tiêu đề không được để trống',
                'intro.required'    	=>'Nội dung ngắn không được để trống',
                'content.required'    	=>'Nội dung không được để trống',
                'category_id.required'  =>'Danh mục không được để trống',
            ];
        $this->validate($request, [
                    'title'			=>'required',
                    'intro'  		=>'required',
                    'content'  		=>'required',
                    'category_id' 	=>'required'
                    ], $messages);

        $filename='';
        if($request->hasFile('img_path')){
            $filename	=	time()."-".$request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->move('upload/news',$filename);
        }

        if($filename==''){
        	$update = News::where('id',$request->id)->update([
        			'title' 		=> trim($request->title),
        			'slug'  		=> str_slug(trim($request->title)),
        			'intro' 		=> trim($request->intro),
        			'content' 		=> trim($request->content),
        			'category_id' 	=> $request->category_id
        		]);
        }else{
        	$update = News::where('id',$request->id)->update([
        			'title' 		=> trim($request->title),
        			'slug'  		=> str_slug(trim($request->title)),
        			'intro' 		=> trim($request->intro),
        			'content' 		=> trim($request->content),
        			'category_id' 	=> $request->category_id,
        			'img_path' 		=> $filename
        		]);
        }

        if($update){
            Session::flash('status', 'Sửa tin tức thành công!');
            return redirect()->route('admin.news');
        }else{
            return redirect()->back()->withErrors();
        }  
    }
}
