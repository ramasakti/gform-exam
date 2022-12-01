<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Log</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataSiswa as $siswa)
            <tr>
                <td>{{ $ai++ }}</td>
                <td>{{ $siswa->username }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>
                    @php
                        $kelas = DB::table('kelas')->where('id_kelas', $siswa->kelas)->get();
                    @endphp
                    {{ $kelas[0]->tingkat }} {{ $kelas[0]->paralel }}
                </td>
                <td>{{ $siswa->log }}</td>
            </tr> 
        @endforeach
    </tbody>
</table>