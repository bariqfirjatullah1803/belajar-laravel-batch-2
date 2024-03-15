<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        Student::create([
            'name' => $request->name,
            'address' => $request->address
        ]);

        return redirect()->route('student.index');
    }

    public function edit(Student $student)
    {

        return view('student.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $student->update([
            'name' => $request->name,
            'address' => $request->address
        ]);

        return redirect()->route('student.edit', $student->id);
    }

    public function destroy(Request $request, Student $student)
    {
        $student->delete();

        return redirect()->route('student.index');
    }
}
