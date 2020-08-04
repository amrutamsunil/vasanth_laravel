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

