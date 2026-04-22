@extends('layouts.app')

@section('content')

<h2>Change Password</h2>
<hr>

<div class="actions">
    <a href="{{ route('home') }}">← Back to Home</a>
</div>

@if(session('error'))
    <div class="notice">{{ session('error') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-error" style="text-align: center;">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('PUT')

    <label for="current_password">Current Password</label>
    <input type="password" id="current_password" name="current_password" required>

    <label for="new_password">New Password</label>
    <input type="password" id="new_password" name="new_password" required>

    <label for="new_password_confirmation">Confirm New Password</label>
    <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>

    <div class="form-actions">
        <button type="submit">Update Password</button>
    </div>
</form>

@endsection