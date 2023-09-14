<div id="add-kelas" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <form action="/kelas/store" method="POST">
            @csrf
            <legend class="uk-legend uk-margin">Tambah Kelas</legend>
            <label for="tingkat">TINGKAT</label>
            <div class="uk-margin uk-margin-remove-top">
                <select name="tingkat" class="uk-select" aria-label="Select">
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
            <label for="paralel">PARALEL</label>
            <div class="uk-margin uk-margin-remove-top">
                <select name="paralel" class="uk-select" aria-label="Select">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="MIPA">MIPA</option>
                    <option value="IIS">IIS</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <input type="hidden" name="walas" value="-">
            <button type="submit" class="uk-button uk-button-primary uk-width-1-1">SIMPAN</button>
        </form>
    </div>
</div>