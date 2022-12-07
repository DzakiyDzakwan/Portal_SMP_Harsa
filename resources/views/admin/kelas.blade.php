@extends('admin.master.main')

@section('title')
    <title>Kelas</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Kelas</h3>
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
                    Kelas
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
                                <i class="bi bi-person-workspace"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Total Kelas</h6>
                        <h6 class="font-extrabold mb-0">{{ $total }}</h6>
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
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Ruangan">
                                <i class="bi bi-house-door-fill"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Ruangan Kelas</h6>
                        <h6 class="font-extrabold mb-0">{{ $total }}</h6>
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
                        <div class="stats-icon blue mb-2">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Wali Kelas">
                                <i class="bi bi-people-fill"></i>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Wali Kelas</h6>
                        <h6 class="font-extrabold mb-0">{{ $total }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex gap-2 align-items-center justify-content-between">
        <h5>List Kelas</h5>
        <div class="form-group">
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                data-bs-target="#inlineForm">
                <i class="bi bi-plus-circle"></i> Tambah Kelas
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Nomor Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Jumlah Siswa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $k)
                    <tr>
                        <td>{{ $k->kelas_id }}</td>
                        <td>{{ $k->nama_kelas }}</td>
                        <td>{{ $k->grade }}-{{ $k->kelompok_kelas }}</td>
                        <td>{{ $k->Wali_Kelas }}</td>
                        <td>{{ $k->Jumlah_Siswa}}</td>
                        <td>
                            {{-- Update Button --}}
                            <div class="modal-warning me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#update{{ $k->kelas_id }}" data-order=>
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                            {{-- Delete Button --}}
                            <div class="modal-danger me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $k->kelas_id }}">
                                    <i class="bi bi-trash"></i>
                                </button>

                                
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>

<!--Modal tambah kelasl -->
<div
    class="modal fade text-left"
    id="inlineForm"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel33"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title white" id="myModalLabel33">
                    Tambah Kelas
                </h4>
                <button
                    type="button"
                    class="close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                >
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('addKelas') }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for="id">Id Kelas: </label>
                    <div class="form-group">
                        <input
                            type="text"
                            placeholder="Id Kelas"
                            class="form-control"
                            name="id"
                            id="id"
                            value="{{ old('id') }}"
                        />
                    </div>
                    <label for="grade">Grade: </label>
                    <div class="form-group">
                        <select class="choices form-select" id="grade" name="grade">
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                    <label for="group">Kelompok Kelas: </label>
                    <div class="form-group">
                        <input
                            type="text"
                            placeholder="kelompok Kelas"
                            class="form-control"
                            name="group"
                            id="group"
                            value="{{ old('group') }}"
                        />
                    </div>
                    <label for="nama">Nama Kelas: </label>
                    <div class="form-group">
                        <input
                            type="text"
                            placeholder="Nama Kelas"
                            class="form-control"
                            name="nama"
                            id="nama"
                            value="{{ old('nama') }}"
                        />
                    </div>
                    <label for="guru">Wali Kelas: </label>
                    <div class="form-group">
                        <select class="choices form-select" id="guru" name="guru">
                            @foreach ($guru as $g )
                            <option value="{{ $g->NIP }}">{{ $g->profiles->nama}}</option>
                            @endforeach
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
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button
                        class="btn btn-success ml-1"
                        data-bs-dismiss="modal"
                        name="submit"
                    >
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($kelas as $k)
{{-- Modal Edit --}}
<div
    class="modal fade text-left"
    id="update{{ $k->kelas_id }}"
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
                    Ubah Kelas
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
                <form action="/kelas/updateKelas/{{ $k->kelas_id }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="id">Id Kelas: </label>
                    <div class="form-group">
                        <input
                            type="text"
                            placeholder="Id Kelas"
                            class="form-control"
                            name="id"
                            id="id"
                            value="{{ $k->kelas_id }}"
                        />
                    </div>
                    <label for="grade">Grade: </label>
                    <div class="form-group">
                        <select class="choices form-select" id="grade" name="grade">
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                    <label for="group">Kelompok Kelas: </label>
                    <div class="form-group">
                        <input
                            type="text"
                            placeholder="kelompok Kelas"
                            class="form-control"
                            name="group"
                            id="group"
                            value="{{ $k->kelompok_kelas }}"
                        />
                    </div>
                    <label for="nama">Nama Kelas: </label>
                    <div class="form-group">
                        <input
                            type="text"
                            placeholder="Nama Kelas"
                            class="form-control"
                            name="nama"
                            id="nama"
                            value="{{ $k->nama_kelas }}"
                        />
                    </div>
                        <label for="guru">Wali Kelas: </label>
                        <div class="form-group">
                            <select class="choices form-select" id="guru" name="guru">
                                @foreach ($guru as $g )
                                <option value="{{ $g->NIP }}">{{ $g->profiles->nama}}</option>
                                @endforeach
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
                            class="btn btn-success ml-1"
                            data-bs-dismiss="modal"
                            type="submit"
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

{{-- Modal Delete --}}
<div
    class="modal fade text-left"
    id="delete{{ $k->kelas_id }}"
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
                <form action="/kelas/deleteKelas/{{ $k->kelas_id }}" method="POST">
                    @csrf
                    @method('DELETE')
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
