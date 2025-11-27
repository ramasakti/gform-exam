<div id="add-soal" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h5>Tambah Soal</h5>
        <form action="/store/soal" method="post" enctype="multipart/form-data">
            @csrf
            <div class="uk-margin">
                <input class="uk-input" name="mapel" type="text" placeholder="Mapel" aria-label="Mapel" required>
            </div>
            <div class="uk-margin">
                <input class="uk-input" name="url" type="text" placeholder="URL" aria-label="URL" required>
            </div>
            <div class="uk-margin">
                Tanggal
                <input class="uk-input" name="tgl" type="date" placeholder="Tanggal" aria-label="Tanggal" required>
            </div>
            <div class="uk-margin">
                Mulai
                <input class="uk-input" name="mulai" type="time" placeholder="Mulai" aria-label="Mulai" required>
            </div>
            <div class="uk-margin">
                Sampai
                <input class="uk-input" name="sampai" type="time" placeholder="Sampai" aria-label="Sampai" required>
            </div>
            <div class="uk-margin">
                Waktu Aktif (Menit)
                <input class="uk-input" name="menit_aktif" type="number" min="1" placeholder="Menit Aktif" aria-label="Menit Aktif" required>
            </div>
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                @foreach ($dataKelas as $kelas)
                    <label><input class="uk-checkbox" name="kelas[]" type="checkbox" value="{{ $kelas->id_kelas }}"> {{ $kelas->tingkat }} {{ $kelas->paralel }}</label>
                @endforeach
            </div>
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                <label><input name="isactive" class="uk-radio" value="true" type="radio"> Aktif</label>
                <label><input name="isactive" class="uk-radio" value="false" type="radio"> Non Aktif</label>
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