@extends('layouts.app')

@section('content')
    <style>
        /* Container for the Students List */
        .students-container {
            max-width: 800px;
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

        /* Add New Student Link */
        a.add-student {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #007bff; /* Blue */
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        a.add-student:hover {
            background-color: #0056b3; /* Darker Blue */
        }

        /* List of Students */
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Links within the list */
        li a {
            color: #007bff; /* Blue */
            text-decoration: none;
            transition: color 0.3s;
        }

        li a:hover {
            color: #0056b3; /* Darker Blue */
        }

        /* Delete Button */
        button {
            background-color: #dc3545; /* Red */
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c82333; /* Darker Red */
        }
    </style>

    <div class="students-container">
        <h1>Students</h1>
        <a href="{{ route('students.create') }}" class="add-student">Add New Student</a>

        <ul>
            @foreach ($students as $student)
                <li>
                    <a href="{{ route('students.show', $student->id) }}">{{ $student->name }}</a>
                    <span>
                        - <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
