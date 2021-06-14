<?php
  
namespace App\Http\Controllers;
   
use App\Models\Course;
use Illuminate\Http\Request;
  
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::latest()->paginate(5);
    
        return view('course.index',compact('course'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
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
            'course_code' => 'required', 
            'course_name' => 'required',
        ]);

    
        Course::create($request->all());
     
        return redirect()->route('course.index')
                        ->with('success','Course created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('course.show',compact('course'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('course.edit',compact('course'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_code' => 'required', 
            'course_name' => 'required',
        ]);
    
        $course->update($request->all());
    
        return redirect()->route('course.index')
                        ->with('success','Course updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
    
        return redirect()->route('course.index')
                        ->with('success','Course deleted successfully');
    }
}
