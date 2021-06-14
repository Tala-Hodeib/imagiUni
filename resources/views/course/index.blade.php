@extends('course.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Courses</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('course.create') }}"> Create New Course</a>
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
            <th>Course Code</th>
            <th>Course Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($course as $course1)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $course1->course_code }}</td>
            <td>{{ $course1->course_name }}</td>
            <td>
                <form action="{{ route('course.destroy',$course1->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('course.show',$course1->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('course.edit',$course1->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $course->links() }}
      
@endsection