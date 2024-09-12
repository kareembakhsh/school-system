@extends('layouts.app')

@section('content')
    <style>
        /* Container for the Teachers list */
        .teachers-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Heading */
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Add New Teacher Link */
        a {
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Teacher List */
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
            color: #333;
        }

        /* Delete Button */
        button {
            background-color: #dc3545; /* Red */
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
        }

        button:hover {
            background-color: #c82333; /* Darker Red */
        }

        /* Form */
        form {
            display: inline-block;
        }
    </style>

    <div class="teachers-container">
        <h1>Teachers</h1>
        <a href="{{ route('teachers.create') }}">Add New Teacher</a>

        <ul>
            @foreach ($teachers as $teacher)
                <li>
                    <a href="{{ route('teachers.show', $teacher->id) }}">{{ $teacher->name }}</a>
                    - <a href="{{ route('teachers.edit', $teacher->id) }}">Edit</a>
                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
