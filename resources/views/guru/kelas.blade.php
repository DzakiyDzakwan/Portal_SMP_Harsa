@extends('guru.master.main')

@section('title')
    <title>{{ $kelas->nama_mapel }} {{ $kelas->grade }}{{ $kelas->kelompok_kelas }}</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    @livewireStyles
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>{{ $kelas->grade }}{{ $kelas->kelompok_kelas }} {{ $kelas->nama_kelas }}</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Kelas
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $kelas->kelas_id }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                            <div class="stats-icon purple mb-2">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Mata Pelajaran">
                                    <i class="bi bi-book-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                            <h6 class="text-muted font-semibold">Mata Pelajaran</h6>
                            <h6 class="font-extrabold mb-0">{{ $kelas->nama_mapel }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                            <div class="stats-icon green mb-2">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Siswa">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                            <h6 class="text-muted font-semibold">Jumlah Siswa</h6>
                            <h6 class="font-extrabold mb-0">2</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                            <div class="stats-icon blue mb-2">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Kelas">
                                    <i class="bi bi-clock-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                            <h6 class="text-muted font-semibold">Sesi Penilaian Aktif</h6>
                            @if (is_null($sesi))
                                <h6 class="font-extrabold mb-0">-</h6>
                            @else
                                @if ($sesi->nama_sesi == 'uh1')
                                    <h6 class="font-extrabold mb-0">Ulangan Harian 1</h6>
                                @elseif($sesi->nama_sesi == 'uh2')
                                    <h6 class="font-extrabold mb-0">Ulangan Harian 2</h6>
                                @elseif($sesi->nama_sesi == 'uh3')
                                    <h6 class="font-extrabold mb-0">Ulangan Harian 3</h6>
                                @elseif($sesi->nama_sesi == 'uts')
                                    <h6 class="font-extrabold mb-0">Ulangan Tengah Semester</h6>
                                @else
                                    <h6 class="font-extrabold mb-0">Ulangan Akhir Semester</h6>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-6 col-lg-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <p class="m-0">Pilih Sesi</p>
                    <fieldset class="form-group">
                        <select class="form-select" id="basicSelect">
                            <option>Ulangan Harian 1</option>
                            <option>Ulangan Harian 2</option>
                            <option>Ulangan Harian 3</option>
                            <option>Ujian Tengah Semester</option>
                            <option>Ujian Akhir Semester</option>
                        </select>
                    </fieldset>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <section class="row">

    </div>
    <div class="card">
        <div class="card-header d-flex gap-2 align-items-center justify-content-between">
            <h5>List Siswa</h5>
        </div>
        <div class="card-body">
            @livewire('list-siswa-kelas', ['kelas_id' => $kelas->kelas_id])
        </div>
    </div>

    @livewire('create-nilai-modal', ['mapel' => $kelas->mapel_id])

@endsection

@section('script')
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
    @livewireScripts
    <script>
        const modalNilai = new bootstrap.Modal('#modalNilai', {
            keyboard: false
        })
        window.addEventListener('nilai-modal', event => {
            modalNilai.toggle();
        });
    </script>
@endsection
