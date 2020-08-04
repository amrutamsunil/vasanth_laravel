@extends("layouts.admin_header")
@section("content")
<!--new registration-->
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Selected Department</h5>
        <p class="card-text">{{Session::get('department_name')}}</p>
    </div>
</div>
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Selected Class</h5>
        <p class="card-text">{{Session::get('class_name')}}</p>
    </div>
</div>
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
                <h1 class="display-6 text-center">Add new student</h1>
                <hr class="under-line">
                <form action="{{Route('admin.add_student')}}" method="POST">
                    @csrf
                    <h3 class="display-6 text-center">Personal details</h3>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" aria-describedby="student-name" placeholder="Enter student name">
                    </div>

                    <div class="form-group">
                        <label for="rollno">Roll number</label>
                        <input type="text" class="form-control" name="roll_no" placeholder="Enter roll-number">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="tel" class="form-control" name="phone_no" placeholder="Enter phone-number">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="f-name">Father's name</label>
                        <input type="text" class="form-control" name="father_name" placeholder="Enter father name">
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
                        <label for="fee">Total Fees</label>
                        <input type="number" class="form-control" name="total_amount" placeholder="Enter total fee amount">
                    </div>
                    <div class="form-group">
                        <label for="fee">Fees Paid</label>
                        <input type="number" class="form-control" name="amount_paid" placeholder="Enter total fee amount">
                    </div>
                    <div class="form-group">
                        <label>Fees Status</label>
                        <select name="status" class="custom-select">
                            <option  selected value='pending'>Pending</option>
                            <option  value='paid'>Paid</option>

                        </select>
                    </div>


                    <input type="submit" name="submit" class="btn btn-warning">
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <!--new registration-->
    @endsection
