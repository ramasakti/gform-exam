<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    @if (session('detailUser')->status === 'Admin')     
        <a class="uk-margin" href="#modal-center" uk-toggle uk-icon="upload"></a>
        @include('user.import-user')
        <a class="uk-margin" href="#add-user" uk-toggle uk-icon="plus"></a>
        @include('user.add-user')
    @endif
    
    <ul uk-tab>
        <li><a href="#">Siswa</a></li>
        @if (session('detailUser')->status === 'Admin')
            <li><a href="#">Guru</a></li>
        @endif
    </ul>

    <ul class="uk-switcher uk-margin">
        <li>
            @if (request('ruang'))
                <h6>Daftar Nama Ruang {{ request('ruang') }}</h6>
            @endif
            @include('user.siswa')
        </li>
        <li>
            @include('user.guru')
        </li>
    </ul>
</x-dashboard>