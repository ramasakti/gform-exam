<div id="add-user" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h5>Tambah User</h5>
        <form action="/store/user" method="post" enctype="multipart/form-data">
            @csrf
            <div class="uk-margin">
                <input class="uk-input" name="username" type="text" placeholder="Username" aria-label="Username" required>
            </div>
            <div class="uk-margin">
                <input class="uk-input" name="password" type="text" placeholder="Password" aria-label="Password" required>
            </div>
            <div class="uk-margin">
                <input class="uk-input" name="nama" type="text" placeholder="Nama" aria-label="Nama" required>
            </div>
            <div class="uk-margin">
                <select id="status" name="status" class="uk-select" aria-label="Select" onchange="deleteElemen()">
                    <option>Status User</option>
                    <option value="Admin">Admin</option>
                    <option value="Siswa">Siswa</option>
                    <option value="Pengawas">Pengawas</option>
                </select>
            </div>
            <div class="uk-margin">
                <select id="kelas" name="kelas" class="uk-select" aria-label="Select">
                    @foreach ($dataKelas as $kelas)
                        <option value="{{ $kelas->id_kelas }}">{{ $kelas->tingkat }} {{ $kelas->paralel }}</option>
                    @endforeach
                </select>
            </div>
            <div class="uk-margin">
                <input class="uk-input" id="ruangan" name="ruang" type="text" placeholder="Ruangan" aria-label="Ruangan" required>
            </div>
            <button type="submit" class="uk-button uk-button-primary uk-width-1-1">TAMBAH</button>
        </form>
    </div>
</div>
<script>
    const status = document.getElementById('status')
    const kelas = document.getElementById('kelas')
    const ruangan = document.getElementById('ruangan')
    function deleteElemen() {
        if (status.value === 'Admin') {
            kelas.remove()
            ruangan.remove()
        }
    }
</script>