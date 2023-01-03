@extends('master.main')

@section('title')
    <title>Log Siswa</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>History Log Siswa</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item Aktif" aria-current="page">
                        Log-Siswa
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
                        <th>User_id</th>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Tanggal Masuk</th>
                        <th>Kelas Awal</th>
                        <th>Anak Ke</th>
                        <th>Nama Ayah</th>
                        <th>Pekerjaan</th>
                        <th>Nama Ibu</th>
                        <th>Pekerjaan</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Nama Wali</th>
                        <th>Pekerjaan</th>
                        <th>Telepon</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Tanggal Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logSiswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user }}</td>
                            <td>{{ $item->NISN }}</td>
                            <td>{{ $item->NIS }}</td>
                            <td>{{ $item->kelas_awal }}</td>
                            <td>{{ $item->tanggal_masuk }}</td>
                            <td>{{ $item->kelas_awal }}</td>
                            <td>{{ $item->anak_ke }}</td>
                            <td>{{ $item->nama_ayah }}</td>
                            <td>{{ $item->pekerjaan_ayah }}</td>
                            <td>{{ $item->nama_ibu }}</td>
                            <td>{{ $item->pekerjaan_ibu }}</td>
                            <td>{{ $item->alamat_orangtua }}</td>
                            <td>{{ $item->telepon_orangtua }}</td>
                            <td>{{ $item->nama_wali }}</td>
                            <td>{{ $item->pekerjaan_wali }}</td>
                            <td>{{ $item->telepon_wali }}</td>
                            <td>{{ $item->status }}</td>
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
