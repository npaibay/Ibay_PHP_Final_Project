@extends('layouts.app')

@section('content')

<h2>User Accounts</h2>
<hr>

<div class="actions">
    <a href="{{ route('home') }}">← Back to Home</a> |
    <a href="{{ route('users.create') }}">Add New User</a>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Account Type</th>
                <th>Created On</th>
                <th>Updated On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->account_type }}</td>
                    <td>{{ $user->created_on }}</td>
                    <td>{{ $user->updated_on }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection