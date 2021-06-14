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

    public function products(){
        return $this->hasMany(Product::class);
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
