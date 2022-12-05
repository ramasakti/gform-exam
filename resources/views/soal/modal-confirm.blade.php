<div id="modal-confirm-{{ $soal->id_soal }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h5>Apakah anda yakin mulai mengerjakan soal?</h5>
        <p>Bismillah</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <a class="uk-button uk-button-primary" href="/soal/{{ $soal->id_soal }}">Mulai</a>
        </p>                                
    </div>
</div>