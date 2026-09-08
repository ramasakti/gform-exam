<div id="hit-user" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 px-4 py-8">
    <div class="w-full max-w-md rounded border border-slate-200 bg-white p-5 text-slate-800 shadow-lg text-xs">
        <h5 class="text-base font-semibold text-slate-900">Reset Login Siswa</h5>
        <form action="/update/user" method="post" enctype="multipart/form-data" class="mt-4 grid gap-3">
            @csrf
            <input class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900" name="hit" type="text" placeholder="Jumlah Login">
            <button type="submit" class="rounded bg-indigo-600 px-4 py-2 font-semibold text-white hover:bg-indigo-700">Simpan</button>
        </form>
    </div>
</div>