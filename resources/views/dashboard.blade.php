<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    @switch(session('detailUser')->status)
        @case('Siswa')
            <div class="uk-child-width-1-2@s uk-grid-match" uk-grid>
                <div>
                    <button class="uk-margin uk-button uk-button-primary uk-button-small" onclick="window.location.reload()">Refresh</button>                
                    <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                        <h3 class="uk-card-title">Selamat Datang!</h3>
                        <h6>{{ session('detailUser')->nama }}</h6>
                        <p>Kelas: {{ session('detailUser')->kelas }}</p>
                        <p>Ruang: {{ session('detailUser')->ruang }}</p>
                    </div>
                </div>
                <div>
                    @if (count($dataSoal) > 0)
                        @foreach ($dataSoal as $soal)  
                            <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-margin">
                                <h3 class="uk-card-title">{{ $soal->mapel }}</h3>
                                @if ($soal->mulai > date('H:i:s') and $soal->sampai > date('H:i:s'))
                                    <p>Waktu Mengerjakan Belum Dimulai</p>
                                @elseif ($soal->mulai < date('H:i:s') and $soal->sampai < date('H:i:s'))
                                    <p>Expired</p>
                                @else
                                    @if ($soal->isactive != 1)
                                        <p>Soal Belum Diaktivasi</p>
                                    @else
                                        <button uk-toggle="target: #modal-confirm" class="uk-button uk-margin-small uk-button-small uk-width-1-1 uk-button-primary">Mulai</button>
                                    @endif
                                @endif
                                <div id="modal-confirm" class="uk-flex-top" uk-modal>
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
                            </div>
                        @endforeach
                    @else
                        <h4>Soal Belum Dirilis</h4>
                    @endif
                </div>
            </div>
            @break
        @case('Pengawas')
            <table class="uk-table uk-table-hover uk-table-divider">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Ruang</th>
                        <th>Log</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSiswa as $siswa)
                        <tr>
                            <td>{{ $ai++ }}</td>
                            <td>{{ $siswa->username }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->kelas }}</td>
                            <td>{{ $siswa->ruang }}</td>
                            <td>{{ $siswa->log }}</td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
            @break
        @default
    @endswitch
</x-dashboard>