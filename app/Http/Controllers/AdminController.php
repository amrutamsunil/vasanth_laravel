<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Classes;
use App\Courses;
use App\Department;
use App\Exams;
use App\Fees;
use App\Results;
use App\Students;
use App\Subjects;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('admin.select-dept');
    }


    public function students(){
        return view('admin.student-list');

    }
    public function show_academic(){
        if(Session::has('department_id') && Session::has('class_id')){
            $students=Classes::find(Session::get('class_id'))->students;
        }else{

            $departments=Department::all();
            $classes="";
            if(Session::has('department_id')){
                $classes=Department::find(Session::get('department_id'))->classes;
            }
            return view('admin.select-dept')
                ->with('departments',$departments)
                ->with('classes',$classes)
                ->withErrors(["custom_error"=>"Please select a Department and Class"]);
        }
        return view('admin.show_academic')->with('students',$students);
    }
    public function new_registration(){
        return view('admin.new-registration');
    }
    public function show_change_password()
    {
        return view('admin.change-password');
    }

    public function choose_department(){
        $departments=Department::all();
        $classes="";
        if(Session::has('department_id')){
            $classes=Department::find(Session::get('department_id'))->classes;
        }
        return view('admin.select-dept')
            ->with('departments',$departments)
            ->with('classes',$classes);
    }
    public function select_department(Request $request){
        $this->validate($request,[
            'select_dept'=>'required|regex:/^[0-9]*$/'
        ]);
        $department=Department::find($request->select_dept);
        Session::put('department_id',$request->select_dept);
        Session::put('department_name',$department->name);
        Session::put('department_short_name',$department->short_name);
        return redirect()->action('AdminController@choose_department');
    }
    public function select_class(Request $request){
        $this->validate($request,[
        'select_class'=>'required|regex:/^[0-9]*$/']
        );
        $class=Classes::find($request->select_class);
        Session::put('class_id',$class->id);
        Session::put('class_name',$class->name);
        return redirect()->action('AdminController@choose_department');

    }
    public function show_students(){
        if(Session::has('department_id') && Session::has('class_id')){
            $students=Classes::find(Session::get('class_id'))->students;
            $basic_fees = Department::find(Session::has('department_id'))->fees;
        }else{

            $departments=Department::all();
            $classes="";
            if(Session::has('department_id')){
                $classes=Department::find(Session::get('department_id'))->classes;
            }
            return view('admin.select-dept')
                ->with('departments',$departments)
                ->with('classes',$classes)
                ->withErrors(["custom_error"=>"Please select a Department and Class"]);
        }
        return view('admin.student.index')
            ->with('students',$students)
            ->with('basic_fees',$basic_fees);
    }
    public function student_profile($student_id){
        $student=Students::find($student_id);
        $fees=Students::find($student_id)->fees;

        return view('admin.student.edit')
            ->with('student',$student)
            ->with('fees',$fees);
    }
    public function student_edit(Request $request){
    $this->validate($request,[
        'student_id'=>'required',
        'name'=>'required',
        'email'=>'required|email',
        'roll_no'=>'required',
        'phone_no'=>'required',
        'father_name'=>'required',
        'address'=>'required',
        'total_amount'=>'required',
        'amount_paid'=>'required',
    ]);
        $student=Students::find($request->student_id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->roll_no=$request->roll_no;
        $student->phone_no=$request->phone_no;
        $student->father_name=$request->father_name;
        $student->address=$request->address;
        $fees=Students::find($request->student_id)->fees;
        $fees->total_amount=$request->total_amount;
        $fees->amount_paid=$request->amount_paid;
        if($request->total_amount==$request->amount_paid){
            $fees->status='paid';
        }
        if($student->save() && $fees->save()) {
            Session::flash('success', "Students Profile Edited Successfully");
        }else{
            Session::flash('fail', "Something Went Wrong in editing students profile");
        }
        return view('admin.student.edit')
            ->with('student',$student)
            ->with('fees',$fees);
    }
    public function delete_student($student_id){
        $student=Students::find($student_id);

       if(Students::destroy($student_id)){
           Session::flash('success', " $student->name Records Deleted Successfully");
       } else{
           Session::flash('fail', "Something Went While Deleting $student->name profile");
       }
        return redirect()->action('AdminController@show_students');

    }
    public function change_password(Request $request){
        $this->validate($request,[
            'new_password'=>'required',
            'c_new_password'=>'required'
        ]);
        $admin=Admin::find(auth()->user()->id);
        $admin->password=Hash::make($request->new_passoword);
        if($admin->save()){
        Session::flash('success',"Admin Password Changed Succesfully");
        }else{
            Session::flash('fail',"Something Went Wrong While updating password");
        }
        return view('admin.change-password');
    }
    public function add_student(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'roll_no'=>'required',
            'phone_no'=>'required',
            'father_name'=>'required',
            'address'=>'required',
            'total_amount'=>'required',
            'amount_paid'=>'required',
            'set_password'=>'required'
        ]);
        $student=new Students();
        $student->name=$request->name;
        $student->email=$request->email;
        $student->roll_no=$request->roll_no;
        $student->phone_no=$request->phone_no;
        $student->father_name=$request->father_name;
        $student->address=$request->address;
        $student->class_id=Session::get('class_id');
        $student->password=Hash::make($request->input('set_password'));
        if($student->save()) {
            $fees = new Fees();
            $fees->student_id = $student->id;
            $fees->total_amount = $request->total_amount;
            $fees->amount_paid = $request->amount_paid;
            if($request->total_amount == $request->amount_paid){
                $fees->status='paid';
            }else{
                $fees->status='pending';
            }
            $fees->save();
            Session::flash('success', "Student Profile Added Successfully");
        }else{
            Session::flash('fail', "Something Went Wrong in Adding student profile");
        }
        return redirect()->back();
    }
    public function edit_student_report($student_id){
        $results=Students::find($student_id)->results;
        $subjects=Subjects::all();
        $exams=Exams::all();
        foreach ($results as $index=>&$result){
            $result['subject_name']=Subjects::find($result->subject_id)->name;
            $result['exam_name']=Exams::find($result->exam_id)->name;
        }
        return view('admin.student.edit_student_report')
            ->with('results',$results)
            ->with('exams',$exams)
            ->with('subjects',$subjects)
            ->with('student_id',$student_id);
    }
    public function add_academic_report(Request $request){
        $this->validate($request,[
            'student_id'=>'required',
            'exam_id'=>'required|regex:/^[0-9]*$/',
            'subject_id'=>'required|regex:/^[0-9]*$/',
            'mark'=>'required|regex:/^[0-9]*$/'
        ]);
        $check=Results::where('student_id','=',$request->student_id)
            ->where('exam_id','=',$request->exam_id)
            ->where('subject_id','=',$request->subject_id)->get();
        if(count($check)>0) {
            Session::flash('fail','Record already Exists');
            return redirect()->action('AdminController@edit_student_report',$request->student_id);
        }
        $result=new Results();
        $result->student_id=$request->student_id;
        $result->subject_id=$request->subject_id;
        $result->exam_id=$request->exam_id;
        $result->mark=$request->mark;
        if($result->save()){
            Session::flash('success','Record Added Successfully');
        }else{
            Session::flash('fail','Something went wrong while adding your record !!');
        }
        return redirect()->action('AdminController@edit_student_report',$request->student_id);
    }


}
