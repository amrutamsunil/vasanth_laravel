@extends('layouts.student_header')
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 col-12 text-center jumbotron">
<h1 class="display-6">Personal details</h1>
<hr class="under-line">
<div class="table-responsive">
<table class="table table-dark">
  <tbody>
  <tr>
      <th scope="row">Name</th>
      <td>{{auth()->user()->name}}</td>
  </tr>
    <tr>
      <th scope="row">Father's name</th>
      <td>{{auth()->user()->father_name}}</td>
    </tr>

    <tr>
      <th scope="row">Phone number</th>
      <td>{{auth()->user()->phone_no}}</td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td>{{auth()->user()->email}}</td>
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td><address>
      	<p>{{auth()->user()->address}}</p>
      </address></td>
    </tr>
  </tbody>
</table>
</div>
</div>
<div class="col-md-2"></div>
</div>
</div>
@endsection
