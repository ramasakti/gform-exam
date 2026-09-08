<div class="mt-3 overflow-hidden rounded border border-slate-200">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 text-left text-xs text-slate-700">
            <thead class="bg-slate-50 font-semibold text-slate-900"><tr><th class="px-3 py-2">#</th><th class="px-3 py-2">Username</th><th class="px-3 py-2">Nama</th><th class="px-3 py-2">Log</th></tr></thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @foreach ($dataGuru as $guru)
                    <tr class="hover:bg-slate-50"><td class="px-3 py-2">{{ $ai++ }}</td><td class="px-3 py-2 font-mono">{{ $guru->username }}</td><td class="px-3 py-2 font-medium text-slate-900">{{ $guru->nama }}</td><td class="px-3 py-2">{{ $guru->log }}</td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>