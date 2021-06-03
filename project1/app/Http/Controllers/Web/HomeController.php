<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

use App\Http\Controllers\Controller;
use App\Services\HistoryService;
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
        $products = Product::paginate(30);
        $type='all';
        return view('web.home.index',compact(['products','type']));
    }
    /**
     * Show products by category.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch($type){
        switch($type){
            case 'all': 
                $products = Product::paginate(30);
                break;
            case 'popular':
                $products = Product::orderBy('view','desc')->paginate(30);
                break;
            case 'history': 
                $products = HistoryService::getHistoryView();
                break;
        } 
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
    
}
