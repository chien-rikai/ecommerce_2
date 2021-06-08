<?php

namespace App\Http\Controllers\Admins;

use App\Enums\UserStatus;
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
            $users = User::where('block',$block)->paginate(10);
        }
        else
            $users = User::paginate(10);
            
        return view('admin.layout.users_table_layout',compact(["users"]));
    }
    public function show(Request $request,$status){
        if($status=='all')
            $users = User::paginate(10);
        else{
            $status_id= UserStatus::getValue($status);
            $users = User::where('block',$status_id)->paginate(10);
        }    
        if($request->ajax()){
            return view('admin.users_view',compact(["users"]))->render();
        }    
        return view('admin.layout.users_table_layout',compact(["users"]));
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
            return redirect()->back()->with('fail',trans('lang.'.$message.'_fail'));
        } 
        $user->block = !$user->block;
        $update= $user->save();
        if($update){
            return back()->with('success', trans('lang.'.$message.'_success'));
        }else{
            return back()->with('fail', trans('lang.'.$message.'_fail'));
        }
    }
    public function destroy($id){
        //call func to find user by id
        $user = $this->find($id);
        //delete user
        $delete = $user->delete();
        //check delete action success
        if($delete){
            return response()->json(['message'=>__('lang.user-remove-success'),'hasRemove'=>true]);
        }else{
            return response()->json(['message'=>__('lang.user-remove-fail'),'hasRemove'=>false]);
        }
    }
    public function find($id){
        return User::find($id);
    }
    
}
