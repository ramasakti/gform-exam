<div id="delete-soal-{{ $soal->id_soal }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 px-4 py-8">
    <div class="w-full max-w-md rounded border border-slate-200 bg-white p-5 text-slate-800 shadow-lg">
        <h5 class="text-base font-semibold text-slate-900">Hapus Soal {{ $soal->mapel }}?</h5>
        <form action="/delete/soal" method="post" enctype="multipart/form-data" class="mt-4 flex justify-end gap-2 text-xs">
            @csrf
            <input type="hidden" name="id_soal" value="{{ $soal->id_soal }}">
            <button class="rounded border border-slate-300 bg-white px-3 py-2 text-slate-700 hover:bg-slate-50" type="button">Cancel</button>
            <button class="rounded bg-rose-600 px-3 py-2 font-semibold text-white hover:bg-rose-700" type="submit">Ya</button>
        </form>
    </div>
</div>