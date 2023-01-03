@extends('master.main')

@section('title')
    <title>Log Roster Kelas</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>History Log Roster Kelas</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item Aktif" aria-current="page">
                        Log-Roster-Kelas
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
                        <th>Roster ID</th>
                        <th>Guru Mapel</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Akhir</th>
                        <th>Hari</th>
                        <th>Action</th>
                        <th>Waktu Dilakukan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logRoster as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->mapel_guru }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->semester_aktif }}</td>
                            <td>{{ $item->tahun_ajaran_aktif }}</td>
                            <td>{{ $item->waktu_mulai }}</td>
                            <td>{{ $item->waktu_akhir }}</td>
                            <td>{{ $item->hari }}</td>
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
