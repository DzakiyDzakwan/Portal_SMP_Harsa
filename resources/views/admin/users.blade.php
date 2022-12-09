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
                    <div>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#trashedUser">
                            <i class="bi bi-person-x-fill"></i> Inactive Admin
                        </button>
                        <div class="modal fade text-left" id="trashedUser" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel130" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document"
                                style="max-width: 50%">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger justify-content-center">
                                        <h4 class="modal-title white " id="myModalLabel33">Inactive Admin</h4>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade text-left" id="trashedUser" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document"
                            style="max-width: 50%">
                            <div class="modal-content">
                                <div class="modal-header bg-danger justify-content-center">
                                    <h4 class="modal-title white " id="myModalLabel33">Inactive Admin</h4>
                                </div>
                                <div class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- TABLE --}}
            @livewire('list-user')
        </div>
    </div>

    <!--Modal Inactive Admin -->
    <div class="modal fade text-left" id="trashedUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document" style="max-width: 50%">
            <div class="modal-content">
                <div class="modal-header bg-danger justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Inactive Admin</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
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
        window.addEventListener('close-create-modal', event => {
            createModal.show();
        });
        window.addEventListener('show-update-modal', event => {
            updateModal.show();
        })
    </script>
    @livewireScripts
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
