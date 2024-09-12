@extends('layouts.app')

@section('content')
    <h1>Delete Class</h1>

    <p>Are you sure you want to delete the class: <strong>{{ $class->name }}</strong>?</p>

    <form action="{{ route('classes.destroy', $class->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <a href="{{ route('classes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>