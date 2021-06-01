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
        $user = $this->loadUser();
        if(blank($user)){
            abort(404);
        }
        $cart = $this->findCart();
        return view('web.page.cart',compact(['cart']));
    }
    /**
     * Add product to cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $user = $this->loadUser();
        if(blank($user)){
            return redirect()->back()->with('fail',__('lang.must-login-to-add'));
        }
        $product = Product::find($request->id);
        if($product->status==ProductStatus::OutOfStock){
            return redirect()->back()->with('fail',__('lang.out-stock'));
        }
        $cart = $this->findCart();
        $cart = $this->addToCart($cart,$product);
        Session::put('cart_'.Auth::user()->id,$cart);
        return redirect()->back()->with('success', __('lang.add-to-cart-success'));
    }
    /**
     * Add product to cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        $cart = $this->findCart();
        $product = Product::find($id);
        if($product->status==ProductStatus::OutOfStock){
            return response()->json(['hasUpdate'=>false,'message'=>__('lang.out-stock')]);
        }
        
        $cart = $this->updateCart($cart,$product,$request->quantity);

        Session::put('cart_'.Auth::user()->id,$cart);

        return response()->json(['cart'=>$cart,'hasUpdate'=>true,'message'=>__('lang.update-cart-success')]);
    }
    /*
    * function remove product from cart
    */
    public function destroy($id){
        $cart= $this->findCart();
        if(blank($cart[$id])){
            return response()->json(['message'=>__('lang.product-not-exists'),'hasRemove'=>false]);
        }
        else{
            unset($cart[$id]);
            $cart['total'] = $this->getTotalPrice($cart);
            Session::put('cart_'.Auth::user()->id,$cart);
            return response()->json(['cart'=>$cart,'message'=>__('lang.product-remove-success'),'hasRemove'=>true]);
        }

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

    /*
    * function update cart by product
    */
    public function updateCart($cart,$product,$quantity){
        $cart[$product->id]['quantity'] =$quantity;
        $cart[$product->id]['total']= $cart[$product->id]['base_price'] * $cart[$product->id]['quantity'];
        $cart['total'] = $this->getTotalPrice($cart);
        return $cart;
    } 
    /**
     * Get user.
     *
     * @return $user
     */
    public function loadUser(){
        return Auth::user();
    }
    /**
     * Get user.
     *
     * @return $cart
     */
    public function findCart(){
        $user = $this->loadUser();
        if(blank($user)){
            return response()->json(["message"=>__('lang.must-login-to-add')], 403);
        }
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
