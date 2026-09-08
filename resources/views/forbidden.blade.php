<!doctype html>
<html lang="id" class="h-full bg-slate-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akses Ditolak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-full bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800 text-slate-100">
    <div class="flex min-h-screen items-center justify-center px-4">
        <div class="w-full max-w-xl rounded-3xl border border-white/10 bg-white/5 p-8 text-center shadow-2xl backdrop-blur">
            <p class="text-sm uppercase tracking-[0.3em] text-cyan-300">Access blocked</p>
            <h1 class="mt-4 text-3xl font-semibold">Anda terdeteksi tidak menggunakan browser yang diizinkan</h1>
            <p class="mt-3 text-slate-300">Browser yang anda gunakan: <strong>{{ $browser }}</strong></p>
        </div>
    </div>
</body>
</html>