@extends('layouts.app')

@section('content')
    <style>
        form {
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

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="text"]::placeholder,
        input[type="number"]::placeholder {
            color: #888;
        }

        .timetable-field {
            margin-bottom: 10px;
        }

        .timetable-field input {
            width: calc(50% - 10px);
            display: inline-block;
            margin-right: 10px;
        }

        button[type="button"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-bottom: 20px;
        }

        button[type="button"]:hover {
            background-color: #0056b3;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }
    </style>

    <h1>Add New Class</h1>

    <form action="{{ route('classes.store') }}" method="POST">
        @csrf

        <label for="name">Class Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label for="teachers">Assign Teachers:</label>
        <select name="teachers[]" multiple required>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" @if(in_array($teacher->id, old('teacher', []))) selected @endif>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>

        <label for="subjects">Subjects (comma-separated):</label>
        <input type="text" name="subjects[]" value="{{ old('subjects') }}" required>

        <label for="fees">Fees:</label>
        <input type="number" step="0.01" name="fees" value="{{ old('fees') }}" required>

        <label for="timetable">Timetable:</label>
        <div id="timetable-fields">
            <div class="timetable-field">
                <input type="text" name="timetable[0][day]" placeholder="Day" required>
                <input type="text" name="timetable[0][time]" placeholder="Time (e.g., 12:00-1:00)" required>
            </div>
        </div>
        <button type="button" id="add-timetable">Add Another Time Slot</button>

        <button type="submit">Add Class</button>
    </form>

    <script>
        document.getElementById('add-timetable').addEventListener('click', function () {
            var index = document.querySelectorAll('#timetable-fields .timetable-field').length;
            var timetableFields = document.getElementById('timetable-fields');
            var newField = document.createElement('div');
            newField.className = 'timetable-field';
            newField.innerHTML = `
                <input type="text" name="timetable[${index}][day]" placeholder="Day" required>
                <input type="text" name="timetable[${index}][time]" placeholder="Time (e.g., 12:00-1:00)" required>
            `;
            timetableFields.appendChild(newField);
        });
    </script>
@endsection


