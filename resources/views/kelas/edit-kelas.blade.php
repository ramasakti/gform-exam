<div id="modal-center-{{ $kelas->id_kelas }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>

        <form action="/import" method="post" enctype="multipart/form-data">
            @csrf           
            {{ $kelas->tingkat }}{{ $kelas->paralel }}
            <button type="submit" class="uk-button uk-button-primary uk-width-1-1">SIMPAN</button>
        </form>
    </div>
</div>