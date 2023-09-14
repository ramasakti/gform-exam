<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    <a uk-icon="icon: plus" href="#add-kelas" uk-toggle></a>
    @include('kelas.add-kelas')
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
                        <a href="#edit-kelas-{{ $kelas->id_kelas }}" uk-toggle uk-icon="file-edit"></a>
                        @include('kelas.edit-kelas')
                        <a href="#delete-kelas-{{ $kelas->id_kelas }}" uk-toggle uk-icon="trash"></a>
                        @include('kelas.delete-kelas')
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
</x-dashboard>