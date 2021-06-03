<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SortByService{
    public static function sort($id){
        if($id == 0){
            $products = Product::where('category_id','>',$id);
        }else{
            $products = Product::where('category_id','=',$id);
        }
        return $products;
    }

    public static function sortBy($data,$sort){
            $products = SortByService::sort($data[0]);

            if($data[2] == 0){
                $products = $products->orderBy($sort, Session::get('OrderBy'));
            }elseif($data[2] ==1){
                $products = $products->orderBy($sort, $data[1]);
                if($data[1] == 'desc'){
                    Session::put('OrderBy','asc');
                }else{
                    Session::put('OrderBy','desc');
                }
            }
            return $products->paginate(12);
    }
   
}