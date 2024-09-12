@extends('layouts.app')

@section('content')
    <style>
        /* Container for the Edit Form */
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Heading */
        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form Elements */
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #007bff; /* Blue */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3; /* Darker Blue */
        }
    </style>

    <div class="form-container">
        <h1>Edit Student</h1>

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Student Name:</label>
            <input type="text" name="name" value="{{ old('name', $student->name) }}" required>

            <label for="age">Age:</label>
            <input type="number" name="age" value="{{ old('age', $student->age) }}" required>

            <label for="class_id">Enroll to Class:</label>
            <select name="class_id" required>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ $class->students->contains($student->id) ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Update Student</button>
        </form>
    </div>
@endsection

