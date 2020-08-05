@extends("layouts.admin_header")
@section('content')
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
    <form action="{{Route('admin.select_department')}}" method="POST">
        @csrf
<div class="container-fluid jumbotron">
    <div class="row">
        <div class="col-md-7 offset-md-2">
            <div class="input-group mb-3">
                <label for="inputGroupSelect02" class="control-label"> Select Department
                <select class="custom-select" name="select_dept" id="inputGroupSelect02">
                    <option selected>Select Department</option>
                @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
                </label>
                <div class="input-group-prepend">
                <input class="btn btn-outline-secondary" value="Select" type="submit">
                </div>
            </div>
        </div>
</div>
</div>
    </form>
@if(Session::has('department_id') || Session::has('class_id'))
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Selected Department</h5>
                    <p class="card-text">{{Session::get('department_name')}}</p>
                </div>
            </div>
            <form action="{{Route('admin.select_class')}}" method="POST">
                @csrf
                <div class="container-fluid jumbotron">
                    <div class="row">
                        <div class="col-md-7 offset-md-2">
                            <div class="input-group mb-3">
                                <select class="custom-select" name="select_class" id="inputGroupSelect02">
                                    <option selected>Select Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}">
                                            {{Session::get('department_short_name')}} - {{$class->name}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-prepend">
                                    <input class="btn btn-outline-secondary" value="Select" type="submit">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
    </form>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Selected Class</h5>
                        <p class="card-text">{{Session::get('class_name')}}</p>
                    </div>
                </div>
        @endif

        <!--dept select-->
@endsection
