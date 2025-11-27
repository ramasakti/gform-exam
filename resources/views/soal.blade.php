<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    <a class="uk-margin" href="#add-soal" uk-toggle uk-icon="plus"></a>
    @include('soal.add-soal')
    @if (session()->has('success'))
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <table class="uk-table uk-table-hover uk-table-divider">
        <thead>
            <tr>
                <th>#</th>
                <th>Mapel</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Kelas</th>
                <th>Waktu Aktif (Menit)</th>
                <th>Handler</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataSoal as $soal)
                <tr>
                    <td>{{ $ai++ }}</td>
                    <td>{{ $soal->mapel }}</td>
                    <td>
                        @if ($soal->isactive == true)
                            {{ 'Aktif' }}
                        @else
                            {{ 'Tidak Aktif' }}
                        @endif
                    </td>
                    <td>{{ $soal->tgl }}</td>
                    <td>{{ $soal->mulai }} - {{ $soal->sampai }}</td>
                    <td>
                        @foreach ($soal->kelas as $kelas)
                            {{ $kelas->tingkat }}{{ $kelas->paralel }}, 
                        @endforeach
                    </td>
                    <td>{{ $soal->menit_aktif }}</td>
                    <td>
                        <a href="#edit-soal-{{ $soal->id_soal }}" uk-toggle uk-icon="settings"></a>
                        @include('soal.edit-soal')
                        &nbsp;
                        <a href="/soal/{{ $soal->id_soal }}" target="_blank" uk-icon="search"></a>
                        &nbsp;
                        <a href="#delete-soal-{{ $soal->id_soal }}" uk-toggle uk-icon="trash"></a>
                        @include('soal.delete-soal')
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
</x-dashboard>