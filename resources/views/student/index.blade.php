@extends('student.master')

@section('content')
@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Student Data</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('std.create') }}" class="btn btn-success btn-sm float-end"><i class="fa fa-plus-circle"></i>Add New</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->student_name }}</td>
                        <td>{{ $student->student_email }}</td>
                        <td>{{ $student->student_gender }}</td>
                        <td>{{ $student->student_image }}</td>
                        <td>
                            <form method="post" action="{{ route('std.destroy', $student->id) }}">
                            @csrf
                            @method('DELETE')
                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>View</a>
                            <a href="{{ route('std.edit',$student->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure')" ><i class="fa fa-trash"></i>Delete</a>
                            </form>

                        </td>
                @endforeach

                </tr>


            </table>
            {{$students->links()}}

        </div>
    </div>
@endsection
