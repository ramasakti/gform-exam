<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    @if (session('user')->status === 'Admin')     
        <a class="uk-margin uk-margin-small-right" href="#modal-center" uk-toggle uk-icon="upload"></a>
        @include('user.import-user')
        <a class="uk-margin uk-margin-small-right" href="#add-user" uk-toggle uk-icon="plus"></a>
        @include('user.add-user')
        <a class="uk-margin uk-margin-small-right" href="#reset-log" uk-toggle uk-icon="ban"></a>
        @include('user.reset-log')
        <a class="uk-margin uk-margin-small-right" href="#reset-user" uk-toggle uk-icon="trash"></a>
        @include('user.reset-user')
        <a class="uk-margin uk-margin-small-right" href="#hit-user" uk-toggle uk-icon="sign-in"></a>
        @include('user.hit-user')
    @endif

    @if (session()->has('success'))
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    
    <ul uk-tab>
        <li><a href="#">Siswa</a></li>
        @if (session('user')->status === 'Admin')
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