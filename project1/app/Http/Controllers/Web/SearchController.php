<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $products = Product::productSearch($request->name, $request->category_id);
        
        return view('web.page.search',compact('products'));
    }
}
