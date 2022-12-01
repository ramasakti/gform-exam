<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    @switch(session('detailUser')->status)
        @case('Siswa')
                <div class="uk-child-width-1-2@s uk-grid-match" uk-grid>
                    <div>
                        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                            <h3 class="uk-card-title">Selamat Datang!</h3>
                            <h6>{{ session('detailUser')->nama }}</h6>
                            <p>Kelas: {{ session('detailUser')->kelas }}</p>
                            <p>Ruang: {{ session('detailUser')->ruang }}</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                            @if (count($dataSoal) > 0)
                                <h3 class="uk-card-title">{{ $dataSoal[0]->mapel }}</h3>
                                <button uk-toggle="target: #modal-confirm" class="uk-button uk-margin-small uk-button-small uk-width-1-1 uk-button-primary">Mulai</button>
                                <div id="modal-confirm" class="uk-flex-top" uk-modal>
                                    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                        <h5>Apakah anda yakin mulai mengerjakan soal?</h5>
                                        <p>Bismillah</p>
                                        <p class="uk-text-right">
                                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                            <a class="uk-button uk-button-primary" href="/soal/{{ $dataSoal[0]->id_soal }}">Mulai</a>
                                        </p>                                
                                    </div>
                                </div>
                            @else
                                <h4>Soal Belum Dirilis</h4>
                            @endif
                        </div>
                    </div>
                </div>
            @break
        @default
    @endswitch
</x-dashboard>