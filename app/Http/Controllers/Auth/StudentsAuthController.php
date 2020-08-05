<?php


namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Students;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;


class StudentsAuthController extends Controller
{
public function __construct()
{
$this->middleware('auth:student')->except(['login_page','login','logout']);
}
use AuthenticatesUsers;
    public function username(){
        return 'roll_no';
    }
    public function login_page(){
        return view('student.login');
    }
    public function login(Request $request){
    $this->validate($request,[
        'username'=>'required',
        'password'=>'required'
    ]);
if(Auth::guard('student')->attempt(['roll_no'=>$request->username,
    'password'=>$request->password],$request->remember)){
return redirect()->intended('student/dashboard');
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
