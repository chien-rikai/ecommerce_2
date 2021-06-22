<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = "product_category";
    protected $guarded =[];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }  

    public static function store($params, $insert){
        $insert1 = null;
        if(isset($insert)){
            $insert1 = ProductCategory::create($params[0]);
            if($params[1]['category_id'] != null){
                $insert1 = ProductCategory::create($params[1]);
                if($params[2]['category_id']!= null){
                    $insert1 = ProductCategory::create($params[2]);
                }
            }
        }
        return $insert1;
    }

    public static function ProductCategoryUpdate($params,$productCategory,$update){
        
        if($params['category_id'] == null){  
            if(!empty($productCategory)){
                $update = $productCategory->delete();
            }
        }else{   
            if(!empty($productCategory)){
                $update = $productCategory->update($params);
            }else{
                ProductCategory::create($params);  
            }
        }return $update;
    }

    public static function updateProductCategory($params, $id, $update){
        $productCategory = ProductCategory::where('product_id','=',$id)->get();
        if($update){
            for($i = 2; $i >= 0; $i--){
                if(!empty($productCategory[$i])){
                    $update = ProductCategory::ProductCategoryUpdate($params[$i],$productCategory[$i],$update);     
                }else{
                    $update = ProductCategory::ProductCategoryUpdate($params[$i],false,$update);
                }
                if(!$update){
                    return false;
                }
            }
        }
        return $update;
    }
}
