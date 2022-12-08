@extends('admin.master.main')

@section('title')
    <title>Guru</title>
@endsection

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
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start"
                    >
                        <div class="stats-icon purple mb-2">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Guru">
                                <i class="bi bi-people-fill"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Total Guru</h6>
                        <h6 class="font-extrabold mb-0">{{$totalGuru}}</h6>
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
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Guru Aktif">
                                <i class="bi bi-people-fill"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Active</h6>
                        <h6 class="font-extrabold mb-0">{{$guruActive}}</h6>
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
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Guru Inaktif">
                                <i class="bi bi-people-fill"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Inactive</h6>
                        <h6 class="font-extrabold mb-0">{{$guruInactive}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex gap-2 align-items-center justify-content-between">
        <h5>List Guru</h5>
        <div class="form-group">
            {{-- Button Tambah Guru --}}
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                data-bs-target="#inlineForm">
                <i class="bi bi-plus-circle"></i> Tambah Guru 
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gurus as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nama}}</td>
                    @if ($item->jabatan == 'wks')
                        <td>Wakil Kepala sekolah</td>
                    @elseif($item->jabatan == 'bk')
                        <td>Bimbingan Konseling</td>
                    @else
                        <td>Guru</td>
                    @endif
                    @if ($item->status == 'Aktif')
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td> 
                    @else
                        <td>
                            <span class="badge bg-danger">Inactive</span> 
                        </td>
                    @endif
                    <td>
                        {{-- Preview Button --}}
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#info{{$item->user}}">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        {{-- Update Button --}}
                        <div class="modal-success me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update{{$item->user}}">
                                <i class="bi bi-pencil"></i></a>
                            </button>
                        </div>
                        {{-- Delete Button --}}
                        <div class="modal-danger me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{$item->user}}">
                                <i class="bi  bi-person-x-fill"></i></a>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
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
            <div class="modal-header bg-success justify-content-center">
                <h4 class="modal-title white " id="myModalLabel33">Tambah Guru</h4>
            </div>
            <form class="form form-vertical" action="guru/addGuru" method="POST">
                @csrf
                <div class="form-body modal-body">
                    <div class="row">
                        {{-- Nama Lengkap --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="fullname">Nama Lengkap</label>
                                <div class="position-relative">
                                    <input
                                        name="fullname"
                                        type="text"
                                        class="form-control"
                                        placeholder="Masukkan nama lengkap"
                                        id="fullname"
                                    />
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

                        {{-- Jenis Kelamin --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="fullname">Jenis Kelamin</label>
                                <div class="position-relative">
                                        <select name="jenis_kelamin" class="form-select form-control" id="basicSelect">
                                            <option value="LK">Laki-Laki</option>
                                            <option value="PR">Perempuan</option>
                                        </select>
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

                        {{-- NIP --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="nip">NIP</label>
                                <div class="position-relative">
                                    <input
                                        name="nip"
                                        type="text"
                                        class="form-control"
                                        placeholder="Masukkan NIP guru"
                                        id="nip"
                                    />
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

                        {{-- Jabatan --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="jabatan">Jabatan</label>
                                <div class="position-relative">
                                    <select name="jabatan" class="form-select form-control" id="basicSelect">
                                        <option value="wks">Wakil Kepala Sekolah</option>
                                        <option value="bk">Bimbingan Konseling</option>
                                        <option value="guru">Guru</option>
                                    </select>
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

                        {{-- Tanggal Masuk --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                <div class="position-relative">
                                    <input
                                        name="tanggal_masuk"
                                        type="date"
                                        class="form-control"
                                        placeholder="tanggal_masuk"
                                        id="tanggal_masuk"
                                    />
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar"></i>
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

@foreach ($gurus as $item)
    {{-- Modal Preview--}}
    <div
        class="modal fade text-left"
        id="info{{$item->user}}"
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
                    <h5 class="modal-title" id="myModalLabel130">Profil Guru</h5>
                </div>
                <div class="modal-body">
                    {{-- Image --}}
                    <img
                        src="assets/images/test.jpg"
                        class="mx-auto d-block w-50 my-3"
                        alt="..."
                    />
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <td class="p-1">Nama</td>
                                <td class="p-1">:</td>
                                <td class="p-1">{{$item->nama}}</td>
                            </tr>
                            <tr>
                                <td class="p-1">NIP</td>
                                <td class="p-1">:</td>
                                <td class="p-1">{{$item->NIP}}</td>
                            </tr>
                            <tr>
                                <td class="p-1">Jenis Kelamin</td>
                                <td class="p-1">:</td>
                                @if ($item->jenis_kelamin == 'LK')
                                    <td class="p-1">Pria</td>
                                @else
                                    <td class="p-1">Wanita</td>
                                @endif
                            </tr>
                            <tr>
                                <td class="p-1">Tanggal Lahir</td>
                                <td class="p-1">:</td>
                                <td class="p-1">{{$item->tanggal_lahir}}</td>
                            </tr>
                            <tr>
                                <td class="p-1">Tempat Lahir</td>
                                <td class="p-1">:</td>
                                <td class="p-1">{{$item->tempat_lahir}}</td>
                            </tr>
                        </tbody>
                    </table>
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
        id="update{{$item->user}}"
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
                        Ubah Data guru
                    </h5>
                </div>
                <div class="modal-body">
                    <form class="form form-vertical" action="guru/updateGuru/{{$item->NIP}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-body modal-body">
                            <div class="row">
                                {{-- NIP --}}
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="nip">NIP</label>
                                        <div class="position-relative">
                                            <input
                                                value="{{$item->NIP}}"
                                                name="nip"
                                                type="text"
                                                class="form-control"
                                                placeholder="Masukkan NIP guru"
                                                id="nip"
                                            />
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

                                {{-- Jabatan --}}
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="jabatan">Jabatan</label>
                                        <div class="position-relative">
                                            <select name="jabatan" class="form-select form-control" id="basicSelect">
                                                <option value="wks">Wakil Kepala Sekolah</option>
                                                <option value="bk">Bimbingan Konseling</option>
                                                <option value="guru">Guru</option>
                                            </select>
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
    </div>

    {{-- Modal Inactive --}}
    <div
        class="modal fade text-left"
        id="delete{{$item->user}}"
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
                        Non Aktifkan Guru
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
                <div class="modal-body">Apakah yakin ingin menonaktifkan {{$item->nama}}?</div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-light-secondary"
                        data-bs-dismiss="modal"
                    >
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <form action="guru/inactiveGuru/{{$item->user}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button
                            class="btn btn-danger ml-1"
                            data-bs-dismiss="modal"
                        >
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Yes</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endforeach

@endsection

@section('script')
    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
@endsection