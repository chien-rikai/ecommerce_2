<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function productSearch(Request $request){
        $products = Product::productSearch($request->name, $request->id);
        return view('admin.table.products',compact('products'));
    }
}
