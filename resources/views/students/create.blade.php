@extends('layouts.app')

@section('title', 'Register Student')

@section('content')
<div class="mx-auto max-w-4xl">
    <div class="mb-7">
        <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-brand-600">Online registration</p>
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">Student Registration Form</h1>
        <p class="mt-2 text-slate-600">Complete all required information. Fields marked with <span class="text-red-600">*</span> are required.</p>
    </div>

    @if ($errors->any())
        <div role="alert" class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-800">
            <p class="font-semibold">Please correct the following information:</p>
            <ul class="mt-2 list-inside list-disc text-sm">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        @csrf
        <div class="border-b border-slate-200 bg-slate-50 px-6 py-4"><h2 class="font-semibold text-slate-900">Personal Information</h2></div>
        <div class="grid gap-5 p-6 md:grid-cols-2">
            @php
                $input = 'mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2.5 shadow-sm outline-none transition focus:border-brand-600 focus:ring-2 focus:ring-blue-100';
                $errorInput = ' border-red-400 bg-red-50';
            @endphp
            <div>
                <label for="student_id" class="text-sm font-medium">Student ID <span class="text-red-600">*</span></label>
                <input id="student_id" name="student_id" value="{{ old('student_id') }}" required maxlength="30" placeholder="e.g. 2026-00001" class="{{ $input }} @error('student_id') {{ $errorInput }} @enderror">
                @error('student_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="email" class="text-sm font-medium">Email Address <span class="text-red-600">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="student@example.com" class="{{ $input }} @error('email') {{ $errorInput }} @enderror">
                @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="first_name" class="text-sm font-medium">First Name <span class="text-red-600">*</span></label>
                <input id="first_name" name="first_name" value="{{ old('first_name') }}" required maxlength="100" class="{{ $input }} @error('first_name') {{ $errorInput }} @enderror">
                @error('first_name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="middle_name" class="text-sm font-medium">Middle Name <span class="text-slate-400">(optional)</span></label>
                <input id="middle_name" name="middle_name" value="{{ old('middle_name') }}" maxlength="100" class="{{ $input }} @error('middle_name') {{ $errorInput }} @enderror">
                @error('middle_name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="last_name" class="text-sm font-medium">Last Name <span class="text-red-600">*</span></label>
                <input id="last_name" name="last_name" value="{{ old('last_name') }}" required maxlength="100" class="{{ $input }} @error('last_name') {{ $errorInput }} @enderror">
                @error('last_name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="mobile_number" class="text-sm font-medium">Mobile Number <span class="text-red-600">*</span></label>
                <input type="tel" inputmode="numeric" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" required placeholder="09123456789" class="{{ $input }} @error('mobile_number') {{ $errorInput }} @enderror">
                @error('mobile_number')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="date_of_birth" class="text-sm font-medium">Date of Birth <span class="text-red-600">*</span></label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" max="{{ now()->subDay()->format('Y-m-d') }}" required class="{{ $input }} @error('date_of_birth') {{ $errorInput }} @enderror">
                @error('date_of_birth')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="gender" class="text-sm font-medium">Gender <span class="text-red-600">*</span></label>
                <select id="gender" name="gender" required class="{{ $input }} @error('gender') {{ $errorInput }} @enderror">
                    <option value="">Select gender</option>
                    @foreach (['Male', 'Female', 'Prefer not to say'] as $gender)<option value="{{ $gender }}" @selected(old('gender') === $gender)>{{ $gender }}</option>@endforeach
                </select>
                @error('gender')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="border-y border-slate-200 bg-slate-50 px-6 py-4"><h2 class="font-semibold text-slate-900">Academic and Contact Details</h2></div>
        <div class="grid gap-5 p-6 md:grid-cols-2">
            <div>
                <label for="program" class="text-sm font-medium">Program <span class="text-red-600">*</span></label>
                <select id="program" name="program" required class="{{ $input }} @error('program') {{ $errorInput }} @enderror">
                    <option value="">Select program</option>
                    @foreach (['BSIT' => 'BS Information Technology', 'BSCS' => 'BS Computer Science', 'BSIS' => 'BS Information Systems', 'BSEMC' => 'BS Entertainment and Multimedia Computing'] as $code => $name)
                        <option value="{{ $code }}" @selected(old('program') === $code)>{{ $name }}</option>
                    @endforeach
                </select>
                @error('program')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="year_level" class="text-sm font-medium">Year Level <span class="text-red-600">*</span></label>
                <select id="year_level" name="year_level" required class="{{ $input }} @error('year_level') {{ $errorInput }} @enderror">
                    <option value="">Select year level</option>
                    @foreach ([1 => 'First Year', 2 => 'Second Year', 3 => 'Third Year', 4 => 'Fourth Year'] as $value => $label)<option value="{{ $value }}" @selected((string) old('year_level') === (string) $value)>{{ $label }}</option>@endforeach
                </select>
                @error('year_level')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="md:col-span-2">
                <label for="address" class="text-sm font-medium">Complete Address <span class="text-red-600">*</span></label>
                <textarea id="address" name="address" rows="3" required maxlength="500" placeholder="House number, street, barangay, municipality/city, province" class="{{ $input }} @error('address') {{ $errorInput }} @enderror">{{ old('address') }}</textarea>
                @error('address')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="md:col-span-2">
                <label for="profile_picture" class="text-sm font-medium">Profile Picture <span class="text-red-600">*</span></label>
                <input type="file" id="profile_picture" name="profile_picture" accept="image/jpeg,image/png" required class="mt-1 block w-full rounded-lg border border-dashed border-slate-300 bg-slate-50 px-4 py-5 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-brand-600 file:px-4 file:py-2 file:font-semibold file:text-white hover:file:bg-brand-700 @error('profile_picture') {{ $errorInput }} @enderror">
                <p class="mt-1 text-xs text-slate-500">JPG, JPEG, or PNG only. Maximum file size: 2 MB.</p>
                @error('profile_picture')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="flex flex-col-reverse gap-3 border-t border-slate-200 bg-slate-50 px-6 py-5 sm:flex-row sm:justify-end">
            <a href="{{ route('students.index') }}" class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-center font-semibold text-slate-700 hover:bg-slate-100">Cancel</a>
            <button type="submit" class="rounded-lg bg-brand-600 px-6 py-2.5 font-semibold text-white shadow-sm hover:bg-brand-700">Submit Registration</button>
        </div>
    </form>
</div>
@endsection
