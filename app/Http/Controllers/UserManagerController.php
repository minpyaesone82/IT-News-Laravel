<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
public function index()
    {
        $users = User::all();
        return view('user-manager.index',compact('users'));
    }

    public function makeAdmin(Request $request)
    {
        $currentUser = User::find($request->id);
        if($currentUser->role == '1'){
            $currentUser->role = '0';
            $currentUser->update();
        }
        return redirect()->back()->with('toast',['icon'=>"success",'title'=>"Role is updated"]);
    }

    public function banUser(Request $request)
    {
        $currentUser = User::find($request->id);
        if($currentUser->isBaned == '0'){
            $currentUser->isBaned = '1';
            $currentUser->update();
        }
        return redirect()->back()->with('toast',['icon'=>"error",'title'=>"Baned User"]);
    }

}
