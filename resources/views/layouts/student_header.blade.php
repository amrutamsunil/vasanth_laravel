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
    <a href="{{url('/')}}"><h3 class="navbar-brand"><i class="fa fa-home" aria-hidden="true"></i>Home</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
    	<li class="nav-item {{'student/dashboard'==request()->path() ? 'active' : ''}}">
            <a class="nav-link" href="{{Route('student.dashboard')}}"><i class="fa fa-book" aria-hidden="true"></i>Academic</a></li>
        <li class="nav-item {{'student/show_courses'==request()->path() ? 'active' : ''}}">
            <a class="nav-link" href="{{Route('student.show_course')}}"><i class="fa fa-book" aria-hidden="true"></i>Show Courses</a></li>
    	<li class="nav-item {{'student/fees'==request()->path() ? 'active' : ''}}">
            <a class="nav-link" href="{{Route('student.fees')}}"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>Fees details</a></li>
    	<li class="nav-item {{'student/personal_info'==request()->path() ? 'active' : ''}}">
            <a class="nav-link" href="{{Route('student.personal_info')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Personal details</a></li>
        <li class="nav-item {{'student/change_password'==request()->path() ? 'active' : ''}}">
            <a class="nav-link" href="{{Route('student.change_password')}}"><i class="fa fa-wrench" aria-hidden="true"></i>Change password</a></li>
        <li class="nav-item {{'student/logout'==request()->path() ? 'active' : ''}}">
            <a class="nav-link" href="{{Route('student.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Signout</a></li>
    </ul>
</div>
</div>
</nav>
<!--Nav-->
<br>
<!--Card-->
<div class="container-fluid">
<div class="row">
<div class="col-12 col-md-4">
<div class="card">
<img src="..." class="card-img-top" alt="...">
<div class="card-body">
<h3 class="card-title">{{auth()->user()->name}}</h3>
<p class="card-text">
	<h4>{{auth()->user()->roll_no}}</h4>
	<br>
</p>
</div>
</div>
</div>
</div>
</div>
<!--Card-->
@yield('content')

</body>
</html>
