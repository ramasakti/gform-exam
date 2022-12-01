<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>

        <form action="/import" method="post" enctype="multipart/form-data">
            @csrf
        
            
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" name="user" type="file" id="formFile">
            </div>
            <button type="submit" class="uk-button uk-button-primary uk-width-1-1">UPLOAD</button>
        </form>
    </div>
</div>