<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // SHOW ALL STUDENTS
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // SHOW FORM
    public function create()
    {
        return view('students.create');
    }
    public function edit($id)
{
    $student = Student::findOrFail($id);
    return view('students.edit', compact('student'));
}

public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $student->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('students.index')
                     ->with('success', 'Student updated successfully');
}

public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('students.index')
                     ->with('success', 'Student deleted successfully');
}

    // STORE DATA
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|email|unique:students'
            ]);

            Student::create($request->all());

            return redirect()->route('students.index')
                ->with('success', 'Student added successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }
}