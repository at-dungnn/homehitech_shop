<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactRequest;
use Session;
class ContactController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function Index(){
    	$contact= Contact::find('1');
    	return view('backend.contact.contact',['isActive'=>'contact','contact'=>$contact]);
    }
    public function postUpdate(ContactRequest $request){
    	$contact = Contact::where('id',1)->update([
    			'address' => $request->address,
    			'email' => $request->email,
    			'phone_canhan' => $request->phone_canhan,
    			'phone_congty' => $request->phone_congty,
    			'skype' => $request->skype,
    			'facebook' => $request->facebook,
    		]);
    	if($contact){
            Session::flash('status', 'Sửa liên hệ thành công!');
            return redirect()->route('admin.contact');
        }else{
            return redirect()->back()->withErrors();
        } 
    }
}
