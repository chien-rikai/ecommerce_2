<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\SortService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::paginate(18);
    }
    public function fetch(Request $request,$type){
        $products = SortService::fetch($type,$request->sortBy,$request->orderBy);
        return response()->json(['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if($product){
            return response()->json(['product'=>$product]);
        }
        return response()->json(null,404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function review(Request $request,$id){
        $product = Product::find($id);
        $params['star_rating'] = (($product->star_rating*$product->review) + $request->star_rating)/($product->review +1);
        $params['review'] = $product->review + 1; 
        $update = $product->update($params);
        if($update){
            return response()->json(['message' => __('lang.review-success')]);
        }
        return response()->json(['message' => __('lang.review-fail')]);
    }
}
