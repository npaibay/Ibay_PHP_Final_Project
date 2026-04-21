@extends('layouts.app')

@section('content')

<h2>Subjects</h2>
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
        placeholder="Search by subject code"
    >

    <button type="submit">Search</button>

    <a href="{{ route('subjects.index') }}" class="btn-linkish">Reset</a>
</form>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Title</th>
                <th>Unit</th>
                @if(in_array($account_type, ['admin', 'staff']))
                    <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($subjects as $subject)
                <tr>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->title }}</td>
                    <td>{{ $subject->unit }}</td>
                    @if(in_array($account_type, ['admin', 'staff']))
                        <td>
                            <a href="{{ route('subjects.edit', $subject->subject_id) }}">Edit</a>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ in_array($account_type, ['admin', 'staff']) ? 4 : 3 }}">
                        No subjects found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection