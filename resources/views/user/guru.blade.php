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
        @foreach ($dataGuru as $guru)
            <tr>
                <td>{{ $ai++ }}</td>
                <td>{{ $guru->username }}</td>
                <td>{{ $guru->nama }}</td>
                <td>{{ $guru->log }}</td>
            </tr> 
        @endforeach
    </tbody>
</table>