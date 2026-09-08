<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-full text-slate-800 bg-slate-100">
    <div class="min-h-screen">
        <div class="mx-auto flex min-h-screen max-w-7xl flex-col lg:flex-row">
            <aside class="border-b border-slate-200 bg-white p-4 lg:min-h-screen lg:w-72 lg:border-b-0 lg:border-r">
                <div class="flex items-center justify-between lg:block">
                    <div class="flex items-center gap-3">
                        <img src="{{ env('APP_LOGO') }}" class="flex h-12 w-12 items-center justify-center rounded bg-white/20 text-xl font-bold">
                        <div>
                            <p class="text-xs text-slate-500">Portal</p>
                            <h1 class="text-base font-semibold text-slate-900">{{ env('APP_NAME', 'Laravel') }}</h1>
                        </div>
                    </div>
                </div>
                <nav class="mt-6 grid gap-1">
                    <a href="/dashboard" class="rounded px-3 py-2 text-sm font-medium transition {{ $navactive === 'dashboard' ? 'bg-indigo-600 text-white' : 'text-slate-700 hover:bg-slate-100' }}">Dashboard</a>
                    @switch(session('user')->status)
                        @case('Admin')
                            <a href="/user" class="rounded px-3 py-2 text-sm font-medium transition {{ $navactive === 'user' ? 'bg-indigo-600 text-white' : 'text-slate-700 hover:bg-slate-100' }}">User</a>
                            <a href="/kelas" class="rounded px-3 py-2 text-sm font-medium transition {{ $navactive === 'kelas' ? 'bg-indigo-600 text-white' : 'text-slate-700 hover:bg-slate-100' }}">Kelas</a>
                            <a href="/soal" class="rounded px-3 py-2 text-sm font-medium transition {{ $navactive === 'soal' ? 'bg-indigo-600 text-white' : 'text-slate-700 hover:bg-slate-100' }}">Soal</a>
                            @break
                        @case('Pengawas')
                            <a href="/user?ruang={{ session('user')->ruang }}" class="rounded px-3 py-2 text-sm font-medium transition {{ $navactive === 'user' ? 'bg-indigo-600 text-white' : 'text-slate-700 hover:bg-slate-100' }}">User</a>
                            @break
                    @endswitch
                </nav>
            </aside>
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <div class="rounded-md border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-xs text-slate-500">Home / {{ request()->path() }}</p>
                            <h2 class="mt-1 text-2xl font-semibold text-slate-900 sm:text-3xl">{{ $title }}</h2>
                        </div>
                        <div class="flex items-center gap-3 rounded border border-slate-200 bg-slate-50 px-3 py-2">
                            <div class="h-8 w-8 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold text-sm">
                                {{ strtoupper(substr(session('user')->nama ?? 'U', 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">{{ session('user')->nama }}</p>
                                <a href="/logout" class="text-xs text-indigo-600 hover:underline">Log out</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-slate-800">
                        {{ $slot }}
                    </div>
                    <div class="mt-8 border-t border-slate-200 pt-4 text-xs text-slate-500">
                        Dibuat dan Dikembangkan oleh <b class="text-slate-700">Staff IT Development and Infrastructure - SMA Islam Parlaungan Waru Sidoarjo</b>
                    </div>
                </div>
            </main>
        </div>
    </div>
<script>
    document.querySelectorAll('[data-modal-target]').forEach((button) => {
        button.addEventListener('click', () => {
            const modal = document.getElementById(button.dataset.modalTarget);
            if (modal) modal.classList.remove('hidden');
            if (modal) modal.classList.add('flex');
        });
    });

    document.querySelectorAll('.fixed.inset-0').forEach((modal) => {
        modal.addEventListener('click', (event) => {
            if (event.target === modal || event.target.closest('button[type="button"]')) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });
    });
</script>
</body>
</html>