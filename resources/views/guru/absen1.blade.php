@extends('guru.master.main')

@section('title')
    <title>Siswa</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Siswa</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav
            aria-label="breadcrumb"
            class="breadcrumb-header float-start float-lg-end"
        >
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/dashboard-guru">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Absen
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
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start"
                    >
                        <div class="stats-icon purple mb-2">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Mata Pelajaran">
                                <i class="bi bi-book-fill"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Mata Pelajaran</h6>
                        <h6 class="font-extrabold mb-0">Belajar Ikhlas</h6>
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
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start"
                    >
                        <div class="stats-icon green mb-2">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Siswa">
                                <i class="bi bi-people-fill"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Jumlah Siswa</h6>
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
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start"
                    >
                        <div class="stats-icon red mb-2">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Siswa Inaktif">
                                <i class="bi bi-hexagon-fill"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Jumlah Kelas</h6>
                        <h6 class="font-extrabold mb-0">2</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <section class="row">
        <div class="col-12 col-lg-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <p>Pilih Bulan.</p>
                    <fieldset class="form-group">
                        <select class="form-select" id="basicSelect">
                            <option>November</option>
                            <option>Oktober</option>
                            <option>September</option>
                            <option>Agustus</option>
                            <option>Juli</option>
                        </select>
                    </fieldset>
                </div>
            </div>
        </div>
</div>
<div class="card">
    <div class="card-header d-flex gap-2 align-items-center justify-content-between">
        <h5>Absensi Siswa</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="table1">
            <thead>
                <tr>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Kelas</th>
                    <th colspan="3">Keterangan</th>
                    <th rowspan="2">Action</th>
                </tr>
                <tr>
                    <th>Absen</th>
                    <th>Izin</th>
                    <th>Sakit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Graiden</td>
                    <td>7A</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>
                        {{-- Preview Button --}}
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#info">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        {{-- Add Button --}}
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                data-bs-target="#add">
                                <i class="bi bi-plus-circle"></i>
                            </button>
                        </div>
                        {{-- Update Button --}}
                        <div class="modal-warning me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update">
                                <i class="bi bi-pencil"></i></a>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Dale</td>
                    <td>7A</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>
                        {{-- Preview Button --}}
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#info">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        {{-- Add Button --}}
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                data-bs-target="#add">
                                <i class="bi bi-plus-circle"></i>
                            </button>
                        </div>
                        {{-- Update Button --}}
                        <div class="modal-warning me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update">
                                <i class="bi bi-pencil"></i></a>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group  px-3 pt-2 modal-footer">
        <a href="/rekap-absen" class="btn icon icon-left btn-primary px-3">Rekapitulasi<i data-feather="arrow-right"></i></a>
    </div>
</div>


{{-- Modal Preview --}}
<div
    class="modal fade text-left"
    id="info"
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
            <div class="modal-header bg-info">
                <h5 class="modal-title white" id="myModalLabel130">
                    Detail Absensi Semester Ganjil
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
                        <form action="#">
                            <div class="modal-body">
                                <label>Total Absen: </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly />
                                </div>
                                <label>Total Izin: </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly />
                                </div>
                                <label>Total Sakit: </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly />
                                </div>
                            </div>
                        </form>
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
            </div>
        </div>
    </div>
</div>


{{-- Modal Add --}}
<div
    class="modal fade text-left"
    id="add"
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
            <div class="modal-header bg-info">
                <h5 class="modal-title white" id="myModalLabel130">
                    Tambah Keterangan
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
                        <label>Absen: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly />
                        </div>
                        <label>Izin: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly />
                        </div>
                        <label>Sakit: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly />
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
            </div>
        </div>
    </div>
</div>

{{-- Modal Update --}}
<div
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
                    Ubah Data Keterangan
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
                        <label>Absen: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" />
                        </div>
                        <label>Izin: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" />
                        </div>
                        <label>Sakit: </label>
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
</div>

{{-- Modal Delete --}}
<div
    class="modal fade text-left"
    id="delete"
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
            <div class="modal-header bg-danger">
                <h5 class="modal-title white" id="myModalLabel130">
                    Hapus Data Siswa
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
            <div class="modal-body">Apakah yakin menghapus data ini?</div>
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
                    class="btn btn-danger ml-1"
                    data-bs-dismiss="modal"
                >
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Hapus</span>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
@endsection
