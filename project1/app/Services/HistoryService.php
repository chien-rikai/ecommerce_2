<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HistoryService{
    public static function saveHistoryView($product){
        $id = 0;
        if(Auth::check()){
            $id = Auth::id();
        }
        $viewed = session()->get('history_view_'.$id);
        if(empty($viewed)){
            $viewed = array(
                $product->id
            );
        }elseif(!in_array($product->id,$viewed)){
            //saving top 10 recent product view
            if(count($viewed)==10){
                unset($viewed[0]);
            }
            $viewed[]=$product->id;
        }
        else{
            $viewed=array_diff($viewed,[$product->id]);
            $viewed[]=$product->id;
        }
        Session::put('history_view_'.$id,$viewed);
    }
    public static function getHistoryView($sortBy,$orderBy){
        $id = 0;
        if(Auth::check()){
            $id = Auth::id();
        }
        $viewed= Session::get('history_view_'.$id);
        $products = Product::find($viewed);
        if(isset($sortBy)&&!empty($viewed)){
            if($orderBy=='asc')
                $products =$products->sortBy(function($product) use ($sortBy){
                    return $product[$sortBy];
                });
            else
                $products =$products->sortByDesc(function($product)use ($sortBy){
                    return $product[$sortBy];
                });
        }
        return $products;
        
    } 
}
