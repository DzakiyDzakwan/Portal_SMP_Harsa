@extends('admin.master.main')

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
            <h3>Data Kelas</h3>
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
                </ol>
            </nav>
        </div>
    </div>

    {{-- Info Card --}}
    @livewire('info-card-kelas')

    <div class="card">
        <div class="card-header d-flex gap-2 align-items-center justify-content-between">
            <h5>List Kelas</h5>
            <div class="form-group">
                @livewire('create-modal-kelas')
            </div>
        </div>
        <div class="card-body">
            @livewire('list-kelas')
        </div>
    </div>

    @livewire('edit-modal-kelas')


    <div class="toast-container position-fixed top-0 end-0 p-3">
        {{-- Insert Kelas --}}
        <div id="insertToast" class="toast align-items-center  text-bg-success" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Kelas Berhasil dibuat
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

        {{-- Inaktif Kelas --}}
        <div id="inactiveToast" class="toast align-items-center  text-bg-danger" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Kelas Berhasil di Non Aktifkan
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

        {{-- Update Kelas --}}
        <div id="updateToast" class="toast align-items-center  text-bg-warning" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Kelas berhasil diubah
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

        {{-- Restore Kelas --}}
        <div id="restoreToast" class="toast align-items-center  text-bg-success" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Kelas berhasil dipulihkan
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

        {{-- Delete Kelas --}}
        <div id="deleteToast" class="toast align-items-center  text-bg-danger" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Kelas berhasil dihapus
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
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
        /* 
                const inactiveModal = new bootstrap.Modal('#trashedUser', {
                    keyboard: false
                })
                const restoreModal = new bootstrap.Modal('#restoreModal', {
                    keyboard: false
                })
                const deleteModal = new bootstrap.Modal('#deleteModal', {
                    keyboard: false
                }) */
        window.addEventListener('close-create-modal', event => {
            createModal.hide();
        });
        window.addEventListener('edit-modal', event => {
            editModal.toggle();
        });
        /* 
                window.addEventListener('restore-modal', event => {
                    restoreModal.toggle();
                })
                window.addEventListener('delete-modal', event => {
                    deleteModal.toggle();
                })
                window.addEventListener('inactive-modal', event => {
                    inactiveModal.toggle();
                }) */

        //Toast
        const insertToast = new bootstrap.Toast('#insertToast')
        const inactiveToast = new bootstrap.Toast('#inactiveToast')
        const updateToast = new bootstrap.Toast('#updateToast')
        const restoreToast = new bootstrap.Toast('#restoreToast')
        const deleteToast = new bootstrap.Toast('#deleteToast')


        window.addEventListener('insert-alert', e => {
            insertToast.show()
        })

        window.addEventListener('inactive-alert', e => {
            inactiveToast.show()
        })

        window.addEventListener('update-alert', e => {
            updateToast.show()
        })

        window.addEventListener('restore-alert', e => {
            restoreToast.show()
        })

        window.addEventListener('delete-alert', e => {
            deleteToast.show()
        })
    </script>
    @livewireScripts
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
