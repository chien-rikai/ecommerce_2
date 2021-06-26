<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $product = new Product();
        $products = $product->fullTextSearch($request->id,$request->keys);
        $type ="all";
        return view('web.home.index',compact(['products','type']));
    }
}
