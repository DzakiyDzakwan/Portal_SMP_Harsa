@extends('master.main')

@section('title')
    <title>Kelas</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    @livewireStyles
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Wali Kelas</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Wali Kelas
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Info Card --}}
    @livewire('info-card-wali-kelas')

    <div class="card">
        <div class="card-header d-flex gap-2 align-items-center justify-content-between">
            <h5>List Wali Kelas</h5>
            <div class="d-flex align-items-center justify-content-between gap-2">
                <div class="form-group">
                    {{-- Button Tambah Wali Kelas --}}
                    @livewire('create-modal-wali-kelas')
                </div>
            </div>
        </div>
        <div class="card-body">
            @livewire('list-wali-kelas')
        </div>
    </div>
    @livewire('edit-modal-kelas')

    @livewire('alert-wali-kelas')
@endsection

@section('script')
    <script>
        //Modal
        const createModal = new bootstrap.Modal('#createModal', {
            keyboard: false
        })


        window.addEventListener('close-create-modal', event => {
            createModal.hide();
        });
        window.addEventListener('delete-modal', event => {
            deleteModal.toggle();
        })

        //Toast
        const insertToast = new bootstrap.Toast('#insertToast')
        const deleteToast = new bootstrap.Toast('#deleteToast')


        window.addEventListener('insert-alert', e => {
            insertToast.show()
        })

        window.addEventListener('delete-alert', e => {
            deleteToast.show()
        })
    </script>
    @livewireScripts
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
