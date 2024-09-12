@extends('layouts.app')

@section('content')
    <style>
        /* Container for the Student Details */
        .student-details-container {
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

        /* Student Name */
        h2 {
            font-size: 24px;
            color: #333;
        }

        /* Paragraphs */
        p {
            font-size: 16px;
            color: #555;
            margin: 10px 0;
        }

        /* Lists */
        ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        /* Back to Student List Link */
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff; /* Blue */
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #0056b3; /* Darker Blue */
        }
    </style>

    <div class="student-details-container">
        <h1>Student Details</h1>

        <div>
            <h2>{{ $student->name }}</h2>
            <p><strong>Age:</strong> {{ $student->age }}</p>

            @if ($student->classrooms->isNotEmpty())
                <h3>Enrolled Classes:</h3>
                <ul>
                    @foreach($student->classrooms as $classroom)
                        <li>
                            <strong>{{ $classroom->name }}</strong>
                            <ul>
                                @foreach(explode(',', $classroom->subjects) as $subject)
                                    <li>{{ $subject }}</li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No classes assigned.</p>
            @endif
        </div>

        <a href="{{ route('students.index') }}">Back to Student List</a>
    </div>
@endsection
