<?php

namespace App\Http\Controllers;

use App\Student;
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
        $students=Student::paginate(5);
        return view('student.index',compact('students'));
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
            'student_name'          =>  'required',
            'student_email'         =>  'required',
            'student_image'         =>  'required',
            'student_image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);
        $file_name = time() . '.' . request()->student_image->getClientOriginalExtension();

        request()->student_image->move(public_path('images'), $file_name);

      Student::create([
        'student_name'=>$request->student_name,
        'student_email'=>$request->student_email,
        'student_gender'=>$request->student_gender,
        'student_image'=>$file_name

      ]);
      return redirect()->route('std.index')->with('success', 'Student Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('student.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::find($id);
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'student_name'          =>  'required',
        'student_email'         =>  'required',
        'student_image'         =>  'required',
    ]);

        Student::find($id)->update([
            'student_name'=>$request->student_name,
            'student_email'=>$request->student_email,
            'student_gender'=>$request->student_gender,
            'student_image'=>$request->student_image

          ]);
          return redirect()->route('std.index')->with('success', 'Student Update successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        return redirect()->route('std.index')->with('success', 'Student Delete successfully.');

    }
}