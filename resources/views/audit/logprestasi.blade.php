@extends('master.main')

@section('title')
    <title>Log Prestasi</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>History Log Prestasi</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item Aktif" aria-current="page">
                        Log-Prestasi
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
                        <th>Prestasi id</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Prestasi</th>
                        <th>Keterangan</th>
                        <th>Tanggal Prestasi</th>
                        <th>action</th>
                        <th>Tanggal Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logPrestasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $loop->prestasi_id }}</td>
                            <td>{{ $item->siswa }}</td>
                            <td>{{ $item->jenis_prestasi }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->tanggal_prestasi }}</td>
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
