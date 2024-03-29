@extends('master.main')

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Guru</h3>
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
                    Guru
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
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Guru">
                                <i class="bi bi-people-fill"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Total Guru</h6>
                        <h6 class="font-extrabold mb-0">26</h6>
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
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Guru Aktif">
                                <i class="bi bi-people-fill"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Active</h6>
                        <h6 class="font-extrabold mb-0">24</h6>
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
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Guru Inaktif">
                                <i class="bi bi-people-fill"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Inactive</h6>
                        <h6 class="font-extrabold mb-0">2</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="form-group">
            {{-- Button Tambah User --}}
            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#inlineForm">
                <i class="bi bi-plus-circle"></i> Tambah Guru 
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
                        <div class="modal-primary me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#info">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        {{-- Update Button --}}
                        <div class="modal-success me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                data-bs-target="#primary">
                                <i class="bi bi-pencil"></i></a>
                            </button>
                        </div>
                        {{-- Delete Button --}}
                        <div class="modal-danger me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#danger">
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
                        <div class="modal-primary me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#info">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        {{-- Update Button --}}
                        <div class="modal-success me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                data-bs-target="#primary">
                                <i class="bi bi-pencil"></i></a>
                            </button>
                        </div>
                        {{-- Delete Button --}}
                        <div class="modal-danger me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#danger">
                                <i class="bi bi-trash"></i></a>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!--Modal Tambah Guru -->
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
                <h5 class="modal-title white" id="myModalLabel130">
                    Tambah Guru
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
                        <label>Nama: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama"/>
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
                        <label>Mata Pelajaran: </label>
                        <div class="form-group">
                            <select class="choices form-select">
                                <option value="ag">Agama</option>
                                <option value="bi">Bahasa Indonesia</option>
                                <option value="bing">Bahasa Inggris</option>
                                <option value="mtk">Matematika</option>
                                <option value="pjs">Pendidikan Jasmani</option>
                                <option value="pkn">Pendidikan Kewarganegaraan</option>
                                <option value="ipa">Ilmu Pengetahuan Alam</option>
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

{{-- Modal Preview Guru --}}
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
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel130">
                    Detail Guru
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
                            <input type="text" class="form-control" readonly />
                        </div>
                        <label>Kelas: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly />
                        </div>
                        <label>Guru: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly />
                        </div>
                        <label>Hari: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly />
                        </div>
                        <label>Jam Masuk: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly />
                        </div>
                        <label>Jam Keluar: </label>
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
    id="primary"
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
    id="danger"
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
