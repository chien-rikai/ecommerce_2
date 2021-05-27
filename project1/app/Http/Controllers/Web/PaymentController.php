<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Show checkout.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('web\page\order_checkout');
    }
    /**
     * Create new checkout information.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
    }
    /**
     * Update checkout info.
     * @param $request, $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){

    }
}
