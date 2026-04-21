@extends('layouts.app')

@section('content')

<h2>Programs</h2>
<hr>

<div class="actions">
    <a href="{{ route('home') }}">← Back to Home</a>
    @if(in_array($account_type, ['admin', 'staff']))
        | <a href="{{ route('subjects.create') }}">Add New Subject</a>
    @endif
</div>

<form method="GET" class="search-bar">
    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search by program code"
    >

    <button type="submit">Search</button>

    <a href="{{ route('programs.index') }}" class="btn-linkish">Reset</a>
</form>

<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Title</th>
            <th>Years</th>
            @if(in_array($account_type, ['admin', 'staff']))
                <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse($programs as $program)
            <tr>
                <td>{{ $program->code }}</td>
                <td>{{ $program->title }}</td>
                <td>{{ $program->years }}</td>
                @if(in_array($account_type, ['admin', 'staff']))
                    <td>
                        <a href="{{ route('programs.edit', $program->program_id) }}">Edit</a>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="{{ in_array($account_type, ['admin', 'staff']) ? 4 : 3 }}">
                    No programs found.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection