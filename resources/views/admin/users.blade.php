@extends('admin.master.main')

@section('title')
    <title>Users</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
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
    <div class="row">
        <div class="col-12 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                            <div class="stats-icon purple mb-2">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total User">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                            <h6 class="text-muted font-semibold">Total User</h6>
                            <h6 class="font-extrabold mb-0">2</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                            <div class="stats-icon green mb-2">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="User Aktif">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                            <h6 class="text-muted font-semibold">Active</h6>
                            <h6 class="font-extrabold mb-0">2</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                            <div class="stats-icon red mb-2">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="User Inaktif">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                            <h6 class="text-muted font-semibold">Inactive</h6>
                            <h6 class="font-extrabold mb-0">2</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex gap-2 align-items-center justify-content-between">
            <h5>List User</h5>
            <div class="form-group">
                {{-- Button Tambah User --}}
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#inlineForm">
                    <i class="bi bi-plus-circle"></i> Create Admin
                </button>

            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Uuid</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->uuid }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                {{-- @if ($item->role == 'admin')
                            <!-- Update Button -->
                            <div class="modal-warning me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal{{$loop->iteration}}"
                                    data-bs-target="#update">
                                    <i class="bi bi-pencil"></i></a>
                                </button>
                            </div>
                        @endif --}}
                                {{-- Delete Button --}}
                                <div class="modal-danger me-1 mb-1 d-inline-block">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $loop->iteration }}">
                                        <i class="bi bi-trash"></i></a>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--Modal Tambah User -->
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Tambah Admin</h4>
                    {{-- <button
                    type="button"
                    class="close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                >
                    <i data-feather="x"></i>
                </button> --}}
                </div>
                <form class="form form-vertical" action="users/addAdmin" method="POST">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Username</label>
                                    <div class="position-relative">
                                        <input name="username" type="text" class="form-control"
                                            placeholder="Input with icon left" id="first-name-icon" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            This is invalid state.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password-id-icon">Password</label>
                                    <div class="position-relative">
                                        <input name="password" type="password" class="form-control"
                                            placeholder="Password" id="password-id-icon" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            This is invalid state.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-light-secondary me-1 mb-1" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-success me-1 mb-1">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($users as $item)
        {{-- Modal Update --}}
        {{-- <div
        class="modal fade text-left"
        id="update"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel130"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title white" id="myModalLabel130">
                        Ubah Mata Pelajaran
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="modal-body">
                            <label>Mata Pelajaran: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" />
                            </div>
                            <label>Kelas: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" />
                            </div>
                            <label>Guru: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" />
                            </div>
                            <label>Hari: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" />
                            </div>
                            <label>Jam Masuk: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" />
                            </div>
                            <label>Jam Keluar: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-light-secondary"
                        data-bs-dismiss="modal"
                    >
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button
                        type="button"
                        class="btn btn-success ml-1"
                        data-bs-dismiss="modal"
                    >
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

        {{-- Modal Delete --}}
        <div class="modal fade text-left" id="delete{{ $loop->iteration }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel130" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title white" id="myModalLabel130">
                            Hapus {{ $item->uuid }}
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">Apakah yakin menghapus data ini?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <form action="users/deleteAdmin/{{ $item->uuid }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Hapus</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('script')
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
