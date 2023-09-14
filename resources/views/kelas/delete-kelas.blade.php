<div id="delete-kelas-{{ $kelas->id_kelas }}" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h5>Hapus kelas {{ $kelas->tingkat }} {{ $kelas->paralel }}?</h5>
        <form action="/kelas/delete" method="post">
            @csrf
            <input type="hidden" name="id_kelas" value="{{ $kelas->id_kelas }}">
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="submit">Ya</button>
            </div>
        </form>
    </div>
</div>