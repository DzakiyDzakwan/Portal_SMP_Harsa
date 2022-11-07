@extends('master.main')

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Mata Pelajaran</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav
            aria-label="breadcrumb"
            class="breadcrumb-header float-start float-lg-end"
        >
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Mata Pelajaran
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
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                    >
                        <div class="stats-icon purple mb-2">
                            <div
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Total Mata Pelajaran"
                            >
                                <i class="bi bi-book-half"></i>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Mata Pelajaran</h6>
                        <h6 class="font-extrabold mb-0">13</h6>
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
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                    >
                        <div class="stats-icon green mb-2">
                            <div
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Total Kelas"
                            >
                                <i class="bi bi-person-workspace"></i>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Kelas</h6>
                        <h6 class="font-extrabold mb-0">12</h6>
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
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                    >
                        <div class="stats-icon red mb-2">
                            <div
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Total Guru"
                            >
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Guru</h6>
                        <h6 class="font-extrabold mb-0">21</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="form-group">
            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#inlineForm">
                <i class="bi bi-plus-circle"></i> Tambah Mata Pelajaran 
            </button>

            <!--login form Modal -->
            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title white" id="myModalLabel33">Tambah Mata Pelajaran</h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="#">
                            <div class="modal-body">
                                <label>Mata Pelajaran: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Mata Pelajaran"
                                        class="form-control">
                                </div>
                                <label>Kelas: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Kelas"
                                        class="form-control">
                                </div>
                                <label>Guru: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Guru"
                                        class="form-control">
                                </div>
                                <label>Hari: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Hari"
                                        class="form-control">
                                </div>
                                <label>Jam Masuk: </label>
                                <div class="form-group">
                                    <input type="text" placeholder="Jam Masuk"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tutup</span>
                                </button>
                                <button type="button" class="btn btn-success ml-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Guru</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Seni Budaya</td>
                        <td>VII-A</td>
                        <td>Suharyanto</td>
                        <td>
                            {{-- Preview Button --}}
                            <div class="modal-primary me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#primary">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel130" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title white" id="myModalLabel130">Detail Mata Pelajaran</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <label>Mata Pelajaran: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control" readonly>
                                                        </div>
                                                        <label>Kelas: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control" readonly>
                                                        </div>
                                                        <label>Guru: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control" readonly>
                                                        </div>
                                                        <label>Hari: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control" readonly>
                                                        </div>
                                                        <label>Jam Masuk: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control" readonly>
                                                        </div>
                                                        <label>Jam Keluar: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Update Button --}}
                            <div class="modal-success me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#success">
                                    <i class="bi bi-pencil"></i></a>
                                </button>

                                <div class="modal fade text-left" id="success" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel130" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success">
                                                <h5 class="modal-title white" id="myModalLabel130">Ubah Mata Pelajaran</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <label>Mata Pelajaran: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control">
                                                        </div>
                                                        <label>Kelas: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control">
                                                        </div>
                                                        <label>Guru: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control">
                                                        </div>
                                                        <label>Hari: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control">
                                                        </div>
                                                        <label>Jam Masuk: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control">
                                                        </div>
                                                        <label>Jam Keluar: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="button" class="btn btn-success ml-1"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Simpan</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Delete Button --}}
                            <div class="modal-danger me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#danger">
                                    <i class="bi bi-trash"></i></a>
                                </button>

                                <div class="modal fade text-left" id="danger" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel130" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title white" id="myModalLabel130">Hapus Mata Pelajaran</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah yakin menghapus data ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="button" class="btn btn-danger ml-1"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Hapus</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Seni Budaya</td>
                        <td>VII-A</td>
                        <td>Suharyanto</td>
                        <td>
                            {{-- Preview Button --}}
                            <div class="modal-primary me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#primary">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel130" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title white" id="myModalLabel130">Detail Mata Pelajaran</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <label>Mata Pelajaran: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control" readonly>
                                                        </div>
                                                        <label>Kelas: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control" readonly>
                                                        </div>
                                                        <label>Guru: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control" readonly>
                                                        </div>
                                                        <label>Hari: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control" readonly>
                                                        </div>
                                                        <label>Jam Masuk: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control" readonly>
                                                        </div>
                                                        <label>Jam Keluar: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Update Button --}}
                            <div class="modal-success me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#success">
                                    <i class="bi bi-pencil"></i></a>
                                </button>

                                <div class="modal fade text-left" id="success" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel130" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success">
                                                <h5 class="modal-title white" id="myModalLabel130">Ubah Mata Pelajaran</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <label>Mata Pelajaran: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control">
                                                        </div>
                                                        <label>Kelas: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control">
                                                        </div>
                                                        <label>Guru: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control">
                                                        </div>
                                                        <label>Hari: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control">
                                                        </div>
                                                        <label>Jam Masuk: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control">
                                                        </div>
                                                        <label>Jam Keluar: </label>
                                                        <div class="form-group">
                                                            <input type="text"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="button" class="btn btn-success ml-1"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Simpan</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Delete Button --}}
                            <div class="modal-danger me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#danger">
                                    <i class="bi bi-trash"></i></a>
                                </button>

                                <div class="modal fade text-left" id="danger" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel130" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title white" id="myModalLabel130">Hapus Mata Pelajaran</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah yakin menghapus data ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="button" class="btn btn-danger ml-1"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Hapus</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
</div>

@endsection

@section('script')
    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
@endsection
