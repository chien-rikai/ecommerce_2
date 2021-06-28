<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $children;
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
        $categories= Category::get();
        return view('admin/category_created',compact(['categories']));
    }
    /**
     * Get all categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories = Category::get();
        return view('admin.category_view',compact(['categories']));
    }
    /**
     * Save a category
     *
     * @param  CategoryRequest $id
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request){
        $params= $request->except(['_token','_method']);
        if($params['parent_id']=='none'){
            $params['parent_id']=null;
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
        $categories = Category::get();
        $categories = $this->findAllChildCategory($categories,$id);
        return view('admin.category_edit',compact(['category','categories']));
    }
    /**
     * Update a category
     *
     * @param  CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request){
        $params=$request->except(['_token','_method']);
        if($params['parent_id']=='none'){
            $params['parent_id']=null;
        }
        $update = Category::updateCategory($request->id,$params);
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
    private function findAllChildCategory($categories,$id){
        $this->children=collect([]);
        if($categories)
        foreach($categories as $category){
            if($category->parent_id)
                continue;
            if($category->id==$id){
                break;
            }    
            $this->setData($category,$id);
        }
        return $this->children;
    }
    
    private function loopInChilds($categories,$id){
        foreach($categories as $category){
            if($category->id==$id){
                continue;
            }
            $this->setData($category,$id);
        }
    }
    private function setData($category,$id){
        if($category->subcategories)    
           $this->loopInChilds($category->subcategories,$id);
        $this->children->push($category);
    }
}
