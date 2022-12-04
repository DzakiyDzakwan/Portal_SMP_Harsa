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
                        <h6 class="font-extrabold mb-0">{{$totalSiswa}}</h6>
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
                        <h6 class="font-extrabold mb-0">{{$siswaActive}}</h6>
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
                        <h6 class="font-extrabold mb-0">{{$siswaInactive}}</h6>
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
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Tanggal Masuk</th>
                    <th>Status Keaktifan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($siswas as $siswa) 
                    <td>{{$loop->iteration}}</td>
                    <td>{{$siswa->NISN}}</td>
                    <td>{{$siswa->nama}}</td>
                    <td>{{$siswa->tanggal_masuk}}</td>
                    <td>
                        @if ($siswa->status_keaktifan == 'Aktif')
                            <span class="badge bg-success">{{$siswa->status_keaktifan}}</span>   
                        @else
                            <span class="badge bg-danger">{{$siswa->status_keaktifan}}</span>   
                        @endif
                    </td>
                    <td>
                        {{-- Preview Button --}}
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#info{{$siswa->user}}">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        {{-- Update Button --}}
                        <div class="modal-warning me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#update{{$siswa->user}}">
                                <i class="bi bi-pencil"></i></a>
                            </button>
                        </div>
                        {{-- Delete Button --}}
                        <div class="modal-danger me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{$loop->iteration}}">
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
                <form action="{{ route('add-siswa') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label>Nama: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama" name="nama"/>
                        </div>
                        <label>NISN: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="NISN" name="nisn"/>
                        </div>
                        <label>NIS: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="NIS" name="NIS"/>
                        </div>
                        <label>Tanggal Masuk: </label>
                        <div class="form-group">
                            <input type="date" class="form-control" placeholder="Tanggal Masuk" name="tanggal_masuk"/>
                        </div>
                        <label>Ruang Kelas: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ruang Kelas" name="kelas_id"/>
                        </div>
                        <label>Jenis Kelamin: </label>
                        <div class="form-group">
                            <select name="jenis_kelamin" class="form-select form-control" id="basicSelect">
                                <option value="LK">Laki-Laki</option>
                                <option value="PR">Perempuan</option>
                            </select>
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
                        <button
                            type="submit"
                            class="btn btn-success ml-1"
                            data-bs-dismiss="modal"
                        >
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Modal Preview --}}
@foreach ($siswas as $siswa)
<div
    class="modal fade text-left"
    id="info{{$siswa->user}}"
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
                            aria-controls="profile" aria-selected="false">Profil</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profilePribadi-tab" data-bs-toggle="tab" href="#profilePribadi" role="tab"
                            aria-controls="profilePribadi" aria-selected="false">Profil Pribadi</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="prestasi-tab" data-bs-toggle="tab" href="#prestasi" role="tab"
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
                                    <td class="p-1">{{ $siswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">NISN</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->NISN }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">NIS</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->NIS }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Jenis Kelamin</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Kelas Awal</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->kelas_awal }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Semester</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->semester }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Status Keaktifan</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->status_keaktifan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profilePribadi" role="tabpanel" aria-labelledby="profilePribadi-tab">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="p-1">Nama</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Anak Ke</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->anak_ke }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Nama Ayah</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->nama_ayah }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Pekerjan Ayah</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->nama_ayah }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Nama Ibu</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->nama_ibu }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Pekerjaan Ibu</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->pekerjaan_ibu }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Alamat Orangtua</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->alamat_orangtua }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Telepon Orangtua</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->telepon_orangtua }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Nama Wali</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->nama_wali }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Pekerjaan Wali</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->pekerjaan_wali }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Telepon Wali</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->telepon_wali }}</td>
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
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa->keterangan }}</td>
                                <td>{{ $siswa->jenis_prestasi }}</td>
                                <td>{{ $siswa->tanggal_prestasi }}</td>
                                <td>{{ $siswa->semester }}</td>
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
    id="update{{$siswa->user}}"
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
            <form action="/siswa/update-siswa{{ $siswa->NISN }}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label>NISN: </label>
                    <div class="form-group">
                        <input
                            value="{{$siswa->NISN}}"
                            name="nisn"
                            type="text"
                            class="form-control"
                            id="nisn"
                        />
                    </div>
                    <label>Nama: </label>
                    <div class="form-group">
                        <input
                            value="{{$siswa->nama}}"
                            name="nama"
                            type="text"
                            class="form-control"
                            id="nama"
                        />
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
                <button
                    type="button"
                    class="btn btn-success ml-1"
                    data-bs-dismiss="modal"
                >
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Simpan</span>
                </button>
            </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Delete --}}
<div
    class="modal fade text-left"
    id="delete{{$loop->iteration}}"
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
                    Non-Aktifkan {{$siswa->nama}}
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
            <form action="/siswa/delete-siswa/{{$siswa->NISN}}" method="post">
            <div class="modal-body">
                <label>Opsi: </label>
                <div class="form-group">
                    <select name="status_keaktifan" class="form-select form-control" id="basicSelect">
                        <option value="Lulus">Lulus</option>
                        <option value="Pindah">Pindah</option>
                        <option value="Drop Out">Drop Out</option>
                    </select>
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
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
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
