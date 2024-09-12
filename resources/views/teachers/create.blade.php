@extends('layouts.app')

@section('content')
    <h1>Add New Teacher</h1>

    <form action="{{ route('teachers.store') }}" method="POST" style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Name:</label>
            <input type="text" name="name" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
            <input type="email" name="email" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="subject" style="display: block; margin-bottom: 5px; font-weight: bold;">Subject:</label>
            <input type="text" name="subject" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <button type="submit" style="background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Add Teacher</button>
    </form>
@endsection
