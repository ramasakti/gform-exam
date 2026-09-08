<div id="add-kelas" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 px-4 py-8">
    <div class="w-full max-w-md rounded border border-slate-200 bg-white p-5 text-slate-800 shadow-lg text-xs">
        <form action="/kelas/store" method="POST" class="grid gap-3">
            @csrf
            <h5 class="text-base font-semibold text-slate-900">Tambah Kelas</h5>
            <select name="tingkat" class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900">
                <option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="X">X</option><option value="XI">XI</option><option value="XII">XII</option>
            </select>
            <input type="text" name="paralel" class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900" placeholder="Paralel">
            <input type="hidden" name="walas" value="-">
            <button type="submit" class="rounded bg-indigo-600 px-4 py-2 font-semibold text-white hover:bg-indigo-700">SIMPAN</button>
        </form>
    </div>
</div>