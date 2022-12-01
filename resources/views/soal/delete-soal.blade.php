<div id="delete-soal-{{ $soal->id_soal }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h5>Hapus Soal {{ $soal->mapel }}?</h5>
        <form action="/delete/soal" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_soal" value="{{ $soal->id_soal }}">
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="submit">Ya</button>
            </div>
        </form>
    </div>
</div>