<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ="categories";
    protected $dates = ['deleted_at'];
    protected $fillable=['name','parent_id'];
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');

    }

    public function subcategory(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public static function store($params){
        $category = Category::create($params);
        return $category;
    }
    public static function updateCategory($request){
        $category = Category::find($request->id);
        if($request->parent_id_1 == null){
            $params = $request->only(['name','parent_id']);
        }else{
            $params = ['name'=> $request->name, 'parent_id' => $request->parent_id_1];          
        }   
        return $category->update($params);
    }
    public static function checkStatus($status){
        if($status == 'trashed'){
            return $categories = Category::onlyTrashed()->get();
        }
        return $categories = Category::get();
    }

    public static function destroy($id){
        $category = Category::withTrashed()->find($id);
        if($category->trashed()){
            $delete = $category->forceDelete();
            $delete = Product::deleteCategory($delete,$id);
        }else{
            $delete = $category->delete();
            $delete = Product::deleteCategory($delete,$id);
        }
        return $delete;
    }

    public static function restoreCategory($id){
        $category= Category::withTrashed()->find($id);
        $update = $category->restore();
        if($update){
           $update = Product::restoreCategory($id);
        }
        return $update;
    }
}
