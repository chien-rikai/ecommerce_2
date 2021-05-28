<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show product .
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('web\page\product_detail');
    }
    /**
     * Show product detail by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $product = $this->find($id);
        return view('web\page\product_detail',compact(['product']));
    }
    /**
     * function find product
     * @return array 
     */
    public function find($id){
        $product = Product::find($id);
        if(blank($product)){
            return back()->with('fail', __('lang.product-not-found'));
        }
        return $product;
    }
}
