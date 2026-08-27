@extends('layouts.app')

@section('title', $student->full_name)

@section('content')
<div class="mx-auto max-w-4xl">
    <div class="mb-5"><a href="{{ route('students.index') }}" class="text-sm font-semibold text-brand-600 hover:text-brand-700">← Back to student records</a></div>
    <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="h-32 bg-gradient-to-r from-brand-900 via-brand-700 to-blue-500"></div>
        <div class="px-6 pb-8 sm:px-9">
            <div class="-mt-16 flex flex-col gap-5 sm:flex-row sm:items-end">
                <img src="{{ Storage::url($student->profile_picture) }}" alt="Profile picture of {{ $student->full_name }}" class="h-32 w-32 rounded-2xl border-4 border-white bg-white object-cover shadow-md">
                <div class="pb-2"><p class="text-sm font-semibold uppercase tracking-wider text-brand-600">{{ $student->program }} · Year {{ $student->year_level }}</p><h1 class="mt-1 text-3xl font-bold text-slate-900">{{ $student->full_name }}</h1><p class="mt-1 font-mono text-sm text-slate-500">{{ $student->student_id }}</p></div>
            </div>

            <div class="mt-8 grid gap-4 sm:grid-cols-2">
                @php
                    $details = [
                        ['Email Address', $student->email],
                        ['Mobile Number', $student->mobile_number],
                        ['Date of Birth', $student->date_of_birth->format('F j, Y')],
                        ['Gender', $student->gender],
                        ['Program', $student->program],
                        ['Year Level', 'Year '.$student->year_level],
                    ];
                @endphp
                @foreach ($details as [$label, $value])
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4"><dt class="text-xs font-semibold uppercase tracking-wider text-slate-500">{{ $label }}</dt><dd class="mt-1 font-medium text-slate-900">{{ $value }}</dd></div>
                @endforeach
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 sm:col-span-2"><dt class="text-xs font-semibold uppercase tracking-wider text-slate-500">Complete Address</dt><dd class="mt-1 font-medium text-slate-900">{{ $student->address }}</dd></div>
            </div>
            <p class="mt-6 text-sm text-slate-500">Registered on {{ $student->created_at->format('F j, Y \a\t g:i A') }}</p>
        </div>
    </article>
</div>
@endsection
