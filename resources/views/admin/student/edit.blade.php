@extends('layouts.admin_header')
@section('content')
    <!--new registration-->
    @if ($errors->any())
        <div class="card-body">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
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
                    <h1 class="display-6 text-center">Student Profile</h1>
                    <hr class="under-line">
                    <form action="{{Route('admin.student_edit')}}" method="POST">
                        @csrf
                        <h3 class="display-6 text-center">Personal details</h3>
                        <input type="text" value="{{$student->id}}" name="student_id" hidden/>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="student-name" value="{{$student->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter date of birth" value="{{$student->email}}">
                        </div>
                        <div class="form-group">
                            <label for="roll_no">Roll number</label>
                            <input type="text" class="form-control" name="roll_no" value="{{$student->roll_no}}"  placeholder="Enter roll-number">
                        </div>


                        <div class="form-group">
                            <label for="phone_no">Phone number</label>
                            <input type="tel" class="form-control" name="phone_no" value="{{$student->phone_no}}" placeholder="Enter phone-number">
                        </div>

                        <div class="form-group">
                            <label for="father_name">Father's name</label>
                            <input type="text" class="form-control" name="father_name" value="{{$student->father_name}}" placeholder="Enter father name">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" value="{{$student->address}}" placeholder="Door no,street name,city">
                        </div>
                        <div class="form-group">
                            <label for="profile-pic">Upload profile photo</label>
                            <input type="file" class="form-control-file" name="profile-pic">
                        </div>

                        <h3 class="display-6 text-center">Fees details</h3>

                        <div class="form-group">
                            <label for="total_amount">Total fees</label>
                            <input type="number" class="form-control" name="total_amount" value="{{$fees->total_amount}}" placeholder="Enter total fee amount">
                        </div>
                        <div class="form-group">
                            <label for="amount_paid">Fees Paid</label>
                            <input type="number" class="form-control" name="amount_paid" value="{{$fees->amount_paid}}" placeholder="Enter total fee amount">
                        </div>


                        <input type="submit" name="submit" class="btn btn-warning">
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!--new registration-->
@endsection
