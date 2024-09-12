@extends('layouts.app')

@section('content')
    <style>
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 16px;
            box-sizing: border-box;
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
            display: block;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3; /* Darker Blue */
        }
    </style>

    <div class="form-container">
        <h1>Add New Student</h1>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <label for="name">Student Name:</label>
            <input type="text" name="name" required>

            <label for="age">Age:</label>
            <input type="number" name="age" required>

            <label for="class_id">Enroll to Class:</label>
            <select name="class_id" required>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>

            <button type="submit">Add Student</button>
        </form>
    </div>
@endsection


