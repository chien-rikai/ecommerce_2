<?php

namespace App\Http\Controllers\Admins;

use App\Enums\SuggestMoreStatus;
use App\Http\Controllers\Controller;
use App\Models\SuggestMore;
use Illuminate\Http\Request;

class Requestcontroller extends Controller
{
    public function find($id){
        $suggestMore = SuggestMore::find($id);
        if(blank($suggestMore)){
            return redirect()->route('rquest.index')->with('fail', __('lang.request-fail'));
        }
        return $suggestMore;
    }

    public function index(){
        $suggestMore = SuggestMore::where('status','=',SuggestMoreStatus::NoProcess)->paginate(18);
        return view('admin.request_view',compact('suggestMore'));
    }

    public function update($id){
        $suggestMore = $this->find($id);

        $suggestMore->status = SuggestMoreStatus::Processed;
        $update = $suggestMore->save();
        if($update){
            if($suggestMore->product_id == null){
                return redirect()->route('product.create');
            }
            return redirect()->route('product.edit',[$suggestMore->product_id]);    
        }
        return back()->with('fail', __('lang.request-fail'));
    }
}
