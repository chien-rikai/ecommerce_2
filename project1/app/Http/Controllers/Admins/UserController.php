<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function show($block){
        
        $users = User::where('block',$block)->get();
            
        return view('admin\users_view',compact(["users"]));
    }
    /**
     * Block /unblock user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        //find user by id for blocking
        $user = $this->find($request->id);
        $message = (int)$request->block==0?'blocking':'unblocking';

        if(blank($user)){
            return redirect()->back()->with('fail',trans('"lang.'.$message.'_fail"'));
        } 
        $user->block = !$user->block;
        $update= $user->save();
        if($update){
            return back()->with('success', trans('"lang.'.$message.'_success"'));
        }else{
            return back()->with('fail', trans('"lang.'.$message.'_fail"'));
        }
    }
    public function find($id){
        return User::find($id);
    }
    
}
