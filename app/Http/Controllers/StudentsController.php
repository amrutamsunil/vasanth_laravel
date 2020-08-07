<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Courses;
use App\Courses_Enrolled;
use App\Department;
use App\Exams;
use App\Results;
use App\Students;
use App\Subjects;
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
      $results=Students::find(auth()->user()->id)->results;
      foreach ($results as $index=>&$result){
          $result['subject_name']=Subjects::find($result->subject_id)->name;
          $result['exam_name']=Exams::find($result->exam_id)->name;
      }
        return view('student.academic')->with('results',$results);
    }
    public function check($enrolled_courses,$course_id){
        foreach ($enrolled_courses as $ec){
            if($ec->id==$course_id) {return true;}
        }
        return false;
    }
    public function show_course(){
        $courses_enrolled=Students::find(auth()->user()->id)->enrolled;
        $courses=Courses::all();
        foreach ($courses as $index=>&$course){
            if($this->check($courses_enrolled,$course->id)) {
                unset($courses[$index]);
            }
        }
;        return view('student.course')->with('courses_enrolled',$courses_enrolled)
            ->with('courses',$courses);
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

    public function add_course($course_id) {
        $course=Courses::find($course_id);
        if($course==null) {return redirect()->back();}
        $enroll_course=new Courses_Enrolled();
        $enroll_course->student_id=auth()->user()->id;
        $enroll_course->course_id=$course_id;
        //increasing the students fees
        $fees=Students::find(auth()->user()->id)->fees;
        $fees->total_amount+=$course->fees;
        if($fees->total_amount!=$fees->amount_paid){
            $fees->status='pending';
        }else{
            $fees->status='paid';
        }
        if($fees->save() && $enroll_course->save()){
        Session::flash('success',"You have successfully Enrolled in
        $course->name Course Costs = $course->fees Rs " );}
        else{
            Session::flash('fail',"Unable to buy this course ");
        }
        return redirect()->action('StudentsController@show_course');
    }
    public function remove_course($course_id){
        $course=Courses::find($course_id);
        $course_enrolled=Courses_Enrolled::where('student_id','=',auth()->user()->id)
            ->where('course_id','=',$course_id)->first();
        if($course_enrolled==null || $course==null){
            Session::flash('fail','Oops, Cannot fetch such course ');
            return redirect()->action('StudentsController@show_course');
        }
        $fees=Students::find(auth()->user()->id)->fees;
        $fees->total_amount-=$course->fees;
        $fees->paid-=$course->fees;
        if($fees->total_amount!=$fees->amount_paid){
            $fees->status='pending';
        }else{
            $fees->status='paid';
        }
        if($course_enrolled->delete() && $fees->save()){
            Session::flash('success',"Successfully Deleted the $course->name Course");
        }else{
            Session::flash('fail',"Error while Un-Enrolling the $course->name course");
        }
        return redirect()->action('StudentsController@show_course');
    }


}
