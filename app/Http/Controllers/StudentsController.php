<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Courses;
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
    public function show_course(){
        $enrolled_courses=Students::find(auth()->user()->id)->enrolled;
        die(json_encode($enrolled_courses));
        return view('student.course');
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

    public function courses_search(Request $request){
        $output="";
        if($request->ajax()){
            $courses=Courses::where('name','LIKE','%'.$request->search.'%')->get();
            if($courses){
                $output.="<table class='table'>";
                $output.="<thead class='thead-dark'>";
                $output.="<tr>";
                $output.="<th scope='col'>S.No</th>";
                $output.="<th scope='col'>Course Name</th>";
                $output.="<th scope='col'></th>";
                $output.="</tr>";
                $output.="</thead>";
                $output.="</table>";
                $output.="<tbody>";
                foreach ($courses as $index=>$course){
                    $output.="<tr>";
                    $output.="<td>";
                    $output.=($index+1);
                    $output.="</td>";
                    $output.="<td>";
                    $output.="$courses->name";
                    $output.="</td>";
                    $output.="<td>";
                    $output.="
                    <a href=".Route('student.add_course',$course->id).">
                    <button type='button' class='btn btn-success'>Buy</button>
                    </a>";
                    $output.="</td>";
                    $output.="</tr>";
                }
                $output.="</tbody>";
            }
        }
        return Response($output);
    }
    public function add_course($course_id){
        $course=Courses::find($course_id);
        if($course==null) {return redirect()->back();}
        //increasing the students fees
        $fees=Students::find(auth()->user()->id)->fees;
        $fees->total_amount+=$course->fees;
        if($fees->total_amount!=$fees->amount_paid){
            $fees->status='pending';
        }else{
            $fees->status='paid';
        }
        if($fees->save()){
        Session::put('success',"You have successfully Enrolled in
        $course->name Course Costs = $course->fees Rs " );}else{
            Session::put('fail',"Unable to buy this course ");
        }

    }


}
