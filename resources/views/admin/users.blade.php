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
            <div class="d-flex align-items-center justify-content-between gap-2" >
                <div class="form-group">
                    {{-- Button Tambah User --}}
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#inlineForm">
                        <i class="bi bi-plus-circle"></i> Create Admin
                    </button>
                </div>
                <div class="form-group">
                    {{-- Button Inactive Admin --}}
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#trashedUser">
                        <i class="bi bi-person-x-fill"></i> Inactive Admin
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- TABLE --}}
            @livewire('list-user')
        </div>
    </div>

    <!--Modal Tambah Admin -->
    @livewire('create-modal-user')

    <!--Modal Inactive Admin -->
    <div class="modal fade text-left" id="trashedUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document" style="max-width: 50%">
            <div class="modal-content">
                <div class="modal-header bg-danger justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Inactive Admin</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered text-center" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Deleted_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>admin</td>
                                <td>2003-12-12</td>
                                <td>
                                    <div class="modal-danger me-1 mb-1 d-inline-block">
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                            data-bs-target="#restore">
                                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Restore">
                                                    <i class="bi bi-arrow-repeat"></i></i>
                                                </div>
                                        </button>
                                    </div>
                                    <div class="modal-danger me-1 mb-1 d-inline-block">
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete">
                                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                    <i class="bi bi-trash-fill"></i></i>
                                                </div>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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

    {{-- Modal Restore --}}
    <div class="modal fade text-left" id="restore" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="myModalLabel130">
                        Restore
                    </h5>
                </div>
                <div class="modal-body">Apakah anda yakin ingin mengembalikan akun?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button class="btn btn-success ml-1" data-bs-dismiss="modal" wire:click="">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Restore</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Delete permanen --}}

    <div class="modal fade text-left" id="delete" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel130">
                        Hapus
                    </h5>
                </div>
                <div class="modal-body">Apakah anda yakin ingin menghapus permanen?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal" wire:click="">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Hapus</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @livewireScripts
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
