<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    <table class="uk-table uk-table-hover uk-table-divider">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Kelas</th>
                <th>Tingkat</th>
                <th>Paralel</th>
                <th>Handler</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataKelas as $kelas)
                <tr>
                    <td>{{ $ai++ }}</td>
                    <td>{{ $kelas->id_kelas }}</td>
                    <td>{{ $kelas->tingkat }}</td>
                    <td>{{ $kelas->paralel }}</td>
                    <td>
                        <a href="#modal-center-{{ $kelas->id_kelas }}" uk-toggle uk-icon="file-edit"></a>
                        @include('kelas.edit-kelas')
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
</x-dashboard>