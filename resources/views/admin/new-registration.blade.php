<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
</head>
<body>
<!--Nav-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
<div class="container-fluid">
    <a href="#"><h3 class="navbar-brand"><i class="fa fa-home" aria-hidden="true"></i>Home</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-wrench" aria-hidden="true"></i>Change password</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>Signout</a></li>
    </ul>
</div>
</div>
</nav>
<!--Nav-->
<br>
<!--new registration-->
<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 col-12 jumbotron">
<h1 class="display-6 text-center">Add new student</h1>
<hr class="under-line">
<form action="/new-reg" method="POST">
    {{ csrf_field() }}
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


</body>
</html>
