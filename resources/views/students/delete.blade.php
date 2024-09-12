@extends('layouts.app')

@section('content')
    <style>
        .confirmation-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }

        button {
            background-color: #dc3545; /* Red */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        button:hover {
            background-color: #c82333; /* Darker Red */
        }

        .cancel-button {
            background-color: #6c757d; /* Gray */
        }

        .cancel-button:hover {
            background-color: #5a6268; /* Darker Gray */
        }
    </style>

    <div class="confirmation-container">
        <h1>Delete Student</h1>

        <p>Are you sure you want to delete the student <strong>{{ $student->name }}</strong>?</p>

        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

        <a href="{{ route('students.index') }}">
            <button class="cancel-button">Cancel</button>
        </a>
    </div>
@endsection
