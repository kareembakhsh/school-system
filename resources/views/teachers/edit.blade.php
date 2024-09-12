@extends('layouts.app')

@section('content')
    <style>
        /* Container for the Edit Teacher form */
        .edit-teacher-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Heading */
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form Labels */
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #555;
        }

        /* Form Inputs */
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Submit Button */
        button {
            background-color: #007bff; /* Blue */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3; /* Darker Blue */
        }
    </style>

    <div class="edit-teacher-container">
        <h1>Edit Teacher</h1>

        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $teacher->name }}" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $teacher->email }}" required>
           
            <label for="subject">Subject:</label>
            <input type="text" name="subject" value="{{ $teacher->subject }}" required>

            <button type="submit">Update Teacher</button>
        </form>
    </div>
@endsection

