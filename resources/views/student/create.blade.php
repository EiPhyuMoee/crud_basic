@extends('student.master')

@section('content')


    <div class="card">
        <div class="card-header">Add Student</div>
        <div class="card-body">
            <form method="post" action="{{ route('std.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Student Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="student_name" class="form-control" value="" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Student Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="student_email" class="form-control" required />
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Student Gender</label>
                    <div class="col-sm-10">
                        <select name="student_gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-label-form">Student Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="student_image" />
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Add" />
                </div>
            </form>
        </div>
    </div>
@endsection
