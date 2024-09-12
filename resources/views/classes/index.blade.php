@extends('layouts.app')

@section('content')
    <style>
        .classes-list {
            max-width: 800px;
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
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        li {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }

        form {
            display: inline;
        }

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

    <div class="classes-list">
        <h1>Classes</h1>
        <a href="{{ route('classes.create') }}">Add New Class</a>

        <ul>
            @foreach ($classes as $class)
                <li>
                    <a href="{{ route('classes.show', $class->id) }}">{{ $class->name }}</a>
                    - <a href="{{ route('classes.edit', $class->id) }}">Edit</a>
                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
