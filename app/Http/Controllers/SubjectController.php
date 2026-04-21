<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::orderBy('subject_id')->get();

        return view('subjects.index', [
            'subjects' => $subjects,
            'account_type' => session('account_type'),
        ]);
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:subject,code',
            'title' => 'required|string|max:100',
            'unit' => 'required|integer|min:1',
        ]);

        $validated['created_on'] = now();
        $validated['created_by'] = session('user_id');

        Subject::create($validated);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject added successfully.');
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', [
            'subject' => $subject,
        ]);
    }

    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:subject,code,' . $subject->subject_id . ',subject_id',
            'title' => 'required|string|max:100',
            'unit' => 'required|integer|min:1',
        ]);

        $validated['updated_on'] = now();
        $validated['updated_by'] = session('user_id');

        $subject->update($validated);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject updated successfully.');
    }
}