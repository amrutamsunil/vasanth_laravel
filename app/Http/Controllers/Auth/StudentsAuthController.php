<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Students;
use Illuminate\Support\Facades\Hash;



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
}
return redirect()->back();
    }
    public function logout(){
    Auth::logout();
return redirect('/');
    }
}
