@extends('admin.master.main')

@section('title')
    <title>Ekstrakulikuler</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Ekstrakulikuler</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav
            aria-label="breadcrumb"
            class="breadcrumb-header float-start float-lg-end"
        >
            <ol class="breadcrumb">

                    <a href="/">Dashboard </a>
                </li>
                
                <li class="breadcrumb-item active" aria-current="page">
                    
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    Ekskul
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
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Kelas">
                                <i class="bi bi-dribbble"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Total Ekstrakulikuler</h6>
                        <h6 class="font-extrabold mb-0">{{$totalEkskul}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex gap-2 align-items-center justify-content-between">
        <h5>List Ekstrakulikuler</h5>
        <div class="form-group">
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                data-bs-target="#inlineForm">
                <i class="bi bi-plus-circle"></i> Tambah Ekskul
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ekstrakulikuler</th>
                        <th>Jadwal</th>
                        <th>Penanggung jawab</th>
                        <th>Jumlah siswa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Basket</td>
                        <td>Senin,17.00 Wib</td>
                        <td>Deni Sumargo</td>
                        <td>5</td>
                        <td>
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
                        <td>2</td>
                        <td>Futsal</td>
                        <td>Selasa,17.00 Wib</td>
                        <td>Deni Putra Sitanggang</td>
                        <td>50</td>
                        <td>
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

<!--Modal tambah ekskul -->
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
            <div class="modal-header bg-success justify-content-center">
                <h4 class="modal-title white " id="myModalLabel33">Tambah Ekstrakulikuler</h4>
            </div>
            <form class="form form-vertical" action="users/addEkskul" method="POST">
                @csrf
                <div class="form-body modal-body">
                    <div class="row">
                        {{-- Nama Ekstrakulikuler --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="fullname">Nama Ekstrakulikuler</label>
                                <div class="position-relative">
                                    <input
                                        name="fullname"
                                        type="text"
                                        class="form-control"
                                        placeholder="Masukkan Nama Ekstrakulikuler"
                                        id="fullname"
                                    />
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-heart"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        {{-- Jadwal Ekskul --}}
                        <label for="jadwal">Jadwal Ekstrakulikuler</label>
                        <div class="col-4">
                            <div class="form-group has-icon-left">
                                <label for="hari">Hari</label>
                                <div class="position-relative">
                                        <select name="hari" class="form-select form-control" id="basicSelect">
                                            <option value="senin">Senin</option>
                                            <option value="selasa">Selasa</option>
                                            <option value="rabu">Rabu</option>
                                            <option value="kamis">Kamis</option>
                                            <option value="jumat">Jumat</option>
                                            <option value="sabtu">Sabtu</option>
                                        </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar2-day"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group has-icon-left">
                            <label for="start">Waktu Mulai</label>
                            <div class="position-relative">
                                <input
                                name="start"
                                type="time"
                                class="form-control"
                                placeholder="MasukkaJam yang Sesuai"
                                id="start"
                                />
                                <div class="form-control-icon">
                                    <i class="bi bi-hourglass-top"></i>
                                </div>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    This is invalid state.
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group has-icon-left">
                            <label for="end">Waktu Akhir</label>
                            <div class="position-relative">
                                <input
                                name="end"
                                type="time"
                                class="form-control"
                                placeholder="MasukkaJam yang Sesuai"
                                id="end"
                                />
                                <div class="form-control-icon">
                                    <i class="bi bi-hourglass-bottom"></i>
                                </div>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    This is invalid state.
                                </div>
                            </div>
                            </div>
                        </div>

                        {{-- Penanggung Jawab --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="tempat">Tempat</label>
                                <div class="position-relative">
                                    <input
                                        name="tempat"
                                        type="text"
                                        class="form-control"
                                        placeholder="Masukkan Lokasi Ekskul"
                                        id="tempat"
                                    />
                                    <div class="form-control-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        {{-- Kelas --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="kelas">Kelas</label>
                                <div class="position-relative">
                                    <select name="kelas" class="form-select form-control" id="basicSelect">
                                        <option value="7">7 - Tujuh</option>
                                        <option value="8">8 - Delapan</option>
                                        <option value="9">9 - Sembilan</option>
                                    </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-person-bounding-box"></i>
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

{{-- Modal Edit --}}
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
                    Ubah Ekskul
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
                        <label>Nama Ekskul: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly />
                        </div>
                        <label>Jadwal Ekskul: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly />
                        </div>
                        <label>Penanggung Jawab: </label>
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
                    Hapus Ekskul
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
