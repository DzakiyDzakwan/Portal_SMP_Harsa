@extends('master.main')

@section('title')
    <title>Admin</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    @livewireStyles
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Admin</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Admin
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- Info Card Admin --}}
    @livewire('info-card-admin')

    <div class="card">
        <div class="card-header d-flex gap-2 align-items-center justify-content-between">
            <h5>List Admin</h5>
            <div class="form-group">
                {{-- Button Tambah User --}}
                @livewire('create-modal-admin')
            </div>
        </div>
        <div class="card-body">
            {{-- List Admin --}}
            @livewire('list-admin')
        </div>
    </div>

    {{-- @livewire('edit-modal-admin') --}}

    @livewire('alert-admin')

    {{-- @livewire('info-modal-admin') --}}
@endsection

@section('script')
    <script>
        //Modal
        const createModal = new bootstrap.Modal('#createModal', {
            keyboard: false
        })
        /* const deleteModal = new bootstrap.Modal('#deleteModal', {
            keyboard: false
        }) */
        /* const editModal = new bootstrap.Modal('#editModal', {
            keyboard: false
        })
        const infoModal = new bootstrap.Modal('#infoModal', {
            keyboard: false
        })
        const restoreModal = new bootstrap.Modal('#editModalPrestasi', {
            keyboard: false
        })
        const deleteModal = new bootstrap.Modal('#deleteModalPrestasi', {
            keyboard: false
        }) */

        window.addEventListener('close-create-modal', event => {
            createModal.hide();
        });
        /* window.addEventListener('edit-modal', event => {
            editModal.toggle();
        });
        window.addEventListener('info-modal', event => {
            infoModal.toggle();
        });
        window.addEventListener('edit-prestasi-modal', event => {
            restoreModal.toggle();
        })
        window.addEventListener('delete-prestasi-modal', event => {
            deleteModal.toggle();
        }) */

        //Toast
        const insertToast = new bootstrap.Toast('#insertToast')
        const inactiveToast = new bootstrap.Toast('#inactiveToast')
        const updateToast = new bootstrap.Toast('#updateToast')
        const restoreToast = new bootstrap.Toast('#restoreToast')
        const deleteToast = new bootstrap.Toast('#deleteToast')
        const insertPrestasiToast = new bootstrap.Toast('#insertPrestasiToast')
        const updatePrestasiToast = new bootstrap.Toast('#updatePrestasiToast')
        const deletePrestasiToast = new bootstrap.Toast('#deletePrestasiToast')


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

        window.addEventListener('insert-prestasi-alert', e => {
            insertPrestasiToast.show()
        })

        window.addEventListener('edit-prestasi-alert', e => {
            editPrestasiToast.show()
        })

        window.addEventListener('delete-prestasi-alert', e => {
            deletePrestasiToast.show()
        })
    </script>
    @livewireScripts
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
