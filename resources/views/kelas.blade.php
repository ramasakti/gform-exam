<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    <div class="flex items-center justify-between gap-4">
        <button data-modal-target="add-kelas" class="rounded bg-indigo-600 px-3 py-2 text-xs font-semibold text-white hover:bg-indigo-700">Tambah Kelas</button>
        @include('kelas.add-kelas')
    </div>
    <div class="mt-4 overflow-hidden rounded border border-slate-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-left text-xs text-slate-700">
                <thead class="bg-slate-50 font-semibold text-slate-900">
                    <tr>
                        <th class="px-3 py-2">#</th>
                        <th class="px-3 py-2">ID Kelas</th>
                        <th class="px-3 py-2">Tingkat</th>
                        <th class="px-3 py-2">Paralel</th>
                        <th class="px-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @foreach ($dataKelas as $kelas)
                        <tr class="hover:bg-slate-50">
                            <td class="px-3 py-2">{{ $ai++ }}</td>
                            <td class="px-3 py-2 font-mono">{{ $kelas->id_kelas }}</td>
                            <td class="px-3 py-2">{{ $kelas->tingkat }}</td>
                            <td class="px-3 py-2">{{ $kelas->paralel }}</td>
                            <td class="px-3 py-2">
                                <div class="flex items-center gap-1.5">
                                    <button data-modal-target="edit-kelas-{{ $kelas->id_kelas }}" class="rounded border border-slate-300 bg-white px-2 py-1 text-xs text-slate-700 hover:bg-slate-50">Edit</button>
                                    @include('kelas.edit-kelas')
                                    <button data-modal-target="delete-kelas-{{ $kelas->id_kelas }}" class="rounded border border-rose-300 bg-rose-50 px-2 py-1 text-xs text-rose-700 hover:bg-rose-100">Hapus</button>
                                    @include('kelas.delete-kelas')
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard>