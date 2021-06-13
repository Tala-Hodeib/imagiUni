<?php
  
namespace App\Http\Controllers;
   
use App\Models\Registration;
use Illuminate\Http\Request;
  
class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registration = Registration::latest()->paginate(5);
    
        return view('registration.index',compact('registration'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration.create');
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
            'course_id' => 'required', 
            'student_id' => 'required',
        ]);
    
        Registration::create($request->all());
     
        return redirect()->route('registration.index')
                        ->with('success','Registration created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        return view('registration.show',compact('registration'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        return view('registration.edit',compact('registration'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        $request->validate([
            'course_id' => 'required', 
            'student_id' => 'required',
        ]);
    
        $student->update($request->all());
    
        return redirect()->route('registration.index')
                        ->with('success','Registration updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();
    
        return redirect()->route('registration.index')
                        ->with('success','Registration deleted successfully');
    }
}
