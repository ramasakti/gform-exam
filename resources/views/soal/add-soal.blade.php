<div id="add-soal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 px-4 py-8">
    <div class="w-full max-w-xl rounded border border-slate-200 bg-white p-5 text-slate-800 shadow-lg">
        <div class="flex items-center justify-between border-b border-slate-200 pb-3">
            <h5 class="text-base font-semibold text-slate-900">Tambah Soal</h5>
            <button type="button" class="rounded border border-slate-300 bg-white px-2 py-1 text-xs text-slate-600 hover:bg-slate-50">Tutup</button>
        </div>
        <form action="/store/soal" method="post" enctype="multipart/form-data" class="mt-4 grid gap-3 text-xs">
            @csrf
            <input class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900 focus:border-indigo-600 focus:outline-none" name="mapel" type="text" placeholder="Mapel" required>
            <input class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900 focus:border-indigo-600 focus:outline-none" name="url" type="text" placeholder="URL" required>
            <div class="grid gap-3 sm:grid-cols-3">
                <div><label class="mb-1 block text-[10px] uppercase font-semibold text-slate-500">Tanggal</label><input class="w-full rounded border border-slate-300 bg-white px-3 py-2" name="tgl" type="date" required></div>
                <div><label class="mb-1 block text-[10px] uppercase font-semibold text-slate-500">Mulai</label><input class="w-full rounded border border-slate-300 bg-white px-3 py-2" name="mulai" type="time" required></div>
                <div><label class="mb-1 block text-[10px] uppercase font-semibold text-slate-500">Sampai</label><input class="w-full rounded border border-slate-300 bg-white px-3 py-2" name="sampai" type="time" required></div>
            </div>
            <input class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900 focus:border-indigo-600 focus:outline-none" name="menit_aktif" type="number" min="1" placeholder="Menit Aktif" required>
            <div class="grid gap-2 sm:grid-cols-2">
                @foreach ($dataKelas as $kelas)
                    <label class="flex items-center gap-2 rounded border border-slate-200 bg-slate-50 px-3 py-2">
                        <input class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" name="kelas[]" type="checkbox" value="{{ $kelas->id_kelas }}">
                        <span>{{ $kelas->tingkat }} {{ $kelas->paralel }}</span>
                    </label>
                @endforeach
            </div>
            <div class="flex gap-4 rounded border border-slate-200 bg-slate-50 p-2.5">
                <label class="flex items-center gap-2"><input name="isactive" value="true" type="radio" class="text-indigo-600"> Aktif</label>
                <label class="flex items-center gap-2"><input name="isactive" value="false" type="radio" class="text-indigo-600"> Non Aktif</label>
            </div>
            <button type="submit" class="rounded bg-indigo-600 px-4 py-2 font-semibold text-white hover:bg-indigo-700">TAMBAH</button>
        </form>
    </div>
</div>