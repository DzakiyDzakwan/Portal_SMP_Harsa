@extends('admin.master.main')

@section('title')
    <title>Mata Pelajaran</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Mata Pelajaran</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
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
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                            <div class="stats-icon purple mb-2">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Mapel">
                                    <i class="bi bi-book-half"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                            <h6 class="text-muted font-semibold">Total Mata Pelajaran</h6>
                            <h6 class="font-extrabold mb-0">2</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex gap-2 align-items-center justify-content-between">
            <h5>List Mata Pelajaran</h5>
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#inlineForm">
                    <i class="bi bi-plus-circle"></i> Tambah Mata Pelajaran
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Mapel</th>
                        <th>Nama Mapel</th>
                        <th>Kelompok Mapel</th>
                        <th>Kurikulum</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $pel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pel->mapel_id }}</td>
                            <td>{{ $pel->nama_mapel }}</td>
                            <td>{{ $pel->kelompok_mapel }}</td>
                            <td>{{ $pel->kurikulum }}</td>
                            <td>
                                {{-- Update Button --}}
                                <div class="modal-warning me-1 mb-1 d-inline-block">
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#update{{ $loop->iteration }}" data-order=>
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </div>
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

    <!--Create Modal -->
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title white" id="myModalLabel33">Tambah Mata Pelajaran</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form class="form form-vertical" action="/mapel/addMapel" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label>Kode Mata Pelajaran: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Kode Mata Pelajaran" class="form-control" name="mapel_id">
                        </div>
                        <label>Nama Mata Pelajaran: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Nama Mata Pelajaran" class="form-control" name="nama_mapel">
                        </div>
                        <label>Kelompok Mata Pelajaran: </label>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="kelompok_mapel">
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </div>
                        <label>Kurikulum: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Kurikulum" class="form-control" name="kurikulum">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                        <button class="btn btn-success ml-1" data-bs-dismiss="modal" name="submit">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($mapel as $pel)
        {{-- Modal edit --}}
        <div class="modal fade text-left" id="update{{ $loop->iteration }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel130" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title white" id="myModalLabel130">
                            Ubah Mata Pelajaran
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/mapel/updateMapel/{{ $pel->mapel_id }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <label>Kode Mata Pelajaran: </label>
                                <div class="form-group">
                                    <input name="mapel_id" value="{{ $pel->mapel_id }}" type="text"
                                        class="form-control" />
                                </div>
                                <label>Nama Mata Pelajaran: </label>
                                <div class="form-group">
                                    <input name="nama_mapel" value="{{ $pel->nama_mapel }}" type="text"
                                        class="form-control" />
                                </div>
                                <label>Kelompok Mata Pelajaran: </label>
                                <div class="form-group">
                                    <select value="{{ $pel->kelompok_mapel }}" class="form-control"
                                        id="exampleFormControlSelect1" name="kelompok_mapel">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </div>
                                <label>Kurikulum: </label>
                                <div class="form-group">
                                    <input name="kurikulum" value="{{ $pel->kurikulum }}" type="text"
                                        class="form-control" />
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button class="btn btn-success ml-1" data-bs-dismiss="modal" type="submit">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Delete --}}
        <div class="modal fade text-left" id="delete{{ $loop->iteration }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel130" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title white" id="myModalLabel130">
                            Hapus {{ $pel->mapel_id }}
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
                        <form action="/mapel/deleteMapel/{{ $pel->mapel_id }}" method="post">
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
