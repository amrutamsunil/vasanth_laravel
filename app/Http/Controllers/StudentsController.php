<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Department;
use App\Results;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects=Classes::find(auth()->user()->class_id)->subjects;
        foreach ($subjects as $index=>&$subject){
            $subject['result']=Results::with(['exam'])
                ->where('class_subject_id','=',$subject->pivot->id)->first();
        }
        return view('student.academic')->with('subjects',$subjects);
    }

    public function academic(){
        return view('student.acedemic');
    }
    public function fees(){
        $basic_fees=Classes::find(auth()->user()->class_id)->department;
       $courses_enrolled=Students::find(auth()->user()->id)->enrolled;
       /* $total_fees=$basic_fees->fees;
        foreach ($courses_enrolled as $course){
            $total_fees+=$course->fees;
        }*/
        $fees=Students::find(auth()->user()->id)->fees;
        return view('student.fees')->with('fees',$fees)
            ->with('basic_fees',$basic_fees->fees)
            ->with('courses_enrolled',$courses_enrolled);
    }
    public function personal_info(){
        return view('student.personal-info');
    }
    public function change_password(Request $request){
        $this->validate($request,[
            'new_password'=>'required',
            'c_new_password'=>'required'
        ]);
        $student=Students::find(auth()->user()->id);
        $student->password=Hash::make($request->new_passoword);
        if($student->save()){
            Session::flash('success',"Password Changed Succesfully");
        }else{
            Session::flash('fail',"Something Went Wrong While updating password");
        }
        return view('student.change-password');
    }
    public function show_change_password()
    {
        return view('student.change-password');
    }




}
