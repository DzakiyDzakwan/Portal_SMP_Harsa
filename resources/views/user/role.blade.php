@extends('master.main')

@section('title')
    <title>Roles</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    @livewireStyles
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Role</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        User
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- Info-Card --}}
    @livewire('info-card-role')

    <div class="card">
        <div class="card-header d-flex gap-2 align-items-center justify-content-between">
            <h5>List Role</h5>
            <div class="d-flex align-items-center justify-content-between gap-2">
                <div class="form-group">
                    {{-- Button Tambah Role --}}
                    @livewire('create-modal-role')
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- TABLE --}}
            @livewire('list-role')
        </div>
    </div>

    @livewire('edit-modal-role')
    @livewire('alert-role')
    {{-- @livewire('role-modal-role') --}}
@endsection

@section('script')
    <script>
        const createModal = new bootstrap.Modal('#createModal', {
            keyboard: false
        })
        const updateModal = new bootstrap.Modal('#editModal', {
            keyboard: false
        })
        /* const permissionModal = new bootstrap.Modal('#permissionModal', {
            keyboard: false
        }) */

        window.addEventListener('create-modal', event => {
            createModal.hide();
        })
        window.addEventListener('edit-modal', event => {
            updateModal.toggle();
        })
        /*  window.addEventListener('permission-modal', event => {
             permissionModal.toggle();
         }); */

        //Toast
        const createToast = new bootstrap.Toast('#createToast')
        const inactiveToast = new bootstrap.Toast('#inactiveToast')
        const updateToast = new bootstrap.Toast('#updateToast')
        const restoreToast = new bootstrap.Toast('#restoreToast')
        const deleteToast = new bootstrap.Toast('#deleteToast')

        window.addEventListener('create-alert', e => {
            createToast.show()
        })

        window.addEventListener('inactive-alert', e => {
            inactiveToast.show()
        })

        window.addEventListener('update-alert', e => {
            updateToast.show()
        })

        window.addEventListener('delete-alert', e => {
            deleteToast.show()
        })
    </script>
    @livewireScripts
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
