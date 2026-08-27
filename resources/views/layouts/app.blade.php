<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Registration') | CIT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { brand: { 50: '#eff6ff', 600: '#2563eb', 700: '#1d4ed8', 900: '#172554' } } } } }
    </script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-800 antialiased">
    <nav class="border-b border-slate-200 bg-white shadow-sm">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('students.index') }}" class="flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center rounded-xl bg-brand-600 font-bold text-white">CIT</span>
                <span><strong class="block text-slate-900">Student Registration</strong><small class="text-slate-500">College of Information Technology</small></span>
            </a>
            <a href="{{ route('students.create') }}" class="rounded-lg bg-brand-600 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-700">Register Student</a>
        </div>
    </nav>

    <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
        @if (session('success'))
            <div role="alert" class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
                <span class="grid h-7 w-7 place-items-center rounded-full bg-emerald-600 font-bold text-white">✓</span>
                <p class="font-medium">{{ session('success') }}</p>
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="mt-10 border-t border-slate-200 bg-white py-6 text-center text-sm text-slate-500">
        ITST 302 – Client-Server Technologies · Week 4 Mini Project
    </footer>
</body>
</html>
