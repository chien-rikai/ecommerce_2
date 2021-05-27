<?php

namespace App\Http\Controllers\Web;

use App\Enums\UserGender;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function changePassword(){
        return view('web.users.change_password');
    }

    public function postChangePassword(ChangePassword $request,$id){
        if((Hash::check($request->old_password, Auth::user()->password))){
            Session::put('url-back',url()->previous());
            $user = $this->find($id);
            $params['password']= Hash::make($request->password);
            $update = $user->update($params);
    
            if($update){
                return back()->with('success', __('lang.change-password-success'));
            }else{
                return back()->with('fail', __('lang.change-password-fail'));
            }
        }else{
            return back()->with('fail', __('lang.password-fail'));
        }
    }
}
