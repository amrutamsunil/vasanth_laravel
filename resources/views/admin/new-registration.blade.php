@extends('layouts.admin_header')
@section('content')
<!--new registration-->
<div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 col-12 jumbotron">
<h1 class="display-6 text-center">Add new student</h1>
<hr class="under-line">
<form action="" method="POST">
    <h3 class="display-6 text-center">Personal details</h3>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" aria-describedby="student-name" placeholder="Enter student name">
  </div>
  <div class="form-group">
    <label for="dob">Date of birth</label>
    <input type="text" class="form-control" name="dob" placeholder="Enter date of birth">
  </div>
  <div class="form-group">
    <label for="rollno">Roll number</label>
    <input type="text" class="form-control" name="rollno" placeholder="Enter roll-number">
  </div>

  <div class="form-group">
    <label>Department</label>
      <select class="custom-select"  name="dept">
        <option selected>select department</option>
        <option value="Comuter science and engineering">Comuter science and engineering</option>
        <option value="Civil engineering">Civil engineering</option>
        <option value="Mechanical engineering">Mechanical engineering</option>
        <option value="Electrical and electronic engineering">Electrical and electronic engineering</option>
        <option value="Electrical and communication engineering">Electrical and communication engineering</option>
      </select>
  </div>

  <div class="form-group">
    <label>Short name of department</label>
      <select class="custom-select" name="shortDept">
        <option selected>select short name of department</option>
        <option value="CSE">CSE</option>
        <option value="Civil">Civil</option>
        <option value="Mech">Mech</option>
        <option value="EEE">EEE</option>
        <option value="ECE">ECE</option>
      </select>
  </div>

  <div class="form-group">
    <label>Year</label>
      <select class="custom-select">
        <option selected>select year</option>
        <option name="year" value="1">First year</option>
        <option name="year" value="2">Second year</option>
        <option name="year" value="3">Third year</option>
        <option name="year" value="4">Final year</option>
      </select>
  </div>

  <div class="form-group">
    <label for="phone">Phone number</label>
    <input type="tel" class="form-control" name="phone" placeholder="Enter phone-number">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="f-name">Father name</label>
    <input type="text" class="form-control" name="f-name" placeholder="Enter father name">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" placeholder="Door no,street name,city">
  </div>
  <div class="form-group">
    <label for="profile-pic">Upload profile photo</label>
    <input type="file" class="form-control-file" name="profile-pic">
  </div>

  <h3 class="display-6 text-center">Fees details</h3>

  <div class="form-group">
    <label for="fee">Total fees</label>
    <input type="number" class="form-control" name="fee" placeholder="Enter total fee amount">
  </div>


  <input type="submit" name="submit" class="btn btn-warning">
</form>
</div>
<div class="col-md-2"></div>
</div>
</div>
<!--new registration-->
@endsection
