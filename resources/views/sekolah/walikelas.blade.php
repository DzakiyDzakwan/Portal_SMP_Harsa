@extends('master.main')

@section('title')
    <title>{{ $kelas->grade }}{{ $kelas->kelompok_kelas }} {{ $kelas->nama_kelas_aktif }}</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    @livewireStyles
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>{{ $kelas->grade }}{{ $kelas->kelompok_kelas }} {{ $kelas->nama_kelas_aktif }}</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard-guru">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Wali Kelas
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
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Siswa">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                            <h6 class="text-muted font-semibold">Total Siswa</h6>
                            <h6 class="font-extrabold mb-0">{{ $kelas->jumlah_siswa }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex gap-2 align-items-center justify-content-between">
            <h5>List Siswa</h5>
        </div>
        <div class="card-body">
            @livewire('list-siswa-wali-kelas', ['kelas' => $kelas->kelas_aktif_id])
        </div>
    </div>

    @livewire('info-modal-siswa')
    @livewire('create-modal-prestasi')
    @livewire('alert-prestasi')
@endsection

@section('script')
    <script>
        const infoModal = new bootstrap.Modal('#infoModal', {
            keyboard: false
        })

        const createPrestasi = new bootstrap.Modal('#createPrestasi', {
            keyboard: false
        })

        const restoreModal = new bootstrap.Modal('#editModalPrestasi', {
            keyboard: false
        })

        const deleteModal = new bootstrap.Modal('#deleteModalPrestasi', {
            keyboard: false
        })

        window.addEventListener('info-modal', event => {
            infoModal.toggle();
        });

        window.addEventListener('create-prestasi', event => {
            createPrestasi.toggle();
        });

        window.addEventListener('edit-prestasi-modal', event => {
            restoreModal.toggle();
        })
        window.addEventListener('delete-prestasi-modal', event => {
            deleteModal.toggle();
        })

        //Modal
        const insertPrestasiToast = new bootstrap.Toast('#insertPrestasiToast')
        const updatePrestasiToast = new bootstrap.Toast('#updatePrestasiToast')
        const deletePrestasiToast = new bootstrap.Toast('#deletePrestasiToast')
    </script>
    @livewireScripts
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
