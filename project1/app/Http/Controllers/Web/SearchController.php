<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function fulltextsearch(Request $request){
        $products = Product::search($request->get('search'))->paginate(18);
        return view('web.page.search',compact('products'));
    }
}
