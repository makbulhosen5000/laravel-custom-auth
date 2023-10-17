<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
class AuthController extends Controller
{
    public function login(){
        return  view('auth.login');
    }
      public function register(){
        return  view('auth.register');
    }
    public function registerUser(Request $request){
       $request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required|min:5|max:15'
       ]);
       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $res = $user->save();
       if($res){
        return back()->with('success','You Have Registration Successfully');
       }else{
            return back()->with('fail','something wrong');
       }
    }
    public function loginUser(Request $request){
          $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
          ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
           if(Hash::check($request->password,$user->password)){
              $request->session()->put('loginId',$user->id);
              return redirect('dashboard');
           }else{
             return back()->with('fail','Password Does not match');
           }
        }else{
            return back()->with('fail','Email or Password Incorrect');
        }
    }
    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'));
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
    }
}
