@extends('student.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Students</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('student.create') }}"> Create New Student</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Number</th>
            <th>Student Code</th>
            <th>First Name</th>
            <th>Father Name</th>
            <th>Last Name</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>Password</th>
            <th>Date of Birth</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($student as $student1)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student1->student_code }}</td>
            <td>{{ $student1->first_name }}</td>
            <td>{{ $student1->father_name }}</td>
            <td>{{ $student1->last_name }}</td>
            <td>{{ $student1->mobile_number }}</td>
            <td>{{ $student1->email }}</td>
            <td>{{ $student1->password }}</td>
            <td>{{ $student1->DOB }}</td>
            <td>
                <form action="{{ route('student.destroy',$student1->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('student.show',$student1->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('student.edit',$student1->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $student->links() !!}
      
@endsection