@extends('layouts.app')

@section('content')

<h2>Add New Subject</h2>
<hr>

<div class="actions">
    <a href="{{ route('subjects.index') }}">← Back to Subjects</a>
</div>

@if($errors->any())
    <div class="notice">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('subjects.store') }}">
    @csrf

    <label for="code">Code</label>
    <input type="text" id="code" name="code" value="{{ old('code') }}" required>

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}" required>

    <label for="unit">Unit</label>
    <input type="number" id="unit" name="unit" value="{{ old('unit') }}" min="1" required>

    <div class="form-actions">
        <button type="submit">Save</button>
    </div>
</form>

@endsection