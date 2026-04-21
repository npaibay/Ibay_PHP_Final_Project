<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->get();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
            'account_type' => ['required', Rule::in(['admin', 'staff', 'teacher', 'student'])],
        ]);

        User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'account_type' => $validated['account_type'],
            'created_on' => now(),
            'created_by' => session('user_id'),
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User added successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($user->id, 'id'),
            ],
            'account_type' => ['required', Rule::in(['admin', 'staff', 'teacher', 'student'])],
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $data = [
            'username' => $validated['username'],
            'account_type' => $validated['account_type'],
            'updated_on' => now(),
            'updated_by' => session('user_id'),
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully.');
    }
}