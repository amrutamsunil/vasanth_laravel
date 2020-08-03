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
<div class="container-fluid">
    <div class="row my-5">
        <div class="col-2 col-md-4">
        </div>
        <div class="col-8 col-md-4 jumbotron">
            <h2 class="text-center">Login</h2>
            <form method="post" action="{{Route('student.login')}}" >
                @csrf
              <div class="form-group">
                <label for="username">User name</label>
                <input type="text"  name="username" class="form-control" id="username"  placeholder="Enter username" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
              </div>
              <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
        <div class="col-2 col-md-4">
        </div>
    </div>
</div>

</body>
</html>
