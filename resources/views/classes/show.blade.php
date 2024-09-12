@extends('layouts.app')

@section('content')
    <style>
        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        div {
            margin-bottom: 20px;
        }

        strong {
            display: block;
            font-size: 18px;
            color: #444;
        }

        p {
            font-size: 16px;
            color: #666;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            background-color: #f9f9f9;
            padding: 8px;
            margin-bottom: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        button[type="submit"] {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #c82333;
        }
    </style>

    <h1>Class Details</h1>

    <div>
        <strong>Class Name:</strong>
        <p>{{ $class->name }}</p>
    </div>

    <div>
        <strong>Assigned Teachers:</strong>
        <ul>
            @foreach($class->teachers as $teacher)
                <li>
                    {{ $teacher->name }} - {{ $teacher->subject }}
                </li>
            @endforeach
        </ul>
    </div>

    <div>
        <strong>Subjects:</strong>
        <p>{{ implode(', ', $class->subjects) }}</p>
    </div>

    <div>
        <strong>Fees:</strong>
        <p>${{ number_format($class->fees, 2) }}</p>
    </div>

    <div>
        <strong>Timetable:</strong>
        <ul>
            @foreach($class->timetable as $entry)
                <li>{{ $entry['day'] }}: {{ $entry['time'] }}</li>
            @endforeach
        </ul>
    </div>

    <div>
        <strong>Assigned Students:</strong>
        <ul>
            @forelse($class->students as $student)
                <li>{{ $student->name }}</li>
            @empty
                <li>No students assigned</li>
            @endforelse
        </ul>
    </div>

    <a href="{{ route('classes.edit', $class->id) }}">Edit Class</a>
    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this class?')">Delete Class</button>
    </form>

    <a href="{{ route('classes.index') }}">Back to Class List</a>
@endsection


