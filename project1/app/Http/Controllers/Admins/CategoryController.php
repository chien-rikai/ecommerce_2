<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $category = new Category;

        $category->name = $request->category;
        $insert = $category->save();
        if($insert){
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
    public function destroy(Request $request){
        $category = $this->find($request->id);
        $delete = $category->delete();
        if($delete){
            return redirect()->back()->with('success',__('lang.delete-success'));
        }else{
            return redirect()->back()->with('fail',__('lang.delete-fail'));
        }
    }
    /**
     * Show edit form with order by id.
     *
     * @param   int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $category = $this->find($id);

        return view('admin.category_edit',['category'=> $category]);
    }
    /**
     * Update a category
     *
     * @param  CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request){
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
