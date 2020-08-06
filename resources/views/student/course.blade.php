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
    	<li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-book" aria-hidden="true"></i>Academic</a></li>
    	<li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>Fees details</a></li>
    	<li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Personal details</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-wrench" aria-hidden="true"></i>Change password</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>Signout</a></li>
    </ul>
</div>
</div>
</nav>
<!--Nav-->
<br>

<div class="col-md-4 offset-md-4 mt-5 border border-success pt-3">
    <div class="input-group mb-3">
        <input type="text" id="search" name="search" class="form-control" placeholder="Search ......" aria-label="Recipient's username">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
        </div>
    </div>
</div>
<hr/>
<div id="display">

</div>
</body>
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('courses_search')}}',
            data:{'search':$value},
            success:function(data){
                $('#display').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</html>
