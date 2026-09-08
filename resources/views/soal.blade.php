<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    <div class="flex items-center justify-between gap-4">
        <button data-modal-target="add-soal" class="rounded bg-indigo-600 px-3 py-2 text-xs font-semibold text-white hover:bg-indigo-700">Tambah Soal</button>
        @include('soal.add-soal')
    </div>
    @if (session()->has('success'))
        <div class="mt-4 rounded border border-emerald-200 bg-emerald-50 p-3 text-xs text-emerald-800">{{ session('success') }}</div>
    @endif
    <div class="mt-4 overflow-hidden rounded border border-slate-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-left text-xs text-slate-700">
                <thead class="bg-slate-50 font-semibold text-slate-900">
                    <tr>
                        <th class="px-3 py-2">#</th>
                        <th class="px-3 py-2">Mapel</th>
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2">Tanggal</th>
                        <th class="px-3 py-2">Waktu</th>
                        <th class="px-3 py-2">Kelas</th>
                        <th class="px-3 py-2">Durasi</th>
                        <th class="px-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @foreach ($dataSoal as $soal)
                        <tr class="hover:bg-slate-50">
                            <td class="px-3 py-2">{{ $ai++ }}</td>
                            <td class="px-3 py-2 font-medium text-slate-900">{{ $soal->mapel }}</td>
                            <td class="px-3 py-2"><span class="rounded px-1.5 py-0.5 text-[10px] font-semibold {{ $soal->isactive ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-700' }}">{{ $soal->isactive ? 'Aktif' : 'Tidak Aktif' }}</span></td>
                            <td class="px-3 py-2">{{ $soal->tgl }}</td>
                            <td class="px-3 py-2">{{ $soal->mulai }} - {{ $soal->sampai }}</td>
                            <td class="px-3 py-2">@foreach ($soal->kelas as $kelas) <span class="mr-1 inline-flex rounded border border-slate-200 bg-slate-100 px-1.5 py-0.5 text-[10px]">{{ $kelas->tingkat }}{{ $kelas->paralel }}</span> @endforeach</td>
                            <td class="px-3 py-2">{{ $soal->menit_aktif }} menit</td>
                            <td class="px-3 py-2">
                                <div class="flex items-center gap-1.5">
                                    <button data-modal-target="edit-soal-{{ $soal->id_soal }}" class="rounded border border-slate-300 bg-white px-2 py-1 text-xs text-slate-700 hover:bg-slate-50">Edit</button>
                                    @include('soal.edit-soal')
                                    <a href="/soal/{{ $soal->id_soal }}" target="_blank" class="rounded border border-slate-300 bg-white px-2 py-1 text-xs text-slate-700 hover:bg-slate-50">Lihat</a>
                                    <button data-modal-target="delete-soal-{{ $soal->id_soal }}" class="rounded border border-rose-300 bg-rose-50 px-2 py-1 text-xs text-rose-700 hover:bg-rose-100">Hapus</button>
                                    @include('soal.delete-soal')
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard>