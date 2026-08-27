<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::latest()->paginate(8);

        return view('students.index', compact('students'));
    }

    public function create(): View
    {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['profile_picture'] = $request->file('profile_picture')
            ->store('student-profiles', 'public');

        $student = Student::create($validated);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Student registered successfully!');
    }

    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }
}
