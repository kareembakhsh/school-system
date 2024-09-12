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

        .timetable-entry {
            margin-bottom: 10px;
        }

        .timetable-entry input {
            width: calc(50% - 10px);
            display: inline-block;
            margin-right: 10px;
        }

        .timetable-entry button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .timetable-entry button:hover {
            background-color: #c82333;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        button[type="button"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        button[type="button"]:hover {
            background-color: #218838;
        }
    </style>

    <h1>Edit Class</h1>

    <form action="{{ route('classes.update', $class->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Class Name:</label>
        <input type="text" name="name" value="{{ old('name', $class->name) }}" required>

        <label for="teachers">Assign Teachers:</label>
        <select name="teachers[]" multiple required>
          @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}" @if(in_array($teacher->id, old('teachers', $class->teachers->pluck('id')->toArray() ?? []))) selected @endif>
                {{ $teacher->name }}
            </option>
          @endforeach
        </select>

        <label for="subjects">Subjects:</label>
        <input type="text" name="subjects[]" value="{{ implode(',', explode(',', $class->subjects)) }}" required>
        <p>Enter subjects separated by commas</p>

        <label for="fees">Fees:</label>
        <input type="number" name="fees" value="{{ old('fees', $class->fees) }}" required>

        <label for="timetable">Timetable:</label>
        <div id="timetable-section">
            @foreach(json_decode($class->timetable, true) as $index => $entry)
                <div class="timetable-entry">
                    <input type="text" name="timetable[{{ $index }}][day]" value="{{ old('timetable.'.$index.'.day', $entry['day']) }}" placeholder="Day" required>
                    <input type="text" name="timetable[{{ $index }}][time]" value="{{ old('timetable.'.$index.'.time', $entry['time']) }}" placeholder="Time (e.g., 12:00-13:00)" required>
                    <button type="button" onclick="removeTimetableEntry(this)">Remove</button>
                </div>
            @endforeach
            <button type="button" onclick="addTimetableEntry()">Add Timetable Entry</button>
        </div>

        <button type="submit">Update Class</button>
    </form>

    <script>
        function addTimetableEntry() {
            const section = document.getElementById('timetable-section');
            const index = section.children.length;
            const newEntry = document.createElement('div');
            newEntry.className = 'timetable-entry';
            newEntry.innerHTML = `
                <input type="text" name="timetable[${index}][day]" placeholder="Day" required>
                <input type="text" name="timetable[${index}][time]" placeholder="Time (e.g., 12:00-13:00)" required>
                <button type="button" onclick="removeTimetableEntry(this)">Remove</button>
            `;
            section.appendChild(newEntry);
        }

        function removeTimetableEntry(button) {
            button.parentElement.remove();
        }
    </script>
@endsection
