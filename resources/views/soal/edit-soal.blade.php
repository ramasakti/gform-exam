<div id="edit-soal-{{ $soal->id_soal }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h5>Edit Soal</h5>
        <form action="/update/soal" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_soal" value="{{ $soal->id_soal }}">
            <div class="uk-margin">
                <input class="uk-input" name="mapel" type="text" placeholder="Mapel" aria-label="Mapel" value="{{ $soal->mapel }}" required>
            </div>
            <div class="uk-margin">
                <input class="uk-input" name="url" type="text" placeholder="URL" aria-label="URL" value="{{ $soal->url }}" required>
            </div>
            <div class="uk-margin">
                Tanggal
                <input class="uk-input" name="tgl" type="date" placeholder="Tanggal" aria-label="Tanggal" value="{{ $soal->tgl }}" required>
            </div>
            <div class="uk-margin">
                Mulai
                <input class="uk-input" name="mulai" type="time" placeholder="Mulai" aria-label="Mulai" value="{{ $soal->mulai }}" required>
            </div>
            <div class="uk-margin">
                Sampai
                <input class="uk-input" name="sampai" type="time" placeholder="Sampai" aria-label="Sampai" value="{{ $soal->sampai }}" required>
            </div>
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                @foreach ($dataKelas as $kelas)
                    @php
                        $xplodeKelas = explode('#', $soal->kelas_id)
                    @endphp
                    <label><input class="uk-checkbox" name="kelas[]" type="checkbox" value="{{ $kelas->id_kelas }}" {{ (array_search($kelas->id_kelas, $xplodeKelas)) ? 'checked' : '' }}> 
                        {{ $kelas->tingkat }} {{ $kelas->paralel }}</label>
                @endforeach
            </div>
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                <label><input name="isactive" class="uk-radio" value="true" {{ ($soal->isactive === 1) ? 'checked' : '' }} type="radio"> Aktif</label>
                <label><input name="isactive" class="uk-radio" value="false" {{ ($soal->isactive === 0) ? 'checked' : '' }} type="radio"> Non Aktif</label>
            </div>
            <button type="submit" class="uk-button uk-button-primary uk-width-1-1">SIMPAN</button>
        </form>
    </div>
</div>