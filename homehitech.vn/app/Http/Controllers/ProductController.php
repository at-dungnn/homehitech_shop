<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Http\Requests\ProductRequest;
use Session,Auth,Image;
class ProductController extends Controller
{
    public $data;
    public function __construct(){
        $this->middleware('auth');
    }
    public function Index(){        
    	return view('backend.product.product',['isActive'=>'product']);
    }
    public function getAdd(){
        $category   = Category::where('delete','0')->get();
        $category   =   $this->showCategories($category);
    	return view('backend.product.product-add',['isActive'=>'product','category'=>$category]);
    }
    public function postAdd(ProductRequest $request){
        $filename='';
        if($request->hasFile('img_path')){
            $filename = time()."-".$request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->move('upload/product',$filename);
            Image::make('upload/product/'.$filename)->resize(255, 185)->save('upload/product/'.$filename);
        }

        $product = new Product;
        $product->ten_sanpham = trim($request->ten_sanpham);
        $product->slug        = str_slug($request->ten_sanpham);
        $product->ma_sanpham  = trim($request->ma_sanpham);
        $product->cong_suat   = trim($request->cong_suat);
        $product->kich_thuoc  = trim($request->kich_thuoc);
        $product->quang_thong = trim($request->quang_thong);
        $product->gia         = trim($request->gia);
        $product->thong_so    = trim($request->thong_so);
        $product->giam_gia    = trim($request->giam_gia);
        $product->so_luong    = trim($request->so_luong);
        $product->category_id = $request->category_id;
        $product->img_path    = $filename;
        $product->delete      = 0;
        $product->created_by  = Auth::user()->id;
        $save                 = $product->save();
        if($save){
            Session::flash('status', 'Thêm sản phẩm mới thành công!');
            return redirect()->route('admin.product');
        }else{
            return redirect()->back()->withErrors();
        }   	
    }
    public function getList(){
        $product = Product::where('product.delete','0')
                    ->leftJoin('users', function($join) {$join->on('product.created_by','=','users.id');})
                    ->leftJoin('category', function($join) {$join->on('category.id','=','product.category_id');})
                    ->select('product.id as id','product.ten_sanpham as ten_sanpham','product.ma_sanpham as ma_sanpham','product.gia as gia','category.name as category','users.name as created_by','product.created_at as created_at')
                    ->orderBy('product.id', 'desc') 
                    ->get();
        return response()->json(array('data'=>$product));
    }
    public function getEdit($id){
        $product    =   Product::where([['delete','0'],['id',$id]])->select('id','ten_sanpham','ma_sanpham','cong_suat','kich_thuoc','quang_thong','gia','img_path','category_id','thong_so','giam_gia','so_luong')->get();
        $category   =   Category::where('delete','0')->get();
        $category   =   $this->showCategories($category);
        return view('backend.product.product-edit',['isActive'=>'product','data'=>$product,'category'=>$category]);
    }

    public function postEdit(Request $request){
        $messages = [
                'ten_sanpham.required' =>'Tên sản phẩm không được để trống',
                'ma_sanpham.required'  =>'Mã sản phẩm không được để trống',
                'category_id.required' =>'Danh mục không được để trống',
                'thong_so.required'    =>'Thông số không được để trống',
                'gia.required'         =>'Giá tiền không được để trống',
                'gia.numeric'          =>'Giá tiền phải là số',
                'giam_gia.numeric'     =>'Phần trăm phải là số',
                'so_luong.numeric'     =>'Số lượng phải là số',
                'so_luong.required'    =>'Số lượng không được để trống',

            ];
        $this->validate($request, [
                    'ten_sanpham'=>'required',
                    'ma_sanpham' =>'required',
                    'category_id'=>'required',
                    'thong_so'   =>'required',
                    'gia'        =>'required|numeric',
                    'giam_gia'   =>'numeric',
                    'so_luong'   =>'required|numeric',
                    ], $messages);
        
        $filename = '';
        if($request->hasFile('img_path')){
            $filename= time()."-".$request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->move('upload/product',$filename);
            Image::make('upload/product/'.$filename)->resize(255, 185)->save('upload/product/'.$filename);
        }
        if($filename == '') {
            $update = Product::where('id',$request->id)->update([
            'ten_sanpham'  => trim($request->ten_sanpham),
            'slug'         => str_slug(trim($request->ten_sanpham),"-"),
            'ma_sanpham'   => trim($request->ma_sanpham),
            'cong_suat'    => trim($request->cong_suat),
            'kich_thuoc'   => trim($request->kich_thuoc),
            'quang_thong'  => trim($request->quang_thong),
            'gia'          => trim($request->gia),
            'thong_so'     => trim($request->thong_so),
            'giam_gia'     => trim($request->giam_gia),
            'so_luong'     => trim($request->so_luong),
            'category_id'  => trim($request->category_id)
            ]);    
        }else{
            $update = Product::where('id',$request->id)->update([
            'ten_sanpham'  => trim($request->ten_sanpham),
            'slug'         => str_slug(trim($request->ten_sanpham),"-"),
            'ma_sanpham'   => trim($request->ma_sanpham),
            'cong_suat'    => trim($request->cong_suat),
            'kich_thuoc'   => trim($request->kich_thuoc),
            'quang_thong'  => trim($request->quang_thong),
            'gia'          => trim($request->gia),
            'thong_so'     => trim($request->thong_so),
            'giam_gia'     => trim($request->giam_gia),
            'so_luong'     => trim($request->so_luong),
            'category_id'  => trim($request->category_id),
            'img_path'     => $filename
            ]);
        }       
        if($update){
            Session::flash('status', 'Sửa sản phẩm thành công!');
            return redirect()->route('admin.product');
        }else{
            return redirect()->back()->withErrors();
        }       
    }

    public function postDelete(Request $request){
        $update = Product::where('id',$request->id)->update(['delete'=>1]);
        if($update){
            return response()->json(array('status'=>'ok'));
        }else{
            return response()->json(array('status'=>'ng'));
        }
    }

    public function showCategories($categories, $parent_id = 0, $char = ''){
        foreach ($categories as $key => $item){
            // Nếu là chuyên mục con thì hiển thị
            if($item['parent_id'] == $parent_id){
                $this->data .= '<option value="'.$item['id'].'">'.$char . $item['name'].'</option>';
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);                
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $this->showCategories($categories, $item['id'], $char.'|---');
            }
            
        }
        return $this->data;
    }

}
