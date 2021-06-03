<?php

namespace App\Http\Controllers\Web;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\HistoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Show product .
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        return view('web.page.product_detail');
    }
    /**
     * Show product detail by id.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        Session::put('url-back',url()->previous());
        $product = $this->find($id);
        if(!Session::has('product_'.$id)){
            $product->increment('view');
            Session::put('product_'.$id,1);
        }
        HistoryService::saveHistoryView($product);
        $status = ['outofstock' => ProductStatus::OutOfStock, 'instock' => ProductStatus::InStock];
        return view('web\page\product_detail',compact(['product','status']));
    }

    public function review(Request $request,$id){
        $product = Product::find($id);
        $params['star_rating'] = (($product->star_rating*$product->review) + $request->star_rating)/($product->review +1);
        $params['review'] = $product->review + 1; 
        $update = $product->update($params);
        if($update){
            return back()->with('success',__('lang.review-success'));
        }
        return back()->with('success',__('lang.review-fail'));
    }

    public function reviewStar($star){
        Session::put('Star', $star);
        return view('web.table.review_star');
        return view('web.page.product_detail',compact(['product']));
    }

    /**
     * function find product
     */
    public static function find($id){
        $product = Product::find($id);
        if(blank($product)){
            return redirect(Session::get('url-back'))->with('fail', __('lang.product-not-found'));
        }
        return $product;
    }
}
