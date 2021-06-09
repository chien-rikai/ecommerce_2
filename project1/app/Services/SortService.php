<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SortService{
    public static function fetch($type,$sortBy,$orderBy){
        if($sortBy=='normal')
        switch($type){
            case 'popular':
                $products = Product::orderBy('view',$orderBy)->paginate(18);
                break;
            case 'history': 
                $products = HistoryService::getHistoryView(null,'desc');
                break;
            default:
                $products = Product::paginate(18);
        } 
        else
        switch($type){
            case 'popular':
                $products = Product::orderBy('view','desc')->orderBy($sortBy,$orderBy)->paginate(18);
                break;
            case 'history': 
                $products = HistoryService::getHistoryView($sortBy,$orderBy);
                break;
            default:
                $products = Product::orderBy($sortBy,$orderBy)->paginate(18);
        } 
        return $products;
    }
}
