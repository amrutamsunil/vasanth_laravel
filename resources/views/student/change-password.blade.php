@extends('layouts.student_header')
@section('content')
    @if(@$message)
    <h2>{{$message}}</h2>
    @endif
<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8 col-12 jumbotron">
<h1 class="display-6">change password</h1>
<hr class="under-line">
<form action="{{Route('student.change_password_form')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="newpass">New password</label>
    <input type="text" class="form-control" name="new_password" id="newpass" aria-describedby="newpassword" placeholder="Enter new password" required>
  </div>
  <div class="form-group">
    <label for="confirmpass">Re-enter-Password</label>
    <input type="text" class="form-control" name="c_new_password" id="confirmpass" placeholder="Re-enter password" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="col-md-2"></div>
</div>
</div>
@endsection

