@extends('registration.layout')

    <body style="background-color:#000721;">

        <img src="images/imagiuniphoto.jpeg" width="500" height="500">

        <div class="pull-top">
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('course.index') }}"> Courses</a>
        </div>
        <div class="pull-bottom">
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('student.index') }}"> Students</a>
        </div>
         <div class="pull-bottom">
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('registration.index') }}"> Registration</a>
        </div>
    </body>
</html>
