<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth:admin')->except(['login_page','login','logout']);
    }
    public function username(){
        return 'username';
    }
    public function login_page(){
        return view('admin.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);
        if(Auth::guard('admin')->attempt(['username'=>$request->input('username'),
            'password'=>$request->input('password')])){
            return redirect()->Route('admin.choose_department');
        }else{
            Session::flash('fail','Incorrect Credentials');
        }
        return redirect()->back();
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
