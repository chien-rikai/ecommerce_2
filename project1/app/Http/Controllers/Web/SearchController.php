<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        if($request->category_id == 0){
            $products = Product::where('name','like', "%$request->name%")->paginate(12);
        }else{
            $products = Product::where('name','like', "%$request->name%")->where('category_id','=',$request->category_id)->paginate(12);
        }
        if(blank($products)){
            return back();
        }
        return view('web.page.search',compact('products'));
    }
}
