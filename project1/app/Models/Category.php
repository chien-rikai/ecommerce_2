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
    protected $children;
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function parent(){
        return $this->belongsTo(self::class,'id');
    }
    public function subcategories(){
        return $this->hasMany(self::class,'parent_id');
    }
    public static function store($params){
        $category = Category::create($params);
        return $category;
    }
    public static function updateCategory($id,$params){
        $category = Category::find($id);
        if(!$category)
            return 0;
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
    public function findAllChildCategory($categories,$id){
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
    public function findChildCategory($categories,$id){
        $this->children=collect([]);
        foreach($categories as $category){
            if($category->id==$id){
                $this->setChild($category,$id);
            }   
        }
        return $this->children;
    }
    private function setChild($category,$id){
        if($category->subcategories)    
           $this->loopInChilds($category->subcategories,$id);
        $this->children->push($category);
    }
    private function loop($categories,$id){
        foreach($categories as $category){
            $this->setChild($category,$id);
        }
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
