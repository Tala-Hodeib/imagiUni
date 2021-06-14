@extends('registration.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrations</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('registration.create') }}"> Create New Registration</a>
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
            <th>Course Id</th>
            <th>Student Id</th>
            <th>Date created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($registration as $registration1)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $registration1-> course_id }}</td>
            <td>{{ $registration1-> student_id }}</td>
            <td>{{ $registration1-> date_created }}</td>
            <td>
                <form action="{{ route('registration.destroy',$registration1->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('registration.show',$registration1->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('registration.edit',$registration1->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {{ $registration->links() }}
      
@endsection