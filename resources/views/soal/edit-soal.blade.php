<div id="edit-soal-{{ $soal->id_soal }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 px-4 py-8">
    <div class="w-full max-w-xl rounded border border-slate-200 bg-white p-5 text-slate-800 shadow-lg">
        <div class="flex items-center justify-between border-b border-slate-200 pb-3">
            <h5 class="text-base font-semibold text-slate-900">Edit Soal</h5>
            <button type="button" class="rounded border border-slate-300 bg-white px-2 py-1 text-xs text-slate-600 hover:bg-slate-50">Tutup</button>
        </div>
        <form action="/update/soal" method="post" enctype="multipart/form-data" class="mt-4 grid gap-3 text-xs">
            @csrf
            <input type="hidden" name="id_soal" value="{{ $soal->id_soal }}">
            <input class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900" name="mapel" type="text" value="{{ $soal->mapel }}" required>
            <input class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900" name="url" type="text" value="{{ $soal->url }}" required>
            <div class="grid gap-3 sm:grid-cols-3">
                <div><label class="mb-1 block text-[10px] uppercase font-semibold text-slate-500">Tanggal</label><input class="w-full rounded border border-slate-300 bg-white px-3 py-2" name="tgl" type="date" value="{{ $soal->tgl }}" required></div>
                <div><label class="mb-1 block text-[10px] uppercase font-semibold text-slate-500">Mulai</label><input class="w-full rounded border border-slate-300 bg-white px-3 py-2" name="mulai" type="time" value="{{ $soal->mulai }}" required></div>
                <div><label class="mb-1 block text-[10px] uppercase font-semibold text-slate-500">Sampai</label><input class="w-full rounded border border-slate-300 bg-white px-3 py-2" name="sampai" type="time" value="{{ $soal->sampai }}" required></div>
            </div>
            <input class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900" name="menit_aktif" type="number" min="1" value="{{ $soal->menit_aktif }}" required>
            <div class="grid gap-2 sm:grid-cols-2">
                @foreach ($dataKelas as $kelas)
                    @php $xplodeKelas = explode('#', $soal->kelas_id) @endphp
                    <label class="flex items-center gap-2 rounded border border-slate-200 bg-slate-50 px-3 py-2">
                        <input class="rounded border-slate-300 text-indigo-600" name="kelas[]" type="checkbox" value="{{ $kelas->id_kelas }}" {{ (array_search($kelas->id_kelas, $xplodeKelas)) ? 'checked' : '' }}>
                        <span>{{ $kelas->tingkat }} {{ $kelas->paralel }}</span>
                    </label>
                @endforeach
            </div>
            <div class="flex gap-4 rounded border border-slate-200 bg-slate-50 p-2.5">
                <label class="flex items-center gap-2"><input name="isactive" value="true" {{ ($soal->isactive === 1) ? 'checked' : '' }} type="radio" class="text-indigo-600"> Aktif</label>
                <label class="flex items-center gap-2"><input name="isactive" value="false" {{ ($soal->isactive === 0) ? 'checked' : '' }} type="radio" class="text-indigo-600"> Non Aktif</label>
            </div>
            <button type="submit" class="rounded bg-indigo-600 px-4 py-2 font-semibold text-white hover:bg-indigo-700">SIMPAN</button>
        </form>
    </div>
</div>