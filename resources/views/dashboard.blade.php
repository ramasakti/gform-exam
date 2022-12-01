<x-dashboard title="{{ $title }}" navactive="{{ $navactive }}">
    @switch(session('detailUser')->status)
        @case('Siswa')
            @if (count($dataSoal) > 0)
                <a href="/soal/{{ $dataSoal->id_soal }}">{{ $dataSoal->mapel }}</a>
            @else
                {{ 'Soal Belum Ready' }}
            @endif
            @break
        @default
    @endswitch
</x-dashboard>