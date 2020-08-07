@extends("layouts.admin_header")
@section('content')
<!--students-list-->
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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
Add Student
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{Route('admin.add_student')}}" method="POST">
                @csrf
            <div class="modal-body">
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
                <div class="form-group">
                    <label for="set_password">Password</label>
                    <input type="password" class="form-control" name="set_password" placeholder="Password">
                </div>

                <h3 class="display-6 text-center">Fees details</h3>

                <div class="form-group">
                    <label for="fee">Total Fees</label>
                    <input type="number" class="form-control" name="total_amount" value="{{$basic_fees}}" readonly>
                </div>
                <div class="form-group">
                    <label for="fee">Fees Paid</label>
                    <input type="number" class="form-control" name="amount_paid" placeholder="Enter total fee amount">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">S.no</th>
            <th scope="col">Roll number</th>
            <th scope="col">Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $index=>$student)
            <tr>
                <th scope="row">{{($index+1)}}</th>
                <td>{{$student->roll_no}}</td>
                <td>{{$student->name}}</td>
                <td>
                    <a href="{{Route('admin.student_profile',$student->id)}}">
                        <button class="btn btn-warning" type="button">Edit</button>
                    </a></td>
                    <td>
                        <a href="{{Route('admin.delete_student',$student->id)}}">
                        <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                    </td>
            </tr>
        @endforeach


        </tbody>
    </table>
</div>
<!--students-list-->
@endsection

