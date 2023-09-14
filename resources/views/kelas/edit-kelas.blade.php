<div id="edit-kelas-{{ $kelas->id_kelas }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <form action="/kelas/update" method="post">
            @csrf
            <legend class="uk-legend">Edit Kelas</legend>
            <input type="hidden" name="id_kelas" value="{{ $kelas->id_kelas }}">
            <label for="tingkat">Tingkat</label>
            <div class="uk-margin">
                <select name="tingkat" class="uk-select" aria-label="Select">
                    <option {{ ($kelas->tingkat == '7') ? 'selected' : '' }} value="7">7</option>
                    <option {{ ($kelas->tingkat == '8') ? 'selected' : '' }} value="8">8</option>
                    <option {{ ($kelas->tingkat == '9') ? 'selected' : '' }} value="9">9</option>
                    <option {{ ($kelas->tingkat == 'X') ? 'selected' : '' }} value="X">X</option>
                    <option {{ ($kelas->tingkat == 'XI') ? 'selected' : '' }} value="XI">XI</option>
                    <option {{ ($kelas->tingkat == 'XII') ? 'selected' : '' }} value="XII">XII</option>
                </select>
            </div>
            <div class="uk-margin">
                <label for="paralel">Paralel</label>
                <div class="uk-margin uk-margin-remove-top">
                    <select name="paralel" class="uk-select" aria-label="Select">
                        <option {{ ($kelas->paralel == 'A') ? 'selected' : '' }} value="A">A</option>
                        <option {{ ($kelas->paralel == 'B') ? 'selected' : '' }} value="B">B</option>
                        <option {{ ($kelas->paralel == 'C') ? 'selected' : '' }} value="C">C</option>
                        <option {{ ($kelas->paralel == 'D') ? 'selected' : '' }} value="D">D</option>
                        <option {{ ($kelas->paralel == 'MIPA') ? 'selected' : '' }} value="MIPA">MIPA</option>
                        <option {{ ($kelas->paralel == 'IIS') ? 'selected' : '' }} value="IIS">IIS</option>
                        <option {{ ($kelas->paralel == '1') ? 'selected' : '' }} value="1">1</option>
                        <option {{ ($kelas->paralel == '2') ? 'selected' : '' }} value="2">2</option>
                        <option {{ ($kelas->paralel == '3') ? 'selected' : '' }} value="3">3</option>
                        <option {{ ($kelas->paralel == '4') ? 'selected' : '' }} value="4">4</option>
                        <option {{ ($kelas->paralel == '5') ? 'selected' : '' }} value="5">5</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="uk-button uk-button-primary uk-width-1-1">SIMPAN</button>
        </form>
    </div>
</div>