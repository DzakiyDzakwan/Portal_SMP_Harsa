@extends('admin.master.main')

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
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Siswa
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
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Tunggakan">
                                <i class="bi bi-people-fill"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Total Siswa</h6>
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
                        <div class="stats-icon green mb-2">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Siswa Aktif">
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
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start"
                    >
                        <div class="stats-icon red mb-2">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Siswa Inaktif">
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
        <h5>List Siswa</h5>
        <div class="form-group">
            {{-- Button Tambah User --}}
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                data-bs-target="#inlineForm">
                <i class="bi bi-plus-circle"></i> Tambah Siswa 
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="table1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mata Pelajaran</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Graiden</td>
                    <td>vehicula.aliquet@semconsequat.co.uk</td>
                    <td>076 4820 8838</td>
                    <td>Offenburg</td>
                    <td>
                        <span class="badge bg-success">Active</span>
                    </td>
                    <td>
                        {{-- Preview Button --}}
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#info">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        {{-- Update Button --}}
                        <div class="modal-warning me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update">
                                <i class="bi bi-pencil"></i></a>
                            </button>
                        </div>
                        {{-- Delete Button --}}
                        <div class="modal-danger me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete">
                                <i class="bi bi-trash"></i></a>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Dale</td>
                    <td>fringilla.euismod.enim@quam.ca</td>
                    <td>0500 527693</td>
                    <td>New Quay</td>
                    <td>
                        <span class="badge bg-success">Active</span>
                    </td>
                    <td>
                        {{-- Preview Button --}}
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#info">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        {{-- Update Button --}}
                        <div class="modal-warning me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update">
                                <i class="bi bi-pencil"></i></a>
                            </button>
                        </div>
                        {{-- Delete Button --}}
                        <div class="modal-danger me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete">
                                <i class="bi bi-trash"></i></a>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!--Modal Tambah Siswa -->
<div
    class="modal fade text-left"
    id="inlineForm"
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
            <div class="modal-header bg-success">
                <h4 class="modal-title white" id="myModalLabel33">Tambah Siswa</h4>
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
                        <label>Nama: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama"/>
                        </div>
                        <label>Kelas: </label>
                        <div class="form-group">
                            <select class="choices form-select">
                                <option value="7A">7-A</option>
                                <option value="7B">7-B</option>
                                <option value="8A">8-A</option>
                                <option value="8B">8-B</option>
                                <option value="9A">9-A</option>
                                <option value="9B">9-C</option>
                            </select>
                        </div>
                        <label>E-mail: </label>
                        <small class="text-muted">eg.<i>someone@example.com</i></small>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="E-mail"/>
                        </div>
                        <label>Jenis Kelamin: </label>
                        <div class="form-group">
                            <select class="choices form-select">
                                <option value="lk">Laki-laki</option>
                                <option value="pr">Perempuan</option>
                            </select>
                        </div>
                        <label>Phone: </label>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="+62"/>
                        </div>
                        <label>Alamat: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Alamat"/>
                        </div>
                        <label>Agama: </label>
                        <div class="form-group">
                            <select class="choices form-select">
                                <option value="is">Islam</option>
                                <option value="krs">Kristen</option>
                            </select>
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
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel130">
                    Profil Siswa
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
                {{-- Navigation --}}
                <ul class="nav nav-tabs justify-content-center align-items-center my-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#prestasi" role="tab"
                            aria-controls="prestasi" aria-selected="false">Prestasi</a>
                    </li>
                </ul>

                {{-- Image --}}
                <img src="assets/images/test.jpg" class="mx-auto d-block w-50 my-3" alt="...">

                {{-- Navigasi Content --}}
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="p-1">Nama</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">Dzakiy Dzakwan</td>
                                </tr>
                                <tr>
                                    <td class="p-1">NIS</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">211402017</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Jenis Kelamin</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">Laki-Laki</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Tanggal Lahir</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">01/12/2003</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Tempat Lahir</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">Medan</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="prestasi" role="tabpanel" aria-labelledby="data-prestasis">
                       <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Juara 1 Mewarnai Tingkat Desa</td>
                                <td>Seni</td>
                                <td>30 Februari 2021</td>
                                <td>5</td>
                            </tr>
                        </tbody>
                       </table>
                    </div>
                </div>
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
                    Hapus Mata Pelajaran
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
