<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(Request $request){
         $request->validate([
            'name' => 'required',
            'email' => 'required',
            
        ]);
        User::where('id', $request->id)->update( [
            'name' => $request->name,
            'email' => $request->email,
      
        ]);
        return redirect()-> route('profile_page');
        }
    public function profilePage(){ 
        $user = Auth::user();
        return view('profile', [
            'user' =>  $user
        ]);
    }
    public function profileEdit(){
        $user = Auth::user();
        return view('edit', [
            'user' => $user
        ]);
    }
    public  function passwordPage()
    {
        $user = Auth::user();
        return view('password',[
            'user'=>$user
        ]);
    }
    public function password(Request $request){
        $request->validate([
            'old_password' => 'current_password:web',
            'password' => 'required|min:6|confirmed',
            
            
        ]);
        User::where('id', $request->id)->update( [
            'password' => $request->password
            
        ]);
        
        return redirect()-> route('profile_page');
    }
}
