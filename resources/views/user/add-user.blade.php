<div id="add-user" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 px-4 py-8">
    <div class="w-full max-w-md rounded border border-slate-200 bg-white p-5 text-slate-800 shadow-lg text-xs">
        <h5 class="text-base font-semibold text-slate-900">Tambah User</h5>
        <form action="/store/user" method="post" enctype="multipart/form-data" class="mt-4 grid gap-3">
            @csrf
            <input class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900" name="username" type="text" placeholder="Username" required>
            <input class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900" name="password" type="text" placeholder="Password" required>
            <input class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900" name="nama" type="text" placeholder="Nama" required>
            <select id="status" name="status" class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900">
                <option>Status User</option>
                <option value="Admin">Admin</option>
                <option value="Siswa">Siswa</option>
                <option value="Pengawas">Pengawas</option>
            </select>
            <select id="kelas" name="kelas" class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900">
                @foreach ($dataKelas as $kelas)
                    <option value="{{ $kelas->id_kelas }}">{{ $kelas->tingkat }} {{ $kelas->paralel }}</option>
                @endforeach
            </select>
            <input class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900" id="ruangan" name="ruang" type="text" placeholder="Ruangan" required>
            <button type="submit" class="rounded bg-indigo-600 px-4 py-2 font-semibold text-white hover:bg-indigo-700">TAMBAH</button>
        </form>
    </div>
</div>