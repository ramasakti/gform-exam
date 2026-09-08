<!doctype html>
<html lang="id" class="h-full bg-slate-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-full bg-slate-100 text-slate-800">
    <div class="flex min-h-screen items-center justify-center px-4 py-8">
        <div class="grid w-full max-w-4xl overflow-hidden rounded border border-slate-200 bg-white shadow-sm lg:grid-cols-2">
            <div class="hidden flex-col justify-between bg-indigo-600 p-8 text-white lg:flex">
                <div>
                    <img src="{{ env('APP_LOGO') }}" class="flex h-12 w-12 items-center justify-center rounded bg-white/20 text-xl font-bold">
                    <h1 class="mt-6 text-3xl font-bold leading-snug">G Form Exam</h1>
                    <p class="mt-3 text-sm text-indigo-100">Aplikasi ujian online menggunakan Google Form dan Exam Browser.</p>
                </div>
                <p class="text-xs text-indigo-200">Staff IT Development and Infrastructure - SMA Islam Parlaungan</p>
            </div>
            <div class="p-6 sm:p-8">
                <div class="mx-auto max-w-sm">
                    <div class="mb-6 lg:hidden text-center">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded bg-indigo-600 text-xl font-bold text-white">{{ strtoupper(substr(env('APP_NAME', 'G'), 0, 1)) }}</div>
                        <h1 class="mt-3 text-2xl font-bold text-slate-900">Login</h1>
                    </div>
                    @if (session()->has('fail'))
                        <div class="mb-4 rounded border border-rose-200 bg-rose-50 px-3 py-2 text-sm text-rose-700">{{ session('fail') }}</div>
                    @endif
                    <form action="/login" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="mb-1 block text-xs font-semibold text-slate-700 uppercase tracking-wider" for="username">Username</label>
                            <input id="username" type="text" name="username" class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900 placeholder-slate-400 focus:border-indigo-600 focus:outline-none focus:ring-1 focus:ring-indigo-600" placeholder="Username">
                        </div>
                        <div>
                            <label class="mb-1 block text-xs font-semibold text-slate-700 uppercase tracking-wider" for="password">Password</label>
                            <input id="password" type="password" name="password" class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900 placeholder-slate-400 focus:border-indigo-600 focus:outline-none focus:ring-1 focus:ring-indigo-600" placeholder="Password">
                        </div>
                        <button class="w-full rounded bg-indigo-600 px-4 py-2.5 font-semibold text-white transition hover:bg-indigo-700" type="submit">Masuk</button>
                    </form>
                    <p class="mt-6 text-center text-xs text-slate-500 lg:hidden">Staff IT Development and Infrastructure - SMA Islam Parlaungan</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
