<div id="hit-user" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h5>Reset Login Siswa</h5>
        <form action="/update/user" method="post" enctype="multipart/form-data">
            @csrf
            <div class="uk-margin">
                <input class="uk-input" name="hit" type="text" placeholder="Jumlah Login">
            </div>
            <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Simpan</button>
        </form>
    </div>
</div>