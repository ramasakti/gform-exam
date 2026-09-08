<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    <div class="flex flex-wrap gap-2">
        @if (session('user')->status === 'Admin')
            <button data-modal-target="modal-center" class="rounded bg-indigo-600 px-3 py-2 text-xs font-semibold text-white hover:bg-indigo-700">Import User</button>
            @include('user.import-user')
            <button data-modal-target="add-user" class="rounded border border-slate-300 bg-white px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">Tambah User</button>
            @include('user.add-user')
            <button data-modal-target="reset-log" class="rounded border border-slate-300 bg-white px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">Reset Log</button>
            @include('user.reset-log')
            <button data-modal-target="reset-user" class="rounded border border-rose-300 bg-rose-50 px-3 py-2 text-xs font-semibold text-rose-700 hover:bg-rose-100">Reset User</button>
            @include('user.reset-user')
            <button data-modal-target="hit-user" class="rounded border border-emerald-300 bg-emerald-50 px-3 py-2 text-xs font-semibold text-emerald-700 hover:bg-emerald-100">Hit User</button>
            @include('user.hit-user')
        @endif
    </div>

    @if (session('success'))
        <div class="mt-4 rounded border border-emerald-200 bg-emerald-50 p-3 text-xs text-emerald-800">
            <strong class="block mb-1 font-semibold">Berhasil</strong>
            @if (gettype(session('success')) === 'string')
                <p>{{ session('success') }}</p>
            @else
                <ul class="list-disc pl-4">
                    @foreach (session('success') as $msg)
                        <li>{{ $msg }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif

    @if (session('errors'))
        <div class="mt-4 rounded border border-rose-200 bg-rose-50 p-3 text-xs text-rose-800">
            <strong class="block mb-1 font-semibold">Terjadi Kesalahan</strong>
            <ul class="list-disc pl-4">
                @foreach (session('errors') as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mt-6 grid gap-6 lg:grid-cols-2">
        <section class="rounded-md border border-slate-200 bg-white p-4">
            <h3 class="text-base font-semibold text-slate-900">Siswa</h3>
            @if (request('ruang'))
                <p class="mt-1 text-xs text-slate-500">Daftar Nama Ruang {{ request('ruang') }}</p>
            @endif
            @include('user.siswa')
        </section>
        @if (session('user')->status === 'Admin')
            <section class="rounded-md border border-slate-200 bg-white p-4">
                <h3 class="text-base font-semibold text-slate-900">Guru</h3>
                @include('user.guru')
            </section>
        @endif
    </div>
</x-dashboard>
