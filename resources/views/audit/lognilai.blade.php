@extends('master.main')

@section('title')
    <title>Log Nilai</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>History Log Nilai</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item Aktif" aria-current="page">
                        Log-Nilai
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
                        <th>Sesi</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
                        <th>Kontrak Siswa</th>
                        <th>KKM</th>
                        <th>Nilai Pengetahuan</th>
                        <th>Deskripsi Keterampilan</th>
                        <th>Nilai Keterampilan</th>
                        <th>Deskripsi Keterampilan</th>
                        <th>Status</th>
                        <th>Tanggal Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logNilai as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->sesi }}</td>
                            <td>{{ $item->mapel }}</td>
                            <td>{{ $item->guru }}</td>
                            <td>{{ $item->kontrak_siswa }}</td>
                            <td>{{ $item->kkm }}</td>
                            <td>{{ $item->nilai_pengetahuan }}</td>
                            <td>{{ $item->deskripsi_pengetahuan }}</td>
                            <td>{{ $item->nilai_keterampilan }}</td>
                            <td>{{ $item->deskripsi_keterampilan }}</td>
                            <td>{{ $item->status }}</td>
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
