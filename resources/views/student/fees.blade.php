@extends('layouts.student_header')
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 col-12 text-center jumbotron">
<h1 class="display-6">Fees details</h1>
<hr class="under-line">
<div class="table-responsive">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Total Fees</th>
      <th scope="col">Fees Paid</th>
        @if($fees->total_amount!=$fees->amount_paid)
        <th scope="col">Balance</th>
        @endif
        <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$fees->total_amount}}</td>
        <td>{{$fees->amount_paid}}</td>
        @if($fees->total_amount!=$fees->amount_paid)
        <td>{{($fees->total_amount - $fees->amount_paid)}}</td>
        @endif
      <td>{{strtoupper($fees->status)}}</td>
    </tr>
  </tbody>
</table>

<h1 class="display-6">Fees structure</h1>
<hr class="under-line">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">s.no</th>
      <th scope="col">list</th>
      <th scope="col">fees</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Basic fees</td>
      <td>{{$basic_fees}}</td>
    </tr>
  @foreach($courses_enrolled as $index=>$course)
      <tr>
      <th scope="row">{{$index+2}}</th>
      <td>{{$course->name}} Course</td>
      <td>{{$course->fees}}</td>
      </tr>
  @endforeach

  </tbody>
</table>

</div>
</div>
<div class="col-md-2"></div>
</div>
</div>
@endsection
