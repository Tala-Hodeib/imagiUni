<?php
  
namespace App\Http\Controllers;
   
use App\Models\Student;
use Illuminate\Http\Request;
  
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::latest()->paginate(5);
    
        return view('student.index',compact('student'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_code' => 'required', 
            'first_name' => 'required',
            'father_name' => 'required',
            'last_name' => 'required',
            'mobile_number'  => 'required',
            'email' => 'required',
            'password' => 'required',
            'DOB'  => 'required',
        ]);
    
        Student::create($request->all());
     
        return redirect()->route('student.index')
                        ->with('success','Student created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show',compact('student'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit',compact('student'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_code' => 'required', 
            'first_name' => 'required',
            'father_name' => 'required',
            'last_name' => 'required',
            'mobile_number' => 'required',
            'email' => 'required',
            'password' => 'required',
            'DOB' => 'required',
        ]);
    
        $student->update($request->all());
    
        return redirect()->route('student.index')
                        ->with('success','Student updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
    
        return redirect()->route('student.index')
                        ->with('success','Student deleted successfully');
    }
}
