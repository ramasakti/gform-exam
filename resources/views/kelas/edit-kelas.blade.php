<div id="edit-kelas-{{ $kelas->id_kelas }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 px-4 py-8">
    <div class="w-full max-w-md rounded border border-slate-200 bg-white p-5 text-slate-800 shadow-lg text-xs">
        <form action="/kelas/update" method="post" class="grid gap-3">
            @csrf
            <h5 class="text-base font-semibold text-slate-900">Edit Kelas</h5>
            <input type="hidden" name="id_kelas" value="{{ $kelas->id_kelas }}">
            <select name="tingkat" class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900">
                <option {{ ($kelas->tingkat == '7') ? 'selected' : '' }} value="7">7</option><option {{ ($kelas->tingkat == '8') ? 'selected' : '' }} value="8">8</option><option {{ ($kelas->tingkat == '9') ? 'selected' : '' }} value="9">9</option><option {{ ($kelas->tingkat == 'X') ? 'selected' : '' }} value="X">X</option><option {{ ($kelas->tingkat == 'XI') ? 'selected' : '' }} value="XI">XI</option><option {{ ($kelas->tingkat == 'XII') ? 'selected' : '' }} value="XII">XII</option>
            </select>
            <input type="text" class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900" name="paralel" value="{{ $kelas->paralel }}" placeholder="Paralel">
            <button type="submit" class="rounded bg-indigo-600 px-4 py-2 font-semibold text-white hover:bg-indigo-700">SIMPAN</button>
        </form>
    </div>
</div>