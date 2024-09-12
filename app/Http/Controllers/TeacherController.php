<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Classroom; 
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'email' => 'required|email','subject' => 'required']);
        Teacher::create($request->all());
        return redirect()->route('teachers.index');
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate(['name' => 'required', 'email' => 'required|email','subject' => 'required']);
        $teacher->update($request->all());
        return redirect()->route('teachers.index');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index');
    }
    public function show(Teacher $teacher)
    {
        $teacher->load('classrooms');
        return view('teachers.show', compact('teacher'));
    }
}


