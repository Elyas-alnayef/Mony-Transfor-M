<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registeruser(Request $request){
        $request->validate([
            'name'=>'required|string|max:255|min:3',
            'email'=>'required|string|max:255|min:3|unique:users',
            'password'=>'required|min:8|confirmed|regex:/^(?=.*[A-Z])(?=.*[\w_]).+$/',
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->role=$request->role;
        $user->save();
        Auth::login($user);
        return redirect('/');
     }
     public function login(Request $request){
        $request->validate([
            'email'=>'required|string|max:255|email',
            'password'=>'required|min:8',
        ]);
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }
        return back();

     }
     public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
     }
}
