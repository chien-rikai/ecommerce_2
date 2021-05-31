<?php

namespace App\Http\Controllers\Web;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Get cart of user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = $this->findUser();
        if(blank($user)){
            abort(404);
        }
        $cart = $this->find($user);
        return view('web.page.cart',compact(['cart']));
    }
    /**
     * Add product to cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        $user = $this->findUser();
        if(blank($user)){
            return redirect()->back()->with('fail',__('lang.must-login-to-add'));
        }
        $product = Product::find($id);
        if($product->status==ProductStatus::OutOfStock){
            return redirect()->back()->with('fail',__('lang.out-stock'));
        }
        $cart = $this->find($user);

        $cart = $this->addToCart($cart,$product);

        Session::put('cart_'.Auth::user()->id,$cart);
        
        return redirect()->back()->with('success', __('lang.add-to-cart-success'));
    }
    /*
    * function add to cart
    * @return $cart
    */
    public function addToCart($cart,$product){
        if(blank($cart)){
            $cart = [
                $product->id=>[
                    "name" => $product->name,
                    "quantity" => 1,
                    "base_price" => $product->new_price,
                    "url_img" => $product->url_img,
                    "total" =>$product->new_price
                ],
                'total'=> 0
            ];
        }
        elseif(isset($cart[$product->id])){
            $cart[$product->id]['quantity'] ++;
            $cart[$product->id]['total']= $cart[$product->id]['base_price'] * $cart[$product->id]['quantity'];
        }
        else{
            $cart[$product->id] =[
                "name" => $product->name,
                "quantity" => 1,
                "base_price" => $product->new_price,
                "url_img" => $product->url_img,
                "total" =>$product->new_price
            ];
        }
        $cart['total'] = $this->getTotalPrice($cart);
        return $cart;
    }
    /**
     * Get user.
     *
     * @return $user
     */
    public function findUser(){
        return Auth::user();
    }
    /**
     * Get user.
     *
     * @return $cart
     */
    public function find($user){
        return Session::get('cart_'.$user->id);
    }
    /**
     * Get total price of cart.
     *
     * @return $cart
     */
    public function getTotalPrice($cart){
        $total =0;
        foreach($cart as $key=>$value){
            if($key=='total') continue;
            $total += $value['total'];
        }
        return $total;
    }
}
