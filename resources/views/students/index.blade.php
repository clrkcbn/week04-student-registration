@extends('layouts.app')

@section('title', 'Registered Students')

@section('content')
<div class="mb-7 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
    <div>
        <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-brand-600">Student records</p>
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">Registered Students</h1>
        <p class="mt-2 text-slate-600">View students whose registration was successfully saved.</p>
    </div>
    <span class="w-fit rounded-full bg-blue-100 px-3 py-1 text-sm font-semibold text-blue-800">{{ $students->total() }} total</span>
</div>

@if ($students->isEmpty())
    <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
        <div class="mx-auto mb-4 grid h-14 w-14 place-items-center rounded-full bg-blue-50 text-2xl">🎓</div>
        <h2 class="text-xl font-semibold text-slate-900">No students registered yet</h2>
        <p class="mx-auto mt-2 max-w-md text-slate-500">Complete the registration form to create the first student record.</p>
        <a href="{{ route('students.create') }}" class="mt-6 inline-block rounded-lg bg-brand-600 px-5 py-2.5 font-semibold text-white hover:bg-brand-700">Register First Student</a>
    </div>
@else
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                    <tr><th class="px-6 py-4">Student</th><th class="px-6 py-4">Student ID</th><th class="px-6 py-4">Program</th><th class="px-6 py-4">Year</th><th class="px-6 py-4"><span class="sr-only">Action</span></th></tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($students as $student)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4"><div class="flex items-center gap-3"><img src="{{ Storage::url($student->profile_picture) }}" alt="{{ $student->full_name }}" class="h-11 w-11 rounded-full object-cover"><div><p class="font-semibold text-slate-900">{{ $student->full_name }}</p><p class="text-sm text-slate-500">{{ $student->email }}</p></div></div></td>
                            <td class="whitespace-nowrap px-6 py-4 font-mono text-sm">{{ $student->student_id }}</td>
                            <td class="px-6 py-4"><span class="rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold text-blue-700">{{ $student->program }}</span></td>
                            <td class="px-6 py-4 text-sm">{{ $student->year_level }}</td>
                            <td class="px-6 py-4 text-right"><a href="{{ route('students.show', $student) }}" class="font-semibold text-brand-600 hover:text-brand-700">View profile →</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($students->hasPages())<div class="border-t border-slate-200 px-6 py-4">{{ $students->links() }}</div>@endif
    </div>
@endif
@endsection
