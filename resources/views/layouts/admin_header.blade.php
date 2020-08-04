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
    <a href="{{Route('admin.dashboard')}}"><h3 class="navbar-brand"><i class="fa fa-home" aria-hidden="true"></i>Home</h3></a>
    @if(Session::has('department_id') && Session::has('department_short_name'))
        <a href="{{Route('admin.choose_department')}}"><h3 class="navbar-brand">Dept : {{Session::get('department_short_name')}}</h3></a>
    @endif
    @if(Session::has('class_id') && Session::has('class_name'))
        <a href="{{Route('admin.choose_department')}}"><h3 class="navbar-brand">Class : {{Session::get('class_name')}}</h3></a>
    @endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link btn btn-secondary"
                                href="{{Route('admin.students')}}">Students</a></li>
        <li class="nav-item"><a class="nav-link"
                                href="{{Route('admin.show_change_password')}}"><i class="fa fa-wrench" aria-hidden="true"></i>Change password</a></li>
        <li class="nav-item"><a class="nav-link"
                                href="{{Route('admin.choose_department')}}"><i class="fa fa-wrench" aria-hidden="true"></i>Choose Department</a></li>
        <li class="nav-item"><a class="nav-link"
                                href="{{Route('admin.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Signout</a></li>
    </ul>
</div>
</div>
</nav>
@yield('content')

</body>
</html>
