<?php

namespace App\Models;

use App\Jobs\ProductCsvUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use HasFactory,SoftDeletes,SearchableTrait;

    protected $searchable = [
        'columns' => [
            'products.name' => 10,
            'products.describe' => 10,
        ]
    ];

    protected $dates = ['deleted_at'];
    protected $guarded =[];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productCategory(){
        return $this->belongsTo(Category::class);
    }

    public function detailOrders(){
        return $this->hasMany(DetailOrder::class);
    }
    public function getNewPriceAttribute(){
        return ceil($this->price*(1-$this->discount*0.01));
    }

    public function suggestMore(){
        return $this->hasMany(SuggestMore::class);
    }
    public function productImport(){
        $path = resource_path('file/*.csv');

        $files = glob($path);

        foreach($files as $file){
        
            ProductCsvUpload::dispatch($file);
        }
    }

    public static function productSearch($name, $id,$products){
        if($id == 0){
            return $products->where('name','like', "%$name%")->orderBy('created_at','desc')->paginate(12);
        }
        return $products->where('name','like', "%$name%")->where('category_id','=',$id)->orderBy('created_at','desc')->paginate(12);
    }

    public static function deleteCategory($delete,$id){
        if($delete){
            $delete = Product::where('category_id','=',$id)->chunkById(100, function($products){
                foreach($products as $product){
                    $delete = $product->delete();
                    $delete = DetailOrder::deleteProduct($delete,$product->id);
                }
            });
        }
        return $delete;
    }

    public static function restoreCategory($id){
        $update = Product::withTrashed()->where('category_id','=',$id)->chunkById(100, function($products){
            foreach($products as $product){
                $product->restore();
            }
        });
        return $update;
    } 

    public static function destroyProduct($id){
        $product = Product::withTrashed()->find($id);
        if($product->trashed()){
            $delete = $product->forceDelete();
            $delete = DetailOrder::deleteProduct($delete,$id);
        }else{
            $delete = $product->delete();
            $delete = DetailOrder::deleteProduct($delete,$id);
        }
        return $delete;
    }  

    public static function restoreProduct($id){
        $update = false;
        $product = Product::withTrashed()->find($id);
        $category = Category::withTrashed()->find($product->category_id);
        if($category->trashed()){
            return $update;
        }
        $update = $product->restore();
        if($update){
           $update = DetailOrder::restoreProduct($id);
        }
        return $update;
    }

    public static function checkStatus($status){
        if($status == 'trashed'){
            $products = Product::onlyTrashed()->with('category');
        }else{
            $products = Product::with('category');
        }      
        return $products;
    }
}
