<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id){
        $products = Product::where('category_id','=',$id)->orderBy('created_at','desc')->paginate(12);

        return view('web.page.category',compact('products','id'));
    }
}
