<div id="edit-user-{{ $siswa->username }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h5>Edit Siswa</h5>
        <form action="/update/user/{{ $siswa->username }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="uk-margin">
                {{ $siswa->nama }}
            </div>
            <div class="uk-margin">
                <input class="uk-input" name="hit" type="text" value="{{ $siswa->hit }}">
            </div>
            <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Simpan</button>
        </form>
    </div>
</div>