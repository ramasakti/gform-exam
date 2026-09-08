<div id="delete-kelas-{{ $kelas->id_kelas }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 px-4 py-8">
    <div class="w-full max-w-md rounded border border-slate-200 bg-white p-5 text-slate-800 shadow-lg text-xs">
        <h5 class="text-base font-semibold text-slate-900">Hapus kelas {{ $kelas->tingkat }} {{ $kelas->paralel }}?</h5>
        <form action="/kelas/delete" method="post" class="mt-4 flex justify-end gap-2">
            @csrf
            <input type="hidden" name="id_kelas" value="{{ $kelas->id_kelas }}">
            <button class="rounded border border-slate-300 bg-white px-3 py-2 text-slate-700 hover:bg-slate-50" type="button">Cancel</button>
            <button class="rounded bg-rose-600 px-3 py-2 font-semibold text-white hover:bg-rose-700" type="submit">Ya</button>
        </form>
    </div>
</div>