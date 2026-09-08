<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    @switch(session('user')->status)
        @case('Siswa')
            <div class="grid gap-6 lg:grid-cols-2">
                <div class="rounded-md border border-slate-200 bg-slate-50 p-5">
                    <p class="text-xs text-slate-500">Selamat datang</p>
                    <h3 class="mt-1 text-xl font-semibold text-slate-900">{{ session('user')->nama }}</h3>
                    <dl class="mt-4 space-y-2 text-sm text-slate-700">
                        <div class="flex items-center justify-between rounded border border-slate-200 bg-white px-3 py-2"><dt class="text-slate-500">Kelas</dt><dd class="font-semibold text-slate-900">{{ session('user')->tingkat . session('user')->paralel }}</dd></div>
                        <div class="flex items-center justify-between rounded border border-slate-200 bg-white px-3 py-2"><dt class="text-slate-500">Ruang</dt><dd class="font-semibold text-slate-900">{{ session('user')->ruang }}</dd></div>
                    </dl>
                </div>
                <div class="space-y-4">
                    @forelse ($dataSoal as $soal)
                        <div class="rounded-md border border-slate-200 bg-slate-50 p-5">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-xs font-semibold text-indigo-600">Mata pelajaran</p>
                                    <h3 class="mt-1 text-lg font-semibold text-slate-900">{{ $soal->mapel }}</h3>
                                </div>
                                <span class="rounded px-2 py-0.5 text-xs font-semibold {{ $soal->isactive ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-700' }}">{{ $soal->isactive ? 'Aktif' : 'Nonaktif' }}</span>
                            </div>
                            <div class="mt-3 text-xs text-slate-600 space-y-1">
                                <p>Tanggal: {{ $soal->tgl }}</p>
                                <p>Waktu: {{ $soal->mulai }} - {{ $soal->sampai }}</p>
                            </div>
                            <div class="mt-4">
                                @if ($soal->mulai > date('H:i:s') and $soal->sampai > date('H:i:s'))
                                    <div class="rounded border border-amber-200 bg-amber-50 px-3 py-2 text-xs text-amber-700">Waktu mengerjakan belum dimulai</div>
                                @elseif ($soal->mulai < date('H:i:s') and $soal->sampai < date('H:i:s'))
                                    <div class="rounded border border-rose-200 bg-rose-50 px-3 py-2 text-xs text-rose-700">Expired</div>
                                @elseif ($soal->isactive != 1)
                                    <div class="rounded border border-slate-200 bg-slate-100 px-3 py-2 text-xs text-slate-600">Soal belum diaktivasi</div>
                                @else
                                    <button data-modal-target="modal-confirm-{{ $soal->id_soal }}" class="w-full rounded bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Mulai</button>
                                    @include('soal.modal-confirm')
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="rounded-md border border-slate-200 bg-slate-50 p-5 text-sm text-slate-600">Soal belum dirilis</div>
                    @endforelse
                </div>
            </div>
            @break
        @case('Pengawas')
            <div class="overflow-hidden rounded-md border border-slate-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 text-left text-xs text-slate-700">
                        <thead class="bg-slate-50 font-semibold text-slate-900">
                            <tr>
                                <th class="px-3 py-2">#</th>
                                <th class="px-3 py-2">Username</th>
                                <th class="px-3 py-2">Nama</th>
                                <th class="px-3 py-2">Kelas</th>
                                <th class="px-3 py-2">Ruang</th>
                                <th class="px-3 py-2">Log</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white">
                            @foreach ($dataSiswa as $siswa)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-3 py-2">{{ $ai++ }}</td>
                                    <td class="px-3 py-2 font-mono">{{ $siswa->username }}</td>
                                    <td class="px-3 py-2 font-medium text-slate-900">{{ $siswa->nama }}</td>
                                    <td class="px-3 py-2">{{ $siswa->kelas }}</td>
                                    <td class="px-3 py-2">{{ $siswa->ruang }}</td>
                                    <td class="px-3 py-2">{{ $siswa->log }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @break
        @default
    @endswitch
</x-dashboard>