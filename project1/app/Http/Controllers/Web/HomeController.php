<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

use App\Http\Controllers\Controller;
use App\Services\HistoryService;
use App\Services\SortService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Home page redirect.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $products = Product::paginate(18);
        $type ="all";
        return view('web.home.index',compact(['products','type']));
    }
    public function show($category){
        $list = $this->findCategoryId($category);
        $products=Product::whereIn('category_id',$list)->paginate(18); 
        $type ="all";
        return view('web.home.index',compact(['products','type']));
    }
    /**
     * Show products by category.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request,$type){
        if($request->ajax()){
            $products = SortService::fetch($type,$request->sortBy,$request->orderBy);
            return response()->json(['view'=>view('web.shared.product_element',compact(['products','type']))->render()]);
        }
        $products = Product::paginate(18);
        return view('web.shared.product_element',compact(['products','type']));
    }
    /**
     * Change language.
     * @param $language
     * @return \Illuminate\Http\Response
     */
    public function changeLanguage($language)
    {
        App::setlocale($language);
        Session::put('website_language', $language);
        return redirect()->back();
    }
    private function findCategoryId($idCategory){
        $cate = new Category();
        $categories = Category::get();
        $categories = $cate->findChildCategory($categories,$idCategory);
        $list = [];
        foreach($categories as $ct){
            $list[]= $ct->id;
        }
        return $list;
    }
    
}
