@extends('layouts.admin_header')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    @if(Session::has('fail'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('fail')}}
        </div>
    @endif
<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 col-12 jumbotron">
<h1 class="display-6">change password</h1>
<hr class="under-line">
<form action="{{Route('admin.change_password')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="newpass">New password</label>
    <input type="text" class="form-control" name="new_password" id="newpass" aria-describedby="newpassword" placeholder="Enter new password" required>
  </div>
  <div class="form-group">
    <label for="confirmpass">Re-enter-Password</label>
    <input type="password" class="form-control" name="c_new_password" id="confirmpass" placeholder="Re-enter password" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="col-md-2"></div>
</div>
</div>
@endsection

