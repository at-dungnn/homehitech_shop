<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Session;
class CategoryController extends Controller
{
    public $data='';
    public $dataTable=[];

    public function __construct(){
        $this->middleware('auth');
    }

    public function Index(){
        $category=Category::where('delete','0')->get();
    	return view('backend.category.category',['isActive'=>'category','category'=>$category]);
    }
    public function getAdd(){
        $category       =   Category::where('delete','0')
                                    ->select('id','name','parent_id')
                                    ->get();
        $categoryHtml    =   $this->showCategories($category);
    	return view('backend.category.category-add',['isActive'=>'category','categoryHtml'=>$categoryHtml]);
    }

    public function postAdd(CategoryRequest $request){
        $category               = new Category;
        $category->name         = $request->ten_danhmuc;
        $category->slug         = str_slug($request->ten_danhmuc,"-");
        $category->parent_id    = $request->parent_id;
        $category->delete       = 0;
        $save = $category->save();
        if($save){
            Session::flash('status', 'Thêm danh mục mới thành công!');
            return redirect()->route('admin.category');
        }else{
            return redirect()->back()->withErrors();
        }   	
    }

    public function getList(){
        $category       =   Category::where('delete','0')
                                    ->select('id','name','parent_id')
                                    ->get();
        // $categoryHtml   =   $this->showCategories2($category);

        return response()->json(array('data'=>$category));
    }

    public function postDelete(Request $request){
        $update = Category::where('id',$request->id)->update(['delete'=>1]);
        if($update){
            return response()->json(array('status'=>'ok'));
        }else{
            return response()->json(array('status'=>'ng'));
        }
    }

    public function getEdit($id){
        $category       = Category::where([['delete','0'],['id',$id]])
                                    ->select('id','name','parent_id')
                                    ->get();
        $categoryAll    = Category::where('delete','0')
                                    ->select('id','name','parent_id')
                                    ->get();
        $categoryHtml   =   $this->showCategories($categoryAll);
        return view('backend.category.category-edit',['isActive'    => 'category'
                                            ,'data'        => $category
                                            ,'categoryAll' => $categoryAll
                                            ,'categoryHtml'=> $categoryHtml]);
    }

    public function postEdit(CategoryRequest $request){
        $update = Category::where('id',$request->id)->update([
                                    'name'      => $request->ten_danhmuc,
                                    'slug'      => str_slug($request->ten_danhmuc,"-"),
                                    'parent_id' => $request->parent_id
                                    ]);    
        
        if($update){
            Session::flash('status', 'Sửa danh mục thành công!');
            return redirect()->route('admin.category');
        }else{
            return redirect()->back()->withErrors();
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

    public function showCategories2($categories, $parent_id = 0, $char = ''){
        foreach ($categories as $key => $item){
            // Nếu là chuyên mục con thì hiển thị
            if($item['parent_id'] == $parent_id){
                $this->dataTable[$key]['id']            = $item['id'];
                $this->dataTable[$key]['name']          = $char . $item['name'];
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);                
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $this->showCategories2($categories, $item['id'], $char.'---');
            }
            
        }
        return $this->dataTable;
    }
}
