<?php
namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classroom::with('teachers')->get();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $students = Student::all();
        return view('classes.create', compact('teachers', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'teachers' => 'required|array',
            'subjects' => 'required|array',
            'fees' => 'required|numeric',
            'timetable' => 'required|array',
            'timetable.*.day' => 'required|string',
            'timetable.*.time' => 'required|string',
        ]);
    
        $subjects = implode(',', $request->subjects);
        $timetable = json_encode($request->timetable);
    
        $class = Classroom::create([
            'name' => $request->name,
            'subjects' => $subjects,
            'fees' => $request->fees,
            'timetable' => $timetable,
        ]);
    
        $class->teachers()->attach($request->teachers);
    
        return redirect()->route('classes.index');
    }

    public function edit(Classroom $class)
    {
        $teachers = Teacher::all();
        $students = Student::all();
        return view('classes.edit', compact('class', 'teachers', 'students'));
    }

    public function update(Request $request, Classroom $class)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'teachers' => 'required|array',
            'subjects' => 'required|array',
            'fees' => 'required|numeric',
            'timetable' => 'required|array',
            'timetable.*.day' => 'required|string',
            'timetable.*.time' => 'required|string',
        ]);
    
        // Ensure that subjects is an array
        if (is_array($request->subjects)) {
            $subjects = implode(',', $request->subjects);
        } else {
            $subjects = $request->subjects; // Handle this as needed if subjects isn't an array
        }
    
        $timetable = json_encode($request->timetable);
    
        $class->update([
            'name' => $request->name,
            'subjects' => $subjects,
            'fees' => $request->fees,
            'timetable' => $timetable,
        ]);
    
        // Sync the teachers
        $class->teachers()->sync($request->teachers);
    
        return redirect()->route('classes.index');
    }
    

    public function destroy(Classroom $class)
    {
        $class->delete();
        return redirect()->route('classes.index');
    }
    public function show(Classroom $class)
{
    $class->load('teachers', 'students');

    // Ensure subjects and timetable are in the correct format
    $class->subjects = explode(',', $class->subjects);
    $class->timetable = json_decode($class->timetable, true);

    return view('classes.show', compact('class'));
}
}
