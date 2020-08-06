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
      <th scope="col">Grade (Out of 100)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        @foreach($results as $index=>$result)
            <td scope="row">{{$index+1}}</td>
            <td>{{$result->exam_name}}</td>
            <td>{{$result->subject_name}}</td>
            <td>{{$result->mark}}</td>
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
