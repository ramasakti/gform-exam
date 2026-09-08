<div class="mt-3 overflow-hidden rounded border border-slate-200">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 text-left text-xs text-slate-700">
            <thead class="bg-slate-50 font-semibold text-slate-900">
                <tr>
                    <th class="px-3 py-2">#</th>
                    <th class="px-3 py-2">Username</th>
                    <th class="px-3 py-2">Nama</th>
                    <th class="px-3 py-2">Kelas</th>
                    <th class="px-3 py-2">Ruang</th>
                    <th class="px-3 py-2">Login</th>
                    <th class="px-3 py-2">Log</th>
                    <th class="px-3 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @foreach ($dataSiswa as $siswa)
                    <tr class="hover:bg-slate-50">
                        <td class="px-3 py-2">{{ $ai++ }}</td>
                        <td class="px-3 py-2 font-mono">{{ $siswa->username }}</td>
                        <td class="px-3 py-2 font-medium text-slate-900">{{ $siswa->nama }}</td>
                        <td class="px-3 py-2">{{ $siswa->tingkat }}{{ $siswa->paralel }}</td>
                        <td class="px-3 py-2">{{ $siswa->ruang }}</td>
                        <td class="px-3 py-2">{{ $siswa->hit }}</td>
                        <td class="px-3 py-2">{{ $siswa->log }}</td>
                        <td class="px-3 py-2"><button data-modal-target="edit-user-{{ $siswa->username }}" class="rounded border border-slate-300 bg-white px-2 py-1 text-xs text-slate-700 hover:bg-slate-50">Edit</button>@include('user.edit-user')</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>