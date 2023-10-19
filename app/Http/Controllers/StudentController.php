<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
           // $view = view('template');
           // return $view;
        
        $student = Student::latest()->paginate(5);

        return view('student.index', compact('student'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'adress' =>'required',
            'phone' =>'required'
        ]);

        Student::create($request->all());

        return redirect()->route('student.index')
            ->with('success', 'student data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'adress' => 'required',
            'phone' => 'required'
        ]);

        $student->update($request->all());

        return redirect()->route('student.index')
            ->with('success', 'student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')
            ->with('success', 'student data deleted successfully');
    }
}