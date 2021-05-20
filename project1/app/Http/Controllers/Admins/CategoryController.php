<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function find($id){
        $category = Category::find($id);
        if(blank($category)){
            return redirect()->back()->with('fail', __('lang.page-failed'));
        }else{
            return $category;
        }
    }


    public function index(){
        $categories = Category::get();
        return view('admin.category_view',['categories' => $categories]);
    }

    public function addCategory(CategoryRequest $request){
        $category = new Category;

        $category->name = $request->category;
        $insert = $category->save();
        if($insert){
            return back()->with('success', __('lang.add-success'));
        }else{
            return back()->with('fail', __('lang.add-fail'));
        }
    }

    public function deleteCategory(Request $request){
        $category = $this->find($request->id);
        $delete = $category->delete();
        if($delete){
            return redirect()->back()->with('success',__('lang.delete-success'));
        }else{
            return redirect()->back()->with('fail',__('lang.delete-fail'));
        }
    }

    public function editCategory($id){
        $category = $this->find($id);

        return view('admin.category_edit',['category'=> $category]);
    }

    public function updateCategory(CategoryRequest $request){
        $category = $this->find($request->id);

        $category->name = $request->category;
        $update = $category->save();
        if($update){
            return back()->with('success', __('lang.edit-success'));
        }else{
            return back()->with('fail', __('lang.edit-fail'));
        }
    }

}
