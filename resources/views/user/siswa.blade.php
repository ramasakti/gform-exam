<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Log</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataSiswa as $siswa)
            <tr>
                <td>{{ $ai++ }}</td>
                <td>{{ $siswa->username }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->log }}</td>
            </tr> 
        @endforeach
    </tbody>
</table>