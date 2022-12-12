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
                    7A
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
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Siswa">
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
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="table1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th>Prestasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->grade }}-{{ $siswa->kelompok_kelas }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>
                        <span class="badge bg-success">Active</span>
                    </td>
                    <td>
                        {{-- Add Button --}}
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                data-bs-target="#add{{ $siswa->NISN }}">
                                <i class="bi bi-plus-circle"></i>
                            </button>
                        </div>
                        {{-- Preview Button --}}
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#info{{ $siswa->NISN }}">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


{{-- Modal Add --}}
@foreach ($siswas as $siswa )
<div
    class="modal fade text-left"
    id="add{{ $siswa->NISN }}"
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
                    Input Prestasi
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
                <form action="/list-kelas/addPrestasi/{{ $siswa->NISN }}" class="form form-vertical" method="post">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="jenis">Jenis Prestasi</label>
                                    <div class="position-relative">
                                        <select class="choices form-control" id="jenis" name="jenis">
                                            <option value="Akademik">Akademik</option>
                                            <option value="NonAkademik">Non Akademik</option>
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-award"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="keterangan">Keterangan</label>
                                    <div class="position-relative">
                                        <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror "
                                            placeholder="keterangan" id="keterangan" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-filter-square"></i>
                                        </div>
                                        @error('keterangan')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="tanggal">Tanggal Prestasi</label>
                                    <div class="position-relative">
                                        <input name="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror "
                                            placeholder="tanggal" id="tanggal" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar"></i>
                                        </div>
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-light-secondary me-1 mb-1" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-success me-1 mb-1" >
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

{{-- Modal Preview --}}
<div
    class="modal fade text-left"
    id="info{{ $siswa->NISN }}"
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
                    Detail Prestasi
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
                <form class="form form-vertical">
                    <div class="form-body modal-body">
                        <div class="row">
                          <div class="text-center">
                            <img src="..." class="rounded" alt="...">
                          </div>
                          <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="nama">Nama</label>
                                <div class="position-relative">
                                    <input name="nama" type="text" class="form-control"
                                        placeholder="nama" id="nama" value="{{ $siswa->nama }}"/>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-heart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="kelas">Kelas</label>
                                    <div class="position-relative">
                                        <input name="kelas" type="text" class="form-control"
                                            placeholder="kelas" id="kelas" value="{{ $siswa->grade }}-{{ $siswa->kelompok_kelas }}" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-123"></i>
                                        </div>
                                    </div>
                                </div>
                        @foreach ($prestasis as $pres )
                          <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Prestasi {{ $loop->iteration }}</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $pres->keterangan }}
                                </p>
                                <p>
                                    {{-- Update Button --}}
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="collapse" data-bs-target="#update{{ $pres->prestasi_id }}" aria-expanded="false" aria-controls="update">
                                        <i class="bi bi-pencil"></i></a>
                                    </button>
                                    {{-- Delete Button --}}
                                    <div class="modal-danger me-1 mb-1 d-inline-block">
                                        <button type="button" class="btn btn-sm btn-danger" dt-bs-toggle="modal" data-bs-target="#delete{{ $pres->prestasi_id }}">
                                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                <i class="bi bi-trash-fill"></i></i>
                                            </div>
                                        </button>
                                    </div>

                                    {{-- Modal Delete --}}
                                    <div class="modal fade text-left" id="delete{{ $pres->prestasi_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <form action="/list-kelas/deletePrestasi/{{ $pres->prestas_id }}" method="post">
                                                @csrf
                                                @method('DELETE')
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
                                                    <button class="btn btn-danger ml-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Hapus</span>
                                                    </button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>

                                    {{-- Update Modal --}}
                                    <div class="collapse" id="update{{ $pres->prestasi_id }}">
                                        <form action="/list-kelas/updatePrestasi/{{ $pres->prestasi_id }}" class="form form-vertical" method="post">
                                            @csrf
                                            <div class="form-body modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="jenis">Jenis Prestasi</label>
                                                            <div class="position-relative">
                                                                <select class="choices form-control" id="jenis" name="jenis">
                                                                    <option value="Akademik" @if($pres->jenis_prestasi == "Akademik") selected @endif>Akademik</option>
                                                                    <option value="NonAkademik" @if($pres->jenis_prestasi == "NonAkademik") selected @endif>Non Akademik</option>
                                                                </select>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-award"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="keterangan">Keterangan</label>
                                                            <div class="position-relative">
                                                                <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror "
                                                                    placeholder="keterangan" id="keterangan" value="{{ $pres->keterangan }}"/>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-filter-square"></i>
                                                                </div>
                                                                @error('keterangan')
                                                                    <div class="invalid-feedback">
                                                                        <i class="bx bx-radio-circle"></i>
                                                                        {{$message}}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="tanggal">Tanggal Prestasi</label>
                                                            <div class="position-relative">
                                                                <input name="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror "
                                                                    placeholder="tanggal" id="tanggal"  value="{{ $pres->tanggal_prestasi }}"/>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-calendar"></i>
                                                                </div>
                                                                @error('keterangan')
                                                                    <div class="invalid-feedback">
                                                                        <i class="bx bx-radio-circle"></i>
                                                                        {{$message}}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-success me-1 mb-1" >
                                                            Simpan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


{{-- Modal Update
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
                    Ubah Data Siswa
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
                        <label>Foto Diri: </label>
                        <div class="form-group">
                            <input type="file" class="form-control" />
                        </div>
                        <label>Nama: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" />
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
                >
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div> --}}

@endsection

@section('script')
    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
@endsection
