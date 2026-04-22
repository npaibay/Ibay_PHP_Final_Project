@extends('layouts.app')

@section('content')

<h2>Edit Program</h2>
<hr>

<div class="actions">
    <a href="{{ route('programs.index') }}">← Back to Programs</a>
</div>

@if($errors->any())
    <div class="alert alert-error">
        <ul style="margin: 0; padding-left: 18px; text-align: left;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('programs.update', $program->program_id) }}">
    @csrf
    @method('PUT')

    <label for="code">Code</label>
    <input type="text" id="code" name="code" value="{{ old('code', $program->code) }}" required>

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title', $program->title) }}" required>

    <label for="years">Years</label>
    <input type="number" id="years" name="years" value="{{ old('years', $program->years) }}" min="1" required>

    <div class="form-actions">
        <button type="submit">Update</button>
    </div>
</form>

@endsection