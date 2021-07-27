<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserControlerr extends Controller
{
    public function getUser(){
        return Auth::user();
    }
}
