@extends('admin.master.main')

@section('title')
    <title>Guru</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    @livewireStyles
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Guru</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Guru
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    @livewire('info-card-guru')

    <div class="card">
        <div class="card-header d-flex gap-2 align-items-center justify-content-between">
            <h5>List Guru</h5>
            <div class="form-group">
                {{-- Button Tambah Guru --}}
                @livewire('create-modal-guru')
            </div>
        </div>
        <div class="card-body">
            @livewire('list-guru')
        </div>
    </div>

    @livewire('edit-modal-guru')

    {{-- Modal Restore Guru --}}
    <div class="modal fade text-left" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="myModalLabel130">
                        Restore
                    </h5>
                </div>
                <div class="modal-body">Apakah anda yakin ingin mengembalikan akun?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" wire:click="closeRestoreModal()">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button class="btn btn-success ml-1" wire:click="restoreUser()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Restore</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Delete permanen --}}
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel130">
                        Hapus
                    </h5>
                </div>
                <div class="modal-body">Apakah anda yakin ingin menghapus permanen?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button class="btn btn-danger ml-1" wire:click="deleteUser()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Hapus</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    @livewire('alert-guru')
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
        /* const inactiveModal = new bootstrap.Modal('#inactiveModal', {
            keyboard: false
        }) */
        /* const restoreModal = new bootstrap.Modal('#restoreModal', {
            keyboard: false
        }) */
        /* const deleteModal = new bootstrap.Modal('#deleteModal', {
            keyboard: false
        }) */

        window.addEventListener('close-create-modal', event => {
            createModal.hide();
        });
        window.addEventListener('edit-modal', event => {
            editModal.toggle();
        });
        /* window.addEventListener('inactive-modal', event => {
            inactiveModal.toggle();
        }) */
        /* window.addEventListener('restore-modal', event => {
            restoreModal.toggle();
        }) */
        /* window.addEventListener('delete-modal', event => {
            deleteModal.toggle();
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
