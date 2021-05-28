<?php

namespace App\Http\Controllers\Web;

use App\Enums\UserGender;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function find($id){
        $user = User::find($id);
        if(blank($user)){
            return redirect(Session::get('url-back'))->with('fail', __('lang.next-page-fail'));
        }else{
            return $user;
        }
    }

    public function index(){
        $gender = ['female' => UserGender::female , 'male' => UserGender::male];
        return view('web.users.index',compact('gender'));
    }

    public function update(ProfileUpdateRequest $request, $id){
        Session::put('url-back',url()->previous());
        $params = $request->only(['first_name','last_name','email','phone','address','birthday','gender']);
        $user = $this->find($id);

        $update = $user->update($params);
        if($update){
            return back()->with('success', __('lang.update-profile-success'));
        }else{
            return back()->with('fail', __('lang.update-profile-fail'));
        }
    }
}
