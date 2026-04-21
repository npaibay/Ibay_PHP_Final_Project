<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('program_id')->get();

        return view('programs.index', [
            'programs' => $programs,
            'account_type' => session('account_type'),
        ]);
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:program,code',
            'title' => 'required|string|max:100',
            'years' => 'required|integer|min:1|max:10',
        ]);

        $validated['created_on'] = now();
        $validated['created_by'] = session('user_id');

        Program::create($validated);

        return redirect()
            ->route('programs.index')
            ->with('success', 'Program added successfully.');
    }

    public function edit(Program $program)
    {
        return view('programs.edit', [
            'program' => $program,
        ]);
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:program,code,' . $program->program_id . ',program_id',
            'title' => 'required|string|max:100',
            'years' => 'required|integer|min:1|max:10',
        ]);

        $validated['updated_on'] = now();
        $validated['updated_by'] = session('user_id');

        $program->update($validated);

        return redirect()
            ->route('programs.index')
            ->with('success', 'Program updated successfully.');
    }
}