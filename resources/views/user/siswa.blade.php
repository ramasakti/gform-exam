<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Ruang</th>
            <th>Login</th>
            <th>Log</th>
            <th>Handler</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataSiswa as $siswa)
            <tr>
                <td>{{ $ai++ }}</td>
                <td>{{ $siswa->username }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->tingkat }}{{ $siswa->paralel }}</td>
                <td>{{ $siswa->ruang }}</td>
                <td>{{ $siswa->hit }}</td>
                <td>{{ $siswa->log }}</td>
                <td>
                    <a href="#edit-user-{{ $siswa->username }}" uk-toggle uk-icon="file-edit"></a>
                    @include('user.edit-user')
                </td>
            </tr> 
        @endforeach
    </tbody>
</table>