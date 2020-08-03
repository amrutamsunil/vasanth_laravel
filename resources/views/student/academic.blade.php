@extends('layouts.student_header')
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 col-12 text-center jumbotron">
<h1 class="display-6">Academic details</h1>
<hr class="under-line">
<div class="table-responsive">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">S.no</th>
        <th scope="col">Exam</th>
      <th scope="col">Subject</th>
      <th scope="col">Grade</th>
        <th scope="col">Max score</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        @foreach($subjects as $index=>$subject)
            <td scope="row">{{$index+1}}</td>
            <td>{{$subject->result->exam->name}}</td>
            <td>{{$subject->name}}</td>
            <td>{{$subject->result->mark}}</td>
            <td>{{$subject->result->exam->max_score}}</td>
        @endforeach

    </tr>

  </tbody>
</table>
</div>
</div>
<div class="col-md-2"></div>
</div>
</div>
@endsection
<!--Academic-->
