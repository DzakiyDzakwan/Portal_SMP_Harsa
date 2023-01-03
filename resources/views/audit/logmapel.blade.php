@extends('master.main')

@section('title')
    <title>Log Mapel</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>History Log Mata Pelajaran</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item Aktif" aria-current="page">
                        Log-Mata Pelajaran
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Table --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mapel Id</th>
                        <th>Nama</th>
                        <th>Kelompok</th>
                        <th>KKM</th>
                        <th>Kurikulum</th>
                        <th>Action</th>
                        <th>Tanggal Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logMapel as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->mapel_id }}</td>
                            <td>{{ $item->nama_mapel }}</td>
                            <td>{{ $item->kelompok_mapel }}</td>
                            <td>{{ $item->kkm }}</td>
                            <td>{{ $item->kurikulum }}</td>
                            <td>{{ $item->action }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
