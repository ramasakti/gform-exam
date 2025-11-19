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
                <input type="text" class="form-control" name="paralel">
            </div>
            <input type="hidden" name="walas" value="-">
            <button type="submit" class="uk-button uk-button-primary uk-width-1-1">SIMPAN</button>
        </form>
    </div>
</div>