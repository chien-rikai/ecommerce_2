<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * function get category by id.
     *
     * @param   $id
     * @return $category
     */
    public function find($id){
        $category = Category::find($id);
        if(blank($category)){
            return redirect()->back()->with('fail', __('lang.page-failed'));
        }else{
            return $category;
        }
    }
    /**
     * Show form create new category
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin/category_created');
    }
    /**
     * Get all categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories = Category::get();
        return view('admin.category_view',['categories' => $categories]);
    }
    /**
     * Save a category
     *
     * @param  CategoryRequest $id
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request){
        if($request->parent_id_1 == null){
            $params = $request->only(['name','parent_id']);
        }else{
            $params = ['name'=> $request->name, 'parent_id' => $request->parent_id_1];          
        }      
        $category= Category::store($params);
        if($category){
            return back()->with('success', __('lang.add-success'));
        }else{
            return back()->with('fail', __('lang.add-fail'));
        }
    }
    /**
     * Delete order by id.
     *
     * @param   Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id){
        $delete = Category::destroy($id);
        $categories = Category::checkStatus($request->status);
        if($delete){
            Session::put('success' , __('lang.delete-success'));
        }else{
            Session::put('fail' , __('lang.delete-fail'));
        }
        return view('admin.table.categories',compact('categories'));
    }
    /**
     * Show edit form with order by id.
     *
     * @param   int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $category = $this->find($id);
        $subcategory = Category::where('parent_id',$id);
        return view('admin.category_edit',['category'=> $category, 'subcategory' => $subcategory]);
    }
    /**
     * Update a category
     *
     * @param  CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request){   
        $update = Category::updateCategory($request);
        if($update){
            return back()->with('success', __('lang.edit-success'));
        }else{
            return back()->with('fail', __('lang.edit-fail'));
        }
    }

    public function filter(Request $request,$status){
        $categories = Category::checkStatus($status);
        return view('admin.table.categories',compact('categories'));
    }

    public function restore(Request $request,$id){
        $update = Category::restoreCategory($id);
        $categories = Category::checkStatus($request->status);
        if($update){
            Session::put('success' , __('lang.restore-success'));
        }else{
            Session::put('fail' , __('lang.restore-fail'));
        }
        return view('admin.table.categories',compact('categories'));
    }

    public function multiLevel(Request $request){
        if($request->parent_id != null){
            $categories = Category::where('parent_id','=',$request->parent_id)->get();
            return view('admin.table.category_created',compact('categories'));
        }  
    }
}
