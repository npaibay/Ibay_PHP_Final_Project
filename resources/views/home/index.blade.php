@extends('layouts.app')

@section('content')

<h1>School Encoding Module</h1>
<hr>

{{-- Alerts --}}
@if(session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Welcome --}}
<p>
    Welcome, <strong>{{ $username }}!</strong>
    <span class="role">({{ ucfirst($account_type) }})</span>
</p>

{{-- Navigation --}}
<div class="home-actions">
    <a href="{{ route('programs.index') }}">Programs</a>
    <a href="{{ route('subjects.index') }}">Subjects</a>

    @if($account_type === 'admin')
        <a href="{{ route('users.index') }}">User Accounts</a>
    @endif

    <a href="{{ route('password.edit') }}">Change Password</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
    </form>
</div>

@endsection