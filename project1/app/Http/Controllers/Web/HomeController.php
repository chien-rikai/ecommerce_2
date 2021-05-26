<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Home page redirect.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('web\home\index');
    }
    /**
     * Show products by category.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($category){

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
