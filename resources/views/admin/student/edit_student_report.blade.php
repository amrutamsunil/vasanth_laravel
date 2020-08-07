@extends('layouts.student_header')
@section('content')
    <!-- Button trigger modal -->
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Mark Entry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{Route('admin.add_academic_report')}}" method="post">
                <div class="modal-body">
                        @csrf
                        <select name="exam_id" class="custom-select">
                            <option selected>Select Exam</option>
                            @foreach($exams as $index=>$exam)
                            <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                        </select>
                        <select name="subject_id" class="custom-select">
                            <option selected>Select Subject</option>
                            @foreach($subjects as $index=>$subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" value="{{$student_id}}" name="student_id" hidden>
                        <input type="number" min="0" max="100" name="mark" required>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Add New
        </button>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-12 text-center jumbotron">
                <h1 class="display-6">Academic details</h1>
                <hr class="under-line">
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">S.no</th>
                            <th scope="col">Exam</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Grade (Out of 100)</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($results as $index=>$result)
                                <tr>
                                <td >{{$index+1}}</td>
                                <td >{{$result->exam_name}}</td>
                                <td>{{$result->subject_name}}</td>
                                <td>{{$result->mark}}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>

@endsection
<!--Academic-->
