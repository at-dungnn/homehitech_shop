<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Session;
class BannerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function Index(){
    	return view('backend.banner.banner',['isActive'=>'banner']);
    }

    public function getAdd(){
    	return view('backend.banner.banner-add',['isActive'=>'banner']);
    }

    public function postAdd(Request $request){
    	$messages = [
                'title.required' 	   =>'Tiêu đề không được để trống',
                'img_path.required'    =>'Hình ảnh không được để trống',
            ];
        $this->validate($request, [
                    'title'		=>'required',
                    'img_path'  =>'required'
                    ], $messages);
        $filename='';
        if($request->hasFile('img_path')){
            $filename	=	time()."-".$request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->move('upload/banner',$filename);
        }
        $banner 			=	new Banner;
        $banner->title 		=	$request->title;
        $banner->img_path 	=	$filename;
        $save				=	$banner->save();

        if($save){
            Session::flash('status', 'Thêm slide mới thành công!');
            return redirect()->route('admin.banner');
        }else{
            return redirect()->back()->withErrors();
        } 
    }

    public function getEdit(Request $request){
    	$banner 	=	Banner::where('id',$request->id)->get();
    	return view('backend.banner.banner-edit',['isActive'=>'banner','data'=>$banner]);
    }
    
    public function postEdit(Request $request){
        $messages = [
                'title.required'       =>'Tiêu đề không được để trống',
            ];
        $this->validate($request, [
                    'title'     =>'required'
                    ], $messages);
        $filename='';
        if($request->hasFile('img_path')){
            $filename   =   time()."-".$request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->move('upload/banner',$filename);
        }

        if($filename == '') {
            $update = Banner::where('id',$request->id)->update([
                    'title' =>  $request->title
                ]);
        }else{
            $update = Banner::where('id',$request->id)->update([
                    'title'     =>  $request->title,
                    'img_path'  =>  $filename,
                ]);
        }

        if($update){
            Session::flash('status', 'Sửa slide thành công!');
            return redirect()->route('admin.banner');
        }else{
            return redirect()->back()->withErrors();
        }  

    }
    public function getList(){
        $banner = Banner::all();
        return response()->json(array('data'=>$banner));
    }

    public function postDelete(Request $request){
        $delete = Banner::where('id',$request->id)->delete();
        if($delete){
            return response()->json(array('status'=>'ok'));
        }else{
            return response()->json(array('status'=>'ng'));
        }
    }


}
