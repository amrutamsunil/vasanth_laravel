@extends('layouts.student_header')
@section('content')
<!--Nav-->

<!--Nav-->
<br>
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('fail'))
    <div class="alert alert-danger" role="alert">
        {{Session::get('fail')}}
    </div>
@endif
<hr/>
<div id="display">

</div>

@if(count($courses_enrolled) > 0)
<h1>Enrolled Courses</h1>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Duration (in Months)</th>
        <th scope="col">Fees</th>
        <td scope="col"></td>
    </tr>
    </thead>
    <tbody>
    @foreach($courses_enrolled as $index=>$course)
    <tr>
        <th scope="row">{{($index+1)}}</th>
        <td>{{$course->name}}</td>
        <td>{{$course->duration_months}}</td>
        <td>{{$course->fees}}</td>
        <td><a href="{{Route('student.remove_course',$course->id)}}">
                <button class="btn btn-danger">UnEnroll</button>
            </a></td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
    <h1>Oops You Have Not Purchased Any Courses Yet !! </h1>
 @endif
<h1>
   Courses Offered
</h1>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Duration (in Months)</th>
        <th scope="col">Fees</th>
        <td scope="col"></td>
    </tr>
    </thead>
    <tbody>
    @foreach($courses as $index=>$course)
        <tr>
            <th scope="row">{{($index+1)}}</th>
            <td>{{$course->name}}</td>
            <td>{{$course->duration_months}}</td>
            <td>{{$course->fees}}</td>
            <td><a href="{{Route('student.add_course',$course->id)}}">
                    <button class="btn btn-primary">Enroll</button>
                </a></td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
