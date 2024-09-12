<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom; // Include the Classroom model
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classes = Classroom::all(); // Get all available classes
        return view('students.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'class_id' => 'required|exists:classrooms,id' // Validate the selected class
        ]);

        $student = Student::create($request->only('name', 'age'));

        // Enroll student in the selected class
        $class = Classroom::find($request->class_id);
        $class->students()->attach($student->id);

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        $student->load('classrooms');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $classes = Classroom::all(); // Fetch all classes for the edit form
        return view('students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'class_id' => 'required|exists:classrooms,id' // Validate the selected class
        ]);

        $student->update($request->only('name', 'age'));

        // Update the student's enrollment in the class
        $class = Classroom::find($request->class_id);
        $class->students()->sync([$student->id]);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}

