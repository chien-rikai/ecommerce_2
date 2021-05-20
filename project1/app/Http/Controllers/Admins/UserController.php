<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the users by block or non.
     * @param  $block (0/1)
     * @return \Illuminate\Http\Response
     */
    public function index($block=null){
        
        if($block!=null){
            $users = User::where('block',$block)->get();
        }
        else
            $users = User::all();
            
        return view('admin\users_view',compact(["users"]));
    }
    /**
     * Block /unblock user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function block(Request $request){

        //find user by id for blocking
        $user = $this->find($request->id);

        if(blank($user)){
            return redirect()->back()->with('fail',trans('lang.blocking_fail'));
        } 
        $user->block = true;
        $update= $user->save();
        if($update){
            return back()->with('success', trans('lang.blocking_success'));
        }else{
            return back()->with('fail', trans('lang.blocking_fail'));
        }
    }
    /**
     * Unblock user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unblock(Request $request){
        $user = User::find($request->id);
        
        if(blank($user)){
            return redirect()->back()->with('fail',trans('lang.unblocking_fail'));
        }
        $user->block = false;
        $update= $user->save();
        if($update){
            return back()->with('success', trans('lang.unblocking_success'));
        }else{
            return back()->with('fail', trans('lang.unblocking_fail'));
        }
    }
    public function find($id){
        return User::find($id);
    }
    
}
