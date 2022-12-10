@extends('admin.master.main')

@section('title')
    <title>Users</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    @livewireStyles
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Users</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Users
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- Info-Card --}}
    @livewire('info-card-user')

    <div class="card">
        <div class="card-header d-flex gap-2 align-items-center justify-content-between">
            <h5>List User</h5>
            <div class="d-flex align-items-center justify-content-between gap-2">
                <div class="form-group">
                    {{-- Button Tambah User --}}
                    @livewire('create-modal-user')
                </div>
                <div class="form-group">
                    {{-- Button Inactive Admin --}}
                    @livewire('inactive-modal-user')
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- TABLE --}}
            @livewire('list-user')
        </div>
    </div>

    @livewire('edit-modal-user')
@endsection

@section('script')
    <script>
        const createModal = new bootstrap.Modal('#createModal', {
            keyboard: false
        })
        const updateModal = new bootstrap.Modal('#editModal', {
            keyboard: false
        })
        const inactiveModal = new bootstrap.Modal('#trashedUser', {
            keyboard: false
        })
        const restoreModal = new bootstrap.Modal('#restoreModal', {
            keyboard: false
        })
        const deleteModal = new bootstrap.Modal('#deleteModal', {
            keyboard: false
        })

        window.addEventListener('close-create-modal', event => {
            createModal.hide();
        });
        window.addEventListener('update-modal', event => {
            updateModal.toggle();
        })
        window.addEventListener('restore-modal', event => {
            restoreModal.toggle();
        })
        window.addEventListener('delete-modal', event => {
            deleteModal.toggle();
        })
        window.addEventListener('inactive-modal', event => {
            inactiveModal.toggle();
        })
    </script>
    @livewireScripts
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
