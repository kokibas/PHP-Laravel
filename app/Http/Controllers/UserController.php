<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\PseudoTypes\True_;

class UserController extends Controller
{
    public function users(){
        $users = User:: all();

        return view('users', [
        'users' => $users,
                
    ]);           
    }
    public function delete(Request $request)
    {
       //dd($request->all());
      if ($request->id == Auth::id()) {
            return redirect()->route('user_page')
                ->withErrors(trans('app.you_cannot_delete_yourself'));
        }
        $user = User::where('id',$request->id)->delete([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'is_admin'=>$request->is_admin
        ]);
    
       
        
        
        
        return redirect()->route('user_page');
    }   
    public function create(Request $request)
    {
       $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            
        ]);


        
        $user = User::create(request(['name', 'email', 'password']));
        
        // auth()->login($user);

        return redirect()->route('user_page');
    }
    public function createPage()
    {
        return view('create_user');
    }
    public function edit(Request $request){
        $request->validate([
           'name' => 'required',
           'email' => 'required',
           
       ]);
       User::where('id', $request->id)->update( [
           'name' => $request->name,
           'email' => $request->email,
       ]);
       return redirect()-> route('user_page');
       }
       public function editPage($user_id){ 
        $user = User::findOrFail($user_id);
        return view('edit_user', [
            'user' =>  $user
        ]);
    }
    public function change(Request $request){
        
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);
         User::where('id', $request->id)->update([
            'password' => bcrypt($request->get('password')),
        ]);
       
        
       return redirect()->route('user_page');
       }
    public function changePage($user_id){ 
        $user = User::findOrFail($user_id);
        return view('change_password', [
            'user' =>  $user
        ]);
    }
   
}
