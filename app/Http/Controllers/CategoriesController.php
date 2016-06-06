<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function getList(){
        $mainCate = Category::where('parent_id', '=', 0)->get();
        $allCate = $this->getAllCategories($mainCate);
        return view('admin.categories.showListCate')->with("allCate", $allCate);
    }

    private function getAllCategories($categories) {
	    $allCategories = array();
	    foreach ($categories as $category) {
	        $subArr = array();
	        $subArr['name'] = $category->name;
	        $subArr['id'] = $category->id;
	        $subArr['parent_id'] = $category->parent_id;
            $subArr['description'] = $category->description;
	        $subCategories = Category::where('parent_id', '=', $category->id)->get();
	        if (!$subCategories->isEmpty()) {
	            $subArr['sub'] = $this->getAllCategories($subCategories);
	        }
	        $allCategories[] = $subArr;
	    }
	   return $allCategories;
	}  

    public function getAdd(){
        $cates = Category::select('id', 'name', 'parent_id', 'description')->get()->toArray();
        return view('admin.categories.createNewCate')->with('cates', $cates);
    }

    public function postAdd(Request $request){
        $data_input = $request->all();
    	$category = new Category;
    	$category->name = $data_input["name"];
        $category->slug = convert_to_slug($category->name);
    	$category->parent_id = $data_input["parent_id"];
        $category->save();
        return redirect('admin/categories/list')->with('successMessage', 'Tạo mới category thành công!');
    }

    public function getEdit($id){
        $cate = Category::findOrFail($id)->toArray();
        $allCates = Category::select('id', 'name', 'parent_id', 'description')->get()->toArray();
        return view('admin.categories.editCate',compact('cate', 'allCates'));
    }

    public function postEdit($id, Request $request){
        $cate = Category::findOrFail($id);
        $data_input = $request->all();       
        $cate->name = $data_input["name"];
        $cate->slug = convert_to_slug($cate->name);
        $cate->description = $data_input["description"];    
        $cate->parent_id = $data_input["parent_id"];
        $cate->save();
        return redirect('admin/categories/list');
    }

    public function getAddSubCate($id){
        $categories = Category::findOrFail($id);
        return view('admin.categories.addNewSubCate')->with("categories", $categories);
    }

    public function postAddSubCate(Request $request){
        $data_input = $request->all();
        $subCate = new Category;
        $subCate->name = $data_input["subName"];
        $subCate->parent_id = $data_input["id"];
        $subCate->slug = convert_to_slug($subCate->name);
        $subCate->save();
        return redirect('admin/categories/list')->with('successMessage', 'Tạo mới category thành công!');
    }

    public function del($id){
        $categories = Category::findOrFail($id);
        $numSubCate = DB::table('categories')->where('parent_id', '=', array($id))->count();
        if ($numSubCate > 0){
            return redirect('admin/categories/list')->with('errorMessage', 'Không thể xóa category có chứa category con!');           
        }
        else{
            $categories->delete();
            return redirect('admin/categories/list')->with('successMessage', 'Xóa category thành công!');
        }  
    }
}