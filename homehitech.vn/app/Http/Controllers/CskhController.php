<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cskh;
use Session;

class CskhController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function Index(){
    	return view('backend.cskh.cskh',['isActive'=>'cskh']);
    }

    public function getAdd(){
    	return view('backend.cskh.cskh-add',['isActive'=>'cskh']);
    }

    public function postAdd(Request $request){
    	$messages = [
                'name.required' 	   =>'Tên không được để trống',
                'img_path.required'    =>'Hình ảnh không được để trống',
                'email.required'   	   =>'Email không được để trống',
                'email.email'   	   =>'Email không đúng định dạng',
                'phone.required'       =>'Số điện thoại không được để trống',
            ];
        $this->validate($request, [
                    'name'		=>'required',
                    'img_path'  =>'required',
                    'email'     =>'email|email',
                    'phone'     =>'required'
                    ], $messages);
        $filename='';
        if($request->hasFile('img_path')){
            $filename	=	time()."-".$request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->move('upload/cskh',$filename);
        }
        $cskh 				=	new Cskh;
        $cskh->name 		=	$request->name;
        $cskh->email 		=	$request->email;
        $cskh->phone 		=	$request->phone;
        $cskh->skype 		=	$request->skype;
        $cskh->facebook		=	$request->facebook;
        $cskh->avatar 		=	$filename;
        $save				=	$cskh->save();

        if($save){
            Session::flash('status', 'Thêm nhân viên CSKH mới thành công!');
            return redirect()->route('admin.cskh');
        }else{
            return redirect()->back()->withErrors();
        } 
    }

    public function getEdit(Request $request){
    	$cskh = Cskh::where('id',$request->id)->get();
    	return view('backend.cskh.cskh-edit',['isActive'=>'cskh','data'=>$cskh]);
    }

    public function postEdit(Request $request){
    	$messages = [
                'name.required' 	   =>'Tên không được để trống',
                'email.required'   	   =>'Email không được để trống',
                'email.email'   	   =>'Email không đúng định dạng',
                'phone.required'       =>'Số điện thoại không được để trống',
            ];
        $this->validate($request, [
                    'name'		=>'required',
                    'email'     =>'email|email',
                    'phone'     =>'required'
                    ], $messages);
        $filename='';
        if($request->hasFile('img_path')){
            $filename	=	time()."-".$request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->move('upload/cskh',$filename);
        }

        if($filename ==''){
        	$update = Cskh::where('id',$request->id)->update([
        			'name' 		=> $request->name,
        			'phone' 	=> $request->phone,
        			'email' 	=> $request->email,
        			'skype' 	=> $request->skype,
        			'facebook' 	=> $request->facebook,
        		]);
        }else{
        	$update = Cskh::where('id',$request->id)->update([
        			'name' 		=> $request->name,
        			'phone' 	=> $request->phone,
        			'email' 	=> $request->email,
        			'skype' 	=> $request->skype,
        			'facebook' 	=> $request->facebook,
        			'avatar' 	=> $filename,
        		]);
        }
        
        if($update){
            Session::flash('status', 'Sửa nhân viên CSKH thành công!');
            return redirect()->route('admin.cskh');
        }else{
            return redirect()->back()->withErrors();
        }
    }

    public function getList(){
    	$cskh 				=	Cskh::all();
    	return response()->json(array('data'=>$cskh));
    }

    public function postDelete(Request $request){
        $delete = Cskh::where('id',$request->id)->delete();
        if($delete){
            return response()->json(array('status'=>'ok'));
        }else{
            return response()->json(array('status'=>'ng'));
        }
    }
}
