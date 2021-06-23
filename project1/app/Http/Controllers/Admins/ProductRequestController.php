<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\MoreProductRequest;
use App\Models\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductRequestController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin')->except('store');
    }
    public function index(Request $request){
        $requests= ProductRequest::with('user')->paginate(10);
        if($request->ajax()){
            return response()->json(['view'=>view('admin.request_view',compact(['requests']))->render()]);
        }
        return view('admin.layout.requests_view_layout',compact(['requests']));
    }
    public function store(MoreProductRequest $request){
        $user = Auth::user();
        if(blank($user)){
            return back()->with('fail',__('lang.must-login-to-request'));
        }
        $params= $request->except(['_token','method']);
        $params['user_id']=$user->id;
        $result= ProductRequest::create($params);
        if($result){
            return back()->with('success',__('lang.request-success'));
        }
        return back()->with('fail',__('lang.request-fail'));

    }
    public function show($id){
        $productRequest = ProductRequest::find($id);
        if(blank($productRequest)){
            abort(404);
        }
        if($productRequest->product_id){
            return redirect()->route('product.edit',[$productRequest->product_id]);
        }
        return view('admin.product_created')->with(['info'=>$productRequest]);
        
    }
}
