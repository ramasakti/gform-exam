<div id="modal-confirm-{{ $soal->id_soal }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 px-4 py-8">
    <div class="w-full max-w-md rounded border border-slate-200 bg-white p-5 text-slate-800 shadow-lg">
        <h5 class="text-base font-semibold text-slate-900">Apakah anda yakin mulai mengerjakan soal?</h5>
        <p class="mt-1 text-xs text-slate-500">Bismillah</p>
        <div class="mt-4 flex justify-end gap-2 text-xs">
            <button class="rounded border border-slate-300 bg-white px-3 py-2 text-slate-700 hover:bg-slate-50" type="button">Cancel</button>
            <a class="rounded bg-indigo-600 px-3 py-2 font-semibold text-white hover:bg-indigo-700" href="/soal/{{ $soal->id_soal }}">Mulai</a>
        </div>
    </div>
</div>