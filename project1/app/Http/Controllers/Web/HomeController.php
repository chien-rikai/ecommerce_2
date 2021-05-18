<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $request->session()->put('title', 'Home');
        return view('web.home.index');
    }

    public function changeLanguage($language)
    {
        App::setlocale($language);
        Session::put('website_language', $language);
        return redirect()->back();
    }
}
