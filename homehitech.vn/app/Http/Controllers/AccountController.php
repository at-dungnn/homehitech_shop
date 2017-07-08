<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Auth,Session,Hash;
class AccountController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
    public function Index(){
    	return view('backend.user.users',['isActive'=>'users','isActiveSub'=>'update']);
    }
    public function postUpdate(UserRequest $request){

    	if($request->new_password==''){
    		$user = User::where('id',Auth::user()->id)->update(['name'=>$request->fullname]);
    	}else{
    		$current_password = Auth::User()->password;           
	      	if(Hash::check($request->cur_password, $current_password)){
	      		$user_id  	= Auth::User()->id;                       
		        $user  		= User::where('id',$user_id)->update(['name'=>$request->fullname,'password'=>Hash::make($request->new_password)]);
	      	}else{
	      		Session::flash('status', 'Mật khẩu hiện tại không đúng!');
	      		Session::flash('class', 'alert-danger');
    			return redirect()->back();
	      	}
    	}
    	if($user){
    		Session::flash('status', 'Cập nhật thành công!');
    		Session::flash('class', 'alert-success');
    		return redirect()->back();
    	}else{
    		return redirect()->back()->withErrors();
    	}
    }
    public function getAdd(){
        return view('backend.user.users-add',['isActive'=>'users']);
    }
    public function postAdd(Request $request){        
        $messages= [
        'fullname.required'=>'Họ và tên không được để trống.',
        'email.required'   =>'Email không được để trống.',
        'email.email'      =>'Email không đúng định dạng.',
        'email.unique'     =>'Email đã tồn tại.',
        'password.required'=>'Mật khẩu không được để trống.',
        ];
        $this->validate($request, [
            'fullname' => 'required|string',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string',
        ],$messages);
        $user = new User;
        $user->name=$request->fullname;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $save=$user->save();
        if($save){
            Session::flash('status', 'Thêm tài khoản mới thành công!');
            return redirect()->route('admin.users.list-all');
        }else{
            return redirect()->back()->withErrors();  
        }        
    }
    public function getList(){
        if(Auth::user()->id=="1"){
            $user = User::all();  
        }else{
           $user = ""; 
        }       
        return response()->json(array('data'=>$user));
    }
    public function postDelete(Request $request){
        if(Auth::user()->id=="1" && $request->id!='1'){
            $user = User::where('id',$request->id)->delete();
            if($user){
                return response()->json(array('status'=>'ok'));
            }else{
                return response()->json(array('status'=>'ng'));
            }
        }else{
            return response()->json(array('status'=>'ng'));
        }
    }
    public function getListAll(){
        if(Auth::user()->id=='1'){
            return view('backend.user.user-list',['isActive'=>'users','isActiveSub'=>'list']);   
        }else{
            return redirect()->back();
        }
        
    }
}
