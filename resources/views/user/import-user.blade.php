<div id="modal-center" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 px-4 py-8">
    <div class="w-full max-w-md rounded border border-slate-200 bg-white p-5 text-slate-800 shadow-lg text-xs">
        <div class="flex items-center justify-between border-b border-slate-200 pb-3">
            <h5 class="text-base font-semibold text-slate-900">Import User</h5>
            <button type="button" class="rounded border border-slate-300 bg-white px-2 py-1 text-xs text-slate-600 hover:bg-slate-50">Tutup</button>
        </div>
        <a href="/user/template" class="mt-3 inline-flex rounded border border-slate-300 bg-slate-50 px-3 py-2 font-medium text-slate-700 hover:bg-slate-100">Download Template</a>
        <form action="/user/upload" method="post" enctype="multipart/form-data" class="mt-4 grid gap-3">
            @csrf
            <input class="w-full rounded border border-slate-300 bg-white px-3 py-2 text-slate-900" name="user" type="file" id="formFile">
            <button type="submit" class="rounded bg-indigo-600 px-4 py-2 font-semibold text-white hover:bg-indigo-700">UPLOAD</button>
        </form>
    </div>
</div>