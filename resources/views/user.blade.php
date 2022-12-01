<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    <a class="uk-margin" href="#modal-center" uk-toggle uk-icon="upload"></a>
    @include('user.import-user')
    <a class="uk-margin" href="#add-user" uk-toggle uk-icon="plus"></a>
    @include('user.add-user')
    
    <ul uk-tab>
        <li><a href="#">Siswa</a></li>
        <li><a href="#">Guru</a></li>
    </ul>

    <ul class="uk-switcher uk-margin">
        <li>
            @include('user.siswa')
        </li>
        <li>
            @include('user.guru')
        </li>
    </ul>
</x-dashboard>