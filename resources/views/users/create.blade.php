@extends('layouts.app')

@section('content')

<h2>Add New User</h2>
<hr>

<div class="actions">
    <a href="{{ route('users.index') }}">← Back to Users</a>
</div>

@if($errors->any())
    <div class="alert alert-error" style="text-align: center;">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <label for="username">Username</label>
    <input type="text" id="username" name="username" value="{{ old('username') }}" required>

    <label for="account_type">Account Type</label>
    <select id="account_type" name="account_type" required>
        <option value="student" {{ old('account_type') === 'student' ? 'selected' : '' }}>student</option>
        <option value="teacher" {{ old('account_type') === 'teacher' ? 'selected' : '' }}>teacher</option>
        <option value="staff" {{ old('account_type') === 'staff' ? 'selected' : '' }}>staff</option>
        <option value="admin" {{ old('account_type') === 'admin' ? 'selected' : '' }}>admin</option>
    </select>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <label for="password_confirmation">Confirm Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required>

    <div class="form-actions">
        <button type="submit">Create User</button>
    </div>
</form>

@endsection