<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function updateInfo(Request $request)
    {
        $request->validate([
            'phone' => 'required|min:5|max:10',
            'address' => 'required|regex:/(^([0-9]+ )?[a-zA-Z ]+$)/',
        ]);

         $currentUser = User::find(Auth::id());
         $currentUser->phone = $request->phone;
         $currentUser->address = $request->address;
         $currentUser->save();

         return redirect()->back()->with("toast",["icon"=>"success","title"=>"Information Updated"]);
    }

    public function editPhoto()
    {
        return view('profile.editPhoto');
    }

    public function changePhoto(Request $request)
    {
       $request->validate([
           "photo"=> "required|mimes:png,jpg,jpeg",
           
       ]);
    //    $dir = "/public/profile/";
    //    Storage::delete($dir.Auth::user()->photo);
       
       $file = $request->file('photo');
       $newFileName = uniqid(). "_profile.".$file->getClientOriginalExtension();
       $dir = "/public/profile/";
       $file->storeAs($dir,$newFileName);

        $user = User::find(Auth::id());
        $user->photo = $newFileName;
        $user->update();
        return redirect()->route('profile.editPhoto');
    }

    public function changePassword()
    {
        return view("profile.changePassword");
    }

    public function changePass(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
    
        Auth::logout();
       return redirect()->route('login');
    }

    public function profile()
    {
        return view('profile.yourProfile');
    }

    public function email()
    {
        return view('profile.email');
    }

    public function emailChange(Request $request)
    {
        $request->validate([
            "name" =>"required|min:5|max:50",
            "email" =>"required|min:5|max:50|email"
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        return redirect()->back()->with("toast",["icon"=>"success","title"=>"Email Updated"]);
    }
}