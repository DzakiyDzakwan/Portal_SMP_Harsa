@extends('master.main')

@section('title')
    <title>Sesi Penilaian</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    @livewireStyles
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Penilaian</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        sesi-penilaian
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Info Card --}}
    @livewire('info-card-nilai')
    @livewire('info-card-tahun-akademik')
    <div class="card">
        <div class="card-header d-flex gap-2 align-items-center justify-content-between">
            <h5>List Konfirmasi Nilai</h5>
            <div class="d-flex align-items-center justify-content-between gap-2">
                <div class="form-group">
                    {{-- Button Tambah sesi --}}
                    @livewire('create-modal-sesi-penilaian')
                </div>
            </div>
        </div>
        <div class="card-body">
            @livewire('list-sesi-penilaian')
        </div>
    </div>
    @livewire('edit-modal-sesi-penilaian')
    @livewire('alert-sesi-penilaian')
@endsection

@section('script')
    <script>
        //Modal
        const createModal = new bootstrap.Modal('#createModal', {
            keyboard: false
        })
        const editModal = new bootstrap.Modal('#editModal', {
            keyboard: false
        })

        window.addEventListener('close-create-modal', event => {
            createModal.hide();
        });
        window.addEventListener('edit-modal', event => {
            editModal.toggle();
        });

        //Toast
        const insertToast = new bootstrap.Toast('#insertToast')
        const updateToast = new bootstrap.Toast('#updateToast')

        window.addEventListener('insert-alert', e => {
            insertToast.show()
        })

        window.addEventListener('update-alert', e => {
            updateToast.show()
        })
    </script>
    @livewireScripts
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
